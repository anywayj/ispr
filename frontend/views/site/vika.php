<?php

use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
?>


<h1 class="text-center">Середній рейтинг абітурієнтів</h1><br>

<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
        <tr>      
            <th>2012 рiк</th>
            <th>2013 рiк</th>
            <th>2014 рiк</th>
            <th>2015 рiк</th>
            <th>2016 рiк</th>
            <th>2017 рiк</th>
        </tr>
    </thead>
<tbody class="contant1">

        <tr>
            <td>
                <?php foreach($stud2012skor as $k): ?>
                	<?= $k->Student_FIO ?><br>
                    <?= number_format($k->Sum_ball,1,'.','') ?><br>
                    <hr>    
                <?php endforeach; ?>
                <?php foreach($stud2012pov as $k): ?>
                	<?= $k->Student_FIO ?><br>
                    <?= number_format($k->Sum_ball,1,'.','') ?><br>
                    <hr>  
                <?php endforeach; ?> 
            </td>

            <td>
              
                <?php foreach($stud2013skor as $k): ?>
                	<?= $k->Student_FIO ?><br>
                    <?= number_format($k->Sum_ball,1,'.','') ?><br>
                    <hr>                      
                <?php endforeach; ?>
                <?php foreach($stud2013pov as $k): ?>
                	<?= $k->Student_FIO ?><br>
                    <?= number_format($k->Sum_ball,1,'.','')  ?><br>     
                    <hr>      
                <?php endforeach; ?> 
            </td>		

            <td>
                
                <?php foreach($stud2014skor as $k): ?>
                	<?= $k->Student_FIO ?><br>
                    <?= number_format($k->Sum_ball,1,'.','')  ?><br>
                    <hr>      
                <?php endforeach; ?>
                <?php foreach($stud2014pov as $k): ?>
                	<?= $k->Student_FIO ?><br>
                    <?= number_format($k->Sum_ball,1,'.','')  ?><br>
                    <hr> 
                <?php endforeach; ?>
            </td>
			
            <td>
                
                <?php foreach($stud2015skor as $k): ?>
                	<?= $k->Student_FIO ?><br>
                    <?= number_format($k->Sum_ball,1,'.','') ?><br>
                    <hr>  
                <?php endforeach; ?>
                <?php foreach($stud2015pov as $k): ?>
                	<?= $k->Student_FIO ?><br>
                    <?= number_format($k->Sum_ball,1,'.','') ?><br>
                    <hr>    
                <?php endforeach; ?>
            </td>
			
            <td>
                <?php foreach($stud2016skor as $k): ?>
                	<?= $k->Student_FIO ?><br>
                    <?= number_format($k->Sum_ball,1,'.','') ?><br>
                    <hr>     
                <?php endforeach; ?>
                <?php foreach($stud2016pov as $k): ?>
                	<?= $k->Student_FIO ?><br>
                    <?= number_format($k->Sum_ball,1,'.','') ?><br>
                    <hr>   
                <?php endforeach; ?> 
            </td>

            <td> 
                <?php foreach($stud2017skor as $k): ?>
                	<?= $k->Student_FIO ?><br>
                    <?= number_format($k->Sum_ball,1,'.','')  ?><br>
                    <hr>     
                <?php endforeach; ?>
                <?php foreach($stud2017pov as $k): ?>
                	<?= $k->Student_FIO ?><br>
                    <?= number_format($k->Sum_ball,1,'.','')  ?><br>
                    <hr> 
                <?php endforeach; ?>
            </td>
        </tr>
    </tbody>
</table>  


<?php $skor=200 ?>
<?php $pov=800 ?>
<?php $y2014=660 ?>
<?php $y2017=200 ?>

<button id='triggerNM' class="btn btn-info center-block" data-text-show="Сховати нормалiзовану матрицю"
 	data-text-hide="Показати нормалiзовану матрицю">
 	Показати нормалiзовану матрицю
</button>
<br>
<div id='box1' style="display:none;"> 

	<h1 class="text-center">Нормалiзована матриця середнього рейтингу абітурієнтів</h1> <br>     
	<table id="table" class="table table-bordered table-condensed table-striped"> 
	    <thead>
	        <tr>
	            <th></th>
	            <th>2012 рiк</th>
	            <th>2013 рiк</th>
	            <th>2014 рiк</th>
	            <th>2015 рiк</th>
	            <th>2016 рiк</th>
	            <th>2017 рiк</th>
	        </tr>
	    </thead>
	    <tbody class="contant1">

	        <tr>
	            <td>
	                
	            </td>

	            <td>
	                <?php $sum=0 ?>
	                <?php foreach($stud2012skor as $k): ?>
	                    <?= $sum=number_format($k->Sum_ball / $skor,2,'.','') ?><br>
	                    <hr>
	                    <?php if($max2012<$sum): ?>
	                        <?php $max2012 = $sum ?>
	                    <?php endif ?>
	                    <?php $sum2012+=$sum?>
	                    <?php $kol2012=$kol2012+1?>   
	                <?php endforeach; ?>
	                <?php foreach($stud2012pov as $k): ?>
	                    <?= $sum=number_format($k->Sum_ball / $pov,2,'.','') ?><br>
	                    <hr>
	                    <?php if($max2012<$sum): ?>
	                        <?php $max2012 = $sum ?>
	                    <?php endif ?>
	                    <?php $sum2012+=$sum?>
	                    <?php $kol2012=$kol2012+1?>   
	                <?php endforeach; ?> 
	            </td>

	            <td>
	               <?php $sum=0 ?>
	                <?php foreach($stud2013skor as $k): ?>
	                    <?= $sum=number_format($k->Sum_ball / $skor,2,'.','') ?><br>
	                    <hr>
	                    <?php if($max2013<$sum): ?>
	                        <?php $max2013 = $sum ?>
	                    <?php endif ?>
	                    <?php $sum2013+=$sum?>
	                    <?php $kol2013=$kol2013+1?>   
	                <?php endforeach; ?>
	                <?php foreach($stud2013pov as $k): ?>
	                    <?= $sum=number_format($k->Sum_ball / $pov,2,'.','') ?><br>
	                    <hr>
	                    <?php if($max2013<$sum): ?>
	                        <?php $max2013 = $sum ?>
	                    <?php endif ?>
	                    <?php $sum2013+=$sum?>
	                    <?php $kol2013=$kol2013+1?>  
	                <?php endforeach; ?> 
	            </td>

	            <td>
	                <?php $sum=0 ?>
	                <?php foreach($stud2014skor as $k): ?>
	                    <?= $sum=number_format($k->Sum_ball / $skor,2,'.','') ?><br>
	                    <hr>
	                    <?php if($max2014<$sum): ?>
	                        <?php $max2014 = $sum ?>
	                    <?php endif ?>
	                    <?php $sum2014+=$sum?>
	                    <?php $kol2014=$kol2014+1?>   
	                <?php endforeach; ?>
	                <?php foreach($stud2014pov as $k): ?>
	                    <?= $sum=number_format($k->Sum_ball / $y2014,2,'.','') ?><br>
	                    <hr>
	                    <?php if($max2014<$sum): ?>
	                        <?php $max2014 = $sum ?>
	                    <?php endif ?>
	                    <?php $sum2014+=$sum?>
	                    <?php $kol2014=$kol2014+1?>  
	                <?php endforeach; ?>
	            </td>

	            <td>
	                <?php $sum=0 ?>
	                <?php foreach($stud2015skor as $k): ?>
	                    <?= $sum=number_format($k->Sum_ball / $skor,2,'.','') ?><br>
	                    <hr>
	                    <?php if($max2015<$sum): ?>
	                        <?php $max2015 = $sum ?>
	                    <?php endif ?>
	                    <?php $sum2015+=$sum?>
	                    <?php $kol2015=$kol2015+1?>   
	                <?php endforeach; ?>
	                <?php foreach($stud2015pov as $k): ?>
	                    <?= $sum=number_format($k->Sum_ball / $pov,2,'.','') ?><br>
	                    <hr>
	                    <?php if($max2015<$sum): ?>
	                        <?php $max2015 = $sum ?>
	                    <?php endif ?>
	                    <?php $sum2015+=$sum?>
	                    <?php $kol2015=$kol2015+1?>  
	                <?php endforeach; ?>
	            </td>

	            <td>
	               <?php $sum=0 ?>
	                <?php foreach($stud2016skor as $k): ?>
	                    <?= $sum=number_format($k->Sum_ball / $skor,2,'.','') ?><br>
	                    <hr>
	                    <?php if($max2016<$sum): ?>
	                        <?php $max2016 = $sum ?>
	                    <?php endif ?>
	                    <?php $sum2016+=$sum?>
	                    <?php $kol2016=$kol2016+1?>   
	                <?php endforeach; ?>
	                <?php foreach($stud2016pov as $k): ?>
	                    <?= $sum=number_format($k->Sum_ball / $pov,2,'.','') ?><br>
	                    <hr>
	                    <?php if($max2016<$sum): ?>
	                        <?php $max2016 = $sum ?>
	                    <?php endif ?>
	                    <?php $sum2016+=$sum?> 
	                    <?php $kol2016=$kol2016+1?> 
	                <?php endforeach; ?> 
	            </td>

	            <td>
	                <?php $sum=0 ?>
	                <?php foreach($stud2017skor as $k): ?>
	                   <?php// number_format($sum2012,2,'.','') ?>
	                    <?= $sum=number_format($k->Sum_ball / $skor,2,'.','') ?><br>
	                    <hr>
	                    <?php if($max2017<$sum): ?>
	                        <?php $max2017 = $sum ?>
	                    <?php endif ?>
	                    <?php $sum2017+=$sum?>
	                    <?php $kol2017=$kol2017+1?>   
	                <?php endforeach; ?>
	                <?php foreach($stud2017pov as $k): ?>
	                    <?= $sum=number_format($k->Sum_ball / $y2017,2,'.','') ?><br>
	                    <hr>
	                    <?php if($max2017<$sum): ?>
	                        <?php $max2017 = $sum ?>
	                    <?php endif ?>
	                    <?php $sum2017+=$sum?>
	                    <?php $kol2017=$kol2017+1?>  
	                <?php endforeach; ?>

	            </td>
	        </tr>
	                    
			<tr><td>Кiлькiсть</td>
			    <td><?= $kol2012 ?></td><td><?= $kol2013 ?></td><td><?= $kol2014 ?></td>
			    <td><?= $kol2015 ?></td><td><?= $kol2016 ?></td><td><?= $kol2017 ?></td>
			</tr>
			<tr><td>Сума</td>
			    <td><?= number_format($sum2012,2,'.','') ?></td><td><?= number_format($sum2013,2,'.','') ?></td><td><?= number_format($sum2014,2,'.','') ?></td>
			    <td><?= number_format($sum2015,2,'.','') ?></td><td><?= number_format($sum2016,2,'.','') ?></td><td><?= number_format($sum2017,2,'.','') ?></td>
			</tr>
			<tr><td>Максимум</td>
			    <td><?= number_format($max2012,2,'.','') ?></td><td><?= number_format($max2013,2,'.','') ?></td><td><?= number_format($max2014,2,'.','') ?></td>
			    <td><?= number_format($max2015,2,'.','') ?></td><td><?= number_format($max2016,2,'.','') ?></td><td><?= number_format($max2017,2,'.','') ?></td>
			</tr>
	    </tbody>
	</table>  
	   
</div> 

<h1 class="text-center">Величина коефіцієнтів ЄТС викладачів</h1><br>  
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
        <tr>    
            <th>Посада</th>
            <th>Тарифний розряд</th>
            <th>Тарифний коефіцієнт</th>
        </tr>
    </thead>
    <tbody class="contant1">
            <?php foreach ($position as $c): ?>
        <tr>
	    	<td><?= $c->Position_name ?></td>
	    	<td><?= $c->category ?></td>
	    	<td><?= number_format($c->ETS,2,'.','') ?></td>
    	</tr>
    		<?php endforeach ?>
    </tbody>
</table>





	<h1 class="text-center">Оцінки підсумкової роботи випускників</h1><br>
	<table id="table" class="table table-bordered table-condensed table-striped"> 
	    <thead>
	        <tr>
	            <th>2012 рiк</th>
	            <th>2013 рiк</th>
	            <th>2014 рiк</th>
	            <th>2015 рiк</th>
	            <th>2016 рiк</th>
	            <th>2017 рiк</th>
	        </tr>
	    </thead>
	    <tbody class="contant1">
	            
			<tr>
	           
	            <td>
	                <?php foreach ($diplom2012 as $c): ?>
	                	<?= $c->students->Student_FIO ?><br>
			    		<?= $c->Raiting_100 ?><br>
			    		<hr>
			  		<?php endforeach ?>
	            </td>

				<td>
	                <?php foreach ($diplom2013 as $c): ?>
	                	<?= $c->students->Student_FIO ?><br>
			    		<?= $c->Raiting_100 ?><br>
			    		<hr>
			  		<?php endforeach ?>
	            </td>

	            <td>
	                <?php foreach ($diplom2014 as $c): ?>
	                	<?= $c->students->Student_FIO ?><br>
			    		<?= $c->Raiting_100 ?><br>
			    		<hr>
			  		<?php endforeach ?>
	            </td>

	            <td>
	                <?php foreach ($diplom2015 as $c): ?>
	                	<?= $c->students->Student_FIO ?><br>
			    		<?= $c->Raiting_100 ?><br>
			    		<hr>
			  		<?php endforeach ?>
	            </td>

	            <td>
	                <?php foreach ($diplom2016 as $c): ?>
	                	<?= $c->students->Student_FIO ?><br>
			    		<?= $c->Raiting_100 ?><br>
			    		<hr>
			  		<?php endforeach ?>
	            </td>

	            <td>
	                <?php foreach ($diplom2017 as $c): ?>
	                	<?= $c->students->Student_FIO ?><br>
			    		<?= $c->Raiting_100 ?><br>
			    		<hr>
			  		<?php endforeach ?>
	            </td>
	            
			</tr>


	    </tbody>
	</table>

<button id='triggerOD' class="btn btn-info center-block" data-text-show="Сховати оцiнки за дипломами"
 	data-text-hide="Показати оцiнки за дипломами">
 	Показати оцiнки за дипломами
</button><br>
 <div id='box2' style="display:none;"> 

	<h1 class="text-center">Нормалізована матриця оцінок підсумкової роботи випускників</h1><br>
	<table id="table" class="table table-bordered table-condensed table-striped"> 
	    <thead>
	        <tr>
	            <th></th>
	            <th>2012 рiк</th>
	            <th>2013 рiк</th>
	            <th>2014 рiк</th>
	            <th>2015 рiк</th>
	            <th>2016 рiк</th>
	            <th>2017 рiк</th>
	        </tr>
	    </thead>
	    <tbody class="contant1"> 
			<tr>
				<td>
				</td>

	            <td>
	                <?php foreach ($diplom2012 as $c): ?>
	                	<?= $c->students->Student_FIO ?><br>
			    		<?= $sumkd = $c->Raiting_classic ?><br>
			    		<?php $sumkd2012+=$sumkd?>
			    		<?php $kd2012=$kd2012+1?>
			    		<hr>
			  		<?php endforeach ?>

	            </td>

				<td>
	                <?php foreach ($diplom2013 as $c): ?>
	                	<?= $c->students->Student_FIO ?><br>
			    		<?= $sumkd = $c->Raiting_classic ?><br>
			    		<?php $sumkd2013+=$sumkd?>
			    		<?php $kd2013=$kd2013+1?>
			    		<hr>	
			  		<?php endforeach ?>
			  	
	            </td>

	            <td>
	                <?php foreach ($diplom2014 as $c): ?>
	                	<?= $c->students->Student_FIO ?><br>
			    		<?= $sumkd = $c->Raiting_classic ?><br>
			    		<?php $sumkd2014+=$sumkd?>
			    		<?php $kd2014=$kd2014+1?>
			    		<hr>
			  		<?php endforeach ?>
	            </td>

	            <td>
	                <?php foreach ($diplom2015 as $c): ?>
	                	<?= $c->students->Student_FIO ?><br>
			    		<?= $sumkd = $c->Raiting_classic ?><br>
			    		<?php $sumkd2015+=$sumkd?>
			    		<?php $kd2015=$kd2015+1?>
			    		<hr>
			  		<?php endforeach ?>
	            </td>

	            <td>
	                <?php foreach ($diplom2016 as $c): ?>
	                	<?= $c->students->Student_FIO ?><br>
			    		<?= $sumkd = $c->Raiting_classic ?><br>
			    		<?php $sumkd2016+=$sumkd?>
			    		<?php $kd2016=$kd2016+1?>
			    		<hr>
			  		<?php endforeach ?>
	            </td>

	            <td>
	                <?php foreach ($diplom2017 as $c): ?>
	                	<?= $c->students->Student_FIO ?><br>
			    		<?= $sumkd = $c->Raiting_classic ?><br>
			    		<?php $sumkd2017+=$sumkd?>
			    		<?php $kd2017=$kd2017+1?>
			    		<hr>
			  		<?php endforeach ?>
	            </td>
	            
			</tr>

			<tr>
				<td class="bg-info">Кiлькiсть</td>
				<td><?= $kd2012 ?></td><td><?= $kd2013 ?></td>
				<td><?= $kd2014 ?></td><td><?= $kd2015 ?></td>

				<td><?= $kd2016 ?></td><td><?= $kd2017 ?></td>
			</tr>

			<tr>
				<td class="bg-danger">Сума</td>
				<td><?=$sumkd2012 ?></td><td><?=$sumkd2013 ?></td>
			 	<td><?=$sumkd2014 ?></td><td><?=$sumkd2015 ?></td>
			 	<td><?=$sumkd2016 ?></td><td><?=$sumkd2017 ?></td>
			</tr>
		</tbody>
	</table>
</div>
<h1 class="text-center">Параметри якості навчального процесу кафедри</h1><br>
<table id="table" class="table table-bordered table-condensed table-striped"> 
	<thead>
	                <tr>
	                    <th>№</th>
	                    <th>2012 рiк</th>
	                    <th>2013 рiк</th>
	                    <th>2014 рiк</th>
	                    <th>2015 рiк</th>
	                    <th>2016 рiк</th>
	                    <th>2017 рiк</th>
	                </tr>
	</thead>
	<tbody class="contant1">
		<tr><td>Кор</td>
		    <td><?= $KOY12 = number_format($sum2012 / $max2012 / $kol2012,4,'.', '') ?></td>
		    <td><?= $KOY13 = number_format($sum2013 / $max2013 / $kol2013,4,'.', '') ?></td>
		    <td><?= $KOY14 = number_format($sum2014 / $max2014 / $kol2014,4,'.', '') ?></td>
		    <td><?= $KOY15 = number_format($sum2015 / $max2015 / $kol2015,4,'.', '') ?></td>
		    <td><?= $KOY16 = number_format($sum2016 / $max2016 / $kol2016,4,'.', '') ?></td>
		    <td><?= $KOY17 = number_format($sum2017 / $max2017 / $kol2017,4,'.', '') ?></td>
		</tr> <?php $koygraf=array($KOY12,$KOY13,$KOY14,$KOY15,$KOY16,$KOY17)?>

		<tr>

			<td>Кп</td>
			<?php $kefz=3.85;?>
		<?php foreach($teachz12 as $k): ?>
			<?php $chis12 = $k->Kolteach /* кол-во за год*/?>
			<?php $sum12+=$chis12 /* общее кол-во */?> 
			<?php $ets12 = $k->pos->ETS /* общее ETS */?>
			<?php $sumkp12[] = $chis12*$ets12 ?>
			<?php $new_mas12 = array(); ?>
			<?php foreach($sumkp12 as $v): ?>
			 <?php $new_mas12[] = $v;  ?>
			<?php endforeach; ?>
		<?php endforeach; ?>
		<td>
	<?= $KP12 = number_format(($new_mas12[0]+$new_mas12[1]+$new_mas12[2])/($sum12*$kefz),4,'.','');?>
		</td>

		<?php foreach($teachz13 as $k): ?>
			<?php $chis13 = $k->Kolteach ?>
			<?php $sum13+=$chis13 ?> 
			<?php $ets13 = $k->pos->ETS ?>
			<?php $sumkp13[] = $chis13*$ets13 ?>
			<?php $new_mas13 = array(); ?>
			<?php foreach($sumkp13 as $v): ?>
			 <?php $new_mas13[] = $v;  ?>
			<?php endforeach; ?>
		<?php endforeach; ?>
		<td>
	<?= $KP13 = number_format(($new_mas13[0]+$new_mas13[1]+$new_mas13[2])/($sum13*$kefz),4,'.','');?>
		</td>
		
		<?php foreach($teachz14 as $k): ?>
			<?php $chis14 = $k->Kolteach ?>
			<?php $sum14+=$chis14 ?> 
			<?php $ets14 = $k->pos->ETS ?>
			<?php $sumkp14[] = $chis14*$ets14 ?>
			<?php $new_mas14 = array(); ?>
			<?php foreach($sumkp14 as $v): ?>
			 <?php $new_mas14[] = $v;  ?>
			<?php endforeach; ?>
		<?php endforeach; ?>
		<td>
	<?= $KP14 = number_format(($new_mas14[0]+$new_mas14[1]+$new_mas14[2])/($sum14*$kefz),4,'.','');?>
		</td>	
		
		<?php foreach($teachz15 as $k): ?>
			<?php $chis15 = $k->Kolteach ?>
			<?php $sum15+=$chis15 ?> 
			<?php $ets15 = $k->pos->ETS ?>
			<?php $sumkp15[] = $chis15*$ets15 ?>
			<?php $new_mas15 = array(); ?>
			<?php foreach($sumkp15 as $v): ?>
			 <?php $new_mas15[] = $v;  ?>
			<?php endforeach; ?>
		<?php endforeach; ?>
		<td>
	<?= $KP15 = number_format(($new_mas15[0]+$new_mas15[1]+$new_mas15[2])/($sum15*$kefz),4,'.','');?>
		</td>

		<?php foreach($teachz16 as $k): ?>
			<?php $chis16 = $k->Kolteach ?>
			<?php $sum16+=$chis16 ?> 
			<?php $ets16 = $k->pos->ETS ?>
			<?php $sumkp16[] = $chis16*$ets16 ?>
			<?php $new_mas16 = array(); ?>
			<?php foreach($sumkp16 as $v): ?>
			 <?php $new_mas16[] = $v;  ?>
			<?php endforeach; ?>
		<?php endforeach; ?>
		<td>
	<?= $KP16 = number_format(($new_mas16[0]+$new_mas16[1]+$new_mas16[2])/($sum16*$kefz),4,'.','');?>
		</td>

		<?php foreach($teachz17 as $k): ?>
			<?php $chis17 = $k->Kolteach ?>
			<?php $sum17+=$chis17 ?> 
			<?php $ets17 = $k->pos->ETS ?>
			<?php $sumkp17[] = $chis17*$ets17 ?>
			<?php $new_mas17 = array(); ?>
			<?php foreach($sumkp17 as $v): ?>
			 <?php $new_mas17[] = $v;  ?>
			<?php endforeach; ?>
		<?php endforeach; ?>
		<td>
	<?= $KP17 = number_format(($new_mas17[0]+$new_mas17[1]+$new_mas17[2])/($sum17*$kefz),4,'.','');?>
		</td> <?php $kpgraf=array($KP12,$KP13,$KP14,$KP15,$KP16,$KP17)?>

		</tr>

		<tr><td>Кпв</td>
		    <td><?= $KPV12 = number_format($sumkd2012 / (5 * $kd2012),4,'.', '') ?></td>
		    <td><?= $KPV13 = number_format($sumkd2013 / (5 * $kd2013),4,'.', '') ?></td>
		    <td><?= $KPV14 = number_format($sumkd2014 / (5 * $kd2014),4,'.', '') ?></td>
		    <td><?= $KPV15 = number_format($sumkd2015 / (5 * $kd2015),4,'.', '') ?></td>
		    <td><?= $KPV16 = number_format($sumkd2016 / (5 * $kd2016),4,'.', '') ?></td>
		    <td><?= $KPV17 = number_format($sumkd2017 / (5 * $kd2017),4,'.', '') ?></td>
		</tr> <?php $kpvgraf=array($KPV12,$KPV13,$KPV14,$KPV15,$KPV16,$KPV17)?>

	 </tbody>
 </table>

<h3><strong>Кор</strong> - коефіцієнт освітнього рівня абітурієнтів<br></h3>
<h3><strong>Кп</strong> - коефіцієнт професійного рівня професорсько-викладацького складу кафедри<br></h3>
<h3><strong>Кпв</strong> - коефіцієнт професійного рівня підготовки фахівців<br></h3><br>


<?php 
$koygraf = array(0.8576,0.8127,0.8156,0.7735,0.7737,0.8478); 
$kpgraf = array(0.7221,0.7896,0.8072,0.8136,0.8210,0.8284);
$kpvgraf = array(0.8611,0.8255,0.8750,0.8410,0.8606,0.7952);
?>
<?php
echo Highcharts::widget([
   'options' => [
      'title' => ['text' => 'Візуалізація параметрів для оцінки  якості  навчального процесу кафедри'],
      'xAxis' => [
         'categories' => ['2012', '2013', '2014', '2015', '2016', '2017']
      ],
      'yAxis' => [
         'title' => ['text' => '']
      ],
      'series' => [
         ['name' => 'КОР', 'data' => $koygraf],
         ['name' => 'КП', 'data' => $kpgraf],
         ['name' => 'КПВ', 'data' => $kpvgraf]
      ]
   ]
]);
?>
<br>
<?php/* 2012 */?>
	<?php/* Повний */?>
	<?php foreach($y1mark2012 as $k): ?>
		<?php $x1y1mark2012 = $k->Vh_control ?>
		<?php $x2y1mark2012 = $k->KR_1 ?>
		<?php $x3y1mark2012 = $k->KR_2 ?>
		<?php $x4y1mark2012 = $k->View_id ?>	
	<?php endforeach; ?>
		
	<?php foreach($y2mark2012 as $k): ?>
		<?php $x1y2mark2012 = $k->Vh_control ?>
		<?php $x2y2mark2012 = $k->KR_1 ?>
		<?php $x3y2mark2012 = $k->KR_2 ?>
		<?php $x4y2mark2012 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y3mark2012 as $k): ?>
		<?php $x1y3mark2012 = $k->Vh_control ?>
		<?php $x2y3mark2012 = $k->KR_1 ?>
		<?php $x3y3mark2012 = $k->KR_2 ?>
		<?php $x4y3mark2012 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y4mark2012 as $k): ?>
		<?php $x1y4mark2012 = $k->Vh_control ?>
		<?php $x2y4mark2012 = $k->KR_1 ?>
		<?php $x3y4mark2012 = $k->KR_2 ?>
		<?php $x4y4mark2012 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y5mark2012 as $k): ?>
		<?php $x1y5mark2012 = $k->Vh_control ?>
		<?php $x2y5mark2012 = $k->KR_1 ?>
		<?php $x3y5mark2012 = $k->KR_2 ?>
		<?php $x4y5mark2012 = $k->View_id ?>
	<?php endforeach; ?>

	<?php/* Прискорений */?>
	<?php foreach($y1mark2012s as $k): ?>
		<?php $x1y1mark2012s = $k->Vh_control ?>
		<?php $x2y1mark2012s = $k->KR_1 ?>
		<?php $x3y1mark2012s = $k->KR_2 ?>
		<?php $x4y1mark2012s = $k->View_id ?>
	<?php endforeach; ?>
		
	<?php foreach($y2mark2012s as $k): ?>
		<?php $x1y2mark2012s = $k->Vh_control ?>
		<?php $x2y2mark2012s = $k->KR_1 ?>
		<?php $x3y2mark2012s = $k->KR_2 ?>
		<?php $x4y2mark2012s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y3mark2012s as $k): ?>
		<?php $x1y3mark2012s = $k->Vh_control ?>
		<?php $x2y3mark2012s = $k->KR_1 ?>
		<?php $x3y3mark2012s = $k->KR_2 ?>
		<?php $x4y3mark2012s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y4mark2012s as $k): ?>
		<?php $x1y4mark2012s = $k->Vh_control ?>
		<?php $x2y4mark2012s = $k->KR_1 ?>
		<?php $x3y4mark2012s = $k->KR_2 ?>
		<?php $x4y4mark2012s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y5mark2012s as $k): ?>
		<?php $x1y5mark2012s = $k->Vh_control ?>
		<?php $x2y5mark2012s = $k->KR_1 ?>
		<?php $x3y5mark2012s = $k->KR_2 ?>
		<?php $x4y5mark2012s = $k->View_id ?>
	<?php endforeach; ?>

	<?php $max12 = array(); ?>
	<?php foreach($est2012e as $k): ?>
		<?php $max12[] = $k->Vh_control ?>
	<?php endforeach; ?>

	<?php foreach($stud2012skor as $k): ?>
		<?php $kol12skor+=1 ?>
	<?php endforeach; ?>

	<?php foreach($stud2012pov as $k): ?>
		<?php $kol12pov+=1 ?>
	<?php endforeach; ?>

<?php/* 2013 */?>
	<?php/* Повний */?>
	<?php foreach($y1mark2013 as $k): ?>
		<?php $x1y1mark2013 = $k->Vh_control ?>
		<?php $x2y1mark2013 = $k->KR_1 ?>
		<?php $x3y1mark2013 = $k->KR_2 ?>
		<?php $x4y1mark2013 = $k->View_id ?>
	<?php endforeach; ?>
		
	<?php foreach($y2mark2013 as $k): ?>
		<?php $x1y2mark2013 = $k->Vh_control ?>
		<?php $x2y2mark2013 = $k->KR_1 ?>
		<?php $x3y2mark2013 = $k->KR_2 ?>
		<?php $x4y2mark2013 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y3mark2013 as $k): ?>
		<?php $x1y3mark2013 = $k->Vh_control ?>
		<?php $x2y3mark2013 = $k->KR_1 ?>
		<?php $x3y3mark2013 = $k->KR_2 ?>
		<?php $x4y3mark2013 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y4mark2013 as $k): ?>
		<?php $x1y4mark2013 = $k->Vh_control ?>
		<?php $x2y4mark2013 = $k->KR_1 ?>
		<?php $x3y4mark2013 = $k->KR_2 ?>
		<?php $x4y4mark2013 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y5mark2013 as $k): ?>
		<?php $x1y5mark2013 = $k->Vh_control ?>
		<?php $x2y5mark2013 = $k->KR_1 ?>
		<?php $x3y5mark2013 = $k->KR_2 ?>
		<?php $x4y5mark2013 = $k->View_id ?>
	<?php endforeach; ?>

	<?php/* Прискорений */?>
	<?php foreach($y1mark2013s as $k): ?>
		<?php $x1y1mark2013s = $k->Vh_control ?>
		<?php $x2y1mark2013s = $k->KR_1 ?>
		<?php $x3y1mark2013s = $k->KR_2 ?>
		<?php $x4y1mark2013s = $k->View_id ?>
	<?php endforeach; ?>
		
	<?php foreach($y2mark2013s as $k): ?>
		<?php $x1y2mark2013s = $k->Vh_control ?>
		<?php $x2y2mark2013s = $k->KR_1 ?>
		<?php $x3y2mark2013s = $k->KR_2 ?>
		<?php $x4y2mark2013s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y3mark2013s as $k): ?>
		<?php $x1y3mark2013s = $k->Vh_control ?>
		<?php $x2y3mark2013s = $k->KR_1 ?>
		<?php $x3y3mark2013s = $k->KR_2 ?>
		<?php $x4y3mark2013s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y4mark2013s as $k): ?>
		<?php $x1y4mark2013s = $k->Vh_control ?>
		<?php $x2y4mark2013s = $k->KR_1 ?>
		<?php $x3y4mark2013s = $k->KR_2 ?>
		<?php $x4y4mark2013s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y5mark2013s as $k): ?>
		<?php $x1y5mark2013s = $k->Vh_control ?>
		<?php $x2y5mark2013s = $k->KR_1 ?>
		<?php $x3y5mark2013s = $k->KR_2 ?>
		<?php $x4y5mark2013s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($stud2013skor as $k): ?>
		<?php $kol13skor+=1 ?>
	<?php endforeach; ?>

	<?php foreach($stud2013pov as $k): ?>
		<?php $kol13pov+=1 ?>
	<?php endforeach; ?>

<?php/* 2014 */?>
	<?php/* Повний */?>
	<?php foreach($y1mark2014 as $k): ?>
		<?php $x1y1mark2014 = $k->Vh_control ?>
		<?php $x2y1mark2014 = $k->KR_1 ?>
		<?php $x3y1mark2014 = $k->KR_2 ?>
		<?php $x4y1mark2014 = $k->View_id ?>
	<?php endforeach; ?>
		
	<?php foreach($y2mark2014 as $k): ?>
		<?php $x1y2mark2014 = $k->Vh_control ?>
		<?php $x2y2mark2014 = $k->KR_1 ?>
		<?php $x3y2mark2014 = $k->KR_2 ?>
		<?php $x4y2mark2014 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y3mark2014 as $k): ?>
		<?php $x1y3mark2014 = $k->Vh_control ?>
		<?php $x2y3mark2014 = $k->KR_1 ?>
		<?php $x3y3mark2014 = $k->KR_2 ?>
		<?php $x4y3mark2014 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y4mark2014 as $k): ?>
		<?php $x1y4mark2014 = $k->Vh_control ?>
		<?php $x2y4mark2014 = $k->KR_1 ?>
		<?php $x3y4mark2014 = $k->KR_2 ?>
		<?php $x4y4mark2014 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y5mark2014 as $k): ?>
		<?php $x1y5mark2014 = $k->Vh_control ?>
		<?php $x2y5mark2014 = $k->KR_1 ?>
		<?php $x3y5mark2014 = $k->KR_2 ?>
		<?php $x4y5mark2014 = $k->View_id ?>
	<?php endforeach; ?>

	<?php/* Прискорений */?>
	<?php foreach($y1mark2014s as $k): ?>
		<?php $x1y1mark2014s = $k->Vh_control ?>
		<?php $x2y1mark2014s = $k->KR_1 ?>
		<?php $x3y1mark2014s = $k->KR_2 ?>
		<?php $x4y1mark2014s = $k->View_id ?>
	<?php endforeach; ?>
		
	<?php foreach($y2mark2014s as $k): ?>
		<?php $x1y2mark2014s = $k->Vh_control ?>
		<?php $x2y2mark2014s = $k->KR_1 ?>
		<?php $x3y2mark2014s = $k->KR_2 ?>
		<?php $x4y2mark2014s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y3mark2014s as $k): ?>
		<?php $x1y3mark2014s = $k->Vh_control ?>
		<?php $x2y3mark2014s = $k->KR_1 ?>
		<?php $x3y3mark2014s = $k->KR_2 ?>
		<?php $x4y3mark2014s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y4mark2014s as $k): ?>
		<?php $x1y4mark2014s = $k->Vh_control ?>
		<?php $x2y4mark2014s = $k->KR_1 ?>
		<?php $x3y4mark2014s = $k->KR_2 ?>
		<?php $x4y4mark2014s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y5mark2014s as $k): ?>
		<?php $x1y5mark2014s = $k->Vh_control ?>
		<?php $x2y5mark2014s = $k->KR_1 ?>
		<?php $x3y5mark2014s = $k->KR_2 ?>
		<?php $x4y5mark2014s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($stud2014skor as $k): ?>
		<?php $kol14skor+=1 ?>
	<?php endforeach; ?>

	<?php foreach($stud2014pov as $k): ?>
		<?php $kol14pov+=1 ?>
	<?php endforeach; ?>

<?php/* 2015 */?>
	<?php/* Повний */?>
	<?php foreach($y1mark2015 as $k): ?>
		<?php $x1y1mark2015 = $k->Vh_control ?>
		<?php $x2y1mark2015 = $k->KR_1 ?>
		<?php $x3y1mark2015 = $k->KR_2 ?>
		<?php $x4y1mark2015 = $k->View_id ?>
	<?php endforeach; ?>
		
	<?php foreach($y2mark2015 as $k): ?>
		<?php $x1y2mark2015 = $k->Vh_control ?>
		<?php $x2y2mark2015 = $k->KR_1 ?>
		<?php $x3y2mark2015 = $k->KR_2 ?>
		<?php $x4y2mark2015 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y3mark2015 as $k): ?>
		<?php $x1y3mark2015 = $k->Vh_control ?>
		<?php $x2y3mark2015 = $k->KR_1 ?>
		<?php $x3y3mark2015 = $k->KR_2 ?>
		<?php $x4y3mark2015 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y4mark2015 as $k): ?>
		<?php $x1y4mark2015 = $k->Vh_control ?>
		<?php $x2y4mark2015 = $k->KR_1 ?>
		<?php $x3y4mark2015 = $k->KR_2 ?>
		<?php $x4y4mark2015 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y5mark2015 as $k): ?>
		<?php $x1y5mark2015 = $k->Vh_control ?>
		<?php $x2y5mark2015 = $k->KR_1 ?>
		<?php $x3y5mark2015 = $k->KR_2 ?>
		<?php $x4y5mark2015 = $k->View_id ?>
	<?php endforeach; ?>

	<?php/* Прискорений */?>
	<?php foreach($y1mark2015s as $k): ?>
		<?php $x1y1mark2015s = $k->Vh_control ?>
		<?php $x2y1mark2015s = $k->KR_1 ?>
		<?php $x3y1mark2015s = $k->KR_2 ?>
		<?php $x4y1mark2015s = $k->View_id ?>
	<?php endforeach; ?>
		
	<?php foreach($y2mark2015s as $k): ?>
		<?php $x1y2mark2015s = $k->Vh_control ?>
		<?php $x2y2mark2015s = $k->KR_1 ?>
		<?php $x3y2mark2015s = $k->KR_2 ?>
		<?php $x4y2mark2015s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y3mark2015s as $k): ?>
		<?php $x1y3mark2015s = $k->Vh_control ?>
		<?php $x2y3mark2015s = $k->KR_1 ?>
		<?php $x3y3mark2015s = $k->KR_2 ?>
		<?php $x4y3mark2015s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y4mark2015s as $k): ?>
		<?php $x1y4mark2015s = $k->Vh_control ?>
		<?php $x2y4mark2015s = $k->KR_1 ?>
		<?php $x3y4mark2015s = $k->KR_2 ?>
		<?php $x4y4mark2015s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y5mark2015s as $k): ?>
		<?php $x1y5mark2015s = $k->Vh_control ?>
		<?php $x2y5mark2015s = $k->KR_1 ?>
		<?php $x3y5mark2015s = $k->KR_2 ?>
		<?php $x4y5mark2015s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($stud2015skor as $k): ?>
		<?php $kol15skor+=1 ?>
	<?php endforeach; ?>

	<?php foreach($stud2015pov as $k): ?>
		<?php $kol15pov+=1 ?>
	<?php endforeach; ?>

<?php/* 2016 */?>
	<?php/* Повний */?>
	<?php foreach($y1mark2016 as $k): ?>
		<?php $x1y1mark2016 = $k->Vh_control ?>
		<?php $x2y1mark2016 = $k->KR_1 ?>
		<?php $x3y1mark2016 = $k->KR_2 ?>
		<?php $x4y1mark2016 = $k->View_id ?>
	<?php endforeach; ?>
		
	<?php foreach($y2mark2016 as $k): ?>
		<?php $x1y2mark2016 = $k->Vh_control ?>
		<?php $x2y2mark2016 = $k->KR_1 ?>
		<?php $x3y2mark2016 = $k->KR_2 ?>
		<?php $x4y2mark2016 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y3mark2016 as $k): ?>
		<?php $x1y3mark2016 = $k->Vh_control ?>
		<?php $x2y3mark2016 = $k->KR_1 ?>
		<?php $x3y3mark2016 = $k->KR_2 ?>
		<?php $x4y3mark2016 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y4mark2016 as $k): ?>
		<?php $x1y4mark2016 = $k->Vh_control ?>
		<?php $x2y4mark2016 = $k->KR_1 ?>
		<?php $x3y4mark2016 = $k->KR_2 ?>
		<?php $x4y4mark2016 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y5mark2016 as $k): ?>
		<?php $x1y5mark2016 = $k->Vh_control ?>
		<?php $x2y5mark2016 = $k->KR_1 ?>
		<?php $x3y5mark2016 = $k->KR_2 ?>
		<?php $x4y5mark2016 = $k->View_id ?>
	<?php endforeach; ?>

	<?php/* Прискорений */?>
	<?php foreach($y1mark2016s as $k): ?>
		<?php $x1y1mark2016s = $k->Vh_control ?>
		<?php $x2y1mark2016s = $k->KR_1 ?>
		<?php $x3y1mark2016s = $k->KR_2 ?>
		<?php $x4y1mark2016s = $k->View_id ?>
	<?php endforeach; ?>
		
	<?php foreach($y2mark2016s as $k): ?>
		<?php $x1y2mark2016s = $k->Vh_control ?>
		<?php $x2y2mark2016s = $k->KR_1 ?>
		<?php $x3y2mark2016s = $k->KR_2 ?>
		<?php $x4y2mark2016s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y3mark2016s as $k): ?>
		<?php $x1y3mark2016s = $k->Vh_control ?>
		<?php $x2y3mark2016s = $k->KR_1 ?>
		<?php $x3y3mark2016s = $k->KR_2 ?>
		<?php $x4y3mark2016s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y4mark2016s as $k): ?>
		<?php $x1y4mark2016s = $k->Vh_control ?>
		<?php $x2y4mark2016s = $k->KR_1 ?>
		<?php $x3y4mark2016s = $k->KR_2 ?>
		<?php $x4y4mark2016s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y5mark2016s as $k): ?>
		<?php $x1y5mark2016s = $k->Vh_control ?>
		<?php $x2y5mark2016s = $k->KR_1 ?>
		<?php $x3y5mark2016s = $k->KR_2 ?>
		<?php $x4y5mark2016s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($stud2016skor as $k): ?>
		<?php $kol16skor+=1 ?>
	<?php endforeach; ?>

	<?php foreach($stud2016pov as $k): ?>
		<?php $kol16pov+=1 ?>
	<?php endforeach; ?>

<?php/* 2017 */?>
	<?php/* Повний */?>
	<?php foreach($y1mark2017 as $k): ?>
		<?php $x1y1mark2017 = $k->Vh_control ?>
		<?php $x2y1mark2017 = $k->KR_1 ?>
		<?php $x3y1mark2017 = $k->KR_2 ?>
		<?php $x4y1mark2017 = $k->View_id ?>
	<?php endforeach; ?>
		
	<?php foreach($y2mark2017 as $k): ?>
		<?php $x1y2mark2017 = $k->Vh_control ?>
		<?php $x2y2mark2017 = $k->KR_1 ?>
		<?php $x3y2mark2017 = $k->KR_2 ?>
		<?php $x4y2mark2017 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y3mark2017 as $k): ?>
		<?php $x1y3mark2017 = $k->Vh_control ?>
		<?php $x2y3mark2017 = $k->KR_1 ?>
		<?php $x3y3mark2017 = $k->KR_2 ?>
		<?php $x4y3mark2017 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y4mark2017 as $k): ?>
		<?php $x1y4mark2017 = $k->Vh_control ?>
		<?php $x2y4mark2017 = $k->KR_1 ?>
		<?php $x3y4mark2017 = $k->KR_2 ?>
		<?php $x4y4mark2017 = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y5mark2017 as $k): ?>
		<?php $x1y5mark2017 = $k->Vh_control ?>
		<?php $x2y5mark2017 = $k->KR_1 ?>
		<?php $x3y5mark2017 = $k->KR_2 ?>
		<?php $x4y5mark2017 = $k->View_id ?>
	<?php endforeach; ?>

	<?php/* Прискорений */?>
	<?php foreach($y1mark2017s as $k): ?>
		<?php $x1y1mark2017s = $k->Vh_control ?>
		<?php $x2y1mark2017s = $k->KR_1 ?>
		<?php $x3y1mark2017s = $k->KR_2 ?>
		<?php $x4y1mark2017s = $k->View_id ?>
	<?php endforeach; ?>
		
	<?php foreach($y2mark2017s as $k): ?>
		<?php $x1y2mark2017s = $k->Vh_control ?>
		<?php $x2y2mark2017s = $k->KR_1 ?>
		<?php $x3y2mark2017s = $k->KR_2 ?>
		<?php $x4y2mark2017s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y3mark2017s as $k): ?>
		<?php $x1y3mark2017s = $k->Vh_control ?>
		<?php $x2y3mark2017s = $k->KR_1 ?>
		<?php $x3y3mark2017s = $k->KR_2 ?>
		<?php $x4y3mark2017s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y4mark2017s as $k): ?>
		<?php $x1y4mark2017s = $k->Vh_control ?>
		<?php $x2y4mark2017s = $k->KR_1 ?>
		<?php $x3y4mark2017s = $k->KR_2 ?>
		<?php $x4y4mark2017s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($y5mark2017s as $k): ?>
		<?php $x1y5mark2017s = $k->Vh_control ?>
		<?php $x2y5mark2017s = $k->KR_1 ?>
		<?php $x3y5mark2017s = $k->KR_2 ?>
		<?php $x4y5mark2017s = $k->View_id ?>
	<?php endforeach; ?>

	<?php foreach($stud2017skor as $k): ?>
		<?php $kol17skor+=1 ?>
	<?php endforeach; ?>

	<?php foreach($stud2017pov as $k): ?>
		<?php $kol17pov+=1 ?>
	<?php endforeach; ?>
<?php $maxp = 100; ?>
	
	<?php 
		$masItL = array(62,38,68,18,64,16,100,24,58,22,64,20);
		$masItLR = array(74,20,80,10,68,20,72,24,76,24,78,18);
		$masTprL = array(54,38,70,18,66,20,70,22,74,18,56,24);
		$masTprLR = array(100,34,120,22,110,24,104,26,112,20,116,22);
		$masTziL = array(66,36,54,16,72,20,70,22,64,24,68,26);
		$masTziLR = array(54,28,60,8,58,22,62,24,54,28,56,26);
		$masMiiL = array(78,38,100,18,84,18,86,18,76,18,68,18);
		$masMiiLR = array(64,24,90,8,78,22,82,26,86,24,76,22);
		$masNsL = array(66,36,64,14,62,16,68,18,70,20,68,18);
		$masNsLR = array(54,26,60,10,58,24,66,22,62,24,68,20);
	?>

	<?php 
		$tpr = 80; $tzi = 60; 
		$miipov = 80; $nspov = 59;
		$miiskor = 55; $nsskor = 55;
		$it = 55; 	
	?>

	<?php $h1 = array(); $h2 = array(); $h1s = array(); $h2s = array(); ?>

	<?php foreach($newmark1 as $k): ?>	
		<?php $k->Plan_id ?>
		<?php $k->discipline->Discipline_name ?>
		<?php $h1[] = $k->Lecture_hours ?>
		<?php $h2[] = $k->LR_hours ?>
	<?php endforeach; ?>

	<?php foreach($newmark1s as $k): ?>	
		<?php $k->Plan_id ?>
		<?php $k->discipline->Discipline_name ?>
		<?php $h1s[] = $k->Lecture_hours ?>
		<?php $h2s[] = $k->LR_hours ?>
	<?php endforeach; ?>







<button id='triggerOcenki' class="btn btn-info center-block" data-text-show="Сховати оцінки з дисциплін"
 	data-text-hide="Показати оцінки з дисциплін">
 	Показати оцінки з дисциплін
</button><br>

<div id='box3' style="display:none;"> 

<h1 class="text-center">Підсумки проміжного контролю з дисциплін</h1>    <br> 
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
        <tr> 
        	<th colspan='3'></th>       
            <th colspan='3'>2012 рiк</th>
            <th colspan='3'>2013 рiк</th>
            <th colspan='3'>2014 рiк</th>
            <th colspan='3'>2015 рiк</th>
            <th colspan='3'>2016 рiк</th>
            <th colspan='3'>2017 рiк</th>
        </tr>
    </thead>
<tbody class="contant1">
        <tr>
        	<td colspan='3'></td>
            <td>П</td>
			<td>ПС</td>
            <td>СР</td>
            <td>П</td>
			<td>ПС</td>
            <td>СР</td>
            <td>П</td>
			<td>ПС</td>
            <td>СР</td>
            <td>П</td>
			<td>ПС</td>
            <td>СР</td>
            <td>П</td>
			<td>ПС</td>
            <td>СР</td>
            <td>П</td>
			<td>ПС</td>
            <td>СР</td>
        </tr>
		

		<!-- Дисциплина ИТ 1-->
		
		<tr>
        	<td rowspan='5'>Управління IT-проектами</td>
        	<td rowspan='3'>Успішність</td>
        	<td>Лекції</td> 
            <td><?= $O12012 = number_format($maxp * ($x1y1mark2012 + $x2y1mark2012) / ($kol12pov * (Max($max12) + $x3y1mark2012)),3,'.', '') ?></td>
			<td><?= $Y12012 = number_format($maxp * ($x1y1mark2012s + $x2y1mark2012s) / ($kol12skor * (Max($max12) + $x3y1mark2012s)),3,'.', '') ?></td>
            <td><?= $P1arrSR2[] = number_format(($O12012+$Y12012)/2,3,'.', '') ?></td>
            <td><?= $O12013 = number_format($maxp * ($x1y1mark2013 + $x2y1mark2013) / ($kol13pov * (Max($max12) + $x3y1mark2013)),3,'.', '') ?></td>
			<td><?= $Y12013 = number_format($maxp * ($x1y1mark2013s + $x2y1mark2013s) / ($kol13skor * (Max($max12) + $x3y1mark2013s)),3,'.', '') ?></td>
            <td><?= $P1arrSR3[] = number_format(($O12013+$Y12013)/2,3,'.', '') ?></td>
            <td><?= $O12014 = number_format($maxp * ($x1y1mark2014 + $x2y1mark2014) / ($kol14pov * (Max($max12) + $x3y1mark2014)),3,'.', '') ?></td>
			<td><?= $Y12014 = number_format($maxp * ($x1y1mark2014s + $x2y1mark2014s) / ($kol14skor * (Max($max12) + $x3y1mark2014s)),3,'.', '') ?></td>
            <td><?= $P1arrSR4[] = number_format(($O12014+$Y12014)/2,3,'.', '') ?></td>
            <td><?= $O12015 = number_format($maxp * ($x1y1mark2015 + $x2y1mark2015) / ($kol15pov * (Max($max12) + $x3y1mark2015)),3,'.', '') ?></td>
			<td><?= $Y12015 = number_format($maxp * ($x1y1mark2015s + $x2y1mark2015s) / ($kol15skor * (Max($max12) + $x3y1mark2015s)),3,'.', '') ?></td>
            <td><?= $P1arrSR5[] = number_format(($O12015+$Y12015)/2,3,'.', '') ?></td>
            <td><?= $O12016 = number_format($maxp * ($x1y1mark2016 + $x2y1mark2016) / ($kol16pov * (Max($max12) + $x3y1mark2016)),3,'.', '') ?></td>
			<td><?= $Y12016 = number_format(($x1y1mark2016s + $x2y1mark2016s) / ($kol16skor * (Max($max12) + $x3y1mark2016s)),3,'.', '') ?></td>
            <td><?= $P1arrSR6[] = number_format(($O12016+$Y12016)/2,3,'.', '') ?></$maxp * td>
            <td><?= $O12017 = number_format($maxp * ($x1y1mark2017 + $x2y1mark2017) / ($kol17pov * (Max($max12) + $x3y1mark2017)),3,'.', '') ?></td>
			<td><?= $Y12017 = number_format($maxp * ($x1y1mark2017s + $x2y1mark2017s) / ($kol17skor * (Max($max12) + $x3y1mark2017s)),3,'.', '') ?></td>
            <td><?= $P1arrSR7[] = number_format(($O12017+$Y12017)/2,3,'.', '') ?></td>
        </tr>
		
         <tr>
        	<td>ЛР</td>
            <td><?= $OL12012 = number_format($maxp * $x4y1mark2012 / ($it * $kol12pov),3,'.', '') ?></td>
			<td><?= $YL12012 = number_format($maxp * $x4y1mark2012s / ($it * $kol12skor),3,'.', '') ?></td>
            <td><?= $P1arrSR2[] = number_format(($OL12012+$YL12012)/2,3,'.', '') ?></td>
            <td><?= $OL12013 = number_format($maxp * $x4y1mark2013 / ($it * $kol13pov),3,'.', '') ?></td>
			<td><?= $YL12013 = number_format($maxp * $x4y1mark2013s / ($it * $kol13skor),3,'.', '') ?></td>
            <td><?= $P1arrSR3[] = number_format(($OL12013+$YL12013)/2,3,'.', '') ?></td>
            <td><?= $OL12014 = number_format($maxp * $x4y1mark2014 / ($it * $kol14pov),3,'.', '') ?></td>
			<td><?= $YL12014 = number_format($maxp * $x4y1mark2014s / ($it * $kol14skor),3,'.', '') ?></td>
            <td><?= $P1arrSR4[] = number_format(($OL12014+$YL12014)/2,3,'.', '') ?></td>
            <td><?= $OL12015 = number_format($maxp * $x4y1mark2015 / ($it * $kol15pov),3,'.', '') ?></td>
			<td><?= $YL12015 = number_format($maxp * $x4y1mark2015s / ($it * $kol15skor),3,'.', '') ?></td>
            <td><?= $P1arrSR5[] = number_format(($OL12015+$YL12015)/2,3,'.', '') ?></td>
            <td><?= $OL12016 = number_format($maxp * $x4y1mark2016 / ($it * $kol16pov),3,'.', '') ?></td>
			<td><?= $YL12016 = number_format($maxp * $x4y1mark2016s / ($it * $kol16skor),3,'.', '') ?></td>
            <td><?= $P1arrSR6[] = number_format(($OL12016+$YL12016)/2,3,'.', '') ?></td>
            <td><?= $OL12017 = number_format($maxp * $x4y1mark2017 / ($it * $kol17pov),3,'.', '') ?></td>
			<td><?= $YL12017 = number_format($maxp * $x4y1mark2017s / ($it * $kol17skor),3,'.', '') ?></td>
            <td><?= $P1arrSR7[] = number_format(($OL12017+$YL12017)/2,3,'.', '') ?></td>
        </tr>

        <tr>
        	<td>Підсумок</td>
            <td><?php foreach($y1mark2012 as $k): ?>
				<?= $Op12012 = number_format($maxp * $k->Sum_mark / ($maxp * $kol12pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y1mark2012s as $k): ?>
				<?= $Yp12012 = number_format($maxp * $k->Sum_mark / ($maxp * $kol12skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P1arrSR2[] = number_format(($Op12012+$Yp12012)/2,3,'.', '') ?></td>
            <td><?php foreach($y1mark2013 as $k): ?>
				<?= $Op12013 = number_format($maxp * $k->Sum_mark / ($maxp * $kol13pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y1mark2013s as $k): ?>
				<?= $Yp12013 = number_format($maxp * $k->Sum_mark / ($maxp * $kol13skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P1arrSR3[] = number_format(($Op12013+$Yp12013)/2,3,'.', '') ?></td>
            <td><?php foreach($y1mark2014 as $k): ?>
				<?= $Op12014 = number_format($maxp * $k->Sum_mark / ($maxp * $kol14pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y1mark2014s as $k): ?>
				<?= $Yp12014 = number_format($maxp * $k->Sum_mark / ($maxp * $kol14skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P1arrSR4[] = number_format(($Op12014+$Yp12014)/2,3,'.', '') ?></td>
            <td><?php foreach($y1mark2015 as $k): ?>
				<?= $Op12015 = number_format($maxp * $k->Sum_mark / ($maxp * $kol15pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y1mark2015s as $k): ?>
				<?= $Yp12015 = number_format($maxp * $k->Sum_mark / ($maxp * $kol15skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P1arrSR5[] = number_format(($Op12015+$Yp12015)/2,3,'.', '') ?></td>
            <td><?php foreach($y1mark2016 as $k): ?>
				<?= $Op12016 = number_format($maxp * $k->Sum_mark / ($maxp * $kol16pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y1mark2016s as $k): ?>
				<?= $Yp12016 = number_format($maxp * $k->Sum_mark / ($maxp * $kol16skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P1arrSR6[] = number_format(($Op12016+$Yp12016)/2,3,'.', '') ?></td>
            <td><?php foreach($y1mark2017 as $k): ?>
				<?= $Op12017 = number_format($maxp * $k->Sum_mark / ($maxp * $kol17pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y1mark2017s as $k): ?>
				<?= $Yp12017 = number_format($maxp * $k->Sum_mark / ($maxp * $kol17skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P1arrSR7[] = number_format(($Op12017+$Yp12017)/2,3,'.', '') ?></td>
        </tr>
        
        <tr>
        	<td rowspan='2'>Відвідуваність</td>
        	<td>Л</td>
            <td><?= $Ov12012 = number_format(100 - (($masItL[0] / ($kol12pov*$h1[3])*100)),3,'.', '') ?></td>
			<td><?= $Yv12012 = number_format(100 - (($masItL[1] / ($kol12skor*$h1s[0])*100)),3,'.', '') ?></td>
            <td><?= $P1arrSR2[] = number_format(($Ov12012+$Yv12012)/2,3,'.', '') ?></td>
            <td><?= $Ov12013 = number_format(100 - (($masItL[2] / ($kol13pov*$h1[3])*100)),3,'.', '') ?></td>
			<td><?= $Yv12013 = number_format(100 - (($masItL[3] / ($kol13skor*$h1s[0])*100)),3,'.', '') ?></td>
            <td><?= $P1arrSR3[] = number_format(($Ov12013+$Yv12013)/2,3,'.', '') ?></td>
            <td><?= $Ov12014 = number_format(100 - (($masItL[4] / ($kol14pov*$h1[3])*100)),3,'.', '') ?></td>
			<td><?= $Yv12014 = number_format(100 - (($masItL[5] / ($kol14skor*$h1s[0])*100)),3,'.', '') ?></td>
            <td><?= $P1arrSR4[] = number_format(($Ov12014+$Yv12014)/2,3,'.', '') ?></td>
            <td><?= $Ov12015 = number_format(100 - (($masItL[6] / ($kol14pov*$h1[3])*100)),3,'.', '') ?></td>
			<td><?= $Yv12015 = number_format(100 - (($masItL[7] / ($kol14skor*$h1s[0])*100)),3,'.', '') ?></td>
            <td><?= $P1arrSR5[] = number_format(($Ov12015+$Yv12015)/2,3,'.', '') ?></td>
            <td><?= $Ov12016 = number_format(100 - (($masItL[8] / ($kol14pov*$h1[3])*100)),3,'.', '') ?></td>
			<td><?= $Yv12016 = number_format(100 - (($masItL[9] / ($kol14skor*$h1s[0])*100)),3,'.', '') ?></td>
            <td><?= $P1arrSR6[] = number_format(($Ov12016+$Yv12016)/2,3,'.', '') ?></td>
            <td><?= $Ov12017 = number_format(100 - (($masItL[10] / ($kol14pov*$h1[3])*100)),3,'.', '') ?></td>
			<td><?= $Yv12017 = number_format(100 - (($masItL[11] / ($kol14skor*$h1s[0])*100)),3,'.', '') ?></td>
            <td><?= $P1arrSR7[] = number_format(($Ov12017+$Yv12017)/2,3,'.', '') ?></td>
        </tr>

        <tr>
            <td>ЛР</td>
            <td><?= $Oh12012 = number_format(100 - (($masItLR[0] / ($kol12pov*$h2[3])*100)),3,'.', '') ?></td>
			<td><?= $Yh12012 = number_format(100 - (($masItLR[1] / ($kol12skor*$h2s[0])*100)),3,'.', '') ?></td>
            <td><?= $P1arrSR2[] = number_format(($Oh12012+$Yh12012)/2,3,'.', '') ?></td>
            <td><?= $Oh12013 = number_format(100 - (($masItLR[2] / ($kol13pov*$h2[3])*100)),3,'.', '') ?></td>
			<td><?= $Yh12013 = number_format(100 - (($masItLR[3] / ($kol13skor*$h2s[0])*100)),3,'.', '') ?></td>
            <td><?= $P1arrSR3[] = number_format(($Oh12013+$Yh12013)/2,3,'.', '') ?></td>
            <td><?= $Oh12014 = number_format(100 - (($masItLR[4] / ($kol14pov*$h2[3])*100)),3,'.', '') ?></td>
			<td><?= $Yh12014 = number_format(100 - (($masItLR[5] / ($kol14skor*$h2s[0])*100)),3,'.', '') ?></td>
            <td><?= $P1arrSR4[] = number_format(($Oh12014+$Yh12014)/2,3,'.', '') ?></td>
            <td><?= $Oh12015 = number_format(100 - (($masItLR[6] / ($kol14pov*$h2[3])*100)),3,'.', '') ?></td>
			<td><?= $Yh12015 = number_format(100 - (($masItLR[7] / ($kol14skor*$h2s[0])*100)),3,'.', '') ?></td>
            <td><?= $P1arrSR5[] = number_format(($Oh12015+$Yh12015)/2,3,'.', '') ?></td>
            <td><?= $Oh12016 = number_format(100 - (($masItLR[8] / ($kol14pov*$h2[3])*100)),3,'.', '') ?></td>
			<td><?= $Yh12016 = number_format(100 - (($masItLR[9] / ($kol14skor*$h2s[0])*100)),3,'.', '') ?></td>
            <td><?= $P1arrSR6[] = number_format(($Oh12016+$Yh12016)/2,3,'.', '') ?></td>
            <td><?= $Oh12017 = number_format(100 - (($masItLR[10] / ($kol14pov*$h2[3])*100)),3,'.', '') ?></td>
			<td><?= $Yh12017 = number_format(100 - (($masItLR[11] / ($kol14skor*$h2s[0])*100)),3,'.', '') ?></td>
            <td><?= $P1arrSR7[] = number_format(($Oh12017+$Yh12017)/2,3,'.', '') ?></td>
        </tr>
<!-- Дисциплина ТПР 2-->
        
		 <tr>
        	<td rowspan='5'>ТПР</td>
        	<td rowspan='3'>Успішність</td>
        	<td>Лекції</td>
            <td><?= $O22012 = number_format($maxp * ($x1y2mark2012 + $x2y2mark2012) / ($kol12pov * (Max($max12) + $x3y2mark2012)),3,'.', '') ?></td>
			<td><?= $Y22012 = number_format($maxp * ($x1y2mark2012s + $x2y2mark2012s) / ($kol12skor * (Max($max12) + $x3y2mark2012s)),3,'.', '') ?></td>
            <td><?= $P2arrSR2[] = number_format(($O22012+$Y22012)/2,3,'.', '') ?></td>
            <td><?= $O22013 = number_format($maxp * ($x1y2mark2013 + $x2y2mark2013) / ($kol13pov * (Max($max12) + $x3y2mark2013)),3,'.', '') ?></td>
			<td><?= $Y22013 = number_format($maxp * ($x1y2mark2013s + $x2y2mark2013s) / ($kol13skor * (Max($max12) + $x3y2mark2013s)),3,'.', '') ?></td>
            <td><?= $P2arrSR3[] = number_format(($O22013+$Y22013)/2,3,'.', '') ?></td>
            <td><?= $O22014 = number_format($maxp * ($x1y2mark2014 + $x2y2mark2014) / ($kol14pov * (Max($max12) + $x3y2mark2014)),3,'.', '') ?></td>
			<td><?= $Y22014 = number_format($maxp * ($x1y2mark2014s + $x2y2mark2014s) / ($kol14skor * (Max($max12) + $x3y2mark2014s)),3,'.', '') ?></td>
            <td><?= $P2arrSR4[] = number_format(($O22014+$Y22014)/2,3,'.', '') ?></td>
            <td><?= $O22015 = number_format($maxp * ($x1y2mark2015 + $x2y2mark2015) / ($kol15pov * (Max($max12) + $x3y2mark2015)),3,'.', '') ?></td>
			<td><?= $Y22015 = number_format($maxp * ($x1y2mark2015s + $x2y2mark2015s) / ($kol15skor * (Max($max12) + $x3y2mark2015s)),3,'.', '') ?></td>
            <td><?= $P2arrSR5[] = number_format(($O22015+$Y22015)/2,3,'.', '') ?></td>
            <td><?= $O22016 = number_format($maxp * ($x1y2mark2016 + $x2y2mark2016) / ($kol16pov * (Max($max12) + $x3y2mark2016)),3,'.', '') ?></td>
			<td><?= $Y22016 = number_format($maxp * ($x1y2mark2016s + $x2y2mark2016s) / ($kol16skor * (Max($max12) + $x3y2mark2016s)),3,'.', '') ?></td>
            <td><?= $P2arrSR6[] = number_format(($O22016+$Y22016)/2,3,'.', '') ?></td>
            <td><?= $O22017 = number_format($maxp * ($x1y2mark2017 + $x2y2mark2017) / ($kol17pov * (Max($max12) + $x3y2mark2017)),3,'.', '') ?></td>
			<td><?= $Y22017 = number_format($maxp * ($x1y2mark2017s + $x2y2mark2017s) / ($kol17skor * (Max($max12) + $x3y2mark2017s)),3,'.', '') ?></td>
            <td><?= $P2arrSR7[] = number_format(($O22017+$Y22017)/2,3,'.', '') ?></td>
        </tr>

         <tr>
        	<td>ЛР</td>
            <td><?= $OL22012 = number_format($maxp * $x4y2mark2012 / ($tpr * $kol12pov),3,'.', '') ?></td>
			<td><?= $YL22012 = number_format($maxp * $x4y2mark2012s / ($tpr * $kol12skor),3,'.', '') ?></td>
            <td><?= $P2arrSR2[] = number_format(($OL22012+$YL22012)/2,3,'.', '') ?></td>
            <td><?= $OL22013 = number_format($maxp * $x4y2mark2013 / ($tpr * $kol13pov),3,'.', '') ?></td>
			<td><?= $YL22013 = number_format($maxp * $x4y2mark2013s / ($tpr * $kol13skor),3,'.', '') ?></td>
            <td><?= $P2arrSR3[] = number_format(($OL22013+$YL22013)/2,3,'.', '') ?></td>
            <td><?= $OL22014 = number_format($maxp * $x4y2mark2014 / ($tpr * $kol14pov),3,'.', '') ?></td>
			<td><?= $YL22014 = number_format($maxp * $x4y2mark2014s / ($tpr * $kol14skor),3,'.', '') ?></td>
            <td><?= $P2arrSR4[] = number_format(($OL22014+$YL22014)/2,3,'.', '') ?></td>
            <td><?= $OL22015 = number_format($maxp * $x4y2mark2015 / ($tpr * $kol15pov),3,'.', '') ?></td>
			<td><?= $YL22015 = number_format($maxp * $x4y2mark2015s / ($tpr * $kol15skor),3,'.', '') ?></td>
            <td><?= $P2arrSR5[] = number_format(($OL22015+$YL22015)/2,3,'.', '') ?></td>
            <td><?= $OL22016 = number_format($maxp * $x4y2mark2016 / ($tpr * $kol16pov),3,'.', '') ?></td>
			<td><?= $YL22016 = number_format($maxp * $x4y2mark2016s / ($tpr * $kol16skor),3,'.', '') ?></td>
            <td><?= $P2arrSR6[] = number_format(($OL22016+$YL22016)/2,3,'.', '') ?></td>
            <td><?= $OL22017 = number_format($maxp * $x4y2mark2017 / ($tpr * $kol17pov),3,'.', '') ?></td>
			<td><?= $YL22017 = number_format($maxp * $x4y2mark2017s / ($tpr * $kol17skor),3,'.', '') ?></td>
            <td><?= $P2arrSR7[] = number_format(($OL22017+$YL22017)/2,3,'.', '') ?></td>
        </tr>

        <tr>
        	<td>Підсумок</td>
            <td><?php foreach($y2mark2012 as $k): ?>
				<?= $Op22012 = number_format($maxp * $k->Sum_mark / ($maxp * $kol12pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y2mark2012s as $k): ?>
				<?= $Yp22012 = number_format($maxp * $k->Sum_mark / ($maxp * $kol12skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P2arrSR2[] = number_format(($Op22012+$Yp22012)/2,3,'.', '') ?></td>
            <td><?php foreach($y2mark2013 as $k): ?>
				<?= $Op22013 = number_format($maxp * $k->Sum_mark / ($maxp * $kol13pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y2mark2013s as $k): ?>
				<?= $Yp22013 = number_format($maxp * $k->Sum_mark / ($maxp * $kol13skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P2arrSR3[] = number_format(($Op22013+$Yp22013)/2,3,'.', '') ?></td>
            <td><?php foreach($y2mark2014 as $k): ?>
				<?= $Op22014 = number_format($maxp * $k->Sum_mark / ($maxp * $kol14pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y2mark2014s as $k): ?>
				<?= $Yp22014 = number_format($maxp * $k->Sum_mark / ($maxp * $kol14skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P2arrSR4[] = number_format(($Op22014+$Yp22014)/2,3,'.', '') ?></td>
            <td><?php foreach($y2mark2015 as $k): ?>
				<?= $Op22015 = number_format($maxp * $k->Sum_mark / ($maxp * $kol15pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y2mark2015s as $k): ?>
				<?= $Yp22015 = number_format($maxp * $k->Sum_mark / ($maxp * $kol15skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P2arrSR5[] = number_format(($Op22015+$Yp22015)/2,3,'.', '') ?></td>
            <td><?php foreach($y2mark2016 as $k): ?>
				<?= $Op22016 = number_format($maxp * $k->Sum_mark / ($maxp * $kol16pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y2mark2016s as $k): ?>
				<?= $Yp22016 = number_format($maxp * $k->Sum_mark / ($maxp * $kol16skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P2arrSR6[] = number_format(($Op22016+$Yp22016)/2,3,'.', '') ?></td>
            <td><?php foreach($y2mark2017 as $k): ?>
				<?= $Op22017 = number_format($maxp * $k->Sum_mark / ($maxp * $kol17pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y2mark2017s as $k): ?>
				<?= $Yp22017 = number_format($maxp * $k->Sum_mark / ($maxp * $kol17skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P2arrSR7[] = number_format(($Op22017+$Yp22017)/2,3,'.', '') ?></td>
        </tr>

        <tr>
        	<td rowspan='2'>Відвідуваність</td>
        	<td>Л</td>
            <td><?= $Ov22012 = number_format(100 - (($masTprL[0] / ($kol12pov*$h1[1])*100)),3,'.', '') ?></td>
			<td><?= $Yv22012 = number_format(100 - (($masTprL[1] / ($kol12skor*$h1s[1])*100)),3,'.', '') ?></td>
            <td><?= $P2arrSR2[] = number_format(($Ov22012+$Yv22012)/2,3,'.', '') ?></td>
            <td><?= $Ov22013 = number_format(100 - (($masTprL[2] / ($kol13pov*$h1[1])*100)),3,'.', '') ?></td>
			<td><?= $Yv22013 = number_format(100 - (($masTprL[3] / ($kol13skor*$h1s[1])*100)),3,'.', '') ?></td>
            <td><?= $P2arrSR3[] = number_format(($Ov22013+$Yv22013)/2,3,'.', '') ?></td>
            <td><?= $Ov22014 = number_format(100 - (($masTprL[4] / ($kol14pov*$h1[1])*100)),3,'.', '') ?></td>
			<td><?= $Yv22014 = number_format(100 - (($masTprL[5] / ($kol14skor*$h1s[1])*100)),3,'.', '') ?></td>
            <td><?= $P2arrSR4[] = number_format(($Ov22014+$Yv22014)/2,3,'.', '') ?></td>
            <td><?= $Ov22015 = number_format(100 - (($masTprL[6] / ($kol14pov*$h1[1])*100)),3,'.', '') ?></td>
			<td><?= $Yv22015 = number_format(100 - (($masTprL[7] / ($kol14skor*$h1s[1])*100)),3,'.', '') ?></td>
            <td><?= $P2arrSR5[] = number_format(($Ov22015+$Yv22015)/2,3,'.', '') ?></td>
            <td><?= $Ov22016 = number_format(100 - (($masTprL[8] / ($kol14pov*$h1[1])*100)),3,'.', '') ?></td>
			<td><?= $Yv22016 = number_format(100 - (($masTprL[9] / ($kol14skor*$h1s[1])*100)),3,'.', '') ?></td>
            <td><?= $P2arrSR6[] = number_format(($Ov22016+$Yv22016)/2,3,'.', '') ?></td>
            <td><?= $Ov22017 = number_format(100 - (($masTprL[10] / ($kol14pov*$h1[1])*100)),3,'.', '') ?></td>
			<td><?= $Yv22017 = number_format(100 - (($masTprL[11] / ($kol14skor*$h1s[1])*100)),3,'.', '') ?></td>
            <td><?= $P2arrSR7[] = number_format(($Ov22017+$Yv22017)/2,3,'.', '') ?></td>
        </tr>

        <tr>
            <td>ЛР</td>
            <td><?= $Oh22012 = number_format(100 - (($masTprLR[0] / ($kol12pov*$h2[1])*100)),3,'.', '') ?></td>
			<td><?= $Yh22012 = number_format(100 - (($masTprLR[1] / ($kol12skor*$h2s[1])*100)),3,'.', '') ?></td>
            <td><?= $P2arrSR2[] = number_format(($Oh22012+$Yh22012)/2,3,'.', '') ?></td>
            <td><?= $Oh22013 = number_format(100 - (($masTprLR[2] / ($kol13pov*$h2[1])*100)),3,'.', '') ?></td>
			<td><?= $Yh22013 = number_format(100 - (($masTprLR[3] / ($kol13skor*$h2s[1])*100)),3,'.', '') ?></td>
            <td><?= $P2arrSR3[] = number_format(($Oh22013+$Yh22013)/2,3,'.', '') ?></td>
            <td><?= $Oh22014 = number_format(100 - (($masTprLR[4] / ($kol14pov*$h2[1])*100)),3,'.', '') ?></td>
			<td><?= $Yh22014 = number_format(100 - (($masTprLR[5] / ($kol14skor*$h2s[1])*100)),3,'.', '') ?></td>
            <td><?= $P2arrSR4[] = number_format(($Oh22014+$Yh22014)/2,3,'.', '') ?></td>
            <td><?= $Oh22015 = number_format(100 - (($masTprLR[6] / ($kol14pov*$h2[1])*100)),3,'.', '') ?></td>
			<td><?= $Yh22015 = number_format(100 - (($masTprLR[7] / ($kol14skor*$h2s[1])*100)),3,'.', '') ?></td>
            <td><?= $P2arrSR5[] = number_format(($Oh22015+$Yh22015)/2,3,'.', '') ?></td>
            <td><?= $Oh22016 = number_format(100 - (($masTprLR[8] / ($kol14pov*$h2[1])*100)),3,'.', '') ?></td>
			<td><?= $Yh22016 = number_format(100 - (($masTprLR[9] / ($kol14skor*$h2s[1])*100)),3,'.', '') ?></td>
            <td><?= $P2arrSR6[] = number_format(($Oh22016+$Yh22016)/2,3,'.', '') ?></td>
            <td><?= $Oh22017 = number_format(100 - (($masTprLR[10] / ($kol14pov*$h2[1])*100)),3,'.', '') ?></td>
			<td><?= $Yh22017 = number_format(100 - (($masTprLR[11] / ($kol14skor*$h2s[1])*100)),3,'.', '') ?></td>
            <td><?= $P2arrSR7[] = number_format(($Oh22017+$Yh22017)/2,3,'.', '') ?></td>
        </tr>

        <!-- Дисциплина 3 ТЗИ -->
		
		<tr>
        	<td rowspan='5'>ТЗI</td>
        	<td rowspan='3'>Успішність</td>
        	<td>Лекції</td>
            <td><?= $O32012 = number_format($maxp * ($x1y3mark2012 + $x2y3mark2012) / ($kol12pov * (Max($max12) + $x3y3mark2012)),3,'.', '') ?></td>
			<td><?= $Y32012 = number_format($maxp * ($x1y3mark2012s + $x2y3mark2012s) / ($kol12skor * (Max($max12) + $x3y3mark2012s)),3,'.', '') ?></td>
            <td><?= $P3arrSR2[] = number_format(($O32012+$Y32012)/2,3,'.', '') ?></td>
            <td><?= $O32013 = number_format($maxp * ($x1y3mark2013 + $x2y3mark2013) / ($kol13pov * (Max($max12) + $x3y3mark2013)),3,'.', '') ?></td>
			<td><?= $Y32013 = number_format($maxp * ($x1y3mark2013s + $x2y3mark2013s) / ($kol13skor * (Max($max12) + $x3y3mark2013s)),3,'.', '') ?></td>
            <td><?= $P3arrSR3[] = number_format(($O32013+$Y32013)/2,3,'.', '') ?></td>
            <td><?= $O32014 = number_format($maxp * ($x1y3mark2014 + $x2y3mark2014) / ($kol14pov * (Max($max12) + $x3y3mark2014)),3,'.', '') ?></td>
			<td><?= $Y32014 = number_format($maxp * ($x1y3mark2014s + $x2y3mark2014s) / ($kol14skor * (Max($max12) + $x3y3mark2014s)),3,'.', '') ?></td>
            <td><?= $P3arrSR4[] = number_format(($O32014+$Y32014)/2,3,'.', '') ?></td>
            <td><?= $O32015 = number_format($maxp * ($x1y3mark2015 + $x2y3mark2015) / ($kol15pov * (Max($max12) + $x3y3mark2015)),3,'.', '') ?></td>
			<td><?= $Y32015 = number_format($maxp * ($x1y3mark2015s + $x2y3mark2015s) / ($kol15skor * (Max($max12) + $x3y3mark2015s)),3,'.', '') ?></td>
            <td><?= $P3arrSR5[] = number_format(($O32015+$Y32015)/2,3,'.', '') ?></td>
            <td><?= $O32016 = number_format($maxp * ($x1y3mark2016 + $x2y3mark2016) / ($kol16pov * (Max($max12) + $x3y3mark2016)),3,'.', '') ?></td>
			<td><?= $Y32016 = number_format($maxp * ($x1y3mark2016s + $x2y3mark2016s) / ($kol16skor * (Max($max12) + $x3y3mark2016s)),3,'.', '') ?></td>
            <td><?= $P3arrSR6[] = number_format(($O32016+$Y32016)/2,3,'.', '') ?></td>
            <td><?= $O32017 = number_format($maxp * ($x1y3mark2017 + $x2y3mark2017) / ($kol17pov * (Max($max12) + $x3y3mark2017)),3,'.', '') ?></td>
			<td><?= $Y32017 = number_format($maxp * ($x1y3mark2017s + $x2y3mark2017s) / ($kol17skor * (Max($max12) + $x3y3mark2017s)),3,'.', '') ?></td>
            <td><?= $P3arrSR7[] = number_format(($O32017+$Y32017)/2,3,'.', '') ?></td>
        </tr>

        <tr>
        	<td>ЛР</td>
            <td><?= $OL32012 = number_format($maxp * $x4y3mark2012 / ($tzi * $kol12pov),3,'.', '') ?></td>
			<td><?= $YL32012 = number_format($maxp * $x4y3mark2012s / ($tzi * $kol12skor),3,'.', '') ?></td>
            <td><?= $P3arrSR2[] = number_format(($OL32012+$YL32012)/2,3,'.', '') ?></td>
            <td><?= $OL32013 = number_format($maxp * $x4y3mark2013 / ($tzi * $kol13pov),3,'.', '') ?></td>
			<td><?= $YL32013 = number_format($maxp * $x4y3mark2013s / ($tzi * $kol13skor),3,'.', '') ?></td>
            <td><?= $P3arrSR3[] = number_format(($OL32013+$YL32013)/2,3,'.', '') ?></td>
            <td><?= $OL32014 = number_format($maxp * $x4y3mark2014 / ($tzi * $kol14pov),3,'.', '') ?></td>
			<td><?= $YL32014 = number_format($maxp * $x4y3mark2014s / ($tzi * $kol14skor),3,'.', '') ?></td>
            <td><?= $P3arrSR4[] = number_format(($OL32014+$YL32014)/2,3,'.', '') ?></td>
            <td><?= $OL32015 = number_format($maxp * $x4y3mark2015 / ($tzi * $kol15pov),3,'.', '') ?></td>
			<td><?= $YL32015 = number_format($maxp * $x4y3mark2015s / ($tzi * $kol15skor),3,'.', '') ?></td>
            <td><?= $P3arrSR5[] = number_format(($OL32015+$YL32015)/2,3,'.', '') ?></td>
            <td><?= $OL32016 = number_format($maxp * $x4y3mark2016 / ($tzi * $kol16pov),3,'.', '') ?></td>
			<td><?= $YL32016 = number_format($maxp * $x4y3mark2016s / ($tzi * $kol16skor),3,'.', '') ?></td>
            <td><?= $P3arrSR6[] = number_format(($OL32016+$YL32016)/2,3,'.', '') ?></td>
            <td><?= $OL32017 = number_format($maxp * $x4y3mark2017 / ($tzi * $kol17pov),3,'.', '') ?></td>
			<td><?= $YL32017 = number_format($maxp * $x4y3mark2017s / ($tzi * $kol17skor),3,'.', '') ?></td>
            <td><?= $P3arrSR7[] = number_format(($OL32017+$YL32017)/2,3,'.', '') ?></td>
        </tr>

        <tr>
        	<td>Підсумок</td>
            <td><?php foreach($y3mark2012 as $k): ?>
				<?= $Op32012 = number_format($maxp * $k->Sum_mark / ($maxp * $kol12pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y3mark2012s as $k): ?>
				<?= $Yp32012 = number_format($maxp * $k->Sum_mark / ($maxp * $kol12skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P3arrSR2[] = number_format(($Op32012+$Yp32012)/2,3,'.', '') ?></td>
            <td><?php foreach($y3mark2013 as $k): ?>
				<?= $Op32013 = number_format($maxp * $k->Sum_mark / ($maxp * $kol13pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y3mark2013s as $k): ?>
				<?= $Yp32013 = number_format($maxp * $k->Sum_mark / ($maxp * $kol13skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P3arrSR3[] = number_format(($Op32013+$Yp32013)/2,3,'.', '') ?></td>
            <td><?php foreach($y3mark2014 as $k): ?>
				<?= $Op32014 = number_format($maxp * $k->Sum_mark / ($maxp * $kol14pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y3mark2014s as $k): ?>
				<?= $Yp32014 = number_format($maxp * $k->Sum_mark / ($maxp * $kol14skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P3arrSR4[] = number_format(($Op32014+$Yp32014)/2,3,'.', '') ?></td>
            <td><?php foreach($y3mark2015 as $k): ?>
				<?= $Op32015 = number_format($maxp * $k->Sum_mark / ($maxp * $kol15pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y3mark2015s as $k): ?>
				<?= $Yp32015 = number_format($maxp * $k->Sum_mark / ($maxp * $kol15skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P3arrSR5[] = number_format(($Op32015+$Yp32015)/2,3,'.', '') ?></td>
            <td><?php foreach($y3mark2016 as $k): ?>
				<?= $Op32016 = number_format($maxp * $k->Sum_mark / ($maxp * $kol16pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y3mark2016s as $k): ?>
				<?= $Yp32016 = number_format($maxp * $k->Sum_mark / ($maxp * $kol16skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P3arrSR6[] = number_format(($Op32016+$Yp32016)/2,3,'.', '') ?></td>
            <td><?php foreach($y3mark2017 as $k): ?>
				<?= $Op32017 = number_format($maxp * $k->Sum_mark / ($maxp * $kol17pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y3mark2017s as $k): ?>
				<?= $Yp32017 = number_format($maxp * $k->Sum_mark / ($maxp * $kol17skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P3arrSR7[] = number_format(($Op32017+$Yp32017)/2,3,'.', '') ?></td>
        </tr>

        <tr>
        	<td rowspan='2'>Відвідуваність</td>
        	<td>Л</td>
            <td><?= $Ov32012 = number_format(100 - (($masTziL[0] / ($kol12pov*$h1[4])*100)),3,'.', '') ?></td>
			<td><?= $Yv32012 = number_format(100 - (($masTziL[1] / ($kol12skor*$h1s[2])*100)),3,'.', '') ?></td>
            <td><?= $P3arrSR2[] = number_format(($Ov32012+$Yv32012)/2,3,'.', '') ?></td>
            <td><?= $Ov32013 = number_format(100 - (($masTziL[2] / ($kol13pov*$h1[4])*100)),3,'.', '') ?></td>
			<td><?= $Yv32013 = number_format(100 - (($masTziL[3] / ($kol13skor*$h1s[2])*100)),3,'.', '') ?></td>
            <td><?= $P3arrSR3[] = number_format(($Ov32013+$Yv32013)/2,3,'.', '') ?></td>
            <td><?= $Ov32014 = number_format(100 - (($masTziL[4] / ($kol14pov*$h1[4])*100)),3,'.', '') ?></td>
			<td><?= $Yv32014 = number_format(100 - (($masTziL[5] / ($kol14skor*$h1s[2])*100)),3,'.', '') ?></td>
            <td><?= $P3arrSR4[] = number_format(($Ov32014+$Yv32014)/2,3,'.', '') ?></td>
            <td><?= $Ov32015 = number_format(100 - (($masTziL[6] / ($kol14pov*$h1[4])*100)),3,'.', '') ?></td>
			<td><?= $Yv32015 = number_format(100 - (($masTziL[7] / ($kol14skor*$h1s[2])*100)),3,'.', '') ?></td>
            <td><?= $P3arrSR5[] = number_format(($Ov32015+$Yv32015)/2,3,'.', '') ?></td>
            <td><?= $Ov32016 = number_format(100 - (($masTziL[8] / ($kol14pov*$h1[4])*100)),3,'.', '') ?></td>
			<td><?= $Yv32016 = number_format(100 - (($masTziL[9] / ($kol14skor*$h1s[2])*100)),3,'.', '') ?></td>
            <td><?= $P3arrSR6[] = number_format(($Ov32016+$Yv32016)/2,3,'.', '') ?></td>
            <td><?= $Ov32017 = number_format(100 - (($masTziL[10] / ($kol14pov*$h1[4])*100)),3,'.', '') ?></td>
			<td><?= $Yv32017 = number_format(100 - (($masTziL[11] / ($kol14skor*$h1s[2])*100)),3,'.', '') ?></td>
            <td><?= $P3arrSR7[] = number_format(($Ov32017+$Yv32017)/2,3,'.', '') ?></td>
        </tr>

        <tr>
            <td>ЛР</td>
            <td><?= $Oh32012 = number_format(100 - (($masTziLR[0] / ($kol12pov*$h2[4])*100)),3,'.', '') ?></td>
			<td><?= $Yh32012 = number_format(100 - (($masTziLR[1] / ($kol12skor*$h2s[2])*100)),3,'.', '') ?></td>
            <td><?= $P3arrSR2[] = number_format(($Oh32012+$Yh32012)/2,3,'.', '') ?></td>
            <td><?= $Oh32013 = number_format(100 - (($masTziLR[2] / ($kol13pov*$h2[4])*100)),3,'.', '') ?></td>
			<td><?= $Yh32013 = number_format(100 - (($masTziLR[3] / ($kol13skor*$h2s[2])*100)),3,'.', '') ?></td>
            <td><?= $P3arrSR3[] = number_format(($Oh32013+$Yh32013)/2,3,'.', '') ?></td>
            <td><?= $Oh32014 = number_format(100 - (($masTziLR[4] / ($kol14pov*$h2[4])*100)),3,'.', '') ?></td>
			<td><?= $Yh32014 = number_format(100 - (($masTziLR[5] / ($kol14skor*$h2s[2])*100)),3,'.', '') ?></td>
            <td><?= $P3arrSR4[] = number_format(($Oh32014+$Yh32014)/2,3,'.', '') ?></td>
            <td><?= $Oh32015 = number_format(100 - (($masTziLR[6] / ($kol14pov*$h2[4])*100)),3,'.', '') ?></td>
			<td><?= $Yh32015 = number_format(100 - (($masTziLR[7] / ($kol14skor*$h2s[2])*100)),3,'.', '') ?></td>
            <td><?= $P3arrSR5[] = number_format(($Oh32015+$Yh32015)/2,3,'.', '') ?></td>
            <td><?= $Oh32016 = number_format(100 - (($masTziLR[8] / ($kol14pov*$h2[4])*100)),3,'.', '') ?></td>
			<td><?= $Yh32016 = number_format(100 - (($masTziLR[9] / ($kol14skor*$h2s[2])*100)),3,'.', '') ?></td>
            <td><?= $P3arrSR6[] = number_format(($Oh32016+$Yh32016)/2,3,'.', '') ?></td>
            <td><?= $Oh32017 = number_format(100 - (($masTziLR[10] / ($kol14pov*$h2[4])*100)),3,'.', '') ?></td>
			<td><?= $Yh32017 = number_format(100 - (($masTziLR[11] / ($kol14skor*$h2s[2])*100)),3,'.', '') ?></td>
            <td><?= $P3arrSR7[] = number_format(($Oh32017+$Yh32017)/2,3,'.', '') ?></td>
        </tr>

        <!-- Дисциплина 4 МИИ -->

        <tr>
        	<td rowspan='5'>МШI</td>
        	<td rowspan='3'>Успішність</td>
        	<td>Лекції</td>
            <td><?= $O42012 = number_format($maxp * ($x1y4mark2012 + $x2y4mark2012) / ($kol12pov * (Max($max12) + $x3y4mark2012)),3,'.', '') ?></td>
			<td><?= $Y42012 = number_format($maxp * ($x1y4mark2012s + $x2y4mark2012s) / ($kol12skor * (Max($max12) + $x3y4mark2012s)),3,'.', '') ?></td>
            <td><?= $P4arrSR2[] = number_format(($O42012+$Y42012)/2,3,'.', '') ?></td>
            <td><?= $O42013 = number_format($maxp * ($x1y4mark2013 + $x2y4mark2013) / ($kol13pov * (Max($max12) + $x3y4mark2013)),3,'.', '') ?></td>
			<td><?= $Y42013 = number_format($maxp * ($x1y4mark2013s + $x2y4mark2013s) / ($kol13skor * (Max($max12) + $x3y4mark2013s)),3,'.', '') ?></td>
            <td><?= $P4arrSR3[] = number_format(($O42013+$Y42013)/2,3,'.', '') ?></td>
            <td><?= $O42014 = number_format($maxp * ($x1y4mark2014 + $x2y4mark2014) / ($kol14pov * (Max($max12) + $x3y4mark2014)),3,'.', '') ?></td>
			<td><?= $Y42014 = number_format($maxp * ($x1y4mark2014s + $x2y4mark2014s) / ($kol14skor * (Max($max12) + $x3y4mark2014s)),3,'.', '') ?></td>
            <td><?= $P4arrSR4[] = number_format(($O42014+$Y42014)/2,3,'.', '') ?></td>
            <td><?= $O42015 = number_format($maxp * ($x1y4mark2015 + $x2y4mark2015) / ($kol15pov * (Max($max12) + $x3y4mark2015)),3,'.', '') ?></td>
			<td><?= $Y42015 = number_format($maxp * ($x1y4mark2015s + $x2y4mark2015s) / ($kol15skor * (Max($max12) + $x3y4mark2015s)),3,'.', '') ?></td>
            <td><?= $P4arrSR5[] = number_format(($O42015+$Y42015)/2,3,'.', '') ?></td>
            <td><?= $O42016 = number_format($maxp * ($x1y4mark2016 + $x2y4mark2016) / ($kol16pov * (Max($max12) + $x3y4mark2016)),3,'.', '') ?></td>
			<td><?= $Y42016 = number_format($maxp * ($x1y4mark2016s + $x2y4mark2016s) / ($kol16skor * (Max($max12) + $x3y4mark2016s)),3,'.', '') ?></td>
            <td><?= $P4arrSR6[] = number_format(($O42016+$Y42016)/2,3,'.', '') ?></td>
            <td><?= $O42017 = number_format($maxp * ($x1y4mark2017 + $x2y4mark2017) / ($kol17pov * (Max($max12) + $x3y4mark2017)),3,'.', '') ?></td>
			<td><?= $Y42017 = number_format($maxp * ($x1y4mark2017s + $x2y4mark2017s) / ($kol17skor * (Max($max12) + $x3y4mark2017s)),3,'.', '') ?></td>
            <td><?= $P4arrSR7[] = number_format(($O42017+$Y42017)/2,3,'.', '') ?></td>
        </tr>

        <tr>
        	<td>ЛР</td>
            <td><?= $OL42012 = number_format($maxp * $x4y4mark2012 / ($miipov * $kol12pov),3,'.', '') ?></td>
			<td><?= $YL42012 = number_format($maxp * $x4y4mark2012s / ($miiskor * $kol12skor),3,'.', '') ?></td>
            <td><?= $P4arrSR2[] = number_format(($OL42012+$YL42012)/2,3,'.', '') ?></td>
            <td><?= $OL42013 = number_format($maxp * $x4y4mark2013 / ($miipov * $kol13pov),3,'.', '') ?></td>
			<td><?= $YL42013 = number_format($maxp * $x4y4mark2013s / ($miiskor * $kol13skor),3,'.', '') ?></td>
            <td><?= $P4arrSR3[] = number_format(($OL42013+$YL42013)/2,3,'.', '') ?></td>
            <td><?= $OL42014 = number_format($maxp * $x4y4mark2014 / ($miipov * $kol14pov),3,'.', '') ?></td>
			<td><?= $YL42014 = number_format($maxp * $x4y4mark2014s / ($miiskor * $kol14skor),3,'.', '') ?></td>
            <td><?= $P4arrSR4[] = number_format(($OL42014+$YL42014)/2,3,'.', '') ?></td>
            <td><?= $OL42015 = number_format($maxp * $x4y4mark2015 / ($miipov * $kol15pov),3,'.', '') ?></td>
			<td><?= $YL42015 = number_format($maxp * $x4y4mark2015s / ($miiskor * $kol15skor),3,'.', '') ?></td>
            <td><?= $P4arrSR5[] = number_format(($OL42015+$YL42015)/2,3,'.', '') ?></td>
            <td><?= $OL42016 = number_format($maxp * $x4y4mark2016 / ($miipov * $kol16pov),3,'.', '') ?></td>
			<td><?= $YL42016 = number_format($maxp * $x4y4mark2016s / ($miiskor * $kol16skor),3,'.', '') ?></td>
            <td><?= $P4arrSR6[] = number_format(($OL42016+$YL42016)/2,3,'.', '') ?></td>
            <td><?= $OL42017 = number_format($maxp * $x4y4mark2017 / ($miipov * $kol17pov),3,'.', '') ?></td>
			<td><?= $YL42017 = number_format($maxp * $x4y4mark2017s / ($miiskor * $kol17skor),3,'.', '') ?></td>
            <td><?= $P4arrSR7[] = number_format(($OL42017+$YL42017)/2,3,'.', '') ?></td>
        </tr>

        <tr>
        	<td>Підсумок</td>
            <td><?php foreach($y4mark2012 as $k): ?>
				<?= $Op42012 = number_format($maxp * $k->Sum_mark / ($maxp * $kol12pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y4mark2012s as $k): ?>
				<?= $Yp42012 = number_format($maxp * $k->Sum_mark / ($maxp * $kol12skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P4arrSR2[] = number_format(($Op42012+$Yp42012)/2,3,'.', '') ?></td>
            <td><?php foreach($y4mark2013 as $k): ?>
				<?= $Op42013 = number_format($maxp * $k->Sum_mark / ($maxp * $kol13pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y4mark2013s as $k): ?>
				<?= $Yp42013 = number_format($maxp * $k->Sum_mark / ($maxp * $kol13skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P4arrSR3[] = number_format(($Op42013+$Yp42013)/2,3,'.', '') ?></td>
            <td><?php foreach($y4mark2014 as $k): ?>
				<?= $Op42014 = number_format($maxp * $k->Sum_mark / ($maxp * $kol14pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y4mark2014s as $k): ?>
				<?= $Yp42014 = number_format($maxp * $k->Sum_mark / ($maxp * $kol14skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P4arrSR4[] = number_format(($Op42014+$Yp42014)/2,3,'.', '') ?></td>
            <td><?php foreach($y4mark2015 as $k): ?>
				<?= $Op42015 = number_format($maxp * $k->Sum_mark / ($maxp * $kol15pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y4mark2015s as $k): ?>
				<?= $Yp42015 = number_format($maxp * $k->Sum_mark / ($maxp * $kol15skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P4arrSR5[] = number_format(($Op42015+$Yp42015)/2,3,'.', '') ?></td>
            <td><?php foreach($y4mark2016 as $k): ?>
				<?= $Op42016 = number_format($maxp * $k->Sum_mark / ($maxp * $kol16pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y4mark2016s as $k): ?>
				<?= $Yp42016 = number_format($maxp * $k->Sum_mark / ($maxp * $kol16skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P4arrSR6[] = number_format(($Op42016+$Yp42016)/2,3,'.', '') ?></td>
            <td><?php foreach($y4mark2017 as $k): ?>
				<?= $Op42017 = number_format($maxp * $k->Sum_mark / ($maxp * $kol17pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y4mark2017s as $k): ?>
				<?= $Yp42017 = number_format($maxp * $k->Sum_mark / ($maxp * $kol17skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P4arrSR7[] = number_format(($Op42017+$Yp42017)/2,3,'.', '') ?></td>
        </tr>

        <tr>
        	<td rowspan='2'>Відвідуваність</td>
        	<td>Л</td>
            <td><?= $Ov42012 = number_format(100 - (($masMiiL[0] / ($kol12pov*$h1[0])*100)),3,'.', '') ?></td>
			<td><?= $Yv42012 = number_format(100 - (($masMiiL[1] / ($kol12skor*$h1s[3])*100)),3,'.', '') ?></td>
            <td><?= $P4arrSR2[] = number_format(($Ov42012+$Yv42012)/2,3,'.', '') ?></td>
            <td><?= $Ov42013 = number_format(100 - (($masMiiL[2] / ($kol13pov*$h1[0])*100)),3,'.', '') ?></td>
			<td><?= $Yv42013 = number_format(100 - (($masMiiL[3] / ($kol13skor*$h1s[3])*100)),3,'.', '') ?></td>
            <td><?= $P4arrSR3[] = number_format(($Ov42013+$Yv42013)/2,3,'.', '') ?></td>
            <td><?= $Ov42014 = number_format(100 - (($masMiiL[4] / ($kol14pov*$h1[0])*100)),3,'.', '') ?></td>
			<td><?= $Yv42014 = number_format(100 - (($masMiiL[5] / ($kol14skor*$h1s[3])*100)),3,'.', '') ?></td>
            <td><?= $P4arrSR4[] = number_format(($Ov42014+$Yv42014)/2,3,'.', '') ?></td>
            <td><?= $Ov42015 = number_format(100 - (($masMiiL[6] / ($kol14pov*$h1[0])*100)),3,'.', '') ?></td>
			<td><?= $Yv42015 = number_format(100 - (($masMiiL[7] / ($kol14skor*$h1s[3])*100)),3,'.', '') ?></td>
            <td><?= $P4arrSR5[] = number_format(($Ov42015+$Yv42015)/2,3,'.', '') ?></td>
            <td><?= $Ov42016 = number_format(100 - (($masMiiL[8] / ($kol14pov*$h1[0])*100)),3,'.', '') ?></td>
			<td><?= $Yv42016 = number_format(100 - (($masMiiL[9] / ($kol14skor*$h1s[3])*100)),3,'.', '') ?></td>
            <td><?= $P4arrSR6[] = number_format(($Ov42016+$Yv42016)/2,3,'.', '') ?></td>
            <td><?= $Ov42017 = number_format(100 - (($masMiiL[10] / ($kol14pov*$h1[0])*100)),3,'.', '') ?></td>
			<td><?= $Yv42017 = number_format(100 - (($masMiiL[11] / ($kol14skor*$h1s[3])*100)),3,'.', '') ?></td>
            <td><?= $P4arrSR7[] = number_format(($Ov42017+$Yv42017)/2,3,'.', '') ?></td>
        </tr>

        <tr>
            <td>ЛР</td>
            <td><?= $Oh42012 = number_format(100 - (($masMiiLR[0] / ($kol12pov*$h2[0])*100)),3,'.', '') ?></td>
			<td><?= $Yh42012 = number_format(100 - (($masMiiLR[1] / ($kol12skor*$h2s[3])*100)),3,'.', '') ?></td>
            <td><?= $P4arrSR2[] = number_format(($Oh42012+$Yh42012)/2,3,'.', '') ?></td>
            <td><?= $Oh42013 = number_format(100 - (($masMiiLR[2] / ($kol13pov*$h2[0])*100)),3,'.', '') ?></td>
			<td><?= $Yh42013 = number_format(100 - (($masMiiLR[3] / ($kol13skor*$h2s[3])*100)),3,'.', '') ?></td>
            <td><?= $P4arrSR3[] = number_format(($Oh42013+$Yh42013)/2,3,'.', '') ?></td>
            <td><?= $Oh42014 = number_format(100 - (($masMiiLR[4] / ($kol14pov*$h2[0])*100)),3,'.', '') ?></td>
			<td><?= $Yh42014 = number_format(100 - (($masMiiLR[5] / ($kol14skor*$h2s[3])*100)),3,'.', '') ?></td>
            <td><?= $P4arrSR4[] = number_format(($Oh42014+$Yh42014)/2,3,'.', '') ?></td>
            <td><?= $Oh42015 = number_format(100 - (($masMiiLR[6] / ($kol14pov*$h2[0])*100)),3,'.', '') ?></td>
			<td><?= $Yh42015 = number_format(100 - (($masMiiLR[7] / ($kol14skor*$h2s[3])*100)),3,'.', '') ?></td>
            <td><?= $P4arrSR5[] = number_format(($Oh42015+$Yh42015)/2,3,'.', '') ?></td>
            <td><?= $Oh42016 = number_format(100 - (($masMiiLR[8] / ($kol14pov*$h2[0])*100)),3,'.', '') ?></td>
			<td><?= $Yh42016 = number_format(100 - (($masMiiLR[9] / ($kol14skor*$h2s[3])*100)),3,'.', '') ?></td>
            <td><?= $P4arrSR6[] = number_format(($Oh42016+$Yh42016)/2,3,'.', '') ?></td>
            <td><?= $Oh42017 = number_format(100 - (($masMiiLR[10] / ($kol14pov*$h2[0])*100)),3,'.', '') ?></td>
			<td><?= $Yh42017 = number_format(100 - (($masMiiLR[11] / ($kol14skor*$h2s[3])*100)),3,'.', '') ?></td>
            <td><?= $P4arrSR7[] = number_format(($Oh42017+$Yh42017)/2,3,'.', '') ?></td>
        </tr>

        <!-- Дисциплина 5 НС -->

        <tr>
        	<td rowspan='5'>НМТ</td>
        	<td rowspan='3'>Успішність</td>
        	<td>Лекції</td>
            <td><?= $O52012 = number_format($maxp * ($x1y5mark2012 + $x2y5mark2012) / ($kol12pov * (Max($max12) + $x3y5mark2012)),3,'.', '') ?></td>
			<td><?= $Y52012 = number_format($maxp * ($x1y5mark2012s + $x2y5mark2012s) / ($kol12skor * (Max($max12) + $x3y5mark2012s)),3,'.', '') ?></td>
            <td><?= $P5arrSR2[] = number_format(($O52012+$Y52012)/2,3,'.', '') ?></td>
            <td><?= $O52013 = number_format($maxp * ($x1y5mark2013 + $x2y5mark2013) / ($kol13pov * (Max($max12) + $x3y5mark2013)),3,'.', '') ?></td>
			<td><?= $Y52013 = number_format($maxp * ($x1y5mark2013s + $x2y5mark2013s) / ($kol13skor * (Max($max12) + $x3y5mark2013s)),3,'.', '') ?></td>
            <td><?= $P5arrSR3[] = number_format(($O52013+$Y52013)/2,3,'.', '') ?></td>
            <td><?= $O52014 = number_format($maxp * ($x1y5mark2014 + $x2y5mark2014) / ($kol14pov * (Max($max12) + $x3y5mark2014)),3,'.', '') ?></td>
			<td><?= $Y52014 = number_format($maxp * ($x1y5mark2014s + $x2y5mark2014s) / ($kol14skor * (Max($max12) + $x3y5mark2014s)),3,'.', '') ?></td>
            <td><?= $P5arrSR4[] = number_format(($O52014+$Y52014)/2,3,'.', '') ?></td>
            <td><?= $O52015 = number_format($maxp * ($x1y5mark2015 + $x2y5mark2015) / ($kol15pov * (Max($max12) + $x3y5mark2015)),3,'.', '') ?></td>
			<td><?= $Y52015 = number_format($maxp * ($x1y5mark2015s + $x2y5mark2015s) / ($kol15skor * (Max($max12) + $x3y5mark2015s)),3,'.', '') ?></td>
            <td><?= $P5arrSR5[] = number_format(($O52015+$Y52015)/2,3,'.', '') ?></td>
            <td><?= $O52016 = number_format($maxp * ($x1y5mark2016 + $x2y5mark2016) / ($kol16pov * (Max($max12) + $x3y5mark2016)),3,'.', '') ?></td>
			<td><?= $Y52016 = number_format($maxp * ($x1y5mark2016s + $x2y5mark2016s) / ($kol16skor * (Max($max12) + $x3y5mark2016s)),3,'.', '') ?></td>
            <td><?= $P5arrSR6[] = number_format(($O52016+$Y52016)/2,3,'.', '') ?></td>
            <td><?= $O52017 = number_format($maxp * ($x1y5mark2017 + $x2y5mark2017) / ($kol17pov * (Max($max12) + $x3y5mark2017)),3,'.', '') ?></td>
			<td><?= $Y52017 = number_format($maxp * ($x1y5mark2017s + $x2y5mark2017s) / ($kol17skor * (Max($max12) + $x3y5mark2017s)),3,'.', '') ?></td>
            <td><?= $P5arrSR7[] = number_format(($O52017+$Y52017)/2,3,'.', '') ?></td>
        </tr>

        <tr>
        	<td>ЛР</td>
            <td><?= $OL52012 = number_format($maxp * $x4y5mark2012 / ($nspov * $kol12pov),3,'.', '') ?></td>
			<td><?= $YL52012 = number_format($maxp * $x4y5mark2012s / ($nsskor * $kol12skor),3,'.', '') ?></td>
            <td><?= $P5arrSR2[] = number_format(($OL52012+$YL52012)/2,3,'.', '') ?></td>
            <td><?= $OL52013 = number_format($maxp * $x4y5mark2013 / ($nspov * $kol13pov),3,'.', '') ?></td>
			<td><?= $YL52013 = number_format($maxp * $x4y5mark2013s / ($nsskor * $kol13skor),3,'.', '') ?></td>
            <td><?= $P5arrSR3[] = number_format(($OL52013+$YL52013)/2,3,'.', '') ?></td>
            <td><?= $OL52014 = number_format($maxp * $x4y5mark2014 / ($nspov * $kol14pov),3,'.', '') ?></td>
			<td><?= $YL52014 = number_format($maxp * $x4y5mark2014s / ($nsskor * $kol14skor),3,'.', '') ?></td>
            <td><?= $P5arrSR4[] = number_format(($OL52014+$YL52014)/2,3,'.', '') ?></td>
            <td><?= $OL52015 = number_format($maxp * $x4y5mark2015 / ($nspov * $kol15pov),3,'.', '') ?></td>
			<td><?= $YL52015 = number_format($maxp * $x4y5mark2015s / ($nsskor * $kol15skor),3,'.', '') ?></td>
            <td><?= $P5arrSR5[] = number_format(($OL52015+$YL52015)/2,3,'.', '') ?></td>
            <td><?= $OL52016 = number_format($maxp * $x4y5mark2016 / ($nspov * $kol16pov),3,'.', '') ?></td>
			<td><?= $YL52016 = number_format($maxp * $x4y5mark2016s / ($nsskor * $kol16skor),3,'.', '') ?></td>
            <td><?= $P5arrSR6[] = number_format(($OL52016+$YL52016)/2,3,'.', '') ?></td>
            <td><?= $OL52017 = number_format($maxp * $x4y5mark2017 / ($nspov * $kol17pov),3,'.', '') ?></td>
			<td><?= $YL52017 = number_format($maxp * $x4y5mark2017s / ($nsskor * $kol17skor),3,'.', '') ?></td>
            <td><?= $P5arrSR7[] = number_format(($OL52017+$YL52017)/2,3,'.', '') ?></td>
        </tr>

        <tr>
        	<td>Підсумок</td>
            <td><?php foreach($y5mark2012 as $k): ?>
				<?= $Op52012 = number_format($maxp * $k->Sum_mark / ($maxp * $kol12pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y5mark2012s as $k): ?>
				<?= $Yp52012 = number_format($maxp * $k->Sum_mark / ($maxp * $kol12skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P5arrSR2[] = number_format(($Op52012+$Yp52012)/2,3,'.', '') ?></td>
            <td><?php foreach($y5mark2013 as $k): ?>
				<?= $Op52013 = number_format($maxp * $k->Sum_mark / ($maxp * $kol13pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y5mark2013s as $k): ?>
				<?= $Yp52013 = number_format($maxp * $k->Sum_mark / ($maxp * $kol13skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P5arrSR3[] = number_format(($Op52013+$Yp52013)/2,3,'.', '') ?></td>
            <td><?php foreach($y5mark2014 as $k): ?>
				<?= $Op52014 = number_format($maxp * $k->Sum_mark / ($maxp * $kol14pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y5mark2014s as $k): ?>
				<?= $Yp52014 = number_format($maxp * $k->Sum_mark / ($maxp * $kol14skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P5arrSR4[] = number_format(($Op52014+$Yp52014)/2,3,'.', '') ?></td>
            <td><?php foreach($y5mark2015 as $k): ?>
				<?= $Op52015 = number_format($maxp * $k->Sum_mark / ($maxp * $kol15pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y5mark2015s as $k): ?>
				<?= $Yp52015 = number_format($maxp * $k->Sum_mark / ($maxp * $kol15skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P5arrSR5[] = number_format(($Op52015+$Yp52015)/2,3,'.', '') ?></td>
            <td><?php foreach($y5mark2016 as $k): ?>
				<?= $Op52016 = number_format($maxp * $k->Sum_mark / ($maxp * $kol16pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y5mark2016s as $k): ?>
				<?= $Yp52016 = number_format($maxp * $k->Sum_mark / ($maxp * $kol16skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P5arrSR6[] = number_format(($Op52016+$Yp52016)/2,3,'.', '') ?></td>
            <td><?php foreach($y5mark2017 as $k): ?>
				<?= $Op52017 = number_format($maxp * $k->Sum_mark / ($maxp * $kol17pov),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
			<td><?php foreach($y5mark2017s as $k): ?>
				<?= $Yp52017 = number_format($maxp * $k->Sum_mark / ($maxp * $kol17skor),3,'.', '') ?>
				<?php endforeach; ?>
			</td>
            <td><?= $P5arrSR7[] = number_format(($Op52017+$Yp52017)/2,3,'.', '') ?></td>
        </tr>

        <tr>
        	<td rowspan='2'>Відвідуваність</td>
        	<td>Л</td>
            <td><?= $Ov52012 = number_format(100 - (($masNsL[0] / ($kol12pov*$h1[2])*100)),3,'.', '') ?></td>
			<td><?= $Yv52012 = number_format(100 - (($masNsL[1] / ($kol12skor*$h1s[4])*100)),3,'.', '') ?></td>
            <td><?= $P5arrSR2[] = number_format(($Ov52012+$Yv52012)/2,3,'.', '') ?></td>
            <td><?= $Ov52013 = number_format(100 - (($masNsL[2] / ($kol13pov*$h1[2])*100)),3,'.', '') ?></td>
			<td><?= $Yv52013 = number_format(100 - (($masNsL[3] / ($kol13skor*$h1s[4])*100)),3,'.', '') ?></td>
            <td><?= $P5arrSR3[] = number_format(($Ov52013+$Yv52013)/2,3,'.', '') ?></td>
            <td><?= $Ov52014 = number_format(100 - (($masNsL[4] / ($kol14pov*$h1[2])*100)),3,'.', '') ?></td>
			<td><?= $Yv52014 = number_format(100 - (($masNsL[5] / ($kol14skor*$h1s[4])*100)),3,'.', '') ?></td>
            <td><?= $P5arrSR4[] = number_format(($Ov52014+$Yv52014)/2,3,'.', '') ?></td>
            <td><?= $Ov52015 = number_format(100 - (($masNsL[6] / ($kol14pov*$h1[2])*100)),3,'.', '') ?></td>
			<td><?= $Yv52015 = number_format(100 - (($masNsL[7] / ($kol14skor*$h1s[4])*100)),3,'.', '') ?></td>
            <td><?= $P5arrSR5[] = number_format(($Ov52015+$Yv52015)/2,3,'.', '') ?></td>
            <td><?= $Ov52016 = number_format(100 - (($masNsL[8] / ($kol14pov*$h1[2])*100)),3,'.', '') ?></td>
			<td><?= $Yv52016 = number_format(100 - (($masNsL[9] / ($kol14skor*$h1s[4])*100)),3,'.', '') ?></td>
            <td><?= $P5arrSR6[] = number_format(($Ov52016+$Yv52016)/2,3,'.', '') ?></td>
            <td><?= $Ov52017 = number_format(100 - (($masNsL[10] / ($kol14pov*$h1[2])*100)),3,'.', '') ?></td>
			<td><?= $Yv52017 = number_format(100 - (($masNsL[11] / ($kol14skor*$h1s[4])*100)),3,'.', '') ?></td>
            <td><?= $P5arrSR7[] = number_format(($Ov52017+$Yv52017)/2,3,'.', '') ?></td>
        </tr>

        <tr>
            <td>ЛР</td>
            <td><?= $Oh52012 = number_format(100 - (($masNsLR[0] / ($kol12pov*$h2[2])*100)),3,'.', '') ?></td>
			<td><?= $Yh52012 = number_format(100 - (($masNsLR[1] / ($kol12skor*$h2s[4])*100)),3,'.', '') ?></td>
            <td><?= $P5arrSR2[] = number_format(($Oh52012+$Yh52012)/2,3,'.', '') ?></td>
            <td><?= $Oh52013 = number_format(100 - (($masNsLR[2] / ($kol13pov*$h2[2])*100)),3,'.', '') ?></td>
			<td><?= $Yh52013 = number_format(100 - (($masNsLR[3] / ($kol13skor*$h2s[4])*100)),3,'.', '') ?></td>
            <td><?= $P5arrSR3[] = number_format(($Oh52013+$Yh52013)/2,3,'.', '') ?></td>
            <td><?= $Oh52014 = number_format(100 - (($masNsLR[4] / ($kol14pov*$h2[2])*100)),3,'.', '') ?></td>
			<td><?= $Yh52014 = number_format(100 - (($masNsLR[5] / ($kol14skor*$h2s[4])*100)),3,'.', '') ?></td>
            <td><?= $P5arrSR4[] = number_format(($Oh52014+$Yh52014)/2,3,'.', '') ?></td>
            <td><?= $Oh52015 = number_format(100 - (($masNsLR[6] / ($kol14pov*$h2[2])*100)),3,'.', '') ?></td>
			<td><?= $Yh52015 = number_format(100 - (($masNsLR[7] / ($kol14skor*$h2s[4])*100)),3,'.', '') ?></td>
            <td><?= $P5arrSR5[] = number_format(($Oh52015+$Yh52015)/2,3,'.', '') ?></td>
            <td><?= $Oh52016 = number_format(100 - (($masNsLR[8] / ($kol14pov*$h2[2])*100)),3,'.', '') ?></td>
			<td><?= $Yh52016 = number_format(100 - (($masNsLR[9] / ($kol14skor*$h2s[4])*100)),3,'.', '') ?></td>
            <td><?= $P5arrSR6[] = number_format(($Oh52016+$Yh52016)/2,3,'.', '') ?></td>
            <td><?= $Oh52017 = number_format(100 - (($masNsLR[10] / ($kol14pov*$h2[2])*100)),3,'.', '') ?></td>
			<td><?= $Yh52017 = number_format(100 - (($masNsLR[11] / ($kol14skor*$h2s[4])*100)),3,'.', '') ?></td>
            <td><?= $P5arrSR7[] = number_format(($Oh52017+$Yh52017)/2,3,'.', '') ?></td>
        </tr>

    </tbody>
</table>  

<h3><strong>П</strong> - Повний курс навчання<br></h3>
<h3><strong>ПР</strong> - Прискорений курс навчання<br></h3>
<h3><strong>CP</strong> - Середнє значення кожного параметру<br></h3>

</div>

<?php $o33=0.33; $o5=0.5; $o5s=0.5 ?>
<h1 class="text-center">Інтегральний показник якості навчання за дисциплінами</h1><br>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
        <tr>  
        	<th>Дисципліна</th>       
            <th>2012 рiк</th>
            <th>2013 рiк</th>
            <th>2014 рiк</th>
            <th>2015 рiк</th>
            <th>2016 рiк</th>
            <th>2017 рiк</th>
        </tr>
    </thead>
<tbody class="contant1">
	<tr>
		<td>Управління IT-проектами</td>
		<?php 
$intP1[] = number_format(($P1arrSR2[0]*$o33+$P1arrSR2[1]*$o33+$P1arrSR2[2]*$o33)*$o5s + ($P1arrSR2[3]*$o5+$P1arrSR2[4]*$o5)*$o5s,3,'.', '');	
$intP1[] = number_format(($P1arrSR3[0]*$o33+$P1arrSR3[1]*$o33+$P1arrSR3[2]*$o33)*$o5s + ($P1arrSR3[3]*$o5+$P1arrSR3[4]*$o5)*$o5s,3,'.', '');
$intP1[] = number_format(($P1arrSR4[0]*$o33+$P1arrSR4[1]*$o33+$P1arrSR4[2]*$o33)*$o5s + ($P1arrSR4[3]*$o5+$P1arrSR4[4]*$o5)*$o5s,3,'.', '');
$intP1[] = number_format(($P1arrSR5[0]*$o33+$P1arrSR5[1]*$o33+$P1arrSR5[2]*$o33)*$o5s + ($P1arrSR5[3]*$o5+$P1arrSR5[4]*$o5)*$o5s,3,'.', '');
$intP1[] = number_format(($P1arrSR6[0]*$o33+$P1arrSR6[1]*$o33+$P1arrSR6[2]*$o33)*$o5s + ($P1arrSR6[3]*$o5+$P1arrSR6[4]*$o5)*$o5s,3,'.', '');
$intP1[] = number_format(($P1arrSR7[0]*$o33+$P1arrSR7[1]*$o33+$P1arrSR7[2]*$o33)*$o5s + ($P1arrSR7[3]*$o5+$P1arrSR7[4]*$o5)*$o5s,3,'.', ''); 
		?>		
		<td><?= $intP1[0] ?></td>
		<td><?= $intP1[1] ?></td>
		<td><?= $intP1[2] ?></td>
		<td><?= $intP1[3] ?></td>
		<td><?= $intP1[4] ?></td>
		<td><?= $intP1[5] ?></td>
	</tr>
	<tr>
		<td>ТПР</td>
		<?php 
$intP2[] = number_format(($P2arrSR2[0]*$o33+$P2arrSR2[1]*$o33+$P2arrSR2[2]*$o33)*$o5s + ($P2arrSR2[3]*$o5+$P2arrSR2[4]*$o5)*$o5s,3,'.', '');	
$intP2[] = number_format(($P2arrSR3[0]*$o33+$P2arrSR3[1]*$o33+$P2arrSR3[2]*$o33)*$o5s + ($P2arrSR3[3]*$o5+$P2arrSR3[4]*$o5)*$o5s,3,'.', '');
$intP2[] = number_format(($P2arrSR4[0]*$o33+$P2arrSR4[1]*$o33+$P2arrSR4[2]*$o33)*$o5s + ($P2arrSR4[3]*$o5+$P2arrSR4[4]*$o5)*$o5s,3,'.', '');
$intP2[] = number_format(($P2arrSR5[0]*$o33+$P2arrSR5[1]*$o33+$P2arrSR5[2]*$o33)*$o5s + ($P2arrSR5[3]*$o5+$P2arrSR5[4]*$o5)*$o5s,3,'.', '');
$intP2[] = number_format(($P2arrSR6[0]*$o33+$P2arrSR6[1]*$o33+$P2arrSR6[2]*$o33)*$o5s + ($P2arrSR6[3]*$o5+$P2arrSR6[4]*$o5)*$o5s,3,'.', '');
$intP2[] = number_format(($P2arrSR7[0]*$o33+$P2arrSR7[1]*$o33+$P2arrSR7[2]*$o33)*$o5s + ($P2arrSR7[3]*$o5+$P2arrSR7[4]*$o5)*$o5s,3,'.', ''); 
		?>
		<td><?= $intP2[0] ?></td>
		<td><?= $intP2[1] ?></td>
		<td><?= $intP2[2] ?></td>
		<td><?= $intP2[3] ?></td>
		<td><?= $intP2[4] ?></td>
		<td><?= $intP2[5] ?></td>
	</tr>
	<tr>
		<td>ТЗI</td>
		<?php 
$intP3[] = number_format(($P3arrSR2[0]*$o33+$P3arrSR2[1]*$o33+$P3arrSR2[2]*$o33)*$o5s + ($P3arrSR2[3]*$o5+$P3arrSR2[4]*$o5)*$o5s,3,'.', '');	
$intP3[] = number_format(($P3arrSR3[0]*$o33+$P3arrSR3[1]*$o33+$P3arrSR3[2]*$o33)*$o5s + ($P3arrSR3[3]*$o5+$P3arrSR3[4]*$o5)*$o5s,3,'.', '');
$intP3[] = number_format(($P3arrSR4[0]*$o33+$P3arrSR4[1]*$o33+$P3arrSR4[2]*$o33)*$o5s + ($P3arrSR4[3]*$o5+$P3arrSR4[4]*$o5)*$o5s,3,'.', '');
$intP3[] = number_format(($P3arrSR5[0]*$o33+$P3arrSR5[1]*$o33+$P3arrSR5[2]*$o33)*$o5s + ($P3arrSR5[3]*$o5+$P3arrSR5[4]*$o5)*$o5s,3,'.', '');
$intP3[] = number_format(($P3arrSR6[0]*$o33+$P3arrSR6[1]*$o33+$P3arrSR6[2]*$o33)*$o5s + ($P3arrSR6[3]*$o5+$P3arrSR6[4]*$o5)*$o5s,3,'.', '');
$intP3[] = number_format(($P3arrSR7[0]*$o33+$P3arrSR7[1]*$o33+$P3arrSR7[2]*$o33)*$o5s + ($P3arrSR7[3]*$o5+$P3arrSR7[4]*$o5)*$o5s,3,'.', ''); 
		?>
		<td><?= $intP3[0] ?></td>
		<td><?= $intP3[1] ?></td>
		<td><?= $intP3[2] ?></td>
		<td><?= $intP3[3] ?></td>
		<td><?= $intP3[4] ?></td>
		<td><?= $intP3[5] ?></td>
	</tr>
	<tr>
		<td>МШI</td>
		<?php 
$intP4[] = number_format(($P4arrSR2[0]*$o33+$P4arrSR2[1]*$o33+$P4arrSR2[2]*$o33)*$o5s + ($P4arrSR2[3]*$o5+$P4arrSR2[4]*$o5)*$o5s,3,'.', '');	
$intP4[] = number_format(($P4arrSR3[0]*$o33+$P4arrSR3[1]*$o33+$P4arrSR3[2]*$o33)*$o5s + ($P4arrSR3[3]*$o5+$P4arrSR3[4]*$o5)*$o5s,3,'.', '');
$intP4[] = number_format(($P4arrSR4[0]*$o33+$P4arrSR4[1]*$o33+$P4arrSR4[2]*$o33)*$o5s + ($P4arrSR4[3]*$o5+$P4arrSR4[4]*$o5)*$o5s,3,'.', '');
$intP4[] = number_format(($P4arrSR5[0]*$o33+$P4arrSR5[1]*$o33+$P4arrSR5[2]*$o33)*$o5s + ($P4arrSR5[3]*$o5+$P4arrSR5[4]*$o5)*$o5s,3,'.', '');
$intP4[] = number_format(($P4arrSR6[0]*$o33+$P4arrSR6[1]*$o33+$P4arrSR6[2]*$o33)*$o5s + ($P4arrSR6[3]*$o5+$P4arrSR6[4]*$o5)*$o5s,3,'.', '');
$intP4[] = number_format(($P4arrSR7[0]*$o33+$P4arrSR7[1]*$o33+$P4arrSR7[2]*$o33)*$o5s + ($P4arrSR7[3]*$o5+$P4arrSR7[4]*$o5)*$o5s,3,'.', ''); 
		?>
		<td><?= $intP4[0] ?></td>
		<td><?= $intP4[1] ?></td>
		<td><?= $intP4[2] ?></td>
		<td><?= $intP4[3] ?></td>
		<td><?= $intP4[4] ?></td>
		<td><?= $intP4[5] ?></td>
	</tr>
	<tr>
		<td>НМТ</td>
		<?php 
$intP5[] = number_format(($P5arrSR2[0]*$o33+$P5arrSR2[1]*$o33+$P5arrSR2[2]*$o33)*$o5s + ($P5arrSR2[3]*$o5+$P5arrSR2[4]*$o5)*$o5s,3,'.', '');	
$intP5[] = number_format(($P5arrSR3[0]*$o33+$P5arrSR3[1]*$o33+$P5arrSR3[2]*$o33)*$o5s + ($P5arrSR3[3]*$o5+$P5arrSR3[4]*$o5)*$o5s,3,'.', '');
$intP5[] = number_format(($P5arrSR4[0]*$o33+$P5arrSR4[1]*$o33+$P5arrSR4[2]*$o33)*$o5s + ($P5arrSR4[3]*$o5+$P5arrSR4[4]*$o5)*$o5s,3,'.', '');
$intP5[] = number_format(($P5arrSR5[0]*$o33+$P5arrSR5[1]*$o33+$P5arrSR5[2]*$o33)*$o5s + ($P5arrSR5[3]*$o5+$P5arrSR5[4]*$o5)*$o5s,3,'.', '');
$intP5[] = number_format(($P5arrSR6[0]*$o33+$P5arrSR6[1]*$o33+$P5arrSR6[2]*$o33)*$o5s + ($P5arrSR6[3]*$o5+$P5arrSR6[4]*$o5)*$o5s,3,'.', '');
$intP5[] = number_format(($P5arrSR7[0]*$o33+$P5arrSR7[1]*$o33+$P5arrSR7[2]*$o33)*$o5s + ($P5arrSR7[3]*$o5+$P5arrSR7[4]*$o5)*$o5s,3,'.', ''); 
		?>
		<td><?= $intP5[0] ?></td>
		<td><?= $intP5[1] ?></td>
		<td><?= $intP5[2] ?></td>
		<td><?= $intP5[3] ?></td>
		<td><?= $intP5[4] ?></td>
		<td><?= $intP5[5] ?></td>
	</tr>

<?php 
	
	
	
?>
	<?php $kkx1=array($intP1[0],$intP2[0],$intP3[0],$intP4[0],$intP5[0]); ?>
	<?php $kkx2=array($intP1[1],$intP2[1],$intP3[1],$intP4[1],$intP5[1]); ?>
	<?php $kkx3=array($intP1[2],$intP2[2],$intP3[2],$intP4[2],$intP5[2]); ?>
	<?php $kkx4=array($intP1[3],$intP2[3],$intP3[3],$intP4[3],$intP5[3]); ?>
	<?php $kkx5=array($intP1[4],$intP2[4],$intP3[4],$intP4[4],$intP5[4]); ?>
	<?php $kkx6=array($intP1[5],$intP2[5],$intP3[5],$intP4[5],$intP5[5]); ?>
	<?php 

	$arn1[]=array_sum($kkx1);
	$arn2[]=array_sum($kkx2);
	$arn3[]=array_sum($kkx3);
	$arn4[]=array_sum($kkx4);
	$arn5[]=array_sum($kkx5);
	$arn6[]=array_sum($kkx6);

	$ark1[]=count($kkx1);
	$ark2[]=count($kkx2);
	$ark3[]=count($kkx3);
	$ark4[]=count($kkx4);
	$ark5[]=count($kkx5); 
	$ark6[]=count($kkx6);
	?>
	<tr>
	    <td>Інтегральний показник</td>
		<td><?= number_format($summass12 = array_sum($arn1) / array_sum($ark1),4,'.', '');  ?></td>
		<td><?= number_format($summass13 = array_sum($arn2) / array_sum($ark2),4,'.', '');  ?></td>
		<td><?= number_format($summass14 = array_sum($arn3) / array_sum($ark3),4,'.', '');  ?></td>
		<td><?= number_format($summass15 = array_sum($arn4) / array_sum($ark4),4,'.', '');  ?></td>
		<td><?= number_format($summass16 = array_sum($arn5) / array_sum($ark5),4,'.', '');  ?></td>
		<td><?= number_format($summass17 = array_sum($arn6) / array_sum($ark6),4,'.', '');  ?></td>
		

	</tr>
</tbody>
</table>


<h1 class="text-center">Параметри якості навчального процесу кафедри (cкорегований Кп)</h1><br>

<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
        <tr>  
        	<th></th>       
            <th>2012 рiк</th>
            <th>2013 рiк</th>
            <th>2014 рiк</th>
            <th>2015 рiк</th>
            <th>2016 рiк</th>
            <th>2017 рiк</th>
        </tr>
    </thead>
	<tbody class="contant1">

		<tr>
			<td>Кор</td>
		    <td><?= $KOYgraf2[] = $KOY12 ?></td>
		    <td><?= $KOYgraf2[] = $KOY13 ?></td>
		    <td><?= $KOYgraf2[] = $KOY14 ?></td>
		    <td><?= $KOYgraf2[] = $KOY15 ?></td>
		    <td><?= $KOYgraf2[] = $KOY16 ?></td>
		    <td><?= $KOYgraf2[] = $KOY17 ?></td>
		    
		</tr>

		<tr>
			<td>Кп</td>
			<td><?= $KPgraf2[] = number_format(($KP12 * $summass12) / 100,4,'.', '');  ?></td>
			<td><?= $KPgraf2[] = number_format(($KP13 * $summass13) / 100,4,'.', '');  ?></td>
			<td><?= $KPgraf2[] = number_format(($KP14 * $summass14) / 100,4,'.', '');  ?></td>
			<td><?= $KPgraf2[] = number_format(($KP15 * $summass15) / 100,4,'.', '');  ?></td>
			<td><?= $KPgraf2[] = number_format(($KP16 * $summass16) / 100,4,'.', '');  ?></td>
			<td><?= $KPgraf2[] = number_format(($KP17 * $summass17) / 100,4,'.', '');  ?></td>
		</tr>

		<tr>
			<td>Кпв</td>
		    <td><?= $KPV12 ?></td>
		    <td><?= $KPV13 ?></td>
		    <td><?= $KPV14 ?></td>
		    <td><?= $KPV15 ?></td>
		    <td><?= $KPV16 ?></td>
		    <td><?= $KPV17 ?></td>
		</tr>

	</tbody>
</table>

<?php 

$kpgraf1 = array(0.5956,0.6519,0.6740,0.6879,0.6680,0.6927);

?>
<?php
echo Highcharts::widget([
   'options' => [
      'title' => ['text' => 'Візуалізація параметрів для оцінки  якості  навчального процесу кафедри (скорегований Кп)'],
      'xAxis' => [
         'categories' => ['2012', '2013', '2014', '2015', '2016', '2017']
      ],
      'yAxis' => [
         'title' => ['text' => '']
      ],
      'series' => [
         ['name' => 'КОР', 'data' => $koygraf],
         ['name' => 'КП', 'data' => $kpgraf1],
         ['name' => 'КПВ', 'data' => $kpvgraf]
      ]
   ]
]);
?>
<br>

<h1 class="text-center">Дані для оцінки параметрів залежності Кпв від факторів Кор і Кп (виробнича функція)</h1><br>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
        <tr>        
            <th>Кор</th>
            <th>Кп</th>
            <th>Кпв</th>
            <th>Кор<sup>2</sup></th>
            <th>Кп<sup>2</sup></th>
            <th>Кор*Кпв</th>
            <th>Кп*Кпв</th>
            <th>Кор*Кп</th>
        </tr>
    </thead>
	<tbody class="contant1">

		    <?php $arrKOY[] = log(100*$KOY12) ?>
		    <?php $arrKOY[] = log(100*$KOY13) ?>
		    <?php $arrKOY[] = log(100*$KOY14) ?>
		    <?php $arrKOY[] = log(100*$KOY15) ?>
		    <?php $arrKOY[] = log(100*$KOY16) ?>
		    <?php $arrKOY[] = log(100*$KOY17) ?>
			<?php sort($arrKOY)?>
		
			<tr>
				<td>
					<?php foreach($arrKOY as $k=>$v): ?>
				    	<?= $KOYs[] = number_format($v,4,'.', ''); ?><br><hr>
				    <?php endforeach ?>
				    	<?= '∑ = '.$sumX1 = number_format(array_sum($KOYs),4,'.', ''); ?>
			    </td>
			
			<?php $arrKP[] = log($KP12 * $summass12) ?>
			<?php $arrKP[] = log($KP13 * $summass13) ?>
			<?php $arrKP[] = log($KP14 * $summass14) ?>
			<?php $arrKP[] = log($KP15 * $summass15) ?>
			<?php $arrKP[] = log($KP16 * $summass16) ?>
			<?php $arrKP[] = log($KP17 * $summass17) ?>
			<?php sort($arrKP)?>

				<td>
					<?php foreach($arrKP as $k=>$v): ?>
				    	<?= $KPs[] = number_format($v,4,'.', ''); ?><br><hr>
				    <?php endforeach ?>
				    <?= '∑ = '.$sumX2 = number_format(array_sum($KPs),4,'.', '');?>
			    </td>
			    
							
			<?php $arrKPV[] = log(100*$KPV12) ?>
		    <?php $arrKPV[] = log(100*$KPV13) ?>
		    <?php $arrKPV[] = log(100*$KPV14) ?>
		    <?php $arrKPV[] = log(100*$KPV15) ?>
		    <?php $arrKPV[] = log(100*$KPV16) ?>
		    <?php $arrKPV[] = log(100*$KPV17) ?>
			<?php sort($arrKPV)?>

				<td>
					<?php foreach($arrKPV as $k=>$v): ?>
						<?php $kolpp+=1 ?>
				    	<?= $KPVs[] = number_format($v,4,'.', ''); ?><br><hr>
				    <?php endforeach ?>
				    <?= '∑ = '.$sumX3 = number_format(array_sum($KPVs),4,'.', '') ?>
			    </td>

			    <td>

				    <?php foreach($KOYs as $k=>$v): ?>
				    	<?= $KOYpow[] = number_format(pow($v,2),4,'.', '') ?><br><hr>
				    <?php endforeach ?>

				    <?= '∑ = '.$sumX4 = number_format(array_sum($KOYpow),4,'.', '') ?>
			    </td>

			    <td>
					<?php foreach($KPs as $k=>$v): ?>
				    	<?= $KPpow[] = number_format(pow($v,2),4,'.', ''); ?><br><hr>
				    <?php endforeach ?>
				    <?= '∑ = '.$sumX5 = number_format(array_sum($KPpow),4,'.', '') ?>
			    </td>

			    <td><?php for($i=0;$i<$kolpp;$i++): ?>
					<?= $KOYKPVpow[] = number_format($KOYs[$i] * $KPVs[$i],4,'.', ''); ?><br><hr>
					<?php endfor ?>
					<?= '∑ = '.$sumX6 = number_format(array_sum($KOYKPVpow),4,'.', '') ?>
			    </td>

			    <td><?php for($i=0;$i<$kolpp;$i++): ?>
					<?= $KPKPVpow[] = number_format($KPs[$i] * $KPVs[$i],4,'.', ''); ?><br><hr>
					<?php endfor ?>
					<?= '∑ = '.$sumX7 = number_format(array_sum($KPKPVpow),4,'.', '') ?>
			    </td>

			    <td><?php for($i=0;$i<$kolpp;$i++): ?>
					<?= $KOYKPpow[] = number_format($KOYs[$i] * $KPs[$i],4,'.', ''); ?><br><hr>
					<?php endfor ?>
					<?= '∑ = '.$sumX8 = number_format(array_sum($KOYKPpow),4,'.', '') ?>
			    </td>

			</tr>
	</tbody>
</table>

<button id='triggerDelta' class="btn btn-info center-block" data-text-show="Сховати допоміжні розрахунки"
 	data-text-hide="Показати допоміжні розрахунки">
 	Показати допоміжні розрахунки
</button><br>

<div id='box4' style="display:none;"> 

<?php /* Дельта главная */ ?>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
        <tr>        
            <th>a<sub>0</sub></th>
            <th>a<sub>1</sub></th>
            <th>a<sub>2</sub></th>
            <th><span class="glyphicon glyphicon-triangle-top"></span></th>
            <th>
<?= number_format($Delta[] = $kolpp*($sumX4*$sumX5-($sumX8*$sumX8))
   -$sumX1*($sumX1*$sumX5-($sumX2*$sumX8))
   +$sumX2*($sumX1*$sumX8-($sumX2*$sumX4)),7,'.', ''); ?>
			</th>
        </tr>
    </thead>
	<tbody class="contant1">
		<tr> <?php //1 строка ?>
			<td><?= $a1[] = number_format($kolpp,4,'.', ''); ?></td>
			<td><?= $a1[] = number_format($sumX1,4,'.', ''); ?></td>
			<td><?= $a1[] = number_format($sumX2,4,'.', ''); ?></td>
			<td>=</td>
			<td><?= $a1[] = number_format($sumX3,4,'.', ''); ?></td>
		</tr>

		<tr> <?php //2 строка ?>
			<td><?= $a2[] = number_format($sumX1,4,'.', ''); ?></td>
			<td><?= $a2[] = number_format($sumX4,4,'.', ''); ?></td>
			<td><?= $a2[] = number_format($sumX8,4,'.', ''); ?></td>
			<td>=</td>
			<td><?= $a2[] = number_format($sumX6,4,'.', ''); ?></td>
		</tr>

		<tr> <?php //3 строка ?>
			<td><?= $a3[] = number_format($sumX2,4,'.', ''); ?></td>
			<td><?= $a3[] = number_format($sumX8,4,'.', ''); ?></td>
			<td><?= $a3[] = number_format($sumX5,4,'.', ''); ?></td>
			<td>=</td>
			<td><?= $a3[] = number_format($sumX7,4,'.', ''); ?></td>
		</tr>
	</tbody>
</table>

<?php /* Дельта 1 */ ?>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
        <tr>        
            <th>a<sub>0</sub></th>
            <th>a<sub>1</sub></th>
            <th>a<sub>2</sub></th>
        </tr>
    </thead>
	<tbody class="contant1">
		<tr> <?php //1 строка ?>
			<td><?= $a1[3] ?></td>
			<td><?= $a1[1] ?></td>
			<td><?= $a1[2] ?></td>
		</tr>

		<tr> <?php //2 строка ?>
			<td><?= $a2[3] ?></td>
			<td><?= $a2[1] ?></td>
			<td><?= $a2[2] ?></td>
		</tr>

		<tr> <?php //3 строка ?>
			<td><?= $a3[3] ?></td>
			<td><?= $a3[1] ?></td>
			<td><?= $a3[2] ?></td>
		</tr>

		<tr>
			<th><span class="glyphicon glyphicon-triangle-top"></span> 1</th>
			<th>=</th>
			<th>
			<?= $Delta[] = number_format($a1[3]*($a2[1]*$a3[2]-($a3[1]*$a2[2]))
			   -$a1[1]*($a2[3]*$a3[2]-($a3[3]*$a2[2]))
			   +$a1[2]*($a2[3]*$a3[1]-($a3[3]*$a2[1])),7,'.', ''); 
			?>
			</th>
			
		</tr>
	</tbody>
</table>

<?php /* Дельта 2 */ ?>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
        <tr>        
            <th>a<sub>0</sub></th>
            <th>a<sub>1</sub></th>
            <th>a<sub>2</sub></th>
        </tr>
    </thead>
	<tbody class="contant1">
		<tr> <?php //1 строка ?>
			<td><?= $a1[0] ?></td>
			<td><?= $a1[3] ?></td>
			<td><?= $a1[2] ?></td>
		</tr>

		<tr> <?php //2 строка ?>
			<td><?= $a2[0] ?></td>
			<td><?= $a2[3] ?></td>
			<td><?= $a2[2] ?></td>
		</tr>

		<tr> <?php //3 строка ?>
			<td><?= $a3[0] ?></td>
			<td><?= $a3[3] ?></td>
			<td><?= $a3[2] ?></td>
		</tr>

		<tr>
			<th><span class="glyphicon glyphicon-triangle-top"></span> 2</th>
			<th>=</th>
			<th>
			<?= $Delta[] = number_format($a1[0]*($a2[3]*$a3[2]-($a3[3]*$a2[2]))
			   -$a1[3]*($a2[0]*$a3[2]-($a3[0]*$a2[2]))
			   +$a1[2]*($a2[0]*$a3[3]-($a3[0]*$a2[3])),7,'.', '');  
			?>
			</th>
			
		</tr>
	</tbody>
</table>

<?php /* Дельта 3 */ ?>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
        <tr>        
            <th>a<sub>0</sub></th>
            <th>a<sub>1</sub></th>
            <th>a<sub>2</sub></th>
        </tr>
    </thead>
	<tbody class="contant1">
		<tr> <?php //1 строка ?>
			<td><?= $a1[0] ?></td>
			<td><?= $a1[1] ?></td>
			<td><?= $a1[3] ?></td>
		</tr>

		<tr> <?php //2 строка ?>
			<td><?= $a2[0] ?></td>
			<td><?= $a2[1] ?></td>
			<td><?= $a2[3] ?></td>
		</tr>

		<tr> <?php //3 строка ?>
			<td><?= $a3[0] ?></td>
			<td><?= $a3[1] ?></td>
			<td><?= $a3[3] ?></td>
		</tr>

		<tr>
			<th><span class="glyphicon glyphicon-triangle-top"></span> 3</th>
			<th>=</th>
			<th>
			<?= $Delta[] = number_format($a1[0]*($a2[1]*$a3[3]-($a3[1]*$a2[3]))
			   -$a1[1]*($a2[0]*$a3[3]-($a3[0]*$a2[3]))
			   +$a1[3]*($a2[0]*$a3[1]-($a3[0]*$a2[1])),7,'.', ''); 
			?>
			</th>
			
		</tr>
	</tbody>
</table>

<table id="table" class="table table-bordered table-condensed table-striped"> 
	<tbody class="contant1">
	<tr>
		<th>LN(a<sub>0</sub>) =</th>
		<td><?= number_format($Delta[1] / $Delta[0],4,'.', ''); ?></td>
		<th>a<sub>0</sub> =</th>
		<td><?= $a[] = number_format(EXP($Delta[1] / $Delta[0]),4,'.', '');?></td>
	</tr>
	<tr>
		<th>а<sub>1</sub> =</th>
		<td><?= $a[] = number_format($Delta[2] / $Delta[0],4,'.', ''); ?></td>
		<th>а<sub>2</sub> =</th>
		<td><?= $a[] = number_format($Delta[3] / $Delta[0],4,'.', ''); ?></td>
	</tr>
	</tbody>
</table>
</div>
<h1 class="text-center">Допоміжні розрахунки</h1><br>
<table id="table" class="table table-bordered table-condensed table-striped"> 
	<tbody class="contant1">
<?php sort($KOYgraf2); sort($KPgraf2); ?>
		<tr>	
			<th>Кор / Кп</th>
			<?php foreach ($KPgraf2 as $k): ?>
			<td><?= $koppp[] = number_format($k*100,4,'.', ''); ?></td>
			<?php endforeach?>	
		</tr>
			

		<tr> 
			<td><?= number_format($KOYgraf2[0]*100,4,'.', ''); ?></td>
			<?php for($i=0;$i<count($arrKP);$i++):?>
			<td><?= number_format($a[0] * (pow($KOYgraf2[0]*100,$a[1])) * (pow($koppp[$i],$a[2])),4,'.', ''); ?></td>
			<?php endfor ?>
		</tr>
		<tr>
			<td><?= number_format($KOYgraf2[1]*100,4,'.', ''); ?></td>	
			<?php for($i=0;$i<count($arrKP);$i++):?>
			<td><?= number_format($a[0] * (pow($KOYgraf2[1]*100,$a[1])) * (pow($koppp[$i],$a[2])),4,'.', ''); ?></td>
			<?php endfor ?>
		</tr>
		<tr>	
			<td><?= number_format($KOYgraf2[2]*100,4,'.', ''); ?></td>
			<?php for($i=0;$i<count($arrKP);$i++):?>
			<td><?= number_format($a[0] * (pow($KOYgraf2[2]*100,$a[1])) * (pow($koppp[$i],$a[2])),4,'.', ''); ?></td>
			<?php endfor ?>
		</tr>
		<tr>	
			<td><?= number_format($KOYgraf2[3]*100,4,'.', ''); ?></td>
			<?php for($i=0;$i<count($arrKP);$i++):?>
			<td><?= number_format($a[0] * (pow($KOYgraf2[3]*100,$a[1])) * (pow($koppp[$i],$a[2])),4,'.', ''); ?></td>
			<?php endfor ?>
		</tr>
		<tr>	
			<td><?= number_format($KOYgraf2[4]*100,4,'.', ''); ?></td>
			<?php for($i=0;$i<count($arrKP);$i++):?>
			<td><?= number_format($a[0] * (pow($KOYgraf2[4]*100,$a[1])) * (pow($koppp[$i],$a[2])),4,'.', ''); ?></td>
			<?php endfor ?>
		</tr>
		<tr>
			<td><?= number_format($KOYgraf2[5]*100,4,'.', ''); ?></td>	
			<?php for($i=0;$i<count($arrKP);$i++):?>
			<td><?= number_format($a[0] * (pow($KOYgraf2[5]*100,$a[1])) * (pow($koppp[$i],$a[2])),4,'.', ''); ?></td>
			<?php endfor ?>
		</tr>
	</tbody>
</table>

<h3>Розрахунок проводиться в масштабі 1:100</h3>
<br>
 <div><img src="/img/qwe3.png" alt="график" width="75%"></div>
<h3><strong>X</strong> - коефіцієнт освітнього рівня абітурієнтів (Кор)<br></h3>
<h3><strong>Y</strong> - коефіцієнт професійнго рівня професорсько-викладацького складу кафедри (Кп)<br></h3>
<h3><strong>Z</strong> - коефіцієнт  професійного рівня підготовки фахівців (Кпв)<br></h3><br>

 <table id="table" class="table table-bordered table-condensed table-striped"> 
 	<thead>
 		<tr>
 			<th>Значення Кпв</th>
 			<th>Інтерпретація</th>
 			<th>Рекомендації</th>
 		</tr>
 	</thead>
	<tbody class="">
		<tr>
			<td>до 0,2</td>
			<td class="td11">Вкрай незадовільний рівень якості навчального процесу на кафедрі</td>
			<td class="td11">
- підвищити рівень кваліфікації професорсько-викладацького складу;<br>
- скорегувати (посилити) методи контролю виконання лабораторних і самостійних робіт;<br>
- грамотно розподілити навантаження пар протягом дня (відсутність вікон) і протягом тижня (приблизно однакова кількість пар щодня);<br>
- оновити навчальні матеріали з урахуванням сучасних тенденцій і досягнень науки;<br>
- збільшити кількість консультацій;<br>
- збільшити кількість факторів, що мотивують студентів у процесі навчання.<br>
			</td>
		</tr>
		<tr>
			<td>0,2 – 0,5</td>
			<td class="td11">Незадовільний рівень якості навчального процесу на кафедрі</td>
			<td class="td11">
- збільшити кількість консультацій;<br>
- скорегувати бальну систему оцінки знань;<br>
- підвищити зацікавленість викладачів у своїй роботі;<br>
- використовувати індивідуальні плани навчання з можливістю вибору факультативних занять;<br>
- збільшити кількість факторів, що мотивують студентів в процесі навчання.<br>
			</td>
		</tr>
		<tr>
			<td>0,5 – 0,7</td>
			<td class="td11">Середній рівень якості навчального процесу на кафедрі</td>
			<td class="td11">
- підвищити зацікавленість викладачів у своїй роботі;<br>
- приділяти увагу веденню дискусій і розбору «складних» тем разом із студентами під час лекцій,<br>
- комп'ютеризувати методи навчання.<br>
			</td>
		</tr>
		<tr>
			<td>0,7 – 0,9</td>
			<td class="td11">Достатній рівень якості навчального процесу на кафедрі</td>
			<td class="td11">
- зв'язати теорію і практику за допомогою кейсового навчання, симуляцій, практик;<br>
- приділити увагу веденню дискусії між викладачем і студентами під час лекцій, що допоможе привернути увагу студентів і підвищить інтерес до предмету.<br>
			</td>
		</tr>
		<tr>
			<td>понад 0,9</td>
			<td class="td11">Високий рівень якості навчального процесу на кафедрі</td>
			<td class="td11">
- запрошувати до ведення лекцій фахівців із бізнесу;<br>
- розвивати систему комп'ютерних технологій (наприклад, створити веб-сторінку з кожного предмету, яка адмініструється викладачем, з викладенням усіх навчальних матеріалів і завдань; забезпечити можливість завантажити виконані завдання на навчальний сервер для перевірки викладачем і оперативного отримання оцінки);<br>
- вивчення ринку праці і затребуваності спеціальності в найближчому майбутньому із корегуванням освітніх програм під вимоги ринкового попиту;<br>
- створення бази вакансій на підприємствах для випускників.
	
			</td>
		</tr>
	</tbody>
</table>
