<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SessionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="session-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Session_id') ?>

    <?= $form->field($model, 'Plan_id') ?>

    <?= $form->field($model, 'Student_id') ?>

    <?= $form->field($model, 'Raiting_100') ?>

    <?= $form->field($model, 'Raiting_ETS') ?>

    <?php // echo $form->field($model, 'Raiting_classic') ?>

    <?php // echo $form->field($model, 'Raiting_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
