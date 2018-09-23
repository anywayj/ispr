<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DisciplinesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Дисциплiни';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disciplines-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати дисциплiну', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

            'Discipline_id',
            'Discipline_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
