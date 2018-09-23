<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Discipline_id')->textInput() ?>

    <?= $form->field($model, 'Speciality_id')->textInput() ?>

    <?= $form->field($model, 'view_control')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Lecture_hours')->textInput() ?>

    <?= $form->field($model, 'LR_hours')->textInput() ?>

    <?= $form->field($model, 'Practice_hours')->textInput() ?>

    <?= $form->field($model, 'Credits')->textInput() ?>

    <?= $form->field($model, 'Start_date')->textInput() ?>

    <?= $form->field($model, 'End_date')->textInput() ?>

    <?= $form->field($model, 'Semester')->textInput() ?>

    <?= $form->field($model, 'Actuality')->textInput() ?>

    <?= $form->field($model, 'discipline_one')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discipline_two')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Course')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
