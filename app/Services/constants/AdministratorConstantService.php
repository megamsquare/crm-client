<?php

/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 04/04/2017
 * Time: 13:10
 */
namespace App\Services\constants;
use App\Services\ConstantService;

class AdministratorConstantService extends ConstantService
{
    const VISIT_CREATE = self::BASE_PATH.'visitcalls/createvisit';
    const VISIT_EDIT = self::BASE_PATH.'visitcalls/editvisit';
    const VISIT_DELETE = self::BASE_PATH.'visitcalls/deletevisit';

    const CALL_CREATE = self::BASE_PATH.'visitcalls/createcalls';
    const CALL_EDIT = self::BASE_PATH.'visitcalls/editcalls';
    const CALL_DELETE = self::BASE_PATH.'visitcalls/deletecalls';

}
