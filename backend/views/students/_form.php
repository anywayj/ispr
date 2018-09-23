<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Student_FIO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Student_surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Student_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Student_lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Birhdate')->textInput() ?>

    <?= $form->field($model, 'Student_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Certificate_raiting')->textInput() ?>

    <?= $form->field($model, 'Certificate_ZNO_1')->textInput() ?>

    <?= $form->field($model, 'Certificate_ZNO_2')->textInput() ?>

    <?= $form->field($model, 'Certificate_ZNO_3')->textInput() ?>

    <?= $form->field($model, 'SR_ball_doc')->textInput() ?>

    <?= $form->field($model, 'Year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Sum_ball')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
