<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProgressInPublic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="progress-in-public-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php// $form->field($model, 'public_id')->textInput() ?>
    
    <?= $form->field($model, 'public_id')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\PublicWork::find()->all(), 'public_id', 'name'),
    [
        'prompt' => 'Выберите название',
    ]
    ) ?>

    <?php// $form->field($model, 'students_id')->textInput() ?>
    
    <?= $form->field($model, 'Student_id')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\Students::find()->all(), 'Student_id', 'Student_FIO'),
    [
        'prompt' => 'Выберите студента',
    ]
    ) ?>

    <?= $form->field($model, 'more_rank')->textInput() ?>

    <?php// $form->field($model, 'place')->textInput() ?>
    <?= $form->field($model, 'place')->dropDownList([
                    '0' => 'Выберите призовое место',
                    '1' => '1 место',
                    '2' => '2 место',
                    '3' => '3 место',
                ])->hint('Оставьте поле нетронутым,в случае отсутствия призового места');; 
    ?>

    <?= $form->field($model, 'number')->textInput() ?>
    


    <?= $form->field($model, 'date')->textInput() ?>

    <?php// $form->field($model, 'sum')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
