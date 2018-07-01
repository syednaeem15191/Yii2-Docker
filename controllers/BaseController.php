<?php
/**
 * Created by PhpStorm.
 * User: syed
 * Date: 6/28/18
 * Time: 1:36 PM
 */

namespace app\controllers;


use app\models\User;
use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    protected function setFlash($message, $type = 'success')
    {
        Yii::$app->getSession()->setFlash($type, $message);
    }
}