<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Спеціальні академічні стипендії';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<h1 class="text-center"><?= Html::encode($this->title) ?></h1>

<h3>Для виведення претендентів на iменні стипендії</h3>
    <p>Будь ласка, заповніть наступні поля:</p>
<div class="row">
    <?php $students1 = array('Коноваленко Д.А.','Баган С.В.','Кадацкий Н.А.','Тушева А.А. ','Булыга В.С.','Сигида О.А.'); ?>




<?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-6">
        <?= $form->field($modelf, 'progressStartdate')->label('Початок аналізу (дата)') ?>
    </div>

    <div class="col-lg-6">    
        <?= $form->field($modelf, 'progressEnddate')->label('Кінцевий термін аналізу (дата)') ?>
    </div>

    <div class="col-lg-6">    
        <?= $form->field($modelf, 'sessionStartdate')->label('Початок сесії (дата)') ?>
    </div>
    <div class="col-lg-6">
        <?= $form->field($modelf, 'sessionEnddate')->label('Кінцевий термін сесії (дата)') ?>
    </div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Показати таблицю', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>


<?php if ($modelf->load(Yii::$app->request->post()) && $modelf->validate()): ?>
<h1 class="text-center">Досягнення претендентів</h1>
    <h3 class="text-center">Ключові фактори претендентів на отримання спеціальних академічних стипендій</h3 class="">
<table id="table" class="table table-bordered table-condensed"> 
    <thead>
            <tr>
                <th>Група</th>
                <th>ПIБ</th>
                <th>Навчальний рейтинг</th>    
                <th>Досягнення в науковій діяльності</th>
                <th>Досягнення в громадській діяльності</th>
            </tr>
    </thead>
    
    <tbody class="contant1">

        <?php foreach($academy as $k): ?> 
            <tr>
                       
                <?php if(($k->sr >= 85) AND (($k->s1 != NULL) or ($k->s2 != NULL) AND ($k->s1 > 0) or ($k->s2 > 0))): ?>
                    <td><?= $k->fixationbygroup1->groupAcademy->Group_name ?></td>
                    <td><?= $students[] = $k->Student_FIO ?></td>
                    
                    <td><?= $studx1 = number_format($k->sr,2,'.', '') ?></td>
                    <td><?= $studx2 = $k->s1 ?></td>
                    <td><?= $studx3 = $k->s2 ?></td>
                    
                    <?php $sumstudd[] = $studx1+$studx2+$studx3 ?>
                <?php endif ?> 
            </tr>          
        <?php endforeach; ?>

    </tbody>
</table>    

<h3 class="text-center">Нормалізація ключових факторів претендентів на отримання спеціальних академічних стипендій</h3>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Рейтинг по сесії</th>    
                <th>Досягнення в науці</th>
                <th>Досягнення в громадській діяльності</th> 
            </tr>
    </thead>
    
    <tbody class="contant1">
    <?php $max = 100 ?>
        <?php foreach($academy as $k): ?> 
            <tr>
                <?php if(($k->sr >= 85) AND (($k->s1 != NULL) or ($k->s2 != NULL) AND ($k->s1 > 0) or ($k->s2 > 0))): ?>
                    <td><?= $k->Student_FIO ?></td>
                    <td><?= number_format($k->sr / $max,4,'.', '') ?></td>
                    <?php if($k->s1==NULL):?>
                        <td>-</td>
                    <?php else:?>
                        <td><?= $k->s1 / $max ?></td>
                    <?php endif ?>
                    <?php if($k->s2==NULL):?>
                            <td>-</td>
                        <?php else:?>
                            <td><?= $k->s2 / $max ?></td>
                        <?php endif ?>
                    <?php endif ?>  
            </tr>       
        <?php endforeach; ?>
    </tbody>
</table>
   
    <?php $n0 = 0; $n1 = 1;
    /* Ситуация 1 */                           /* Ситуация 2 */                       /* Ситуация 3 */
                                                /* Строка 1 */ 
$S1masR1 = array(0,0,0.3,0.4);        $S2masR1 = array(0,0,0.3,0.35);       $S3masR1 = array(0,0,0.3,0.35);
$S1masR2 = array(0.3,0.4,0.45,0.55);  $S2masR2 = array(0.3,0.35,0.4,0.5);   $S3masR2 = array(0.3,0.35,0.4,0.5);
$S1masR3 = array(0.45,0.55,0.6,0.65); $S2masR3 = array(0.4,0.5,0.75,0.85);  $S3masR3 = array(0.4,0.5,0.75,0.85);
$S1masR4 = array(0.6,0.65,0.8,0.9);   $S2masR4 = array(0.55,0.6,0.75,0.85); $S3masR4 = array(0.55,0.6,0.75,0.85);
$S1masR5 = array(0.8,0.9,1,1);        $S2masR5 = array(0.75,0.85,1,1);      $S3masR5 = array(0.75,0.85,1,1);
                                                /* Строка 2 */ 
$S1masS1 = array(0,0,0.3,0.35);       $S2masS1 = array(0,0,0.3,0.35);       $S3masS1 = array(0,0,0.3,0.35);
$S1masS2 = array(0.3,0.35,0.4,0.5);   $S2masS2 = array(0.3,0.35,0.4,0.45);  $S3masS2 = array(0.3,0.35,0.4,0.45);
$S1masS3 = array(0.4,0.5,0.55,0.6);   $S2masS3 = array(0.4,0.45,0.65,0.75); $S3masS3 = array(0.4,0.45,0.65,0.75);
$S1masS4 = array(0.55,0.6,0.7,0.8);   $S2masS4 = array(0.5,0.55,0.65,0.75); $S3masS4 = array(0.5,0.55,0.65,0.75);
$S1masS5 = array(0.7,0.8,1,1);        $S2masS5 = array(0.65,0.75,1,1);      $S3masS5 = array(0.65,0.75,1,1);
                                                /* Строка 3 */ 
$S1masP1 = array(0,0,0.4,0.45);       $S2masP1 = array(0,0,0.4,0.45);       $S3masP1 = array(0,0,0.35,0.4);
$S1masP2 = array(0.4,0.45,0.5,0.55);  $S2masP2 = array(0.4,0.45,0.5,0.55);  $S3masP2 = array(0.35,0.4,0.45,0.5);
$S1masP3 = array(0.5,0.55,0.6,0.65);  $S2masP3 = array(0.5,0.55,0.6,0.65);  $S3masP3 = array(0.45,0.5,0.85,0.9);
$S1masP4 = array(0.65,0.7,0.9,0.95);  $S2masP4 = array(0.65,0.7,0.9,0.95);  $S3masP4 = array(0.6,0.65,0.85,0.9);
$S1masP5 = array(0.9,0.95,1,1);       $S2masP5 = array(0.9,0.95,1,1);       $S3masP5 = array(0.85,0.9,1,1);

    /* Ситуация 4 */                           /* Ситуация 5 */                       /* Ситуация 6 */
                                                /* Строка 1 */ 
$S4masR1 = array(0,0,0.3,0.35);       $S5masR1 = array(0,0,0.4,0.45);       $S6masR1 = array(0,0,0.35,0.4);
$S4masR2 = array(0.3,0.35,0.4,0.5);   $S5masR2 = array(0.4,0.45,0.5,0.55);  $S6masR2 = array(0.35,0.4,0.45,0.5);
$S4masR3 = array(0.4,0.5,0.75,0.85);  $S5masR3 = array(0.5,0.55,0.6,0.65);  $S6masR3 = array(0.45,0.5,0.85,0.9);
$S4masR4 = array(0.55,0.6,0.75,0.85); $S5masR4 = array(0.65,0.7,0.9,0.95);  $S6masR4 = array(0.6,0.65,0.85,0.9);
$S4masR5 = array(0.75,0.85,1,1);      $S5masR5 = array(0.9,0.95,1,1);       $S6masR5 = array(0.85,0.9,1,1);
                                                /* Строка 2 */ 
$S4masS1 = array(0,0,0.35,0.4);       $S5masS1 = array(0,0,0.3,0.35);       $S6masS1 = array(0,0,0.3,0.35);
$S4masS2 = array(0.35,0.4,0.45,0.5);  $S5masS2 = array(0.3,0.35,0.4,0.45);  $S6masS2 = array(0.3,0.35,0.4,0.45);
$S4masS3 = array(0.45,0.5,0.85,0.9);  $S5masS3 = array(0.4,0.45,0.65,0.75); $S6masS3 = array(0.4,0.45,0.65,0.75);
$S4masS4 = array(0.6,0.65,0.85,0.9);  $S5masS4 = array(0.5,0.55,0.65,0.75); $S6masS4 = array(0.5,0.55,0.65,0.75);
$S4masS5 = array(0.85,0.9,1,1);       $S5masS5 = array(0.65,0.75,1,1);      $S6masS5 = array(0.65,0.75,1,1);
                                                /* Строка 3 */ 
$S4masP1 = array(0,0,0.3,0.35);       $S5masP1 = array(0,0,0.3,0.35);       $S6masP1 = array(0,0,0.35,0.4);
$S4masP2 = array(0.3,0.35,0.4,0.45);  $S5masP2 = array(0.3,0.35,0.4,0.45);  $S6masP2 = array(0.3,0.35,0.4,0.5);
$S4masP3 = array(0.4,0.45,0.65,0.75); $S5masP3 = array(0.4,0.45,0.65,0.75); $S6masP3 = array(0.4,0.5,0.75,0.85);
$S4masP4 = array(0.5,0.55,0.65,0.75); $S5masP4 = array(0.5,0.55,0.65,0.75); $S6masP4 = array(0.55,0.6,0.75,0.85);
$S4masP5 = array(0.65,0.75,1,1);      $S5masP5 = array(0.65,0.75,1,1);      $S6masP5 = array(0.75,0.85,1,1);
    
    ?>

<h3 class="text-center">Нечіткий опис факторів</h3>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>

      <li data-target="#myCarousel" data-slide-to="6"></li>
      <li data-target="#myCarousel" data-slide-to="7"></li>
      <li data-target="#myCarousel" data-slide-to="8"></li>
      <li data-target="#myCarousel" data-slide-to="9"></li>
      <li data-target="#myCarousel" data-slide-to="10"></li>
      <li data-target="#myCarousel" data-slide-to="11"></li>

      <li data-target="#myCarousel" data-slide-to="12"></li>
      <li data-target="#myCarousel" data-slide-to="13"></li>
      <li data-target="#myCarousel" data-slide-to="14"></li>
      <li data-target="#myCarousel" data-slide-to="15"></li>
      <li data-target="#myCarousel" data-slide-to="16"></li>
      <li data-target="#myCarousel" data-slide-to="17"></li>
    </ol>

    <div class="carousel-inner">
    <div class="item active">
            <h3 class="text-center">Ситуація 1</h3>
            <h4>по Х1 Навчальний рейтинг</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xReyt = $k->sr / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xReyt>=$S1masR1[0] and $xReyt<$S1masR1[1]): ?>
                    <td><?= $S1massR1[] = $n1-($xReyt-$S1masR1[0])/($S1masR1[1]-$S1masR1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S1masR1[1] and $xReyt<$S1masR1[2]): ?> 
                    <td><?= $S1massR1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S1masR1[2] and $xReyt<=$S1masR1[3]): ?> 
                    <td><?= $S1massR1[] = $n1-($xReyt-$S1masR1[2])/($S1masR1[3]-$S1masR1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S1masR1[0] or $xReyt>$S1masR1[3]): ?> 
                    <td><?= $S1massR1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xReyt>=$S1masR2[0] and $xReyt<$S1masR2[1]): ?>
                    <td><?= $S1massR2[] = $n1-($xReyt-$S1masR2[0])/($S1masR2[1]-$S1masR2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S1masR2[1] and $xReyt<$S1masR2[2]): ?> 
                    <td><?= $S1massR2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S1masR2[2] and $xReyt<=$S1masR2[3]): ?> 
                    <td><?= $S1massR2[] = $n1-($xReyt-$S1masR2[2])/($S1masR2[3]-$S1masR2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S1masR2[0] or $xReyt>$S1masR2[3]): ?> 
                    <td><?= $S1massR2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xReyt>=$S1masR3[0] and $xReyt<$S1masR3[1]): ?>
                    <td><?= $S1massR3[] = $n1-($xReyt-$S1masR3[0])/($S1masR3[1]-$S1masR3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S1masR3[1] and $xReyt<$S1masR3[2]): ?> 
                    <td><?= $S1massR3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S1masR3[2] and $xReyt<=$S1masR3[3]): ?> 
                    <td><?= $S1massR3[] = $n1-($xReyt-$S1masR3[2])/($S1masR3[3]-$S1masR3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S1masR3[0] or $xReyt>$S1masR3[3]): ?> 
                    <td><?= $S1massR3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xReyt>=$S1masR4[0] and $xReyt<$S1masR4[1]): ?>
                    <td><?= $S1massR4[] = $n1-($xReyt-$S1masR4[0])/($S1masR4[1]-$S1masR4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S1masR4[1] and $xReyt<$S1masR4[2]): ?> 
                    <td><?= $S1massR4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S1masR4[2] and $xReyt<=$S1masR4[3]): ?> 
                    <td><?= $S1massR4[] = $n1-($xReyt-$S1masR4[2])/($S1masR4[3]-$S1masR4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S1masR4[0] or $xReyt>$S1masR4[3]): ?> 
                    <td><?= $S1massR4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xReyt>=$S1masR5[0] and $xReyt<$S1masR5[1]): ?>
                    <td><?= $S1massR5[] = $n1-($xReyt-$S1masR5[0])/($S1masR5[1]-$S1masR5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S1masR5[1] and $xReyt<$S1masR5[2]): ?> 
                    <td><?= $S1massR5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S1masR5[2] and $xReyt<=$S1masR5[3]): ?> 
                    <td><?= $S1massR5[] = $n1-($xReyt-$S1masR5[2])/($S1masR5[3]-$S1masR5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S1masR5[0] or $xReyt>$S1masR5[3]): ?> 
                    <td><?= $S1massR5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table> 
      </div>

      <div class="item">
            <h3 class="text-center">Ситуація 1</h3>
            <h4>по Х2 Досягнення в науці</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xScience = $k->s1 / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xScience>=$S1masS1[0] and $xScience<$S1masS1[1]): ?>
                    <td><?= $S1massS1[] = $n1-($xScience-$S1masS1[0])/($S1masS1[1]-$S1masS1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S1masS1[1] and $xScience<$S1masS1[2]): ?> 
                    <td><?= $S1massS1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S1masS1[2] and $xScience<=$S1masS1[3]): ?> 
                    <td><?= $S1massS1[] = $n1-($xScience-$S1masS1[2])/($S1masS1[3]-$S1masS1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S1masS1[0] or $xScience>$S1masS1[3]): ?> 
                    <td><?= $S1massS1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xScience>=$S1masS2[0] and $xScience<$S1masS2[1]): ?>
                    <td><?= $S1massS2[] = $n1-($xScience-$S1masS2[0])/($S1masS2[1]-$S1masS2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S1masS2[1] and $xScience<$S1masS2[2]): ?> 
                    <td><?= $S1massS2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S1masS2[2] and $xScience<=$S1masS2[3]): ?> 
                    <td><?= $S1massS2[] = $n1-($xScience-$S1masS2[2])/($S1masS2[3]-$S1masS2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S1masS2[0] or $xScience>$S1masS2[3]): ?> 
                    <td><?= $S1massS2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xScience>=$S1masS3[0] and $xScience<$S1masS3[1]): ?>
                    <td><?= $S1massS3[] = $n1-($xScience-$S1masS3[0])/($S1masS3[1]-$S1masS3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S1masS3[1] and $xScience<$S1masS3[2]): ?> 
                    <td><?= $S1massS3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S1masS3[2] and $xScience<=$S1masS3[3]): ?> 
                    <td><?= $S1massS3[] = $n1-($xScience-$S1masS3[2])/($S1masS3[3]-$S1masS3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S1masS3[0] or $xScience>$S1masS3[3]): ?> 
                    <td><?= $S1massS3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xScience>=$S1masS4[0] and $xScience<$S1masS4[1]): ?>
                    <td><?= $S1massS4[] = $n1-($xScience-$S1masS4[0])/($S1masS4[1]-$S1masS4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S1masS4[1] and $xScience<$S1masS4[2]): ?> 
                    <td><?= $S1massS4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S1masS4[2] and $xScience<=$S1masS4[3]): ?> 
                    <td><?= $S1massS4[] = $n1-($xScience-$S1masS4[2])/($S1masS4[3]-$S1masS4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S1masS4[0] or $xScience>$S1masS4[3]): ?> 
                    <td><?= $S1massS4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xScience>=$S1masS5[0] and $xScience<$S1masS5[1]): ?>
                    <td><?= $S1massS5[] = $n1-($xScience-$S1masS5[0])/($S1masS5[1]-$S1masS5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S1masS5[1] and $xScience<$S1masS5[2]): ?> 
                    <td><?= $S1massS5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S1masS5[2] and $xScience<=$S1masS5[3]): ?> 
                    <td><?= $S1massS5[] = $n1-($xScience-$S1masS5[2])/($S1masS5[3]-$S1masS5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S1masS5[0] or $xScience>$S1masS5[3]): ?> 
                    <td><?= $S1massS5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table>  
      </div>
    
      <div class="item">
            <h3 class="text-center">Ситуація 1</h3>
            <h4>по Х3 Досягнення в громадській діяльності</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xPub = $k->s2 / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xPub>=$S1masP1[0] and $xPub<$S1masP1[1]): ?>
                    <td><?= $S1massP1[] = $n1-($xPub-$S1masP1[0])/($S1masP1[1]-$S1masP1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S1masP1[1] and $xPub<$S1masP1[2]): ?> 
                    <td><?= $S1massP1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S1masP1[2] and $xPub<=$S1masP1[3]): ?> 
                    <td><?= $S1massP1[] = $n1-($xPub-$S1masP1[2])/($S1masP1[3]-$S1masP1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S1masP1[0] or $xPub>$S1masP1[3]): ?> 
                    <td><?= $S1massP1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xPub>=$S1masP2[0] and $xPub<$S1masP2[1]): ?>
                    <td><?= $S1massP2[] = $n1-($xPub-$S1masP2[0])/($S1masP2[1]-$S1masP2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S1masP2[1] and $xPub<$S1masP2[2]): ?> 
                    <td><?= $S1massP2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S1masP2[2] and $xPub<=$S1masP2[3]): ?> 
                    <td><?= $S1massP2[] = $n1-($xPub-$S1masP2[2])/($S1masP2[3]-$S1masP2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S1masP2[0] or $xPub>$S1masP2[3]): ?> 
                    <td><?= $S1massP2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xPub>=$S1masP3[0] and $xPub<$S1masP3[1]): ?>
                    <td><?= $S1massP3[] = $n1-($xPub-$S1masP3[0])/($S1masP3[1]-$S1masP3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S1masP3[1] and $xPub<$S1masP3[2]): ?> 
                    <td><?= $S1massP3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S1masP3[2] and $xPub<=$S1masP3[3]): ?> 
                    <td><?= $S1massP3[] = $n1-($xPub-$S1masP3[2])/($S1masP3[3]-$S1masP3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S1masP3[0] or $xPub>$S1masP3[3]): ?> 
                    <td><?= $S1massP3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xPub>=$S1masP4[0] and $xPub<$S1masP4[1]): ?>
                    <td><?= $S1massP4[] = $n1-($xPub-$S1masP4[0])/($S1masP4[1]-$S1masP4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S1masP4[1] and $xPub<$S1masP4[2]): ?> 
                    <td><?= $S1massP4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S1masP4[2] and $xPub<=$S1masP4[3]): ?> 
                    <td><?= $S1massP4[] = $n1-($xPub-$S1masP4[2])/($S1masP4[3]-$S1masP4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S1masP4[0] or $xPub>$S1masP4[3]): ?> 
                    <td><?= $S1massP4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xPub>=$S1masP5[0] and $xPub<$S1masP5[1]): ?>
                    <td><?= $S1massP5[] = $n1-($xPub-$S1masP5[0])/($S1masP5[1]-$S1masP5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S1masP5[1] and $xPub<$S1masP5[2]): ?> 
                    <td><?= $S1massP5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S1masP5[2] and $xPub<=$S1masP5[3]): ?> 
                    <td><?= $S1massP5[] = $n1-($xPub-$S1masP5[2])/($S1masP5[3]-$S1masP5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S1masP5[0] or $xPub>$S1masP5[3]): ?> 
                    <td><?= $S1massP5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table>
      </div>

      <div class="item">
            <h3 class="text-center">Ситуація 2</h3>
            <h4>по Х1 Навчальний рейтинг</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
    
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xReyt = $k->sr / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xReyt>=$S2masR1[0] and $xReyt<$S2masR1[1]): ?>
                    <td><?= $S2massR1[] = $n1-($xReyt-$S2masR1[0])/($S2masR1[1]-$S2masR1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S2masR1[1] and $xReyt<$S2masR1[2]): ?> 
                    <td><?= $S2massR1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S2masR1[2] and $xReyt<=$S2masR1[3]): ?> 
                    <td><?= $S2massR1[] = $n1-($xReyt-$S2masR1[2])/($S2masR1[3]-$S2masR1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S2masR1[0] or $xReyt>$S2masR1[3]): ?> 
                    <td><?= $S2massR1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xReyt>=$S2masR2[0] and $xReyt<$S2masR2[1]): ?>
                    <td><?= $S2massR2[] = $n1-($xReyt-$S2masR2[0])/($S2masR2[1]-$S2masR2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S2masR2[1] and $xReyt<$S2masR2[2]): ?> 
                    <td><?= $S2massR2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S2masR2[2] and $xReyt<=$S2masR2[3]): ?> 
                    <td><?= $S2massR2[] = $n1-($xReyt-$S2masR2[2])/($S2masR2[3]-$S2masR2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S2masR2[0] or $xReyt>$S2masR2[3]): ?> 
                    <td><?= $S2massR2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xReyt>=$S2masR3[0] and $xReyt<$S2masR3[1]): ?>
                    <td><?= $S2massR3[] = $n1-($xReyt-$S2masR3[0])/($S2masR3[1]-$S2masR3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S2masR3[1] and $xReyt<$S2masR3[2]): ?> 
                    <td><?= $S2massR3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S2masR3[2] and $xReyt<=$S2masR3[3]): ?> 
                    <td><?= $S2massR3[] = $n1-($xReyt-$S2masR3[2])/($S2masR3[3]-$S2masR3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S2masR3[0] or $xReyt>$S2masR3[3]): ?> 
                    <td><?= $S2massR3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xReyt>=$S2masR4[0] and $xReyt<$S2masR4[1]): ?>
                    <td><?= $S2massR4[] = $n1-($xReyt-$S2masR4[0])/($S2masR4[1]-$S2masR4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S2masR4[1] and $xReyt<$S2masR4[2]): ?> 
                    <td><?= $S2massR4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S2masR4[2] and $xReyt<=$S2masR4[3]): ?> 
                    <td><?= $S2massR4[] = $n1-($xReyt-$S2masR4[2])/($S2masR4[3]-$S2masR4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S2masR4[0] or $xReyt>$S2masR4[3]): ?> 
                    <td><?= $S2massR4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xReyt>=$S2masR5[0] and $xReyt<$S2masR5[1]): ?>
                    <td><?= $S2massR5[] = $n1-($xReyt-$S2masR5[0])/($S2masR5[1]-$S2masR5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S2masR5[1] and $xReyt<$S2masR5[2]): ?> 
                    <td><?= $S2massR5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S2masR5[2] and $xReyt<=$S2masR5[3]): ?> 
                    <td><?= $S2massR5[] = $n1-($xReyt-$S2masR5[2])/($S2masR5[3]-$S2masR5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S2masR5[0] or $xReyt>$S2masR5[3]): ?> 
                    <td><?= $S2massR5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table> 
      </div>

      <div class="item">
            <h3 class="text-center">Ситуація 2</h3>
            <h4>по Х2 Досягнення в науковій діяльності</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xScience = $k->s1 / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xScience>=$S2masS1[0] and $xScience<$S2masS1[1]): ?>
                    <td><?= $S2massS1[] = $n1-($xScience-$S2masS1[0])/($S2masS1[1]-$S2masS1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S2masS1[1] and $xScience<$S2masS1[2]): ?> 
                    <td><?= $S2massS1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S2masS1[2] and $xScience<=$S2masS1[3]): ?> 
                    <td><?= $S2massS1[] = $n1-($xScience-$S2masS1[2])/($S2masS1[3]-$S2masS1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S2masS1[0] or $xScience>$S2masS1[3]): ?> 
                    <td><?= $S2massS1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xScience>=$S2masS2[0] and $xScience<$S2masS2[1]): ?>
                    <td><?= $S2massS2[] = $n1-($xScience-$S2masS2[0])/($S2masS2[1]-$S2masS2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S2masS2[1] and $xScience<$S2masS2[2]): ?> 
                    <td><?= $S2massS2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S2masS2[2] and $xScience<=$S2masS2[3]): ?> 
                    <td><?= $S2massS2[] = $n1-($xScience-$S2masS2[2])/($S2masS2[3]-$S2masS2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S2masS2[0] or $xScience>$S2masS2[3]): ?> 
                    <td><?= $S2massS2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xScience>=$S2masS3[0] and $xScience<$S2masS3[1]): ?>
                    <td><?= $S2massS3[] = $n1-($xScience-$S2masS3[0])/($S2masS3[1]-$S2masS3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S2masS3[1] and $xScience<$S2masS3[2]): ?> 
                    <td><?= $S2massS3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S2masS3[2] and $xScience<=$S2masS3[3]): ?> 
                    <td><?= $S2massS3[] = $n1-($xScience-$S2masS3[2])/($S2masS3[3]-$S2masS3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S2masS3[0] or $xScience>$S2masS3[3]): ?> 
                    <td><?= $S2massS3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xScience>=$S2masS4[0] and $xScience<$S2masS4[1]): ?>
                    <td><?= $S2massS4[] = $n1-($xScience-$S2masS4[0])/($S2masS4[1]-$S2masS4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S2masS4[1] and $xScience<$S2masS4[2]): ?> 
                    <td><?= $S2massS4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S2masS4[2] and $xScience<=$S2masS4[3]): ?> 
                    <td><?= $S2massS4[] = $n1-($xScience-$S2masS4[2])/($S2masS4[3]-$S2masS4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S2masS4[0] or $xScience>$S2masS4[3]): ?> 
                    <td><?= $S2massS4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xScience>=$S2masS5[0] and $xScience<$S2masS5[1]): ?>
                    <td><?= $S2massS5[] = $n1-($xScience-$S2masS5[0])/($S2masS5[1]-$S2masS5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S2masS5[1] and $xScience<$S2masS5[2]): ?> 
                    <td><?= $S2massS5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S2masS5[2] and $xScience<=$S2masS5[3]): ?> 
                    <td><?= $S2massS5[] = $n1-($xScience-$S2masS5[2])/($S2masS5[3]-$S2masS5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S2masS5[0] or $xScience>$S2masS5[3]): ?> 
                    <td><?= $S2massS5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table>  
      </div>

      <div class="item">
            <h3 class="text-center">Ситуація 2</h3>
            <h4>по Х3 Досягнення в громадській діяльності</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xPub = $k->s2 / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xPub>=$S2masP1[0] and $xPub<$S2masP1[1]): ?>
                    <td><?= $S2massP1[] = $n1-($xPub-$S2masP1[0])/($S2masP1[1]-$S2masP1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S2masP1[1] and $xPub<$S2masP1[2]): ?> 
                    <td><?= $S2massP1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S2masP1[2] and $xPub<=$S2masP1[3]): ?> 
                    <td><?= $S2massP1[] = $n1-($xPub-$S2masP1[2])/($S2masP1[3]-$S2masP1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S2masP1[0] or $xPub>$S2masP1[3]): ?> 
                    <td><?= $S2massP1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xPub>=$S2masP2[0] and $xPub<$S2masP2[1]): ?>
                    <td><?= $S2massP2[] = $n1-($xPub-$S2masP2[0])/($S2masP2[1]-$S2masP2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S2masP2[1] and $xPub<$S2masP2[2]): ?> 
                    <td><?= $S2massP2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S2masP2[2] and $xPub<=$S2masP2[3]): ?> 
                    <td><?= $S2massP2[] = $n1-($xPub-$S2masP2[2])/($S2masP2[3]-$S2masP2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S2masP2[0] or $xPub>$S2masP2[3]): ?> 
                    <td><?= $S2massP2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xPub>=$S2masP3[0] and $xPub<$S2masP3[1]): ?>
                    <td><?= $S2massP3[] = $n1-($xPub-$S2masP3[0])/($S2masP3[1]-$S2masP3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S2masP3[1] and $xPub<$S2masP3[2]): ?> 
                    <td><?= $S2massP3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S2masP3[2] and $xPub<=$S2masP3[3]): ?> 
                    <td><?= $S2massP3[] = $n1-($xPub-$S2masP3[2])/($S2masP3[3]-$S2masP3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S2masP3[0] or $xPub>$S2masP3[3]): ?> 
                    <td><?= $S2massP3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xPub>=$S2masP4[0] and $xPub<$S2masP4[1]): ?>
                    <td><?= $S2massP4[] = $n1-($xPub-$S2masP4[0])/($S2masP4[1]-$S2masP4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S2masP4[1] and $xPub<$S2masP4[2]): ?> 
                    <td><?= $S2massP4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S2masP4[2] and $xPub<=$S2masP4[3]): ?> 
                    <td><?= $S2massP4[] = $n1-($xPub-$S2masP4[2])/($S2masP4[3]-$S2masP4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S2masP4[0] or $xPub>$S2masP4[3]): ?> 
                    <td><?= $S2massP4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xPub>=$S2masP5[0] and $xPub<$S2masP5[1]): ?>
                    <td><?= $S2massP5[] = $n1-($xPub-$S2masP5[0])/($S2masP5[1]-$S2masP5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S2masP5[1] and $xPub<$S2masP5[2]): ?> 
                    <td><?= $S2massP5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S2masP5[2] and $xPub<=$S2masP5[3]): ?> 
                    <td><?= $S2massP5[] = $n1-($xPub-$S2masP5[2])/($S2masP5[3]-$S2masP5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S2masP5[0] or $xPub>$S2masP5[3]): ?> 
                    <td><?= $S2massP5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table>
      </div>
        <div class="item">
            <h3 class="text-center">Ситуація 3</h3>
            <h4>по Х1 Навчальний рейтинг</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
    
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xReyt = $k->sr / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xReyt>=$S3masR1[0] and $xReyt<$S3masR1[1]): ?>
                    <td><?= $S3massR1[] = $n1-($xReyt-$S3masR1[0])/($S3masR1[1]-$S3masR1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S3masR1[1] and $xReyt<$S3masR1[2]): ?> 
                    <td><?= $S3massR1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S3masR1[2] and $xReyt<=$S3masR1[3]): ?> 
                    <td><?= $S3massR1[] = $n1-($xReyt-$S3masR1[2])/($S3masR1[3]-$S3masR1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S3masR1[0] or $xReyt>$S3masR1[3]): ?> 
                    <td><?= $S3massR1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xReyt>=$S3masR2[0] and $xReyt<$S3masR2[1]): ?>
                    <td><?= $S3massR2[] = $n1-($xReyt-$S3masR2[0])/($S3masR2[1]-$S3masR2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S3masR2[1] and $xReyt<$S3masR2[2]): ?> 
                    <td><?= $S3massR2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S3masR2[2] and $xReyt<=$S3masR2[3]): ?> 
                    <td><?= $S3massR2[] = $n1-($xReyt-$S3masR2[2])/($S3masR2[3]-$S3masR2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S3masR2[0] or $xReyt>$S3masR2[3]): ?> 
                    <td><?= $S3massR2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xReyt>=$S3masR3[0] and $xReyt<$S3masR3[1]): ?>
                    <td><?= $S3massR3[] = $n1-($xReyt-$S3masR3[0])/($S3masR3[1]-$S3masR3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S3masR3[1] and $xReyt<$S3masR3[2]): ?> 
                    <td><?= $S3massR3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S3masR3[2] and $xReyt<=$S3masR3[3]): ?> 
                    <td><?= $S3massR3[] = $n1-($xReyt-$S3masR3[2])/($S3masR3[3]-$S3masR3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S3masR3[0] or $xReyt>$S3masR3[3]): ?> 
                    <td><?= $S3massR3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xReyt>=$S3masR4[0] and $xReyt<$S3masR4[1]): ?>
                    <td><?= $S3massR4[] = $n1-($xReyt-$S3masR4[0])/($S3masR4[1]-$S3masR4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S3masR4[1] and $xReyt<$S3masR4[2]): ?> 
                    <td><?= $S3massR4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S3masR4[2] and $xReyt<=$S3masR4[3]): ?> 
                    <td><?= $S3massR4[] = $n1-($xReyt-$S3masR4[2])/($S3masR4[3]-$S3masR4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S3masR4[0] or $xReyt>$S3masR4[3]): ?> 
                    <td><?= $S3massR4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xReyt>=$S3masR5[0] and $xReyt<$S3masR5[1]): ?>
                    <td><?= $S3massR5[] = $n1-($xReyt-$S3masR5[0])/($S3masR5[1]-$S3masR5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S3masR5[1] and $xReyt<$S3masR5[2]): ?> 
                    <td><?= $S3massR5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S3masR5[2] and $xReyt<=$S3masR5[3]): ?> 
                    <td><?= $S3massR5[] = $n1-($xReyt-$S3masR5[2])/($S3masR5[3]-$S3masR5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S3masR5[0] or $xReyt>$S3masR5[3]): ?> 
                    <td><?= $S3massR5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table> 
        </div>

        <div class="item">
            <h3 class="text-center">Ситуація 3</h3>
            <h4>по Х2 Досягнення в науковій діяльності</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xScience = $k->s1 / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xScience>=$S3masS1[0] and $xScience<$S3masS1[1]): ?>
                    <td><?= $S3massS1[] = $n1-($xScience-$S3masS1[0])/($S3masS1[1]-$S3masS1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S3masS1[1] and $xScience<$S3masS1[2]): ?> 
                    <td><?= $S3massS1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S3masS1[2] and $xScience<=$S3masS1[3]): ?> 
                    <td><?= $S3massS1[] = $n1-($xScience-$S3masS1[2])/($S3masS1[3]-$S3masS1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S3masS1[0] or $xScience>$S3masS1[3]): ?> 
                    <td><?= $S3massS1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xScience>=$S3masS2[0] and $xScience<$S3masS2[1]): ?>
                    <td><?= $S3massS2[] = $n1-($xScience-$S3masS2[0])/($S3masS2[1]-$S3masS2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S3masS2[1] and $xScience<$S3masS2[2]): ?> 
                    <td><?= $S3massS2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S3masS2[2] and $xScience<=$S3masS2[3]): ?> 
                    <td><?= $S3massS2[] = $n1-($xScience-$S3masS2[2])/($S3masS2[3]-$S3masS2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S3masS2[0] or $xScience>$S3masS2[3]): ?> 
                    <td><?= $S3massS2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xScience>=$S3masS3[0] and $xScience<$S3masS3[1]): ?>
                    <td><?= $S3massS3[] = $n1-($xScience-$S3masS3[0])/($S3masS3[1]-$S3masS3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S3masS3[1] and $xScience<$S3masS3[2]): ?> 
                    <td><?= $S3massS3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S3masS3[2] and $xScience<=$S3masS3[3]): ?> 
                    <td><?= $S3massS3[] = $n1-($xScience-$S3masS3[2])/($S3masS3[3]-$S3masS3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S3masS3[0] or $xScience>$S3masS3[3]): ?> 
                    <td><?= $S3massS3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xScience>=$S3masS4[0] and $xScience<$S3masS4[1]): ?>
                    <td><?= $S3massS4[] = $n1-($xScience-$S3masS4[0])/($S3masS4[1]-$S3masS4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S3masS4[1] and $xScience<$S3masS4[2]): ?> 
                    <td><?= $S3massS4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S3masS4[2] and $xScience<=$S3masS4[3]): ?> 
                    <td><?= $S3massS4[] = $n1-($xScience-$S3masS4[2])/($S3masS4[3]-$S3masS4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S3masS4[0] or $xScience>$S3masS4[3]): ?> 
                    <td><?= $S3massS4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xScience>=$S3masS5[0] and $xScience<$S3masS5[1]): ?>
                    <td><?= $S3massS5[] = $n1-($xScience-$S3masS5[0])/($S3masS5[1]-$S3masS5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S3masS5[1] and $xScience<$S3masS5[2]): ?> 
                    <td><?= $S3massS5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S3masS5[2] and $xScience<=$S3masS5[3]): ?> 
                    <td><?= $S3massS5[] = $n1-($xScience-$S3masS5[2])/($S3masS5[3]-$S3masS5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S3masS5[0] or $xScience>$S3masS5[3]): ?> 
                    <td><?= $S3massS5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table>  
        </div>

        <div class="item">
            <h3 class="text-center">Ситуація 3</h3>
            <h4>по Х3 Досягнення в громадській діяльності</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xPub = $k->s2 / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xPub>=$S3masP1[0] and $xPub<$S3masP1[1]): ?>
                    <td><?= $S3massP1[] = $n1-($xPub-$S3masP1[0])/($S3masP1[1]-$S3masP1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S3masP1[1] and $xPub<$S3masP1[2]): ?> 
                    <td><?= $S3massP1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S3masP1[2] and $xPub<=$S3masP1[3]): ?> 
                    <td><?= $S3massP1[] = $n1-($xPub-$S3masP1[2])/($S3masP1[3]-$S3masP1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S3masP1[0] or $xPub>$S3masP1[3]): ?> 
                    <td><?= $S3massP1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xPub>=$S3masP2[0] and $xPub<$S3masP2[1]): ?>
                    <td><?= $S3massP2[] = $n1-($xPub-$S3masP2[0])/($S3masP2[1]-$S3masP2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S3masP2[1] and $xPub<$S3masP2[2]): ?> 
                    <td><?= $S3massP2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S3masP2[2] and $xPub<=$S3masP2[3]): ?> 
                    <td><?= $S3massP2[] = $n1-($xPub-$S3masP2[2])/($S3masP2[3]-$S3masP2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S3masP2[0] or $xPub>$S3masP2[3]): ?> 
                    <td><?= $S3massP2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xPub>=$S3masP3[0] and $xPub<$S3masP3[1]): ?>
                    <td><?= $S3massP3[] = $n1-($xPub-$S3masP3[0])/($S3masP3[1]-$S3masP3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S3masP3[1] and $xPub<$S3masP3[2]): ?> 
                    <td><?= $S3massP3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S3masP3[2] and $xPub<=$S3masP3[3]): ?> 
                    <td><?= $S3massP3[] = $n1-($xPub-$S3masP3[2])/($S3masP3[3]-$S3masP3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S3masP3[0] or $xPub>$S3masP3[3]): ?> 
                    <td><?= $S3massP3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xPub>=$S3masP4[0] and $xPub<$S3masP4[1]): ?>
                    <td><?= $S3massP4[] = $n1-($xPub-$S3masP4[0])/($S3masP4[1]-$S3masP4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S3masP4[1] and $xPub<$S3masP4[2]): ?> 
                    <td><?= $S3massP4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S3masP4[2] and $xPub<=$S3masP4[3]): ?> 
                    <td><?= $S3massP4[] = $n1-($xPub-$S3masP4[2])/($S3masP4[3]-$S3masP4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S3masP4[0] or $xPub>$S3masP4[3]): ?> 
                    <td><?= $S3massP4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xPub>=$S3masP5[0] and $xPub<$S3masP5[1]): ?>
                    <td><?= $S3massP5[] = $n1-($xPub-$S3masP5[0])/($S3masP5[1]-$S3masP5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S3masP5[1] and $xPub<$S3masP5[2]): ?> 
                    <td><?= $S3massP5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S3masP5[2] and $xPub<=$S3masP5[3]): ?> 
                    <td><?= $S3massP5[] = $n1-($xPub-$S3masP5[2])/($S3masP5[3]-$S3masP5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S3masP5[0] or $xPub>$S3masP5[3]): ?> 
                    <td><?= $S3massP5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table>
        </div>

        <div class="item">
            <h3 class="text-center">Ситуація 4</h3>
            <h4>по Х1 Навчальний рейтинг</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
    
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xReyt = $k->sr / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xReyt>=$S4masR1[0] and $xReyt<$S4masR1[1]): ?>
                    <td><?= $S4massR1[] = $n1-($xReyt-$S4masR1[0])/($S4masR1[1]-$S4masR1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S4masR1[1] and $xReyt<$S4masR1[2]): ?> 
                    <td><?= $S4massR1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S4masR1[2] and $xReyt<=$S4masR1[3]): ?> 
                    <td><?= $S4massR1[] = $n1-($xReyt-$S4masR1[2])/($S4masR1[3]-$S4masR1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S4masR1[0] or $xReyt>$S4masR1[3]): ?> 
                    <td><?= $S4massR1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xReyt>=$S4masR2[0] and $xReyt<$S4masR2[1]): ?>
                    <td><?= $S4massR2[] = $n1-($xReyt-$S4masR2[0])/($S4masR2[1]-$S4masR2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S4masR2[1] and $xReyt<$S4masR2[2]): ?> 
                    <td><?= $S4massR2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S4masR2[2] and $xReyt<=$S4masR2[3]): ?> 
                    <td><?= $S4massR2[] = $n1-($xReyt-$S4masR2[2])/($S4masR2[3]-$S4masR2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S4masR2[0] or $xReyt>$S4masR2[3]): ?> 
                    <td><?= $S4massR2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xReyt>=$S4masR3[0] and $xReyt<$S4masR3[1]): ?>
                    <td><?= $S4massR3[] = $n1-($xReyt-$S4masR3[0])/($S4masR3[1]-$S4masR3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S4masR3[1] and $xReyt<$S4masR3[2]): ?> 
                    <td><?= $S4massR3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S4masR3[2] and $xReyt<=$S4masR3[3]): ?> 
                    <td><?= $S4massR3[] = $n1-($xReyt-$S4masR3[2])/($S4masR3[3]-$S4masR3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S4masR3[0] or $xReyt>$S4masR3[3]): ?> 
                    <td><?= $S4massR3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xReyt>=$S4masR4[0] and $xReyt<$S4masR4[1]): ?>
                    <td><?= $S4massR4[] = $n1-($xReyt-$S4masR4[0])/($S4masR4[1]-$S4masR4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S4masR4[1] and $xReyt<$S4masR4[2]): ?> 
                    <td><?= $S4massR4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S4masR4[2] and $xReyt<=$S4masR4[3]): ?> 
                    <td><?= $S4massR4[] = $n1-($xReyt-$S4masR4[2])/($S4masR4[3]-$S4masR4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S4masR4[0] or $xReyt>$S4masR4[3]): ?> 
                    <td><?= $S4massR4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xReyt>=$S4masR5[0] and $xReyt<$S4masR5[1]): ?>
                    <td><?= $S4massR5[] = $n1-($xReyt-$S4masR5[0])/($S4masR5[1]-$S4masR5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S4masR5[1] and $xReyt<$S4masR5[2]): ?> 
                    <td><?= $S4massR5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S4masR5[2] and $xReyt<=$S4masR5[3]): ?> 
                    <td><?= $S4massR5[] = $n1-($xReyt-$S4masR5[2])/($S4masR5[3]-$S4masR5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S4masR5[0] or $xReyt>$S4masR5[3]): ?> 
                    <td><?= $S4massR5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table> 
        </div>

        <div class="item">
            <h3 class="text-center">Ситуація 4</h3>
            <h4>по Х2 Досягнення в науковій діяльності</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xScience = $k->s1 / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xScience>=$S4masS1[0] and $xScience<$S4masS1[1]): ?>
                    <td><?= $S4massS1[] = $n1-($xScience-$S4masS1[0])/($S4masS1[1]-$S4masS1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S4masS1[1] and $xScience<$S4masS1[2]): ?> 
                    <td><?= $S4massS1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S4masS1[2] and $xScience<=$S4masS1[3]): ?> 
                    <td><?= $S4massS1[] = $n1-($xScience-$S4masS1[2])/($S4masS1[3]-$S4masS1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S4masS1[0] or $xScience>$S4masS1[3]): ?> 
                    <td><?= $S4massS1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xScience>=$S4masS2[0] and $xScience<$S4masS2[1]): ?>
                    <td><?= $S4massS2[] = $n1-($xScience-$S4masS2[0])/($S4masS2[1]-$S4masS2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S4masS2[1] and $xScience<$S4masS2[2]): ?> 
                    <td><?= $S4massS2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S4masS2[2] and $xScience<=$S4masS2[3]): ?> 
                    <td><?= $S4massS2[] = $n1-($xScience-$S4masS2[2])/($S4masS2[3]-$S4masS2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S4masS2[0] or $xScience>$S4masS2[3]): ?> 
                    <td><?= $S4massS2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xScience>=$S4masS3[0] and $xScience<$S4masS3[1]): ?>
                    <td><?= $S4massS3[] = $n1-($xScience-$S4masS3[0])/($S4masS3[1]-$S4masS3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S4masS3[1] and $xScience<$S4masS3[2]): ?> 
                    <td><?= $S4massS3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S4masS3[2] and $xScience<=$S4masS3[3]): ?> 
                    <td><?= $S4massS3[] = $n1-($xScience-$S4masS3[2])/($S4masS3[3]-$S4masS3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S4masS3[0] or $xScience>$S4masS3[3]): ?> 
                    <td><?= $S4massS3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xScience>=$S4masS4[0] and $xScience<$S4masS4[1]): ?>
                    <td><?= $S4massS4[] = $n1-($xScience-$S4masS4[0])/($S4masS4[1]-$S4masS4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S4masS4[1] and $xScience<$S4masS4[2]): ?> 
                    <td><?= $S4massS4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S4masS4[2] and $xScience<=$S4masS4[3]): ?> 
                    <td><?= $S4massS4[] = $n1-($xScience-$S4masS4[2])/($S4masS4[3]-$S4masS4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S4masS4[0] or $xScience>$S4masS4[3]): ?> 
                    <td><?= $S4massS4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xScience>=$S4masS5[0] and $xScience<$S4masS5[1]): ?>
                    <td><?= $S4massS5[] = $n1-($xScience-$S4masS5[0])/($S4masS5[1]-$S4masS5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S4masS5[1] and $xScience<$S4masS5[2]): ?> 
                    <td><?= $S4massS5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S4masS5[2] and $xScience<=$S4masS5[3]): ?> 
                    <td><?= $S4massS5[] = $n1-($xScience-$S4masS5[2])/($S4masS5[3]-$S4masS5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S4masS5[0] or $xScience>$S4masS5[3]): ?> 
                    <td><?= $S4massS5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table>  
        </div>

        <div class="item">
            <h3 class="text-center">Ситуація 4</h3>
            <h4>по Х3 Досягнення в громадській діяльності</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xPub = $k->s2 / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xPub>=$S4masP1[0] and $xPub<$S4masP1[1]): ?>
                    <td><?= $S4massP1[] = $n1-($xPub-$S4masP1[0])/($S4masP1[1]-$S4masP1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S4masP1[1] and $xPub<$S4masP1[2]): ?> 
                    <td><?= $S4massP1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S4masP1[2] and $xPub<=$S4masP1[3]): ?> 
                    <td><?= $S4massP1[] = $n1-($xPub-$S4masP1[2])/($S4masP1[3]-$S4masP1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S4masP1[0] or $xPub>$S4masP1[3]): ?> 
                    <td><?= $S4massP1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xPub>=$S4masP2[0] and $xPub<$S4masP2[1]): ?>
                    <td><?= $S4massP2[] = $n1-($xPub-$S4masP2[0])/($S4masP2[1]-$S4masP2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S4masP2[1] and $xPub<$S4masP2[2]): ?> 
                    <td><?= $S4massP2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S4masP2[2] and $xPub<=$S4masP2[3]): ?> 
                    <td><?= $S4massP2[] = $n1-($xPub-$S4masP2[2])/($S4masP2[3]-$S4masP2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S4masP2[0] or $xPub>$S4masP2[3]): ?> 
                    <td><?= $S4massP2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xPub>=$S4masP3[0] and $xPub<$S4masP3[1]): ?>
                    <td><?= $S4massP3[] = $n1-($xPub-$S4masP3[0])/($S4masP3[1]-$S4masP3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S4masP3[1] and $xPub<$S4masP3[2]): ?> 
                    <td><?= $S4massP3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S4masP3[2] and $xPub<=$S4masP3[3]): ?> 
                    <td><?= $S4massP3[] = $n1-($xPub-$S4masP3[2])/($S4masP3[3]-$S4masP3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S4masP3[0] or $xPub>$S4masP3[3]): ?> 
                    <td><?= $S4massP3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xPub>=$S4masP4[0] and $xPub<$S4masP4[1]): ?>
                    <td><?= $S4massP4[] = $n1-($xPub-$S4masP4[0])/($S4masP4[1]-$S4masP4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S4masP4[1] and $xPub<$S4masP4[2]): ?> 
                    <td><?= $S4massP4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S4masP4[2] and $xPub<=$S4masP4[3]): ?> 
                    <td><?= $S4massP4[] = $n1-($xPub-$S4masP4[2])/($S4masP4[3]-$S4masP4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S4masP4[0] or $xPub>$S4masP4[3]): ?> 
                    <td><?= $S4massP4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xPub>=$S4masP5[0] and $xPub<$S4masP5[1]): ?>
                    <td><?= $S4massP5[] = $n1-($xPub-$S4masP5[0])/($S4masP5[1]-$S4masP5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S4masP5[1] and $xPub<$S4masP5[2]): ?> 
                    <td><?= $S4massP5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S4masP5[2] and $xPub<=$S4masP5[3]): ?> 
                    <td><?= $S4massP5[] = $n1-($xPub-$S4masP5[2])/($S4masP5[3]-$S4masP5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S4masP5[0] or $xPub>$S4masP5[3]): ?> 
                    <td><?= $S4massP5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table>
        </div>

        <div class="item">
            <h3 class="text-center">Ситуація 5</h3>
            <h4>по Х1 Навчальний рейтинг</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
    
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xReyt = $k->sr / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xReyt>=$S5masR1[0] and $xReyt<$S5masR1[1]): ?>
                    <td><?= $S5massR1[] = $n1-($xReyt-$S5masR1[0])/($S5masR1[1]-$S5masR1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S5masR1[1] and $xReyt<$S5masR1[2]): ?> 
                    <td><?= $S5massR1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S5masR1[2] and $xReyt<=$S5masR1[3]): ?> 
                    <td><?= $S5massR1[] = $n1-($xReyt-$S5masR1[2])/($S5masR1[3]-$S5masR1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S5masR1[0] or $xReyt>$S5masR1[3]): ?> 
                    <td><?= $S5massR1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xReyt>=$S5masR2[0] and $xReyt<$S5masR2[1]): ?>
                    <td><?= $S5massR2[] = $n1-($xReyt-$S5masR2[0])/($S5masR2[1]-$S5masR2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S5masR2[1] and $xReyt<$S5masR2[2]): ?> 
                    <td><?= $S5massR2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S5masR2[2] and $xReyt<=$S5masR2[3]): ?> 
                    <td><?= $S5massR2[] = $n1-($xReyt-$S5masR2[2])/($S5masR2[3]-$S5masR2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S5masR2[0] or $xReyt>$S5masR2[3]): ?> 
                    <td><?= $S5massR2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xReyt>=$S5masR3[0] and $xReyt<$S5masR3[1]): ?>
                    <td><?= $S5massR3[] = $n1-($xReyt-$S5masR3[0])/($S5masR3[1]-$S5masR3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S5masR3[1] and $xReyt<$S5masR3[2]): ?> 
                    <td><?= $S5massR3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S5masR3[2] and $xReyt<=$S5masR3[3]): ?> 
                    <td><?= $S5massR3[] = $n1-($xReyt-$S5masR3[2])/($S5masR3[3]-$S5masR3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S5masR3[0] or $xReyt>$S5masR3[3]): ?> 
                    <td><?= $S5massR3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xReyt>=$S5masR4[0] and $xReyt<$S5masR4[1]): ?>
                    <td><?= $S5massR4[] = $n1-($xReyt-$S5masR4[0])/($S5masR4[1]-$S5masR4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S5masR4[1] and $xReyt<$S5masR4[2]): ?> 
                    <td><?= $S5massR4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S5masR4[2] and $xReyt<=$S5masR4[3]): ?> 
                    <td><?= $S5massR4[] = $n1-($xReyt-$S5masR4[2])/($S5masR4[3]-$S5masR4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S5masR4[0] or $xReyt>$S5masR4[3]): ?> 
                    <td><?= $S5massR4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xReyt>=$S5masR5[0] and $xReyt<$S5masR5[1]): ?>
                    <td><?= $S5massR5[] = $n1-($xReyt-$S5masR5[0])/($S5masR5[1]-$S5masR5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S5masR5[1] and $xReyt<$S5masR5[2]): ?> 
                    <td><?= $S5massR5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S5masR5[2] and $xReyt<=$S5masR5[3]): ?> 
                    <td><?= $S5massR5[] = $n1-($xReyt-$S5masR5[2])/($S5masR5[3]-$S5masR5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S5masR5[0] or $xReyt>$S5masR5[3]): ?> 
                    <td><?= $S5massR5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table> 
        </div>

        <div class="item">
            <h3 class="text-center">Ситуація 5</h3>
            <h4>по Х2 Досягнення в науковій діяльності</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xScience = $k->s1 / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xScience>=$S5masS1[0] and $xScience<$S5masS1[1]): ?>
                    <td><?= $S5massS1[] = $n1-($xScience-$S5masS1[0])/($S5masS1[1]-$S5masS1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S5masS1[1] and $xScience<$S5masS1[2]): ?> 
                    <td><?= $S5massS1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S5masS1[2] and $xScience<=$S5masS1[3]): ?> 
                    <td><?= $S5massS1[] = $n1-($xScience-$S5masS1[2])/($S5masS1[3]-$S5masS1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S5masS1[0] or $xScience>$S5masS1[3]): ?> 
                    <td><?= $S5massS1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xScience>=$S5masS2[0] and $xScience<$S5masS2[1]): ?>
                    <td><?= $S5massS2[] = $n1-($xScience-$S5masS2[0])/($S5masS2[1]-$S5masS2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S5masS2[1] and $xScience<$S5masS2[2]): ?> 
                    <td><?= $S5massS2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S5masS2[2] and $xScience<=$S5masS2[3]): ?> 
                    <td><?= $S5massS2[] = $n1-($xScience-$S5masS2[2])/($S5masS2[3]-$S5masS2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S5masS2[0] or $xScience>$S5masS2[3]): ?> 
                    <td><?= $S5massS2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xScience>=$S5masS3[0] and $xScience<$S5masS3[1]): ?>
                    <td><?= $S5massS3[] = $n1-($xScience-$S5masS3[0])/($S5masS3[1]-$S5masS3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S5masS3[1] and $xScience<$S5masS3[2]): ?> 
                    <td><?= $S5massS3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S5masS3[2] and $xScience<=$S5masS3[3]): ?> 
                    <td><?= $S5massS3[] = $n1-($xScience-$S5masS3[2])/($S5masS3[3]-$S5masS3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S5masS3[0] or $xScience>$S5masS3[3]): ?> 
                    <td><?= $S5massS3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xScience>=$S5masS4[0] and $xScience<$S5masS4[1]): ?>
                    <td><?= $S5massS4[] = $n1-($xScience-$S5masS4[0])/($S5masS4[1]-$S5masS4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S5masS4[1] and $xScience<$S5masS4[2]): ?> 
                    <td><?= $S5massS4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S5masS4[2] and $xScience<=$S5masS4[3]): ?> 
                    <td><?= $S5massS4[] = $n1-($xScience-$S5masS4[2])/($S5masS4[3]-$S5masS4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S5masS4[0] or $xScience>$S5masS4[3]): ?> 
                    <td><?= $S5massS4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xScience>=$S5masS5[0] and $xScience<$S5masS5[1]): ?>
                    <td><?= $S5massS5[] = $n1-($xScience-$S5masS5[0])/($S5masS5[1]-$S5masS5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S5masS5[1] and $xScience<$S5masS5[2]): ?> 
                    <td><?= $S5massS5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S5masS5[2] and $xScience<=$S5masS5[3]): ?> 
                    <td><?= $S5massS5[] = $n1-($xScience-$S5masS5[2])/($S5masS5[3]-$S5masS5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S5masS5[0] or $xScience>$S5masS5[3]): ?> 
                    <td><?= $S5massS5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table>

        </div>

        <div class="item">
            <h3 class="text-center">Ситуація 5</h3>
            <h4>по Х3 Досягнення в громадській діяльності</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xPub = $k->s2 / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xPub>=$S5masP1[0] and $xPub<$S5masP1[1]): ?>
                    <td><?= $S5massP1[] = $n1-($xPub-$S5masP1[0])/($S5masP1[1]-$S5masP1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S5masP1[1] and $xPub<$S5masP1[2]): ?> 
                    <td><?= $S5massP1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S5masP1[2] and $xPub<=$S5masP1[3]): ?> 
                    <td><?= $S5massP1[] = $n1-($xPub-$S5masP1[2])/($S5masP1[3]-$S5masP1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S5masP1[0] or $xPub>$S5masP1[3]): ?> 
                    <td><?= $S5massP1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xPub>=$S5masP2[0] and $xPub<$S5masP2[1]): ?>
                    <td><?= $S5massP2[] = $n1-($xPub-$S5masP2[0])/($S5masP2[1]-$S5masP2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S5masP2[1] and $xPub<$S5masP2[2]): ?> 
                    <td><?= $S5massP2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S5masP2[2] and $xPub<=$S5masP2[3]): ?> 
                    <td><?= $S5massP2[] = $n1-($xPub-$S5masP2[2])/($S5masP2[3]-$S5masP2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S5masP2[0] or $xPub>$S5masP2[3]): ?> 
                    <td><?= $S5massP2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xPub>=$S5masP3[0] and $xPub<$S5masP3[1]): ?>
                    <td><?= $S5massP3[] = $n1-($xPub-$S5masP3[0])/($S5masP3[1]-$S5masP3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S5masP3[1] and $xPub<$S5masP3[2]): ?> 
                    <td><?= $S5massP3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S5masP3[2] and $xPub<=$S5masP3[3]): ?> 
                    <td><?= $S5massP3[] = $n1-($xPub-$S5masP3[2])/($S5masP3[3]-$S5masP3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S5masP3[0] or $xPub>$S5masP3[3]): ?> 
                    <td><?= $S5massP3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xPub>=$S5masP4[0] and $xPub<$S5masP4[1]): ?>
                    <td><?= $S5massP4[] = $n1-($xPub-$S5masP4[0])/($S5masP4[1]-$S5masP4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S5masP4[1] and $xPub<$S5masP4[2]): ?> 
                    <td><?= $S5massP4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S5masP4[2] and $xPub<=$S5masP4[3]): ?> 
                    <td><?= $S5massP4[] = $n1-($xPub-$S5masP4[2])/($S5masP4[3]-$S5masP4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S5masP4[0] or $xPub>$S5masP4[3]): ?> 
                    <td><?= $S5massP4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xPub>=$S5masP5[0] and $xPub<$S5masP5[1]): ?>
                    <td><?= $S5massP5[] = $n1-($xPub-$S5masP5[0])/($S5masP5[1]-$S5masP5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S5masP5[1] and $xPub<$S5masP5[2]): ?> 
                    <td><?= $S5massP5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S5masP5[2] and $xPub<=$S5masP5[3]): ?> 
                    <td><?= $S5massP5[] = $n1-($xPub-$S5masP5[2])/($S5masP5[3]-$S5masP5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S5masP5[0] or $xPub>$S5masP5[3]): ?> 
                    <td><?= $S5massP5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table>
        </div>

        <div class="item">
            <h3 class="text-center">Ситуація 6</h3>
            <h4>по Х1 Навчальний рейтинг</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
    
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xReyt = $k->sr / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xReyt>=$S6masR1[0] and $xReyt<$S6masR1[1]): ?>
                    <td><?= $S6massR1[] = $n1-($xReyt-$S6masR1[0])/($S6masR1[1]-$S6masR1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S6masR1[1] and $xReyt<$S6masR1[2]): ?> 
                    <td><?= $S6massR1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S6masR1[2] and $xReyt<=$S6masR1[3]): ?> 
                    <td><?= $S6massR1[] = $n1-($xReyt-$S6masR1[2])/($S6masR1[3]-$S6masR1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S6masR1[0] or $xReyt>$S6masR1[3]): ?> 
                    <td><?= $S6massR1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xReyt>=$S6masR2[0] and $xReyt<$S6masR2[1]): ?>
                    <td><?= $S6massR2[] = $n1-($xReyt-$S6masR2[0])/($S6masR2[1]-$S6masR2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S6masR2[1] and $xReyt<$S6masR2[2]): ?> 
                    <td><?= $S6massR2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S6masR2[2] and $xReyt<=$S6masR2[3]): ?> 
                    <td><?= $S6massR2[] = $n1-($xReyt-$S6masR2[2])/($S6masR2[3]-$S6masR2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S6masR2[0] or $xReyt>$S6masR2[3]): ?> 
                    <td><?= $S6massR2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xReyt>=$S6masR3[0] and $xReyt<$S6masR3[1]): ?>
                    <td><?= $S6massR3[] = $n1-($xReyt-$S6masR3[0])/($S6masR3[1]-$S6masR3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S6masR3[1] and $xReyt<$S6masR3[2]): ?> 
                    <td><?= $S6massR3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S6masR3[2] and $xReyt<=$S6masR3[3]): ?> 
                    <td><?= $S6massR3[] = $n1-($xReyt-$S6masR3[2])/($S6masR3[3]-$S6masR3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S6masR3[0] or $xReyt>$S6masR3[3]): ?> 
                    <td><?= $S6massR3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xReyt>=$S6masR4[0] and $xReyt<$S6masR4[1]): ?>
                    <td><?= $S6massR4[] = $n1-($xReyt-$S6masR4[0])/($S6masR4[1]-$S6masR4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S6masR4[1] and $xReyt<$S6masR4[2]): ?> 
                    <td><?= $S6massR4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S6masR4[2] and $xReyt<=$S6masR4[3]): ?> 
                    <td><?= $S6massR4[] = $n1-($xReyt-$S6masR4[2])/($S6masR4[3]-$S6masR4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S6masR4[0] or $xReyt>$S6masR4[3]): ?> 
                    <td><?= $S6massR4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xReyt>=$S6masR5[0] and $xReyt<$S6masR5[1]): ?>
                    <td><?= $S6massR5[] = $n1-($xReyt-$S6masR5[0])/($S6masR5[1]-$S6masR5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xReyt>=$S6masR5[1] and $xReyt<$S6masR5[2]): ?> 
                    <td><?= $S6massR5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xReyt>=$S6masR5[2] and $xReyt<=$S6masR5[3]): ?> 
                    <td><?= $S6massR5[] = $n1-($xReyt-$S6masR5[2])/($S6masR5[3]-$S6masR5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xReyt<$S6masR5[0] or $xReyt>$S6masR5[3]): ?> 
                    <td><?= $S6massR5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table> 
        </div>

        <div class="item">
            <h3 class="text-center">Ситуація 6</h3>
            <h4>по Х2 Досягнення в науковій діяльності</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xScience = $k->s1 / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xScience>=$S6masS1[0] and $xScience<$S6masS1[1]): ?>
                    <td><?= $S6massS1[] = $n1-($xScience-$S6masS1[0])/($S6masS1[1]-$S6masS1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S6masS1[1] and $xScience<$S6masS1[2]): ?> 
                    <td><?= $S6massS1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S6masS1[2] and $xScience<=$S6masS1[3]): ?> 
                    <td><?= $S6massS1[] = $n1-($xScience-$S6masS1[2])/($S6masS1[3]-$S6masS1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S6masS1[0] or $xScience>$S6masS1[3]): ?> 
                    <td><?= $S6massS1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xScience>=$S6masS2[0] and $xScience<$S6masS2[1]): ?>
                    <td><?= $S6massS2[] = $n1-($xScience-$S6masS2[0])/($S6masS2[1]-$S6masS2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S6masS2[1] and $xScience<$S6masS2[2]): ?> 
                    <td><?= $S6massS2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S6masS2[2] and $xScience<=$S6masS2[3]): ?> 
                    <td><?= $S6massS2[] = $n1-($xScience-$S6masS2[2])/($S6masS2[3]-$S6masS2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S6masS2[0] or $xScience>$S6masS2[3]): ?> 
                    <td><?= $S6massS2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xScience>=$S6masS3[0] and $xScience<$S6masS3[1]): ?>
                    <td><?= $S6massS3[] = $n1-($xScience-$S6masS3[0])/($S6masS3[1]-$S6masS3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S6masS3[1] and $xScience<$S6masS3[2]): ?> 
                    <td><?= $S6massS3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S6masS3[2] and $xScience<=$S6masS3[3]): ?> 
                    <td><?= $S6massS3[] = $n1-($xScience-$S6masS3[2])/($S6masS3[3]-$S6masS3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S6masS3[0] or $xScience>$S6masS3[3]): ?> 
                    <td><?= $S6massS3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xScience>=$S6masS4[0] and $xScience<$S6masS4[1]): ?>
                    <td><?= $S6massS4[] = $n1-($xScience-$S6masS4[0])/($S6masS4[1]-$S6masS4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S6masS4[1] and $xScience<$S6masS4[2]): ?> 
                    <td><?= $S6massS4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S6masS4[2] and $xScience<=$S6masS4[3]): ?> 
                    <td><?= $S6massS4[] = $n1-($xScience-$S6masS4[2])/($S6masS4[3]-$S6masS4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S6masS4[0] or $xScience>$S6masS4[3]): ?> 
                    <td><?= $S6massS4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xScience>=$S6masS5[0] and $xScience<$S6masS5[1]): ?>
                    <td><?= $S6massS5[] = $n1-($xScience-$S6masS5[0])/($S6masS5[1]-$S6masS5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xScience>=$S6masS5[1] and $xScience<$S6masS5[2]): ?> 
                    <td><?= $S6massS5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xScience>=$S6masS5[2] and $xScience<=$S6masS5[3]): ?> 
                    <td><?= $S6massS5[] = $n1-($xScience-$S6masS5[2])/($S6masS5[3]-$S6masS5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xScience<$S6masS5[0] or $xScience>$S6masS5[3]): ?> 
                    <td><?= $S6massS5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table>   
        </div>

        <div class="item">
            <h3 class="text-center">Ситуація 6</h3>
            <h4>по Х3 Досягнення в громадській діяльності</h4>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th>
                <th>Низький</th>    
                <th>Нижче середнього</th>
                <th>Середнє</th> 
                <th>Вище середнього</th>
                <th>Висока</th>
            </tr>
    </thead>
    
    <tbody class="contant1">
        <?php foreach($academy as $k): ?> 
            <tr>
                <td><?= $k->Student_FIO ?></td>
                <?php $xPub = $k->s2 / $max ?>
            <?php /* Низкий */ ?>
                <?php if ($xPub>=$S6masP1[0] and $xPub<$S6masP1[1]): ?>
                    <td><?= $S6massP1[] = $n1-($xPub-$S6masP1[0])/($S6masP1[1]-$S6masP1[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S6masP1[1] and $xPub<$S6masP1[2]): ?> 
                    <td><?= $S6massP1[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S6masP1[2] and $xPub<=$S6masP1[3]): ?> 
                    <td><?= $S6massP1[] = $n1-($xPub-$S6masP1[2])/($S6masP1[3]-$S6masP1[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S6masP1[0] or $xPub>$S6masP1[3]): ?> 
                    <td><?= $S6massP1[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Ниже среднего */ ?>
                <?php if ($xPub>=$S6masP2[0] and $xPub<$S6masP2[1]): ?>
                    <td><?= $S6massP2[] = $n1-($xPub-$S6masP2[0])/($S6masP2[1]-$S6masP2[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S6masP2[1] and $xPub<$S6masP2[2]): ?> 
                    <td><?= $S6massP2[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S6masP2[2] and $xPub<=$S6masP2[3]): ?> 
                    <td><?= $S6massP2[] = $n1-($xPub-$S6masP2[2])/($S6masP2[3]-$S6masP2[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S6masP2[0] or $xPub>$S6masP2[3]): ?> 
                    <td><?= $S6massP2[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Среднее */ ?>
                <?php if ($xPub>=$S6masP3[0] and $xPub<$S6masP3[1]): ?>
                    <td><?= $S6massP3[] = $n1-($xPub-$S6masP3[0])/($S6masP3[1]-$S6masP3[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S6masP3[1] and $xPub<$S6masP3[2]): ?> 
                    <td><?= $S6massP3[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S6masP3[2] and $xPub<=$S6masP3[3]): ?> 
                    <td><?= $S6massP3[] = $n1-($xPub-$S6masP3[2])/($S6masP3[3]-$S6masP3[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S6masP3[0] or $xPub>$S6masP3[3]): ?> 
                    <td><?= $S6massP3[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Выше среднего */ ?>
                <?php if ($xPub>=$S6masP4[0] and $xPub<$S6masP4[1]): ?>
                    <td><?= $S6massP4[] = $n1-($xPub-$S6masP4[0])/($S6masP4[1]-$S6masP4[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S6masP4[1] and $xPub<$S6masP4[2]): ?> 
                    <td><?= $S6massP4[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S6masP4[2] and $xPub<=$S6masP4[3]): ?> 
                    <td><?= $S6massP4[] = $n1-($xPub-$S6masP4[2])/($S6masP4[3]-$S6masP4[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S6masP4[0] or $xPub>$S6masP4[3]): ?> 
                    <td><?= $S6massP4[] = $n0 ?></td>  
                <?php endif; ?>
            <?php /* Высокое */ ?>
                <?php if ($xPub>=$S6masP5[0] and $xPub<$S6masP5[1]): ?>
                    <td><?= $S6massP5[] = $n1-($xPub-$S6masP5[0])/($S6masP5[1]-$S6masP5[0]) ?></td>
                <?php endif; ?>
                <?php if ($xPub>=$S6masP5[1] and $xPub<$S6masP5[2]): ?> 
                    <td><?= $S6massP5[] = $n1 ?></td>  
                <?php endif; ?>
                <?php if ($xPub>=$S6masP5[2] and $xPub<=$S6masP5[3]): ?> 
                    <td><?= $S6massP5[] = $n1-($xPub-$S6masP5[2])/($S6masP5[3]-$S6masP5[2]) ?></td>  
                <?php endif; ?> 
                <?php if ($xPub<$S6masP5[0] or $xPub>$S6masP5[3]): ?> 
                    <td><?= $S6massP5[] = $n0 ?></td>  
                <?php endif; ?>        
            </tr>          
        <?php endforeach; ?>
    </tbody>
</table>
        </div>
    </div>
    
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Назад</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Вперед</span>
    </a>
  </div>


<h3 class="text-center">Підсумковий нечіткий рейтинг претендентів</h3>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th width="20%">ПIБ</th>
                <?php foreach($stipends as $k): ?> 
                    <th width="30%"><?= $k->name ?></th>
                <?php endforeach; ?> 
            </tr>
    </thead>
    <?php $k=array();?>
    <tbody class="contant1">
            <?php $r1 = 0.6; $r2 = 0.7; $r3 = 0.8; ?>
            <?php for($j=1;$j<=5;$j++): ?>
                <?php $k[]=0.9-0.2*($j-1) /* $k[0]=0.9 */ ?> 
            <?php endfor; ?>
    <tr>
        <td>
            <?php foreach($academy as $c): ?> 
                <?= $fio[] = $c->Student_FIO ?>
                <br><hr>
            <?php endforeach; ?> 
        </td>
        <td>
            <?php for($i=0;$i<count($fio);$i++): ?> 
            <?= $sit1[] = number_format(
                ($S1massR1[$i]*$r1+$S1massS1[$i]*$r2+$S1massP1[$i]*$r3)*$k[0] +
                ($S1massR2[$i]*$r1+$S1massS2[$i]*$r2+$S1massP2[$i]*$r3)*$k[1] +
                ($S1massR3[$i]*$r1+$S1massS3[$i]*$r2+$S1massP3[$i]*$r3)*$k[2] +
                ($S1massR4[$i]*$r1+$S1massS4[$i]*$r2+$S1massP4[$i]*$r3)*$k[3] +
                ($S1massR5[$i]*$r1+$S1massS5[$i]*$r2+$S1massP5[$i]*$r3)*$k[4],3,'.', '') 
            ?><br><hr>
            <?php endfor; ?>
        </td>
        <td>
            <?php for($i=0;$i<count($fio);$i++): ?> 
            <?= $sit2[] = number_format(
                ($S2massR1[$i]*$r1+$S2massS1[$i]*$r2+$S2massP1[$i]*$r3)*$k[0] +
                ($S2massR2[$i]*$r1+$S2massS2[$i]*$r2+$S2massP2[$i]*$r3)*$k[1] +
                ($S2massR3[$i]*$r1+$S2massS3[$i]*$r2+$S2massP3[$i]*$r3)*$k[2] +
                ($S2massR4[$i]*$r1+$S2massS4[$i]*$r2+$S2massP4[$i]*$r3)*$k[3] +
                ($S2massR5[$i]*$r1+$S2massS5[$i]*$r2+$S2massP5[$i]*$r3)*$k[4],3,'.', '') 
            ?><br><hr>
            <?php endfor; ?>  
        </td>
        <td>
            <?php for($i=0;$i<count($fio);$i++): ?> 
            <?= $sit3[] = number_format(
                ($S3massR1[$i]*$r1+$S3massS1[$i]*$r2+$S3massP1[$i]*$r3)*$k[0] +
                ($S3massR2[$i]*$r1+$S3massS2[$i]*$r2+$S3massP2[$i]*$r3)*$k[1] +
                ($S3massR3[$i]*$r1+$S3massS3[$i]*$r2+$S3massP3[$i]*$r3)*$k[2] +
                ($S3massR4[$i]*$r1+$S3massS4[$i]*$r2+$S3massP4[$i]*$r3)*$k[3] +
                ($S3massR5[$i]*$r1+$S3massS5[$i]*$r2+$S3massP5[$i]*$r3)*$k[4],3,'.', '') 
            ?><br><hr>
            <?php endfor; ?> 
        </td>
        <td>
            <?php for($i=0;$i<count($fio);$i++): ?> 
            <?= $sit4[] = number_format(
                ($S4massR1[$i]*$r1+$S4massS1[$i]*$r2+$S4massP1[$i]*$r3)*$k[0] +
                ($S4massR2[$i]*$r1+$S4massS2[$i]*$r2+$S4massP2[$i]*$r3)*$k[1] +
                ($S4massR3[$i]*$r1+$S4massS3[$i]*$r2+$S4massP3[$i]*$r3)*$k[2] +
                ($S4massR4[$i]*$r1+$S4massS4[$i]*$r2+$S4massP4[$i]*$r3)*$k[3] +
                ($S4massR5[$i]*$r1+$S4massS5[$i]*$r2+$S4massP5[$i]*$r3)*$k[4],3,'.', '') 
            ?><br><hr>
            <?php endfor; ?>
        </td>
        <td>
            <?php for($i=0;$i<count($fio);$i++): ?> 
            <?= $sit5[] = number_format(
                ($S5massR1[$i]*$r1+$S5massS1[$i]*$r2+$S5massP1[$i]*$r3)*$k[0] +
                ($S5massR2[$i]*$r1+$S5massS2[$i]*$r2+$S5massP2[$i]*$r3)*$k[1] +
                ($S5massR3[$i]*$r1+$S5massS3[$i]*$r2+$S5massP3[$i]*$r3)*$k[2] +
                ($S5massR4[$i]*$r1+$S5massS4[$i]*$r2+$S5massP4[$i]*$r3)*$k[3] +
                ($S5massR5[$i]*$r1+$S5massS5[$i]*$r2+$S5massP5[$i]*$r3)*$k[4],3,'.', '') 
            ?><br><hr>
            <?php endfor; ?>
        </td>
        <td>
            <?php for($i=0;$i<count($fio);$i++): ?> 
            <?= $sit6[] = number_format(
                ($S6massR1[$i]*$r1+$S6massS1[$i]*$r2+$S6massP1[$i]*$r3)*$k[0] +
                ($S6massR2[$i]*$r1+$S6massS2[$i]*$r2+$S6massP2[$i]*$r3)*$k[1] +
                ($S6massR3[$i]*$r1+$S6massS3[$i]*$r2+$S6massP3[$i]*$r3)*$k[2] +
                ($S6massR4[$i]*$r1+$S6massS4[$i]*$r2+$S6massP4[$i]*$r3)*$k[3] +
                ($S6massR5[$i]*$r1+$S6massS5[$i]*$r2+$S6massP5[$i]*$r3)*$k[4],3,'.', '') 
            ?><br><hr>
            <?php endfor; ?>
        </td>
    </tr>
       
    </tbody>
</table>       

        <?php foreach ($sit1 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
            <?php $max1[] = max($sit1) ?>
            <?php if($max1[0]==$value): ?>
                <?php $k1id = $k ?>
                <?php $fio1 = $fio[$k1id] ?>
                <?php $maxel1 = $max1[0] ?>
            <?php endif; ?>
            
        <?php endforeach; ?>
        <?php unset($sit1[$k1id]); ?>
            
        <?php foreach ($sit1 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
            <?php if($max1[0]==$value): ?>
                <?php $k2id = $k ?>
                <?php $fio2 = $fio[$k2id] ?>
                <?php $maxel2 = $max1[0] ?>
            <?php endif; ?> 
        <?php endforeach; ?> 

        <?php foreach ($sit1 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
        <?php endforeach; ?> 

        <?php unset($sit1[$k2id]); ?>
        
        
        <?php foreach ($sit1 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
            <?php if($max1[0]==$value): ?>
                <?php $k3id = $k ?>
                <?php $fio3 = $fio[$k3id] ?>
                <?php $maxel3 = $max1[0] ?>
            <?php endif; ?> 
        <?php endforeach; ?> 

        <?php foreach ($sit1 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
        <?php endforeach; ?> 

        <?php unset($sit1[$k3id]); ?>

        <?php foreach ($sit1 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?> 
        <?php endforeach; ?>

        <?php if($maxel1==$maxel2 || $maxel1 == $maxel3): ?>
            <?php foreach ($sumstudd as $k => $value): ?>
                <?php if($k1id==$k || $k2id==$k || $k3id==$k): ?>      
                    <?php $maxsit1[] = $value ?>
                    <?php $maxsit1s = max($maxsit1) ?>
                            <?php if($maxsit1s==$value): ?>
                                <?php $k1ids1 = $k ?>
                            <?php endif; ?>
                        <?php foreach ($fio as $k => $value): ?>
                            <?php if($k1ids1==$k): ?>
                                <?php $fios1 = $value ?>
                            <?php endif; ?>
                        <?php endforeach; ?>          
                <?php endif; ?>
            <?php endforeach; ?>   
        <?php unset($sit2[$k1ids1]); ?>
        <?php unset($fio[$k1ids1]); ?> 
        <?php unset($sumstudd[$k1ids1]); ?>    
            <?php 'Max1iz='.$maxel1.' Ид='.$k1ids1 ?><?php 'FIO='.$fi[]=$fios1 ?>  
        <?php else: ?> 
        <?php unset($sit2[$k1id]); ?> 
        <?php unset($fio[$k1id]); ?> 
        <?php unset($sumstudd[$k1id]); ?>     
            <?php 'Max1='.$maxel1.' Ид='.$k1id ?><?php 'FIO='.$fi[]=$fio1 ?>
        <?php endif; ?>
      

        <?php foreach ($sumstudd as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
        <?php endforeach; ?>
    
   <?php /* ситуация 2 */?>
  
        <?php foreach ($fio as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
        <?php endforeach; ?>
      
        <?php foreach ($sit2 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
            <?php $max2[] = max($sit2) ?>
            <?php if($max2[0]==$value): ?>
                <?php $k1ids2 = $k ?>
                <?php $fio1s2 = $fio[$k1ids2] ?>
                <?php $maxel1s2 = $max2[0] ?>
            <?php endif; ?>
            
        <?php endforeach; ?>
        <?php unset($sit2[$k1ids2]); ?>
            
        <?php foreach ($sit2 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
            <?php if($max2[0] == $value): ?>
                <?php $k2ids2 = $k ?>
                <?php $fio2s2 = $fio[$k2ids2] ?>
                <?php $maxel2s2 = $max2[0] ?>
            <?php endif; ?> 
        <?php endforeach; ?> 
        <?php unset($sit2[$k2ids2]); ?>
            
            <?php foreach ($sit2 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
            <?php if($max2[0] == $value): ?>
                <?php $k3ids2 = $k ?>
                <?php $fio3s2 = $fio[$k3ids2] ?>
                <?php $maxel3s2 = $max2[0] ?>
            <?php endif; ?>
            
        <?php endforeach; ?>
            
        
        
        <?php unset($sit2[$k3ids2]); ?>

        <?php foreach ($sit2 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
        <?php endforeach; ?> 

        <?php if(($maxel1s2==$maxel2s2 || $maxel1s2 == $maxel3s2)): ?>
            <?php foreach ($sumstudd as $k => $value): ?>
                <?php if($k1ids2==$k || $k2ids2==$k || $k3ids2==$k): ?> 
                    <?php $maxsit1s2[] = $value ?>
                    <?php $maxsit1ss2 = max($maxsit1s2) ?>
                            <?php if($maxsit1ss2 == $value): ?>
                                <?php $k1ids1s2 = $k ?>
                            <?php endif; ?>
                        <?php foreach ($fio as $k => $value): ?>
                            <?php if($k1ids1s2==$k): ?>
                                <?php $fios2 = $value ?>
                            <?php endif; ?>
                        <?php endforeach; ?>          
                <?php endif; ?>
            <?php endforeach; ?> 
        <?php unset($sit3[$k1ids1s2]); ?>
        <?php unset($sit3[$k1ids1]); ?>
        <?php unset($fio[$k1ids1s2]); ?> 
         
            <?php 'Max2iz='.$maxel1s2.' Ид='.$k1ids1s2 ?><?php 'FIO='.$fi[]=$fios2 ?>  
        <?php else: ?> 
        <?php unset($sit3[$k1id]); ?>  
        <?php unset($sit3[$k1ids2]); ?> 
        <?php unset($fio[$k1ids2]); ?>     
            <?php 'Max2='.$maxel1s2.' Ид='.$k1ids2 ?><?php 'FIO='.$fi[]=$fio1s2 ?>
        <?php endif; ?>
        

        <?php foreach ($sumstudd as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
        <?php endforeach; ?>
   
    <?php /* ситуация 3 */?>
    
        <?php foreach ($fio as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
        <?php endforeach; ?>

        
 
        <?php foreach ($sit3 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
            <?php $max3[] = max($sit3) ?>
            <?php if($max3[0]==$value): ?>
                <?php $k1ids3 = $k ?>
                <?php $fio1s3 = $fio[$k1ids3] ?>
                <?php $maxel1s3 = $max3[0] ?>
            <?php endif; ?>
            
        <?php endforeach; ?>
        <?php unset($sit3[$k1ids3]); ?>
           
        <?php foreach ($sit3 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
            <?php if($max3[0]==$value): ?>
                <?php $k2ids3 = $k ?>
                <?php $fio2s3 = $fio[$k2ids3] ?>
                <?php $maxel2s3 = $max3[0] ?>
            <?php endif; ?> 
        <?php endforeach; ?> 
        <?php unset($sit3[$k2ids3]); ?>
        

        <?php unset($sit3[$k3ids3]); ?>

        <?php foreach ($sit3 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
        <?php endforeach; ?> 

        <?php if($maxel1s3==$maxel2s3): ?>
            <?php foreach ($sumstudd as $k => $value): ?>
                <?php if($k1ids3==$k || $k2ids3==$k): ?> 
                    <?php $maxsit1s3[] = $value ?>
                    <?php $maxsit1ss3 = max($maxsit1s3) ?>
                            <?php if($maxsit1ss3 == $value): ?>
                                <?php $k1ids1s3 = $k ?>
                            <?php endif; ?>
                        <?php foreach ($fio as $k => $value): ?>
                            <?php if($k1ids1s3 == $k): ?>
                                <?php $fios3 = $value ?>
                            <?php endif; ?>
                        <?php endforeach; ?>          
                <?php endif; ?>
            <?php endforeach; ?> 
        <?php unset($sit4[$k1ids1]); ?>
        <?php unset($sit4[$k1ids1s]); ?>     
        <?php unset($sit4[$k1ids1s2]); ?>     
        <?php unset($sit4[$k1ids1s3]); ?>          
        <?php unset($sit4[$k1id]); ?>
        <?php unset($sit4[$k1ids2]); ?> 
        <?php unset($sit4[$k1ids3]); ?>       
        <?php unset($fio[$k1ids1s3]); ?>   
            <?php 'Max3iz='.$maxel1s3.' Ид='.$k1ids1s3 ?><?php 'FIO='.$fi[]=$fios3 ?>  
        <?php else: ?>
        <?php unset($sit4[$k1ids1]); ?>
        <?php unset($sit4[$k1ids1s]); ?>     
        <?php unset($sit4[$k1ids1s2]); ?>     
        <?php unset($sit4[$k1ids1s3]); ?>        
        <?php unset($sit4[$k1id]); ?>
        <?php unset($sit4[$k1ids2]); ?> 
        <?php unset($sit4[$k1ids3]); ?>       
        <?php unset($fio[$k1ids3]); ?>     
            <?php 'Max3='.$maxel1s3.' Ид='.$k1ids3 ?><?php 'FIO='.$fi[]=$fio1s3 ?>
        <?php endif; ?>

      

        <?php foreach ($sumstudd as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
        <?php endforeach; ?>
   

    <?php /* ситуация 4 */?>
   
        <?php foreach ($fio as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
        <?php endforeach; ?>

      
        <?php foreach ($sit4 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
            <?php $max4[] = max($sit4) ?>
            <?php if($max4[0]==$value): ?>
                <?php $k1ids4 = $k ?>
                <?php $fio1s4 = $fio[$k1ids4] ?>
                <?php $maxel1s4 = $max4[0] ?>
            <?php endif; ?>
            
        <?php endforeach; ?>
        <?php unset($sit4[$k1ids4]); ?>
           
        <?php foreach ($sit4 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
            <?php if($max4[0]==$value): ?>
                <?php $k2ids4=$k ?>
                <?php $fio2s4 = $fio[$k2ids4] ?>
                <?php $maxel2s4 = $max3[0] ?>
            <?php endif; ?> 
        <?php endforeach; ?> 
        <?php unset($sit4[$k2ids4]); ?>
           

        <?php foreach ($sit4 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
        <?php endforeach; ?> 
   
        <?php if($maxel1s4==$maxel2s4): ?>
            <?php foreach ($sumstudd as $k => $value): ?>
            <?php if($k1ids4==$k || $k2ids4==$k): ?>       
                    <?php $maxsit1s4[] = $value ?>
                    <?php $maxsit1ss4 = max($maxsit1s4) ?>
                            <?php if($maxsit1ss4==$value): ?>
                                <?php $k1ids1s4 = $k ?>
                            <?php endif; ?>
                        <?php foreach ($fio as $k => $value): ?>
                            <?php if($k1ids1s4==$k): ?>
                                <?php $fios4 = $value ?>
                            <?php endif; ?>
                        <?php endforeach; ?>          
                <?php endif; ?>
            <?php endforeach; ?>
        <?php unset($sit5[$k1ids1]); ?>
        <?php unset($sit5[$k1ids1s]); ?>     
        <?php unset($sit5[$k1ids1s2]); ?>     
        <?php unset($sit5[$k1ids1s3]); ?>     
        <?php unset($sit5[$k1ids1s4]); ?>      
        <?php unset($sit5[$k1id]); ?>
        <?php unset($sit5[$k1ids2]); ?> 
        <?php unset($sit5[$k1ids3]); ?> 
        <?php unset($sit5[$k1ids4]); ?>      
        <?php unset($fio[$k1ids1s4]); ?>   
            <?php 'Max4iz='.$maxsit1ss4.' Ид='.$k1ids1s4 ?><?php 'FIO='.$fi[]=$fios4 ?>  
        <?php else: ?> 
        <?php unset($sit5[$k1ids1]); ?>
        <?php unset($sit5[$k1ids1s]); ?>     
        <?php unset($sit5[$k1ids1s2]); ?>     
        <?php unset($sit5[$k1ids1s3]); ?>     
        <?php unset($sit5[$k1ids1s4]); ?>     
        <?php unset($sit5[$k1id]); ?>
        <?php unset($sit5[$k1ids2]); ?> 
        <?php unset($sit5[$k1ids3]); ?> 
        <?php unset($sit5[$k1ids4]); ?>      
        <?php unset($fio[$k1ids4]); ?>      
            <?php 'Max4='.$maxel1s4.' Ид='.$k1ids4 ?><?php 'FIO='.$fi[]=$fio1s4 ?>
        <?php endif; ?>
        
   

        <?php foreach ($sumstudd as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
        <?php endforeach; ?>
   

    <?php /* ситуация 5 */?>
   
        <?php foreach ($fio as $k => $value): ?>
            <?php '['.$k.'] '.$value ?> 
        <?php endforeach; ?>

       
    
        <?php foreach ($sit5 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
            <?php $max5[] = max($sit5) ?>
            <?php if($max5[0]==$value): ?>
                <?php $k1ids5 = $k ?>
                <?php $fio1s5 = $fio[$k1ids5] ?>
                <?php $maxel1s5 = $max5[0] ?>
            <?php endif; ?>
           
        <?php endforeach; ?>
        <?php unset($sit5[$k1ids5]); ?>
           
        <?php foreach ($sit5 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
            <?php if($max5[0]==$value): ?>
                <?php $k2ids5=$k ?>
                <?php $fio2s5 = $fio[$k2ids5] ?>
                <?php $maxel2s5 = $max3[0] ?>
            <?php endif; ?> 
        <?php endforeach; ?> 
        <?php unset($sit5[$k2ids5]); ?>
           

        <?php foreach ($sit5 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
        <?php endforeach; ?> 
 
        <?php if($maxel1s5==$maxel2s5): ?>
            <?php foreach ($sumstudd as $k => $value): ?>
            <?php if($k1ids5==$k || $k2ids5==$k): ?>       
                    <?php $maxsit1s5[] = $value ?>
                    <?php $maxsit1ss5 = max($maxsit1s5) ?>
                            <?php if($maxsit1ss5==$value): ?>
                                <?php $k1ids1s5 = $k ?>
                            <?php endif; ?>
                        <?php foreach ($fio as $k => $value): ?>
                            <?php if($k1ids1s5==$k): ?>
                                <?php $fios5 = $value ?>
                            <?php endif; ?>
                        <?php endforeach; ?>          
                <?php endif; ?>
            <?php endforeach; ?> 
        <?php unset($sit6[$k1ids1]); ?>
        <?php unset($sit6[$k1ids1s]); ?>     
        <?php unset($sit6[$k1ids1s2]); ?>     
        <?php unset($sit6[$k1ids1s3]); ?>     
        <?php unset($sit6[$k1ids1s4]); ?>     
        <?php unset($sit6[$k1ids1s5]); ?> 
        <?php unset($sit6[$k1id]); ?>
        <?php unset($sit6[$k1ids2]); ?> 
        <?php unset($sit6[$k1ids3]); ?> 
        <?php unset($sit6[$k1ids4]); ?>      
        <?php unset($sit6[$k1ids5]); ?>
        <?php unset($fio[$k1ids1s5]); ?>  
            <?php 'Max5iz='.$maxsit1ss5.' Ид='.$k1ids1s5 ?><?php 'FIO='.$fi[]=$fios5 ?>  
        <?php else: ?>
        <?php unset($sit6[$k1ids1]); ?>
        <?php unset($sit6[$k1ids1s]); ?>     
        <?php unset($sit6[$k1ids1s2]); ?>     
        <?php unset($sit6[$k1ids1s3]); ?>     
        <?php unset($sit6[$k1ids1s4]); ?>     
        <?php unset($sit6[$k1ids1s5]); ?> 
        <?php unset($sit6[$k1id]); ?>
        <?php unset($sit6[$k1ids2]); ?> 
        <?php unset($sit6[$k1ids3]); ?> 
        <?php unset($sit6[$k1ids4]); ?>      
        <?php unset($sit6[$k1ids5]); ?> 
        <?php unset($fio[$k1ids5]); ?>     
            <?php 'Max5='.$maxel1s5.' Ид='.$k1ids5 ?><?php 'FIO='.$fi[]=$fio1s5 ?>
        <?php endif; ?>
      

        <?php foreach ($sumstudd as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
        <?php endforeach; ?>
    
    <?php /* ситуация 6 */?>
  
    <?php foreach ($fio as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
            <?php $fi[]=$value?>
        <?php endforeach; ?>

      
    
        <?php foreach ($sit6 as $k => $value): ?>
            <?php '['.$k.'] '.$value ?>
          
        <?php endforeach; ?>
       
        <?php 'FIO='.$fi[5] ?>

<!--
<h3 class="text-center">Підсумковий розподіл стипендій</h3>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>ПIБ</th> 
                <th>Стипендія</th> 
                  
            </tr>
    </thead>

    <tbody class="contant1">
         <tr>
            
            <td>
                Баган С.В.
                <br><hr>
                Булига В.С.
                <br><hr>
                Кадацький М.А.
                <br><hr>
                Тушева А.А.
                <br><hr>
                Сiгiда О.О.
                <br><hr>
                Коноваленко Д.О
                <?php // for($i=0;$i<count($fi);$i++): ?>
                    <?php// $fi[$i] ?>
                    <br><hr>
                <?php //endfor; ?>    
            </td>
            <td>
                <?php /*foreach($stipends as $k): ?> 
                    <?= $k->name ?><br><hr>
                <?php endforeach; */?>
            </td>
        </tr>
    </tbody>
</table>
-->
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
            <tr>
                <th>Група</th>
                <th>ПIБ</th> 
                <th>Стипендія</th> 
                  
            </tr>
    </thead>

    <tbody class="contant1">
         <tr>
        <td>
            СМ-14-1<br><hr>
            СМ-15-1<br><hr>
            СМ-15-1<br><hr>
            СМ-16-1<br><hr>
            СМ-14-1<br><hr>
            СМ-15-1<br><hr>
            </td>
            <td>
               
                <?php  for($i=0;$i<count($fi);$i++): ?>
                    <?= $fi[$i] ?><br><hr>
                    
                <?php endfor; ?>    
            </td>
            <td>
                
                <?php foreach($stipends as $k): ?> 
                    <?= $k->name ?><br><hr>
                <?php endforeach; ?>
                
        </tr>
    </tbody>
</table>


<?php
echo Highcharts::widget([
   'options' => [
      'title' => ['text' => 'Графік змін'],
      'xAxis' => [
         'categories' => ['Ciтуацiя 1', 'Ciтуацiя 2', 'Ciтуацiя 3', 'Ciтуацiя 4', 'Ciтуацiя 5', 'Ciтуацiя 6']
      ],
      'yAxis' => [
         'title' => ['text' => '']
      ],
      'series' => [
         ['name' => 'Cтипендiя Президента', 'data' => [1.410,1.130,0.930,1.410,1.090,1.410]],
         ['name' => 'Стипендія Верховної Ради', 'data' => [1.410,1.340,0.930,1.410,1.090,1.410]],
         ['name' => 'Стипендія Кабінету Міністрів', 'data' => [1.410,1.340,1.330,1.410,1.090,1.410]],
         ['name' => 'Стипендія обласної Ради народних депутатів', 'data' => [1.410,1.130,1.410,1.410,1.330,1.410]],
         ['name' => 'Стипендія ПрАТ НКМЗ', 'data' => [1.410,1.340,1.363,1.414,1.402,1.536]],
         ['name' => 'Стипендія ради ВНЗ', 'data' => [1.410,1.340,1.330,1.410,1.330,1.410]],
      ]
   ]
]);
?>



<?php endif ?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>