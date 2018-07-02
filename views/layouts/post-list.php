<?php
/**
 * Created by PhpStorm.
 * User: syed
 * Date: 7/2/18
 * Time: 1:10 PM
 */ ?>
<div class="col-lg-4">
    <h2><?= \app\models\BaseModel::get_html_anchor($post->title, 'post/view', $post->id) ?></h2>

    <p><?= \app\models\BaseModel::str_limit($post->description) ?></p>

    <p>
        <?= \app\models\BaseModel::get_html_anchor_bootstrap($post->category->name, 'category/view', $post->category->id, 'btn btn-default') ?>
        <?= \app\models\BaseModel::get_html_anchor_bootstrap($post->user->name, 'user/view', $post->user->id, 'btn btn-default') ?>
    </p>
</div>