<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'autofocus' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true,'rows' => 6, 'style'=> 'resize:none;']) ?>

    <?= $form->field($model, 'category_id')->dropDownList($options, ['prompt' => 'Select Category']) ?>

    <? //= $form->field($model, 'user_id')->textInput() ?>

    <? //= $form->field($model, 'created_at')->textInput() ?>

    <? //= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
