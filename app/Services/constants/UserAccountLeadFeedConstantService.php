<?php

/**
 * Created by PhpStorm.
 * User: Kalu
 * Date: 04/04/2017
 * Time: 11:30
 */
namespace App\Services\constants;
use App\Services\ConstantService;

class UserAccountLeadFeedConstantService extends ConstantService
{
    const USER_INDEX = self::BASE_PATH.'users/index';
    const USER_CREATE = self::BASE_PATH.'users/create';
    const USER_EDIT = self::BASE_PATH.'users/edit';
    const USER_GETALL = self::BASE_PATH.'users/index';
    const USER_VIEW = self::BASE_PATH.'users/getuser';
    const USER_CHANGE_PASSWORD = self::BASE_PATH.'users/changepassword';
    const USER_RESET_PASSWORD = self::BASE_PATH.'users/resetpassword';
    const USER_DELETE = self::BASE_PATH.'users/delete';
    const USER_IMPORT_CSV = self::BASE_PATH.'users/importcsv';

    const ACCOUNT_INDEX = self::BASE_PATH.'accounts/index';
    const ACCOUNT_CREATE = self::BASE_PATH.'accounts/create';
    const ACCOUNT_EDIT = self::BASE_PATH.'accounts/edit';
    const GETALL_LEAD_ACCOUNT = self::BASE_PATH.'accounts/getalllead';
    const GETALL_CUSTOMER_ACCOUNT = self::BASE_PATH.'accounts/getallcustomer';
    const GET_ACCOUNT = self::BASE_PATH.'accounts/view';
    const ACCOUNT_DELETE = self::BASE_PATH.'accounts/delete';

    const GET_ALL_ACCOUNT_PERSONNEL = self::BASE_PATH.'accountpersonnels/getall';
    const GET_ACCOUNT_PERSONNELS = self::BASE_PATH.'accountpersonnels/getbyaccount';
    const ACCOUNT_PERSONNEL_CREATE = self::BASE_PATH.'accountpersonnels/create';
    const ACCOUNT_PERSONNEL_EDIT = self::BASE_PATH.'accountpersonnels/edit';

    const FEED_INDEX = self::BASE_PATH.'feeds/getfeedsbyuserid';
    const FEED_CREATE = self::BASE_PATH.'feeds/create';
    const FEED_ADD_USERS = self::BASE_PATH.'feeds/adduserstofeed';
    const FEED_ADD_COMMENT = self::BASE_PATH.'feeds/addComment';
    const FEED_GET_COMMENTS = self::BASE_PATH.'feeds/getComments';
    const FEED_REMOVE_USERS = self::BASE_PATH.'feeds/removeusersfromfeed';
    const FEED_EDIT = self::BASE_PATH.'feeds/edit';
    const FEED_GETALL = self::BASE_PATH.'feeds/getall';
    const FEED_DELETE = self::BASE_PATH.'feeds/delete';
    const FEED_GET_UNITS_USERS = self::BASE_PATH.'feeds/listunitsusers';
    const FEED_GET_USERS = self::BASE_PATH.'feeds/listfeedusers';

}