<?php
/**
 * Created by PhpStorm.
 * User: Toshiba
 * Date: 15/03/2017
 * Time: 17:23
 */
namespace App\Services;
class CurlAgent
{
    protected $_useragent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)';
    protected $_url;
    protected $_followlocation;
    protected $_timeout;
    protected $_maxRedirects;
    protected $_cookieFileLocation = './cookie.txt';
    protected $_post;
    protected $_postFields;
    protected $_referer = "http://localhost";
    protected $_headers;

    protected $_session;
    protected $_webpage;
    protected $_includeHeader;
    protected $_noBody;
    protected $_status;
    protected $_binaryTransfer;
    public $authentication = 0;
    public $auth_name = '';
    public $auth_pass = '';

    public function useAuth($use)
    {
        $this->authentication = 0;
        if ($use == true) $this->authentication = 1;
    }

    public function setName($name)
    {
        $this->auth_name = $name;
    }

    public function setPass($pass)
    {
        $this->auth_pass = $pass;
    }

    public function __construct($url, $includeHeader = false, $followlocation = true, $timeOut = 30, $maxRedirecs = 4, $binaryTransfer = false, $noBody = false)
    {
        $this->_url = $url;
        $this->_followlocation = $followlocation;
        $this->_timeout = $timeOut;
        $this->_maxRedirects = $maxRedirecs;
        $this->_noBody = $noBody;
        $this->_includeHeader = $includeHeader;
        $this->_binaryTransfer = $binaryTransfer;

        $this->_cookieFileLocation = null;//dirname(__FILE__).'/cookie.txt';
        $this->_headers = array();
    }

    public function setReferer($referer)
    {
        $this->_referer = $referer;
    }

    public function setCookiFileLocation($path)
    {
        $this->_cookieFileLocation = $path;
    }

    public function setPost($postFields)
    {
        $this->_post = true;
        foreach($postFields as $k => $v){
            if(is_array($v)){
                $postFields[$k]=json_encode($v);
            }
        }
        $this->_postFields = $postFields;
    }

    public function setUserAgent($userAgent)
    {
        $this->_useragent = $userAgent;
    }

    public function setHeader($key, $value)
    {
        $this->_headers[] = "$key: $value";
    }

    public function createCurl($url = 'nul')
    {
        if ($url != 'nul') {
            $this->_url = $url;
        }

        $s = curl_init();

        curl_setopt($s, CURLOPT_URL, $this->_url);
        curl_setopt($s, CURLOPT_TIMEOUT, $this->_timeout);
        curl_setopt($s, CURLOPT_MAXREDIRS, $this->_maxRedirects);
        curl_setopt($s, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($s, CURLOPT_FOLLOWLOCATION, $this->_followlocation);

        if ($this->_cookieFileLocation) {
            curl_setopt($s, CURLOPT_COOKIEJAR, $this->_cookieFileLocation);
            curl_setopt($s, CURLOPT_COOKIEFILE, $this->_cookieFileLocation);
        }

        if ($this->authentication == 1) {
            curl_setopt($s, CURLOPT_USERPWD, $this->auth_name . ':' . $this->auth_pass);
        }
        if ($this->_post) {
            curl_setopt($s, CURLOPT_POST, true);
            curl_setopt($s, CURLOPT_POSTFIELDS, $this->_postFields);
            $this->_post = false;
        }

        if ($this->_includeHeader) {
            curl_setopt($s, CURLOPT_HEADER, true);
            curl_setopt($s, CURLOPT_HTTPHEADER, $this->_headers);
        }

        if ($this->_noBody) {
            curl_setopt($s, CURLOPT_NOBODY, true);
        }
        /*
        if($this->_binary)
        {
            curl_setopt($s,CURLOPT_BINARYTRANSFER,true);
        }
        */
        curl_setopt($s, CURLOPT_USERAGENT, $this->_useragent);
        curl_setopt($s, CURLOPT_REFERER, $this->_referer);

        $response = curl_exec($s);

        $header_size = curl_getinfo($s, CURLINFO_HEADER_SIZE);
        $this->_webpage = substr($response, $header_size);

        $this->_status = curl_getinfo($s, CURLINFO_HTTP_CODE);
        curl_close($s);
    }

    public function getHttpStatus()
    {
        return $this->_status;
    }

    public function getResponse()
    {
        return $this->_webpage;
    }

    public function getHeaders()
    {
        return $this->_headers;
    }
}