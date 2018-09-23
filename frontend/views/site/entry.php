<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;
use frontend\assets\MyAsset;
use common\models\Students;
?>



<!-- Форма для отправки данных -->

<div class="row">
	<div class="col-lg-6">
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelf, 'disc')->label('Дисциплина')
	    ->dropDownList(\yii\helpers\ArrayHelper::map(common\models\Disciplines::find()->all(), 'Discipline_id', 'Discipline_name'),
	    [
	        'prompt' => 'Выберите дисциплину',
	    ]
	    ) ?>
	</div>
	<div class="col-lg-6">    
    <?= $form->field($modelf, 'group')->label('Группа')
	    ->dropDownList(\yii\helpers\ArrayHelper::map(common\models\GroupAcademy::find()->all(), 'Group_id', 'Group_name'),
	    [
	        'prompt' => 'Выберите группу',
	    ]
	    ) ?>
	</div>
	<div class="col-lg-6">    
	<?= $form->field($modelf, 'raitingstart')->label('Дата начала 1') ?>
	</div>
	<div class="col-lg-6">
	<?= $form->field($modelf, 'raitingend')->label('Дата конца 1') ?>
	</div>
	<div class="col-lg-6">    
	<?= $form->field($modelf, 'raitingstart1')->label('Дата начала 2') ?>
	</div>
	<div class="col-lg-6">
	<?= $form->field($modelf, 'raitingend1')->label('Дата конца 2') ?>
	</div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Показать таблицу', 
        	['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
