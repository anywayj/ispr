<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProgressInPublicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Досягнення у громадській діяльності';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="progress-in-public-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1><br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати данi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

           // 'id_progress_public',
           // 'public_id',
           // 'students_id',

            [
                'header' => 'iд',
                'attribute' => 'id_progress_public',
            ],
                'Student_id' => 'students.Student_FIO',
                'science_id' => 'public.name',
            
            /*
            [
                'header' => 'Вид',
                'attribute' => 'public.view',
            ], */

            [
                'header' => 'Бал',
                //'attribute' => 'public.rank_group',
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
            //'place',
            //'number',
            //'date',
            //'sum',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    

</div>
