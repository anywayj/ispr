<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Session */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="session-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Plan_id')->textInput() ?>

    <?= $form->field($model, 'Student_id')->textInput() ?>

    <?= $form->field($model, 'Raiting_100')->textInput() ?>

    <?= $form->field($model, 'Raiting_ETS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Raiting_classic')->textInput() ?>

    <?= $form->field($model, 'Raiting_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
