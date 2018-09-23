<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;
use frontend\assets\MyAsset;
use common\models\Students;
?>

<!-- Форма для отправки данных -->
<br><br>
<div class="row">
	<div class="col-lg-4">
	<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelf, 'disc1')->label('Доп. дисциплина 1')
	    ->dropDownList(\yii\helpers\ArrayHelper::map(common\models\Disciplines::find()->all(), 'Discipline_id', 'Discipline_name'),
	    [
	        'prompt' => 'Выберите дисциплину 1',
	    ]
	    ) ?>
	</div>
	<div class="col-lg-4">    
    <?= $form->field($modelf, 'disc2')->label('Доп. дисциплина 2')
	    ->dropDownList(\yii\helpers\ArrayHelper::map(common\models\Disciplines::find()->all(), 'Discipline_id', 'Discipline_name'),
	    [
	        'prompt' => 'Выберите дисциплину 2',
	    ]
	    ) ?>
	</div>
	<div class="col-lg-4">    
	<?= $form->field($modelf, 'disc3')->label('Основная дисциплина')
	    ->dropDownList(\yii\helpers\ArrayHelper::map(common\models\Disciplines::find()->all(), 'Discipline_id', 'Discipline_name'),
	    [
	        'prompt' => 'Выберите дисциплину 3',
	    ]
	    ) ?>
	</div>
	<div class="col-lg-4">   

	<?= $form->field($modelf, 'student')->label('Студент')
	    ->dropDownList(\yii\helpers\ArrayHelper::map(common\models\Students::find()->orderby('Student_FIO')->all(), 'Student_id', 'Student_FIO'),
		[
		    'prompt' => 'Выберите студента',
		]
		) 
	?>
	</div> 
    <div class="form-group, col-lg-12">
        <?= Html::submitButton('Показать таблицу', 
        	['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
<!-- Объявление переменных -->
<?php
$arrFIO = array();
$arrX1 = array();
$arrX2 = array();
$arrY = array();
$arrX1good = array();
$arrX2good = array();
$arrYgood = array();
$arrX1bad = array();
$arrX2bad = array();
$arrYbad = array();
?>
 <?php if ($modelf->load(Yii::$app->request->post()) && $modelf->validate()): ?>
<center><b>Результат запроса 1</b></center>
<!-- Формирование таблицы -->
<table class="table table-bordered table-condensed table-striped" style="display: none;">
	<thead>
			<tr>
				<th>ФИО</th>
			    <th>Оценка по доп. дисциплине 1</th>
			    <th>Оценка по доп. дисциплине 2</th>
				<th>Оценка по основной дисциплине</th>
			</tr>
	</thead>
	<tbody>
		<?php foreach($and4 as $k):?>
			<tr>
				<td><?= array_push($arrFIO, $k->students->Student_FIO) ?></td>
				<td><?= array_push($arrX1, $k->Raiting_100) ?></td>
				<td><?= array_push($arrX2, $k->Raiting_ETS) ?></td>
				<td><?= array_push($arrY, $k->Raiting_classic) ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<table class="table table-bordered table-condensed table-striped">
<thead>
	<tr>
		<th>Оценка по доп. дисциплине 1</th>
		<th>Оценка по доп. дисциплине 2</th>
		<th>Оценка по основной дисциплине</th>
	</tr>
</thead>
<tbody>
		<?php for ($i=0; $i < count($arrY); $i++) { 
			echo "<tr>
					<td>".$arrFIO[$i]."</td>
					<td>".$arrX1[$i]."</td>
					<td>".$arrX2[$i]."</td>
					<td>".$arrY[$i]."</td>
				  </tr>";
		};
		?>
</tbody>
</table>
<p align="center"><b>Оценки выбранного студента</b></p>
<!-- Формирование таблицы -->
<table class="table table-bordered table-condensed table-striped">
	<thead>
		<tr>
			<th>ФИО</th>
		    <th>Оценка по доп. дисциплине 1</th>
		    <th>Оценка по доп. дисциплине 2</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($and3 as $k):?>
			<tr>
				<td><?= $k->students->Student_FIO ?></td>
				<td><?= $studMark1 = $k->Raiting_100 ?></td>
				<td><?= $studMark2 = $k->Raiting_classic ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<?php endif ?>
<!-- Разделение исходных данных на две группы (с разбросом и без) -->
<?php
for ($i=0; $i < count($arrY); $i++) {
	if ( abs($arrX1[$i]-$arrX2[$i]) >= 15 || abs($arrX1[$i]-$arrY[$i]) >= 15 || abs($arrY[$i]-$arrX2[$i]) >= 15) {
		array_push($arrX1bad, $arrX1[$i]);
		array_push($arrX2bad, $arrX2[$i]);
		array_push($arrYbad, $arrY[$i]);
	} else {
		array_push($arrX1good, $arrX1[$i]);
		array_push($arrX2good, $arrX2[$i]);
		array_push($arrYgood, $arrY[$i]);
	}
};
?>
<?php
// Формирование матрицы Х'
function makeXt($x1,$x2,$y) {
	$Xt = array(array(), array(), array());
	for ($i=0; $i < count($y); $i++) { 
		array_push($Xt[0], 1);
	};
	$Xt[1] = $x1;
	$Xt[2] = $x2;
	return $Xt;
};
// Формирование матрицы Х
function makeX($x1,$x2,$y) {
	$X = array();
	for ($i=0; $i < count($y); $i++) { 
	 	array_push($X, array());
	 	array_push($X[$i], 1);
	 	array_push($X[$i], $x1[$i]);
	 	array_push($X[$i], $x2[$i]);
	}
	return $X;
};
// Функция перемножения матриц
function matrixmult($m1,$m2){
    $r=count($m1);
    $c=count($m2[0]);
    $p=count($m2);
    if(count($m1[0])!=$p){throw new Exception('Incompatible matrixes');}
    $m3=array();
    for ($i=0;$i< $r;$i++){
        for($j=0;$j<$c;$j++){
            $m3[$i][$j]=0;
            for($k=0;$k<$p;$k++){
                $m3[$i][$j]+=$m1[$i][$k]*$m2[$k][$j];
            }
        }
    }
    return($m3);
};
// Перемножение матриц X' и X
function makeXtY($Xt, $Y) {
	$XtY = array(0, 0, 0);
	for ($i=0; $i < count($Xt); $i++) { 
		for ($j=0; $j < count($Y); $j++) { 
			$XtY[$i]+=$Xt[$i][$j]*$Y[$j];
		}
	}
	return $XtY;
};
// Функция для нахождения обратной матрицы
function q($matrix){ 
    $a = $matrix; 
    $e = array(); 
    $count = count($a); 
    for($i=0;$i<$count;$i++) 
        for($j=0;$j<$count;$j++) 
            $e[$i][$j]=($i==$j)? 1 : 0;         
    for($i=0;$i<$count;$i++){ 
        $tmp = $a[$i][$i]; 
        for($j=$count-1;$j>=0;$j--){ 
            $e[$i][$j]/=$tmp; 
            $a[$i][$j]/=$tmp; 
        }       
        for($j=0;$j<$count;$j++){ 
            if($j!=$i){ 
                $tmp = $a[$j][$i]; 
                for($k=$count-1;$k>=0;$k--){ 
                    $e[$j][$k]-=$e[$i][$k]*$tmp; 
                    $a[$j][$k]-=$a[$i][$k]*$tmp; 
                } 
            } 
        } 
    } 
    for($i=0;$i<$count;$i++) 
     for($j=0;$j<$count;$j++) 
       $a[$i][$j]=$e[$i][$j]; 
       return $a; 
};
// Вычисление коэффициентов уровнения
function makeB($obr, $XtY) {
	$B = array(0, 0, 0);
	for ($i=0; $i < count($obr); $i++) { 
		for ($j=0; $j < count($XtY); $j++) { 
			$B[$i]+=$obr[$i][$j]*$XtY[$j];
		}
	};
	return $B;
};
	$arrXtgood = makeXt($arrX1good, $arrX2good, $arrYgood);
	$arrXgood = makeX($arrX1good, $arrX2good, $arrYgood);
	$arrXtXgood = matrixmult($arrXtgood, $arrXgood);
	$arrXtYgood = makeXtY($arrXtgood, $arrYgood);
	$arrXtX_obr_good = q($arrXtXgood);
	$arrBgood = makeB($arrXtX_obr_good, $arrXtYgood);
	$studMark_prog = $arrBgood[0]+$arrBgood[1]*$studMark1+$arrBgood[2]*$studMark2;
?>
<!-- Прогнозирование -->
<?php
if (count($arrY) == 0) {

} elseif ($studMark1 == 0 && count($arrY) != 0) {
	echo "<div class='alert alert-danger'>";
	echo "В базе данных нет оценок данного студента по выбранным предметам.";
	echo "</div>";
} else if (abs($studMark1 - $studMark2) <= 15) {
	echo "<div class='alert alert-success'>";
	echo "<strong>Предполагаемая оценка = ".round($studMark_prog, 1)."</strong>";
	echo "</div>";	
}
?>