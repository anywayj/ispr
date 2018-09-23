<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Teachers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teachers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Teacher_FIO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Teacher_surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Teacher_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Teacher_lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Teacher_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Teacher_email')->textInput(['maxlength' => true]) ?>

    <?php /* $form->field($model, 'image')->widget(FileInput::classname(), [ 
        'options' => ['accept' => 'image/*'],
                ])->label('Фото (png, jpg)') */?> 

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
