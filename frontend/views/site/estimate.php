<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CurrentEstimatesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Current Estimates';
$this->params['breadcrumbs'][] = $this->title;
?>


   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<!-- <?php /*
    <p>
        <?= Html::a('Create Current Estimates', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'estimates_id',
            'Student_id',
            'Plan_id',
           // 'View_id',
            'Vh_control',
            //'Date',
            'KR_1',
            //'KR_2',
            //'KR_3',
            //'KR_4',
            //'LR_1',
            //'LR_2',
            //'LR_3',
            //'LR_4',
            //'LR_5',
            //'LR_6',
            //'LR_7',
            //'LR_8',
            //'LR_9',
            //'LR_10',
            //'LR_11',
            //'LR_12',
            //'LR_13',
            //'LR_14',
            //'LR_15',
            'Start_year',
            //'Course',
            //'Sum_mark',

            ['class' => 'yii\grid\ActionColumn'], 
        ],
    ]); ?>

*/ ?> -->
<div class="row">
    

    <div class="col-lg-6">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelf, 'disc')->label('Дисципліна')
        ->dropDownList(\yii\helpers\ArrayHelper::map(common\models\Disciplines::find()->all(), 'Discipline_id', 'Discipline_name'),
        [
            'prompt' => 'Виберіть дисциплiну',
        ]
        ) ?>
    </div>
    <div class="col-lg-6">    
    <?= $form->field($modelf, 'group')->label('Група')
        ->dropDownList(\yii\helpers\ArrayHelper::map(common\models\GroupAcademy::find()->all(), 'Group_id', 'Group_name'),
        [
            'prompt' => 'Виберіть групу',
        ]
        ) ?>
    </div>
    <?php ActiveForm::end(); ?>
    </div>
<div class="col-lg-12">
<h1 class="text-center">Журнал</h1><br>
<table id="table" class="table table-bordered table-condensed table-striped"> 
    <thead>
        <tr>      
            <th>Студент</th>
            <th>КР 1</th>
          
            <th>ЛР 1</th>
            <th>ЛР 2</th>
            <th>ЛР 3</th>
            <th>ЛР 4</th>
            <th>ЛР 5</th>
        </tr>
    </thead>
<tbody class="contant1">
    <?php foreach ($estimates as $k): ?>
        <tr>
           <td><?= $k->students->Student_FIO ?></td> 
           <td><?= $k->KR_1 ?></td>
           
           <td><?= $k->LR_1 ?></td>
           <td><?= $k->LR_2 ?></td>
           <td><?= $k->LR_3 ?></td>
           <td><?= $k->LR_4 ?></td>
           <td><?= $k->LR_5 ?></td>
        </tr>
        
        <?php endforeach ?>
        
</tbody>
</table>


</div>





