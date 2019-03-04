<?php

/**
 * Created by PhpStorm.
 * User: Raphael
 * Date: 05/31/2017
 * Time: 11:30
 */
namespace App\Services\constants;
use App\Services\ConstantService;

class TransactionOperationConstantService extends ConstantService
{
    const TRANSACTION_INDEX = self::BASE_PATH.'transactions/getall';
    const TRANSACTION_CREATE = self::BASE_PATH.'transactions/create';
    const TRANSACTION_CREATE_DOCUMENT = self::BASE_PATH.'transactions/createDocumentTransaction';
    const TRANSACTION_CREATE_NOTE = self::BASE_PATH.'transactions/createNoteTransaction';
    const TRANSACTION_DETAILS = self::BASE_PATH.'transactions/getAllID';
    const ACCOUNT_TRANSACTION_DETAILS = self::BASE_PATH.'transactions/getAllAccount';
    const DOCUMENT_TRANSACTION_DETAILS = self::BASE_PATH.'transactions/getAllDocument';
    const TRANSACTION_NOTE_DETAILS = self::BASE_PATH.'transactions/getAllNote';
    const JOB_CREATE =  self::BASE_PATH.'jobs/create';
    const JOB_EDIT=  self::BASE_PATH.'transactions/edit';
    const TRANSACTION_DELETE = self::BASE_PATH.'transactions/delete';

    const ANCILLARIES_CREATE =  self::BASE_PATH.'jobs/create';
    const ANCILLARIES_EDIT=  self::BASE_PATH.'transactions/edit';

    const COMPANY_DELETE = self::BASE_PATH.'company/delete';
    const CREATE_LOGO_COLOUR = self::BASE_PATH.'transactions/createlogocolour';
    const COMMERCIAL_PRINTS_CREATE = self::BASE_PATH.'transactions/commercialprintscreate';
    const SECURITY_PRINTS_CREATE = self::BASE_PATH.'transactions/securityprintscreate';

    const TRANSACTION_GET_UNITS = self::BASE_PATH.'transactions/securityprintscreate';
}
