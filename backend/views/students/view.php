<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Students */

$this->title = $model->Student_FIO;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редагувати', ['update', 'id' => $model->Student_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->Student_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Student_id',
            'Student_FIO',
            'Student_surname',
            'Student_name',
            'Student_lastname',
            'Birhdate',
            'Student_phone',
            'Certificate_raiting',
            'Certificate_ZNO_1',
            'Certificate_ZNO_2',
            'Certificate_ZNO_3',
            'SR_ball_doc',
            'Year',
            'Class',
            'Sum_ball',
          //  's1',
          //  's2',
          //  'sr',
          //  's1stud',
          //  's2stud',
        ],
    ]) ?>

</div>
