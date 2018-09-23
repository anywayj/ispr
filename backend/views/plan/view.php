<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Plan */

$this->title = $model->Plan_id;
$this->params['breadcrumbs'][] = ['label' => 'Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновити', ['update', 'id' => $model->Plan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->Plan_id], [
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
            'Plan_id',
            'Discipline_id',
            'Speciality_id',
            'view_control',
            'Lecture_hours',
            'LR_hours',
            'Practice_hours',
            'Credits',
            'Start_date',
            'End_date',
            'Semester',
            'Actuality',
            'discipline_one',
            'discipline_two',
            'discipline_three',
            'Course',
        ],
    ]) ?>

</div>
