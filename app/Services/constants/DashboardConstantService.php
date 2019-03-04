<?php

/**
 * Created by PhpStorm.
 * User: Raphael
 * Date: 05/31/2017
 * Time: 11:30
 */
namespace App\Services\constants;
use App\Services\ConstantService;

class DashboardConstantService extends ConstantService
{
    const DASHBOARD_CUSTOMER_COUNT = self::BASE_PATH.'accounts/getallcustomercount';
    const DASHBOARD_LEAD_COUNT = self::BASE_PATH.'accounts/getallleadcount';
    const DASHBOARD_USER_COUNT = self::BASE_PATH.'accounts/getallUsercount';
    const DASHBOARD_USER_IN_UNIT = self::BASE_PATH.'accounts/getAllUserInUnitByUserid';
    const DASHBOARD_USER_FEEDS = self::BASE_PATH.'feeds/index';
}
