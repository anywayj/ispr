<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProgressInScience */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="progress-in-science-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php// $form->field($model, 'science_id')->textInput() ?>
    <?php// $form->field($model, 'place')->dropDownList(['1' => 'on', '0' =>'off']) ?>
    
    <?= $form->field($model, 'science_id')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\ScienceWork::find()->all(), 'science_id', 'name'),
    [
        'prompt' => 'Виберіть назву',
    ]
    ) ?>


    <?= $form->field($model, 'Student_id')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\Students::find()->all(), 'Student_id', 'Student_FIO'),
    [
        'prompt' => 'Виберіть студента',
    ]
    ) ?>

    <?php// $form->field($model, 'students_id')->textInput() ?>

    <?= $form->field($model, 'more_rank')->textInput() ?>

    <?php// $form->field($model, 'place')->textInput() ?>


    <?= $form->field($model, 'place')->dropDownList([
                    '0' => 'Виберіть призове місце',
                    '1' => '1 место',
                    '2' => '2 место',
                    '3' => '3 место',
                ])->hint('Залиште поле недоторканим, в разі відсутності призового місця'); 
    ?>


    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?php// $form->field($model, 'sum')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
