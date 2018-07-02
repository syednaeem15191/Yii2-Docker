<?php
/**
 * Created by PhpStorm.
 * User: syed
 * Date: 7/1/18
 * Time: 1:28 PM
 */

namespace app\models;


use yii\base\Model;
use yii\helpers\Html;

class BaseModel extends Model
{
    public static function str_limit($string, $limit = 50, $end = '...')
    {
        if (strlen($string) > $limit)
            return substr($string, 0, $limit) . $end;
        return $string;
    }

    public static function get_html_anchor($text = 'Link', $href = '#', $id = '')
    {
        return ( $id != '' ? Html::a($text, [$href, 'id' => $id]) : Html::a($text, $href));
    }
}