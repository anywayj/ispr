<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Досягнення в науці';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="progress-in-science-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1><br>

    <p>
        <?= Html::a('Додати данi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id_progress_science',

            [
                'header' => 'iд',
                'attribute' => 'id_progress_science',
            ],
                'Student_id' => 'students.Student_FIO',
               // 'science_id' => 'sciences.name',
            
            [
                'header' => 'Вид',
                'attribute' => 'sciences.view',
            ],

            [
                'header' => 'Бал',
                //'attribute' => 'sciences.rank_stud',
                'attribute' => 'more_rank',
            ],

            /*[
                'header' => 'Место',
                'attribute' => 'place',
            ],*/
            [
                'header' => 'Дата',
                'attribute' => 'date',
            ],
            //'more_rank',
            
            //'number',
            
            //'sum',

            

            


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>


                



