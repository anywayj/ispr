<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Teachers */

$this->title = 'Изменить данные';
$this->params['breadcrumbs'][] = ['label' => 'Teachers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Teacher_id, 'url' => ['view', 'id' => $model->Teacher_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="teachers-update">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
