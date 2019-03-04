<?php

/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 04/04/2017
 * Time: 13:10
 */
namespace App\Services\constants;
use App\Services\ConstantService;

class VisitCallsConstantService extends ConstantService
{
    const VISIT_INDEX = self::BASE_PATH.'visitcalls/getVisit';
    const VISIT_CREATE = self::BASE_PATH.'visitcalls/createvisit';
    const VISIT_EDIT = self::BASE_PATH.'visitcalls/editvisit';
    const VISIT_DELETE = self::BASE_PATH.'visitcalls/deletevisit';
    const VISIT_DETAILS = self::BASE_PATH.'visitcalls/details';
    const VISIT_SEARCH_ACCOUNT_IN_VISIT = self::BASE_PATH.'visitcalls/searchAccountInVisitCalls';

    const CALL_INDEX = self::BASE_PATH.'visitcalls/getCalls';
    const CALL_CREATE = self::BASE_PATH.'visitcalls/createcalls';
    const CALL_EDIT = self::BASE_PATH.'visitcalls/editcalls';
    const CALL_DELETE = self::BASE_PATH.'visitcalls/deletecalls';

}
