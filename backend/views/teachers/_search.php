<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SearchTeachers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teachers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Teacher_id') ?>

    <?= $form->field($model, 'Teacher_FIO') ?>

    <?= $form->field($model, 'Teacher_surname') ?>

    <?= $form->field($model, 'Teacher_name') ?>

    <?= $form->field($model, 'Teacher_lastname') ?>

    <?php // echo $form->field($model, 'Teacher_phone') ?>

    <?php // echo $form->field($model, 'Teacher_email') ?>

    <?php // echo $form->field($model, 'image') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
