<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProgressInScience */

$this->title = 'Додати данi';
$this->params['breadcrumbs'][] = ['label' => 'Progress In Sciences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="progress-in-science-create">

    <h1><?= Html::encode($this->title) ?></h1>
<br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
