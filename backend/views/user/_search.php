<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php// $form->field($model, 'id') ?>
    
    <?= $form->field($model, 'username')->label('Пошук по логіну') ?>
    
    
    <?php// $form->field($model, 'Student_surname') ?>

    <?php// $form->field($model, 'auth_key') ?>

    <?php// $form->field($model, 'password_hash') ?>

    <?php // echo $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>
   
    <div class="form-group">
        <?= Html::submitButton('Знайти', ['class' => 'btn btn-primary']) ?>
        <?php// Html::resetButton('Скинути', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
