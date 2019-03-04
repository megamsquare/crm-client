<?php
/**
 * Created by PhpStorm.
 * User: Toshiba
 * Date: 15/03/2017
 * Time: 17:01
 */
namespace App\Services;
class CalypsoService {
    /**
     * Get's a value if it's non empty
     * @author Adegoke Obasa <goke@cottacush.com>
     * @param $array
     * @param $key
     * @param null $default
     * @return null
     */
    public static function getDisplayValue($array, $key, $default = null)
    {
        $value = self::getValue($array, $key, null);
        if (empty(trim($value))) {
            return $default;
        }
        return $value;
    }

    /**
     * Gets value from array or object
     * Copied from Yii2 framework
     * @link http://www.yiiframework.com/
     * @copyright Copyright (c) 2008 Yii Software LLC
     * @license http://www.yiiframework.com/license/
     * @param      $array
     * @param      $key
     * @param null $default
     * @return null
     * @author Qiang Xue <qiang.xue@gmail.com>
     * @author Adegoke Obasa <adegoke.obasa@konga.com>
     * @author Rotimi Akintewe <rotimi.akintewe@konga.com>
     */
    public static function getValue($array, $key, $default = null)
    {
        if (!isset($array)) {
            return $default;
        }

        if ($key instanceof \Closure) {
            return $key($array, $default);
        }
        if (is_array($key)) {
            $lastKey = array_pop($key);
            foreach ($key as $keyPart) {
                $array = static::getValue($array, $keyPart);
            }
            $key = $lastKey;
        }
        if (is_array($array) && array_key_exists($key, $array)) {
            return $array[$key];
        }
        if (($pos = strrpos($key, '.')) !== false) {
            $array = static::getValue($array, substr($key, 0, $pos), $default);
            $key = substr($key, $pos + 1);
        }
        if (is_object($array) && property_exists($array, $key)) {
            return $array->$key;
        } elseif (is_array($array)) {
            return array_key_exists($key, $array) ? $array[$key] : $default;
        } else {
            return $default;
        }
    }
}