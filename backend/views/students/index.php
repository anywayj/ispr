<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Студенти';
//$this->title = Yii::t('app', 'Students');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Додати студента'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
           

            'Student_id',
            'Student_FIO',
            //'Student_surname',
            //'Student_name',
            //'Student_lastname',
            //'Birhdate',
            //'Student_phone',
            //'Certificate_raiting',
            //'Certificate_ZNO_1',
            //'Certificate_ZNO_2',
            //'Certificate_ZNO_3',
            //'SR_ball_doc',
            'Year',
            //'Class',
            'Sum_ball',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
