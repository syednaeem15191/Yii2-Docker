<?php
/**
 * Created by PhpStorm.
 * User: syed
 * Date: 7/2/18
 * Time: 1:10 PM
 */ ?>
<div class="col-lg-4">
    <h2><?= \yii\helpers\Html::a($post->title, ['post/view', 'id' => $post->id]) ?></h2>

    <p><?= \app\models\BaseModel::str_limit($post->description) ?></p>

    <p><a class="btn btn-default" href="#"><?= $post->category->name ?></a>
    </p>
</div>