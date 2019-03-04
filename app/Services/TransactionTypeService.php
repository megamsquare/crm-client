<?php

/**
 * Created by PhpStorm.
 * User: Raphael Ikediashi
 * Date: 4/10/2017
 * Time: 2:42 PM
 */
namespace App\Services;
class TransactionTypeService
{
const TRANSACTION_TYPE_COMMERCIAL_PRINTS=1;
const TRANSACTION_TYPE_SECURITY_PRINTS=2;
public static function getTransactionTypeFormattedText($type){
    switch ($type){
        case self::TRANSACTION_TYPE_COMMERCIAL_PRINTS:
            return 'Commercial Prints';
        case  self::TRANSACTION_TYPE_SECURITY_PRINTS:
            return 'Security Prints';
        default:
            return '';
    }
}
}