<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <? try {
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name',
                'username',
                ['attribute' => 'type_id', 'value' => ($model->type->name)],
                // ['attribute' => 'posts', 'format' => 'html', 'value' => \app\models\BaseModel::get_html_anchor($model->name, 'post/index', $model->id)]
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
