<?php

/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 04/04/2017
 * Time: 13:10
 */
namespace App\Services\constants;
use App\Services\ConstantService;

class NoteConstantService extends ConstantService
{
    const NOTE_INDEX = self::BASE_PATH.'notes/getNote';
    const NOTE_CREATE = self::BASE_PATH.'notes/create';
    const NOTE_EDIT = self::BASE_PATH.'notes/edit';
    const NOTE_DELETE = self::BASE_PATH.'notes/delete';
}
