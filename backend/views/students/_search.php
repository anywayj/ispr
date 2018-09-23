<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StudentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Student_id') ?>

    <?= $form->field($model, 'Student_FIO') ?>

    <?= $form->field($model, 'Student_surname') ?>

    <?= $form->field($model, 'Student_name') ?>

    <?= $form->field($model, 'Student_lastname') ?>

    <?php // echo $form->field($model, 'Birhdate') ?>

    <?php // echo $form->field($model, 'Student_phone') ?>

    <?php // echo $form->field($model, 'Certificate_raiting') ?>

    <?php // echo $form->field($model, 'Certificate_ZNO_1') ?>

    <?php // echo $form->field($model, 'Certificate_ZNO_2') ?>

    <?php // echo $form->field($model, 'Certificate_ZNO_3') ?>

    <?php // echo $form->field($model, 'SR_ball_doc') ?>

    <?php // echo $form->field($model, 'Year') ?>

    <?php // echo $form->field($model, 'Class') ?>

    <?php // echo $form->field($model, 'Sum_ball') ?>

    <?php // echo $form->field($model, 's1') ?>

    <?php // echo $form->field($model, 's2') ?>

    <?php // echo $form->field($model, 'sr') ?>

    <?php // echo $form->field($model, 's1stud') ?>

    <?php // echo $form->field($model, 's2stud') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
