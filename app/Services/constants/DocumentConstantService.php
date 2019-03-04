<?php
/**
 * Created by PhpStorm.
 * User: Kalu
 * Date: 18/04/2017
 * Time: 10:20
 */

namespace App\Services\constants;


use App\Services\ConstantService;

class DocumentConstantService extends ConstantService
{
    const DOCUMENT_INDEX = self::BASE_PATH.'documents/index';
    const DOCUMENT_CREATE = self::BASE_PATH.'documents/create';
    const DOCUMENT_EDIT = self::BASE_PATH.'documents/edit';
    const DOCUMENT_DELETE = self::BASE_PATH.'documents/delete';
    const DOCUMENT_DETAILS = self::BASE_PATH.'documents/details';
}