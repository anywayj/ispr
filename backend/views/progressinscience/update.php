<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProgressInScience */

$this->title = 'Редагувати дані';
$this->params['breadcrumbs'][] = ['label' => 'Progress In Sciences', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_progress_science, 'url' => ['view', 'id' => $model->id_progress_science]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="progress-in-science-update">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
