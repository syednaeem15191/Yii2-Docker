<?php
/**
 * Created by PhpStorm.
 * User: syed
 * Date: 6/28/18
 * Time: 1:36 PM
 */

namespace app\controllers;


use Yii;
use yii\web\Controller;

class BasicController extends Controller
{
    protected function setFlash($message, $type = 'success')
    {
        Yii::$app->getSession()->setFlash($type, $message);
    }
}