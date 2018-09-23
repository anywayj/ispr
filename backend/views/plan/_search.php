<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PlanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Plan_id') ?>

    <?= $form->field($model, 'Discipline_id') ?>

    <?= $form->field($model, 'Speciality_id') ?>

    <?= $form->field($model, 'view_control') ?>

    <?= $form->field($model, 'Lecture_hours') ?>

    <?php // echo $form->field($model, 'LR_hours') ?>

    <?php // echo $form->field($model, 'Practice_hours') ?>

    <?php // echo $form->field($model, 'Credits') ?>

    <?php // echo $form->field($model, 'Start_date') ?>

    <?php // echo $form->field($model, 'End_date') ?>

    <?php // echo $form->field($model, 'Semester') ?>

    <?php // echo $form->field($model, 'Actuality') ?>

    <?php // echo $form->field($model, 'discipline_one') ?>

    <?php // echo $form->field($model, 'discipline_two') ?>

    <?php // echo $form->field($model, 'discipline_three') ?>

    <?php // echo $form->field($model, 'Course') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
