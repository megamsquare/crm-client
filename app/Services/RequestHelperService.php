<?php
/**
 * Created by PhpStorm.
 * User: Toshiba
 * Date: 15/03/2017
 * Time: 16:58
 */
namespace app\Services;
class RequestHelperService
{

    /**
     * @return mixed
     */
    public static function getAccessToken()
    {
        return session()->get("access_token");
    }
    /**
     * @param mixed $accessToken
     */
    public static function setAccessToken($accessToken)
    {
        session()->put("access_token", $accessToken);
    }
    public static function setClientID($client_id)
    {
        session()->put("client_id", $client_id);
    }
    public static function getClientID()
    {
        return session()->get("client_id");
    }
}

