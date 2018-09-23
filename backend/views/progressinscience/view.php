<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProgressInScience */

$this->title = $model->students->Student_FIO;
$this->params['breadcrumbs'][] = ['label' => 'Progress In Sciences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="progress-in-science-view">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id_progress_science], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_progress_science], [
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
            'id_progress_science',
            'sciences.name',
            'Student_id',
            'more_rank',
            'place',
            'number',
            'date',
           // 'sum1',
        ],
    ]) ?>

</div>
