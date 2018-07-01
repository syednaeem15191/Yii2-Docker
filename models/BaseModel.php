<?php
/**
 * Created by PhpStorm.
 * User: syed
 * Date: 7/1/18
 * Time: 1:28 PM
 */

namespace app\models;


use yii\base\Model;

class BaseModel extends Model
{
    public static function str_limit($string, $limit = 50, $end = '...')
    {
        if (strlen($string) > $limit)
            return substr($string, 0, $limit) . $end;
        return $string;
    }
}