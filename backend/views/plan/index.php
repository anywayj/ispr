<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'План';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати дані', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

           // 'Plan_id',
            
            [
                'header' => 'Дисциплiна',
                'attribute' => 'discipline.Discipline_name',
            ],

            

           

           // 'Speciality_id',
            'view_control',
            'Lecture_hours',
            //'LR_hours',
            'Practice_hours',
            //'Credits',
            //'Start_date',
            //'End_date',
            'Semester',
            //'Actuality',
            //'discipline_one',
            //'discipline_two',
            //'discipline_three',
            //'Course',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
