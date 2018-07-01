<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <? foreach ($posts as $post) { ?>
                <div class="col-lg-4">
                    <h2><?= \yii\helpers\Html::a($post->title, ['post/view', 'id' => $post->id]) ?></h2>

                    <p><?= \app\models\BaseModel::str_limit($post->description) ?></p>

                    <p><a class="btn btn-default" href="#"><?= $post->category->name ?></a>
                    </p>
                </div>
            <? } ?>
        </div>

    </div>
</div>
