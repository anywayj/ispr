<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProgressInPublic */

$this->title = 'Редагувати дані';
$this->params['breadcrumbs'][] = ['label' => 'Progress In Publics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_progress_public, 'url' => ['view', 'id' => $model->id_progress_public]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="progress-in-public-update">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
