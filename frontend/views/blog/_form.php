<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\file\FileInput; 




/* @var $this yii\web\View */
/* @var $model common\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(), [
                    'editorOptions' => ElFinder::ckeditorOptions('elfinder',[]),
                ]);
    ?>

    <?php $form->field($model, 'status_id')->dropDownList(['1' => 'on', '0' =>'off']) ?>

    <?php $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'image')->widget(FileInput::classname(), [ 
    'options' => ['accept' => 'image/*'],
            ])->label('Рисунок (png, jpg)');
    ?> 
<br>
   
    
    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?php $form->field($model, 'author_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end() ?>
    
</div>
