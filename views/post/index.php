<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <? try {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'title',
                ['attribute' => 'description', 'content' => function ($model) {
                    return \app\models\BaseModel::str_limit($model->description, 100);
                }],
                // ['attribute' => 'category_id', 'value' => 'category.name'],
                ['attribute' => 'category_id', 'content' => function ($model) {
                    return \app\models\BaseModel::get_html_anchor($model->category->name, 'post/index', $model->user->id);
                }],
                ['attribute' => 'user_id', 'content' => function ($model) {
                    return \app\models\BaseModel::get_html_anchor($model->user->name, 'user/view', $model->user->id);
                }],

                ['class' => 'yii\grid\ActionColumn',
                    'header' => 'Action',
                    'headerOptions' => ['class' => 'action-column text-center'],
                    'contentOptions' => ['class' => 'text-center']]
            ],
        ]);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    } ?>
</div>
