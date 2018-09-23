<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Teachers */

$this->title = $model->Teacher_FIO;
$this->params['breadcrumbs'][] = ['label' => 'Teachers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-view">

    <h1><?= Html::encode($this->title) ?></h1><br>    

    <p>
        <?= Html::a('Редагувати', ['update', 'id' => $model->Teacher_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Додати фото', ['set-image', 'id' => $model->Teacher_id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->Teacher_id], [
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
            'Teacher_id',
            'Teacher_FIO',
            'Teacher_surname',
            'Teacher_name',
            'Teacher_lastname',
            'Teacher_phone',
            'Teacher_email:email',
           // 'image',
        ],
    ]) ?>

</div>
