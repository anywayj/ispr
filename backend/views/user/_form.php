<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'username')->textInput() ?>
	<?= $form->field($model, 'Student_surname')->textInput() ?>
	<?php// $form->field($model, 'password')->textInput() ?>
    <?php// $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([
                    '10' => 'Актiвен',
                    '0' => 'Бан',
                ]); 
    ?>

	<?= $form->field($model, 'created_at')->textInput() ?>
	<?= $form->field($model, 'updated_at')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
