<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchTeachers */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Викладачі';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1><br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати викладача', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Teacher_id',
            'Teacher_FIO',
            //'Teacher_surname',
            //'Teacher_name',
            //'Teacher_lastname',
            'Teacher_phone',
            'Teacher_email:email',
            'image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
