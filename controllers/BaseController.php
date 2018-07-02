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

    protected function sendMailPostCreate($to, $subject = 'New Post Created', $plain_body = 'plain text body', $html_body = 'html text body')
    {
        $this->sendMail('admin@application.com', $to, $subject, $plain_body, $html_body);
    }

    protected function sendMailPostUpdate($to, $subject = 'New Post Updated', $plain_body = 'plain text body', $html_body = 'html text body')
    {
        $this->sendMail('admin@application.com', $to, $subject, $plain_body, $html_body);
    }

    protected function sendMailPostDelete($to, $subject = 'Post Deleted', $plain_body = 'plain text body', $html_body = 'html text body')
    {
        $this->sendMail('admin@application.com', $to, $subject, $plain_body, $html_body);
    }

    protected function sendMail($from = 'syed.naeem@rhinos-me.com', $to = 'syed.naeem@rhinos-me.com', $subject = 'Subject', $text_body = 'Plain Text Body ', $html_body = 'HTML Text Body')
    {
//        Yii::$app->mail->compose()
//            ->setFrom('somebody@domain.com')
//            ->setTo('syed.naeem@rhinos-me.com')
//            ->setSubject('Email sent from Yii2-Swiftmailer')
//            ->send();

        Yii::$app->mailer->compose()
            ->setFrom($from)
            ->setTo($to)
            ->setSubject($subject)
            ->setTextBody($text_body)
            ->setHtmlBody($html_body)
            ->send();
    }
}