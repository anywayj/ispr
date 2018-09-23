<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Students */

$this->title = 'Редагувати студента';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Student_id, 'url' => ['view', 'id' => $model->Student_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="students-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
