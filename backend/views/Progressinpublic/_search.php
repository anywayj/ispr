<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProgressInPublicSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="progress-in-public-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_progress_public') ?>

    <?= $form->field($model, 'public_id') ?>

    <?= $form->field($model, 'Student_id') ?>

    <?= $form->field($model, 'more_rank') ?>

    <?= $form->field($model, 'place') ?>

    <?php // echo $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'sum') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сброс', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
