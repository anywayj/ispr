<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<?php $form = ActiveForm::begin(); ?>
<div class="row">
	<div class="col-lg-6">
	    <?= $form->field($model, 'Discipline_id')->label('Дисциплина')
	    ->dropDownList(\yii\helpers\ArrayHelper::map(common\models\Disciplines::find()->all(), 'Discipline_id', 'Discipline_name'),
	    [
	        'prompt' => 'Выберите дисциплину',
	    ]
	    ) ?>
	</div>
	<div class="col-lg-6">
	    <?= $form->field($model1, 'Group_id')->label('Группа')
	    ->dropDownList(\yii\helpers\ArrayHelper::map(common\models\GroupAcademy::find()->all(), 'Group_id', 'Group_name'),
	    [
	        'prompt' => 'Выберите группу',
	    ]
	    ) ?>
	</div>
 
	<div class="col-lg-6">
		<?= $start = $form->field($model2, 'Raiting_date')->label('Дата начала') ?>
		<!--<p><input type="text" size="45"></p> -->
		<?= Html::submitButton('Отправить', ['class' => 'btn btn-success', 'data-confirm']) ?>
	</div>
	<div class="col-lg-6">
		<?= $end =  $form->field($model3, 'Raiting_date')->label('Дата конца') ?>	
		<!--<p><input type="text" size="45"></p>-->
		<button id='triggerNM' class="btn btn-info" data-text-show="Скрыть таблицу"
	 	data-text-hide="Показать таблицу">
	 	Показать таблицу
		</button>
	</div>
</div>     
	
<?php ActiveForm::end(); ?>

<br>
<div id='box1' style="display:none;">
	<table id="table" class="table table-bordered table-condensed table-striped"> 
	    <thead>
	        <tr>    
	            <th>ФИО</th>
	            <th>Оценка 1</th>
	            <th>Оценка 2</th>
	            <th>г.у.1</th>
	            <th>г.у.2</th>
	        </tr>
	    </thead>
	    <tbody class="contant1">
			<tr>
				<td>
					<?php foreach($and1 as $k):?>
							<?= $k->students->Student_FIO ?>
							<br><hr>
					<?php endforeach ?>
				</td>
				<td>	
					<?php foreach($and1 as $k):?>
							<?= $k->Raiting_100 ?>
							<br><hr>
					<?php endforeach ?>
				</td>
				<td>
					
					<?php foreach($and2 as $k):?>
							<?= $k->Raiting_100 ?>
							<?php $kol+=1 ?>
							<br><hr>
					<?php endforeach ?>
				</td>
				<td>
					<?php for($i=1;$i<=$kol;$i++):?>
						<?php echo '?' ?>
						<hr>
					<?php endfor ?>
				</td>
				<td>
					<?php for($i=1;$i<=$kol;$i++):?>
						<?php echo '?' ?>
						<hr>
					<?php endfor ?>
				</td>
			</tr>
	    </tbody>
	</table>		
</div>






