<?php
/**
 * Created by PhpStorm.
 * User: Toshiba
 * Date: 15/03/2017
 * Time: 16:50
 */
namespace App\Services;


class BaseService{
    const HTTP_GET = 1;
    const HTTP_POST = 2;

    const HTTP_STATUS_OK = 200;
    const HTTP_STATUS_CREATED = 201;
    const HTTP_STATUS_BAD_REQUEST = 400;
    const NAIRA_SYMBOL = '₦';

    protected $_curlagent = null;
    protected $_client_id;
    protected $_access_token;
    protected $_response_as_json;
    protected $_use_root_path;
    protected $lastErrorMessage;
    protected $responseHandler;
    public function __construct($client_id = null, $access_token = null, $response_as_json = false, $use_root_path = true)
    {
        $this->_client_id = $client_id;
        $this->_access_token = $access_token;
        $this->_response_as_json = $response_as_json;
        $this->_use_root_path = $use_root_path;
    }

    public static function getDocumentTypeIcon($file_name)
    {
        $extension=explode('.',$file_name);
        $extension=$extension[count($extension)-1];
        switch($extension){
            case 'jpg':
            case 'jpeg':
            case 'gif':
            case 'png':
                return 'fa-file-picture-o';
            case 'doc':
            case 'docx':
                return 'fa-file-word-o';
            case 'pdf':
                return 'fa-file-pdf-o';
            case 'ppt':
                return 'fa-file-powerpoint-o';
            case 'txt':
                return 'fa-file-text-o';
            case 'excel':
                return 'fa-file-excel-o';
            default:
                return 'fa-file-text-o';

        }
    }

    public static function formatMoney($amount)
    {
        return self::NAIRA_SYMBOL.number_format($amount,2);
    }

    /**
     * @return boolean
     */
    public function isResponseAsJson()
    {
        return $this->_response_as_json;
    }

    /**
     * @param boolean $response_as_json
     */
    public function setResponseAsJson($response_as_json)
    {
        $this->_response_as_json = $response_as_json;
    }

    /**
     * @return boolean
     */
    public function isUseRootPath()
    {
        return $this->_use_root_path;
    }

    /**
     * @param boolean $use_root_path
     */
    public function setUseRootPath($use_root_path)
    {
        $this->_use_root_path = $use_root_path;
    }

    /**
     * @return string|null
     */
    public function getAccessToken()
    {
        return $this->_access_token;
    }

    /**
     * @param string $access_token
     */
    public function setAccessToken($access_token)
    {
        $this->_access_token = $access_token;
    }

    /**
     * @return string|null
     */
    public function getClientId()
    {
        return $this->_client_id;
    }

    /**
     * @param string $client_id
     */
    public function setClientId($client_id)
    {
        $this->_client_id = $client_id;
    }

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     * @return ResponseHandler
     */
    public function getResponseHandler()
    {
        return $this->responseHandler;
    }

    /**
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     * @param $responseHandler ResponseHandler
     */
    public function setResponseHandler($responseHandler)
    {
        $this->responseHandler = $responseHandler;
    }

    public function getHttpStatus()
    {
        return $this->_curlagent->getHttpStatus();
    }

    /**
     * Decode response
     * @author Adeyemi Olaoye <yemi@cottacush.com>
     * @param $response
     * @return bool | mixed
     */
    public function decodeResponse($response)
    {
        if ($response) {
            if ($response['status'] === ResponseService::STATUS_OK) {
                return $response['data'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Gets the last error message
     * @author Adegoke Obasa <goke@cottacush.com>
     * @return mixed
     */
    public function getLastErrorMessage()
    {
        return $this->lastErrorMessage;
    }


    public function requestGuzzleHttp($url, $params, $http_method, $headers = [])
    {


    }

    public function request($url, $params, $http_method, $headers = [])
    {
        if(!getenv('BASE_PATH')) throw new \Exception("Base path not set in environment variables");
        $url = getenv('BASE_PATH').$url;
        $headers['headertoken'] = session('headertoken');
        try{

            //$oriUrl = $url;
            if (is_null($this->_curlagent)) {
                $this->_curlagent = new CurlAgent('', true);
            }
            if ($this->_access_token != null && !$this->_curlagent->getHeaders()) {
                $this->_curlagent->setHeader('i', $this->_client_id);
                $this->_curlagent->setHeader('a', $this->_access_token);
            }
            foreach ($headers as $key => $value) {
              $this->_curlagent->setHeader($key, $value);
            }

            $url = trim($url);
            if ($this->_use_root_path) {
                $url = request()->input('apiUrl') . ltrim($url, '/');
            }

            if ($http_method == BaseService::HTTP_POST) {
                $this->_curlagent->setPost($params);
            } else if ($http_method == BaseService::HTTP_GET) {
                $this->injectUrlParams($url, $params);
            }

            //if($oriUrl == ServiceConstant::URL_GET_ALL_PARCEL)
            //dd($url);

            $this->_curlagent->createCurl($url);

            /*if($url == ServiceConstant::URL_CREATE_BULK_SHIPMENT_TASK)*/
            //dd($this->_curlagent->getResponse());

            if ($this->_curlagent->getHttpStatus() == BaseService::HTTP_STATUS_OK) {
                return ResponseService::direct($this->_curlagent->getResponse(), $this->_response_as_json);
            } else {
                return ResponseService::unknown($this->_curlagent->getHttpStatus(), $this->_curlagent->getResponse());
            }

        }catch (\Exception $exception){
            dd($exception);
        }
    }

    protected function injectUrlParams(&$url, $params)
    {
        $url = trim($url);
        $url_params = array();
        if(is_array($params)){
            foreach ($params as $key => $value) {
                $url_params[] = $key . '=' . urlencode($value);
            }
        }
        $url_query = parse_url($url, PHP_URL_QUERY);

        if ($url_query == null) {
            $url = rtrim($url, '?');
            $url .= '?';
        } else {
            $url = rtrim($url, '&');
            $url .= '&';
        }

        $url .= join('&', $url_params);

        //dd($url);
    }
}
