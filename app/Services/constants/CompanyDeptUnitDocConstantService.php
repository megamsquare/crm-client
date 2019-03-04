<?php

/**
 * Created by PhpStorm.
 * User: Kalu
 * Date: 04/04/2017
 * Time: 11:30
 */
namespace App\Services\constants;
use App\Services\ConstantService;

class CompanyDeptUnitDocConstantService extends ConstantService
{
    const COMPANY_INDEX = self::BASE_PATH.'company/index';
    const COMPANY_CREATE = self::BASE_PATH.'company/create';
    const COMPANY_EDIT = self::BASE_PATH.'company/edit';
    const COMPANY_DELETE = self::BASE_PATH.'company/delete';

    const DEPARTMENT_INDEX = self::BASE_PATH.'department/index';
    const DEPARTMENT_CREATE = self::BASE_PATH.'department/create';
    const DEPARTMENT_EDIT = self::BASE_PATH.'department/edit';
    const DEPARTMENT_DELETE = self::BASE_PATH.'department/delete';

    const UNIT_INDEX = self::BASE_PATH.'unit/index';
    const UNIT_CREATE = self::BASE_PATH.'unit/create';
    const UNIT_EDIT = self::BASE_PATH.'unit/edit';
    const UNIT_DELETE = self::BASE_PATH.'unit/delete';
    const UNIT_DETAILS = self::BASE_PATH.'unit/details';
    const UNIT_SEARCH_USERS_IN_UNIT = self::BASE_PATH.'unit/searchUsersInUnit';
    const UNIT_GET_USERS_IN_UNIT = self::BASE_PATH.'unit/usersInUnit';
    const COMPANY_ADD_USER_TO_UNIT =self::BASE_PATH.'unit/addusertounit' ;
    const UNIT_DELETE_USER_FROM_UNIT = self::BASE_PATH.'unit/removeuserfromunit';
    const MAKE_UNIT_HEAD =  self::BASE_PATH.'unit/makeunithead';

}