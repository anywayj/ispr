<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Disciplines */

$this->title = 'Обновити';
$this->params['breadcrumbs'][] = ['label' => 'Disciplines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Discipline_id, 'url' => ['view', 'id' => $model->Discipline_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="disciplines-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
