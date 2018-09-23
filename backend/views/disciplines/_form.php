<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Disciplines */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disciplines-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Discipline_name')->textInput(['maxlength' => true]) ?>
	


    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
