<?php

/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 04/04/2017
 * Time: 13:10
 */
namespace App\Services\constants;
use App\Services\ConstantService;

class HelpDeskConstantService extends ConstantService
{
    const HELPDESK_INDEX = self::BASE_PATH.'helpdesk/index';
    const HELPDESK_CREATE = self::BASE_PATH.'helpdesk/create';
    const HELPDESK_TICKET_REPORT = self::BASE_PATH.'helpdesk/ticketReport';
    const HELPDESK_CREATE_USER = self::BASE_PATH.'helpdesk/addUserByID';
    const HELPDESK_REMOVE_USERS = self::BASE_PATH.'helpdesk/removeUsersById';
    const HELPDESK_GET_USERS = self::BASE_PATH.'helpdesk/listUserInTicket';
    const HELPDESK_CREATE_COMMENT = self::BASE_PATH.'helpdesk/createComment';
    const HELPDESK_VIEW_COMMENT = self::BASE_PATH.'helpdesk/viewComment';
    const HELPDESK_CHANGE_STATUS = self::BASE_PATH.'helpdesk/closedReOpenTicketByIds';
    const HELPDESK_DELETE_TICKET = self::BASE_PATH.'helpdesk/deleteTicketByIds';
    const HELPDESK_GET_UNITS_USERS = self::BASE_PATH.'helpdesk/listunitsusers';
    const HELPDESK_All = self::BASE_PATH.'helpdesk/getall';

}
