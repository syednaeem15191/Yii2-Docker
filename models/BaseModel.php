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

    public static function get_html_anchor($text = 'Link', $href = '#', $id = null)
    {
//        return ($id != '' ? Html::a($text, [$href, 'id' => $id]) : Html::a($text, $href));
        return BaseModel::get_html_anchor_bootstrap($text, $href, $id, null);
    }

    public static function get_html_anchor_bootstrap($text = 'Link', $href = '#', $id = null, $class = 'list-group-item')
    {
        return ($id != null ? Html::a($text, [$href, 'id' => $id], ['class' => $class]) : Html::a($text, [$href], ['class' => $class]));
    }
}