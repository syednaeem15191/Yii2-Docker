<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

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
                'title',
                'description',
                ['attribute' => 'category_id', 'format' => 'html', 'value' => \app\models\BaseModel::get_html_anchor($model->category->name, 'category/view', $model->category->id)],
                ['attribute' => 'user_id', 'format' => 'html', 'value' => \app\models\BaseModel::get_html_anchor($model->user->name, 'user/view', $model->user->id)],
                'created_at',
                'updated_at',
            ],
        ]);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    } ?>

</div>
