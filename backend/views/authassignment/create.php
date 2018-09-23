<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Authassignment */

$this->title = 'Додати правило';
$this->params['breadcrumbs'][] = ['label' => 'Authassignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authassignment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
