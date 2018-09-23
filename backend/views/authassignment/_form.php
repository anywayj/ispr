<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Authassignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="authassignment-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?php// $form->field($model, 'item_name')->textInput() ?>

	<?=  $form->field($model, 'item_name')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\AuthItem::find()->all(), 'name', 'description'),
    [
        'prompt' => 'Виберіть правило',
    ]
    ) ?>

	<?= $form->field($model, 'user_id')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\User::find()->all(), 'id', 'Student_surname'),
    [
        'prompt' => 'Виберіть користувача',
    ]
    ) ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
