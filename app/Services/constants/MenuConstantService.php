<?php
/**
 * Created by PhpStorm.
 * User: Kalu
 * Date: 01/06/2017
 * Time: 11:45
 */

namespace App\Services\constants;
use App\Services\ConstantService;


class MenuConstantService extends ConstantService
{

    const INDEX = self::BASE_PATH.'menu/index';
    const CREATE = self::BASE_PATH.'menu/create';
    const EDIT = self::BASE_PATH.'menu/edit';
    const DELETE = self::BASE_PATH.'menu/delete';
    const GETBYID = self::BASE_PATH.'menu/getbyid';

}