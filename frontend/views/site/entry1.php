<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;
use frontend\assets\MyAsset;
use common\models\Students;
use miloschuman\highcharts\Highcharts;
?>

<!-- Объявление переменных -->
<?php $arrFIO = array()?>
<?php $arrO1 = array()?>
<?php $arrO2 = array()?>
<?php $arrGU1 = array()?>
<?php $arrGU2 = array()?>
<?php $arrYear1 = array(0, 0, 0, 0, 0, 0)?>
<?php $arrYear2 = array(0, 0, 0, 0, 0, 0)?>
<?php $arrT1 = array( array(0, 0, 0, 0, 0, 0),
						array(0, 0, 0, 0, 0, 0),
						array(0, 0, 0, 0, 0, 0),
						array(0, 0, 0, 0, 0, 0),
						array(0, 0, 0, 0, 0, 0),
						array(0, 0, 0, 0, 0, 0)) ?>
<?php $arrP1 = array( array(0, 0, 0, 0, 0, 0),
						array(0, 0, 0, 0, 0, 0),
						array(0, 0, 0, 0, 0, 0),
						array(0, 0, 0, 0, 0, 0),
						array(0, 0, 0, 0, 0, 0),
						array(0, 0, 0, 0, 0, 0)) ?>	
<?php $arrT2 = array( array(0, 0, 0, 0, 0, 0),
						array(0, 0, 0, 0, 0, 0),
						array(0, 0, 0, 0, 0, 0),
						array(0, 0, 0, 0, 0, 0),
						array(0, 0, 0, 0, 0, 0),
						array(0, 0, 0, 0, 0, 0)) ?>		
<?php $forecast = array()?>	

<?php foreach($and1 as $k):?>
						<?php array_push($arrFIO, $k->students->Student_FIO) ?>
					<?php endforeach ?>
		
					<?php foreach($and1 as $k):?>
							<?php array_push($arrO1, $k->Raiting_100) ?>
					<?php endforeach ?>
				
					<?php foreach($and2 as $k):?>
							<?php array_push($arrO2, $k->Raiting_100) ?>
							<?php $kol+=1 ?>
					<?php endforeach ?>

	<?php for ($i=0; $i < count($arrFIO); $i++) { 
	switch (true) {
		case $arrO1[$i] >= '90':
			array_push($arrGU1, 6);
			break;
		case $arrO1[$i] >= '81' && $arrO1[$i] <= '89':
			array_push($arrGU1, 5);
			break;
		case $arrO1[$i] >= '75' && $arrO1[$i] <= '80':
			array_push($arrGU1, 4);
			break;
		case $arrO1[$i] >= '65' && $arrO1[$i] <= '74':
			array_push($arrGU1, 3);
			break;
		case $arrO1[$i] >= '55' && $arrO1[$i] <= '64':
			array_push($arrGU1, 2);
			break;
		case $arrO1[$i] <= '54':
			array_push($arrGU1, 1);
			break;
		default:
			array_push($arrGU1, 'invalid value');
			break;
	};
	switch (true) {
		case $arrO2[$i] >= '90':
			array_push($arrGU2, 6);
			break;
		case $arrO2[$i] >= '81' && $arrO2[$i] <= '89':
			array_push($arrGU2, 5);
			break;
		case $arrO2[$i] >= '75' && $arrO2[$i] <= '80':
			array_push($arrGU2, 4);
			break;
		case $arrO2[$i] >= '65' && $arrO2[$i] <= '74':
			array_push($arrGU2, 3);
			break;
		case $arrO2[$i] >= '55' && $arrO2[$i] <= '64':
			array_push($arrGU2, 2);
			break;
		case $arrO2[$i] <= '54':
			array_push($arrGU2, 1);
			break;
		default:
			array_push($arrGU2, 'invalid value');
			break;
	};
//Распределение студентов по группам успешности 
		switch ($arrGU1[$i]) {
		case 1:
			$arrYear1[0] += 1;
			break;
		case 2:
			$arrYear1[1] += 1;
			break;
		case 3:
			$arrYear1[2] += 1;
			break;
		case 4:
			$arrYear1[3] += 1;
			break;
		case 5:
			$arrYear1[4] += 1;
			break;
		case 6:
			$arrYear1[5] += 1;
			break;
	};
	switch ($arrGU2[$i]) {
		case 1:
			$arrYear2[0] += 1;
			break;
		case 2:
			$arrYear2[1] += 1;
			break;
		case 3:
			$arrYear2[2] += 1;
			break;
		case 4:
			$arrYear2[3] += 1;
			break;
		case 5:
			$arrYear2[4] += 1;
			break;
		case 6:
			$arrYear2[5] += 1;
			break;
	}
}?>
<!-- Обработчик ошибок -->
<?php
if (count($arrO1) == 0 || count($arrO2) == 0) {
	echo "<div id='error' class='alert alert-danger'>";
		echo "ОШИБКА: по данному запросу ничего не найдено!";
	echo "</div>";
}
?>
<!-- Формирование таблицы -->

<table class="table table-bordered table-condensed table-striped">
<thead>
	<tr>
		<th>ФИО</th>
	    <th>Оценка 1</th>
	    <th>Оценка 2</th>
	</tr>
</thead>
<tbody>
	<?php 
		for ($i=0; $i < count($arrFIO); $i++) {
			echo "<tr>
				<td> $arrFIO[$i] </td>
				<td> $arrO1[$i] </td>
				<td> $arrO2[$i] </td>
			</tr>";
		}
	?>
</tbody>
</table>
<!-- Распределение студентов по группам успешности (период 2) -->
<center><b>Текущее распределение студентов по их оценкам (по шкале ESTS):</b></center>
<table class="table table-bordered table-condensed table-striped">
<thead>
	<tr>
		<th></th>
		<th> FX (30...54) </th>
		<th> E (55...64) </th>
		<th> D (65...74) </th>
		<th> C (75...80) </th>
		<th> B (81...90) </th>
		<th> A (90...100) </th>
	</tr>
</thead>
<tbody>
	<tr>
		<th> Кол-во студентов </th>
		<?php for ($i=0; $i < count($arrYear2); $i++) { 
			echo "<td> $arrYear2[$i] </td>";
		} ?>
	</tr>
</tbody>
</table>
<!-- Матрица переходов -->
<?php for ($i=0; $i < count($arrGU1); $i++) { 
	$arrT1[$arrGU1[$i]-1][$arrGU2[$i]-1] += 1;
}; 

//Матрица Вероятностей
for ($i=0; $i < 6; $i++) { 
	for ($j=0; $j < 6; $j++) { 
		if ($arrYear1[$i] != 0) {
			$arrP1[$i][$j] = $arrT1[$i][$j]/$arrYear1[$i];
		} else {
			$arrP1[$i][$j] = 0;
		}
	}
}

//Квадрат матрицы вероятностей
$r=count($arrP1);
$c=count($arrP1[0]);
$p=count($arrP1);
if(count($arrP1[0])!=$p){throw new Exception('Incompatible matrixes');}
$arrP2=array();
for ($i=0;$i< $r;$i++){
	for($j=0;$j<$c;$j++){
		$arrP2[$i][$j]=0;
		for($k=0;$k<$p;$k++){
			$arrP2[$i][$j]+=$arrP1[$i][$k]*$arrP1[$k][$j];
            }
        }
    }

//Вторая матрица переходов
for ($i=0; $i < count($arrYear1); $i++) { 
	$sum = 0;
	for ($j=0; $j < count($arrYear1); $j++) { 
		$arrT2[$i][$j] = $arrYear1[$i] * $arrP2[$i][$j];
		$sum += $arrT2[$i][$j];
	}
	array_push($forecast, $sum);
}
?>
<!-- Результат прогноза -->
<center><b>Результат прогноза:</b></center>
<table class="table table-bordered table-condensed table-striped">
<thead>
	<tr>
		<th></th>
		<th> FX (30...54) </th>
		<th> E (55...64) </th>
		<th> D (65...74) </th>
		<th> C (75...80) </th>
		<th> B (81...90) </th>
		<th> A (90...100) </th>
	</tr>
</thead>
<tbody>
	<tr>
		<th> Кол-во студентов </th>
		<?php for ($i=0; $i < count($forecast); $i++) { 
			echo "<td> $forecast[$i] </td>";
		} ?>
	</tr>
</tbody>
</table>
<?php
echo Highcharts::widget([
   'options' => [
      'title' => ['text' => 'График изменений'],
      'xAxis' => [
         'categories' => ['FX', 'E', 'D', 'C', 'B', 'A']
      ],
      'yAxis' => [
         'title' => ['text' => 'Количество студентов']
      ],
      'series' => [
         ['name' => 'Текущий триместр', 'data' => $arrYear2],
         ['name' => 'Прогнозируемый триместр', 'data' => $forecast]
      ]
   ]
]);
?>


<!-- Индивидуальный прогноз -->
<button id="ind_check" class="btn btn-success"> Индивидуальный прогноз </button>
<br><br>
<div id="ind_forecast" >
	<?php $arrX = $arrO1 ?>
	<?php $arrY = $arrO2 ?>
	<?php $arrXsquare = array()?>
	<?php $arrXY = array()?>
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

	    <?= $form->field($modelf, 'student')->label('Студент')
		    ->dropDownList(\yii\helpers\ArrayHelper::map(common\models\Students::find()->orderby('Student_FIO')->all(), 'Student_id', 'Student_FIO'),
		    [
		        'prompt' => 'Выберите студента',
		    ]
		    ) 
		?>
		</div>
		<div class="col-lg-6">    
		<?= $form->field($modelf, 'raitingstart2')->label('Дата начала') ?>
		</div>
		<div class="col-lg-6">
		<?= $form->field($modelf, 'raitingend2')->label('Дата конца') ?>
		</div>

	    <div class="form-group">
	        <?= Html::submitButton('Показать прогноз', 
	        	['class' => 'btn btn-primary']) ?>
	    </div>
	</div>
	<?php ActiveForm::end(); ?>

	<br>
	<?php
	if (count($arrY) > 0 && count($arrX) > 0) {
		// Расчёт X^2
		for ($i=0; $i < count($arrX); $i++) { 
			array_push($arrXsquare, pow($arrX[$i], 2));
		};
		// Расчёт X*Y
		for ($i=0; $i < count($arrX); $i++) { 
			$temp = $arrX[$i]*$arrY[$i];
			array_push($arrXY, $temp);
		};
		// Нахождение сумм рядов
		$arrXsum = array_sum($arrX);
		$arrYsum = array_sum($arrY);
		$arrXsquareSum = array_sum($arrXsquare);
		$arrXYsum = array_sum($arrXY);
		// Рассчёт коэффициентов регресии
		$n = count($arrX);
		$a = ($arrYsum*$arrXsquareSum-$arrXsum*$arrXYsum)/($n*$arrXsquareSum-$arrXsum*$arrXsum);
		$b = ($n*$arrXYsum-$arrXsum*$arrYsum)/($n*$arrXsquareSum-$arrXsum*$arrXsum);
		// Расчёт коэффициента детерминации и критерия Фишера
		// считаем (Y минус Y_среднее) в квадрате
		$Y_sr = array_sum($arrY)/count($arrY);
		$Y_m_Ysr_square = array();
		for ($i=0; $i < count($arrY); $i++) { 
			$temp = $arrY[$i]-$Y_sr;
			array_push($Y_m_Ysr_square, pow($temp, 2));
		};
		// считаем (Y минус Y_прогнозное) в квадрате
		$arr_Yprog = array();
		for ($i=0; $i < count($arrY); $i++) { 
			$temp = $a + $b*$arrX[$i];
			array_push($arr_Yprog , $temp);
		};
		$Y_m_Yprog_square = array();
		for ($i=0; $i < count($arrY); $i++) { 
			$temp = $arrY[$i]-$arr_Yprog[$i];
			array_push($Y_m_Yprog_square, pow($temp, 2));
		};
		// считаем коэффициент детерминации
		$R2 = 1-(array_sum($Y_m_Yprog_square)/array_sum($Y_m_Ysr_square));
		// считаем критерий Фишера
		$F = ( $R2/ (1-$R2) )*( count ($arrX) -2);
		// Рассчёт стандартной ошибки прогноза
		// считаем (Х минус Х_среднее) в квадрате
		$Xsr = array_sum($arrX)/count($arrX);
		$X_m_Xsr = array();
		$X_m_Xsr_square = array();
		for ($i=0; $i < count($arrX); $i++) { 
			$temp = $arrX[$i] - $Xsr;
			array_push($X_m_Xsr, $temp);
			array_push($X_m_Xsr_square, pow($temp, 2));
		};
		// считаем У минус У_среднее
		$Y_m_Ysr = array();
		for ($i=0; $i < count($arrY); $i++) { 
			$temp = $arrY[$i]-$Y_sr;
			array_push($Y_m_Ysr, $temp);
		};
		// считаем (Х-Х_среднее)*(У-У_среднее)
		$XmXs_YmYs = array();
		for ($i=0; $i < count($arrY); $i++) { 
			$temp = $X_m_Xsr[$i]*$Y_m_Ysr[$i];
			array_push($XmXs_YmYs, $temp);
		};
		// считаем стандартную ошибку прогноза
		$prog_error = sqrt( ( 1/(count($arrX)-2) ) * ( array_sum($Y_m_Ysr_square) - ( pow(array_sum($XmXs_YmYs), 2) / array_sum($X_m_Xsr_square) ) ) );

	}
	?>
	<!-- Прогнозирование оценки студента -->
	<div style="display: none;">
		<?php if ($modelf->load(Yii::$app->request->post()) && $modelf->validate()): ?>
				<?php foreach($and5 as $k):?>
					<?= $stud_mark = $k->Raiting_100 ?>
				<?php endforeach ?>
		<?php endif ?>
	</div>
	<?php 
		$forecast_mark = $a + $b*$stud_mark; 
		if ($forecast_mark > 100) { $forecast_mark = 100; };
	?>
		<?php
		if ($forecast_mark == $a) {
			echo "<div class='alert alert-danger'>";
				echo "ОШИБКА: по данному запросу ничего не найдено!";
			echo "</div>";
		} else {
			echo "<div class='alert alert-success'>";
				echo "<strong>Предполагаемая оценка на следующий триместр = ".round($forecast_mark, 1)."</strong>";
				echo "<p>Дополнительная информация о качестве прогноза:</p>"; 
				echo "R2 = ".round($R2, 2)."<br>"; 
				 echo "F = ".round($F, 2)."<br>"; 
				 echo "Стандартная ошибка прогноза = ".round($prog_error, 2); 
				};
			echo "</div>";
		?>
</div>