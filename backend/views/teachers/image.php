<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Teachers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teachers-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'image')->widget(FileInput::classname(), [ 
	    'options' => ['accept' => 'image/*'],
				])->label('Фото (png, jpg)') ?> <br>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success',  'data-confirm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
