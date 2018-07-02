<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <? //= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <? try {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id',
                ['attribute' => 'name', 'content' => function ($model) {
                    return \app\models\BaseModel::get_html_anchor($model->name, 'user/view', $model->id);
                }],
                'username',
                ['attribute' => 'type_id', 'value' => 'type.name'],

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
