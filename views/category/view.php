<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <? if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin(Yii::$app->user->identity->username)) { ?>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <? } ?>
    </p>

    <? try {
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name',
            ],
        ]);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    } ?>

    <div class="row">
        <? foreach ($model->posts as $post) { ?>
            <?= $this->render('@app/views/layouts/post-list', ['post' => $post]); ?>
        <? } ?>
    </div>

</div>
