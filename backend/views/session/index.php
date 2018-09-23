<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SessionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сесiя';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="session-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати данi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
           //['class' => 'yii\grid\SerialColumn'],

            'Session_id',
            'Plan_id' => 'plan.discipline.Discipline_name',
            'Student_id' => 'students.Student_FIO',
            'Raiting_100',
            'Raiting_ETS',
            //'Raiting_classic',
            //'Raiting_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
