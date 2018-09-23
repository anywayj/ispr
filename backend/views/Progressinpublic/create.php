<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProgressInPublic */

$this->title = 'Додати данi';
$this->params['breadcrumbs'][] = ['label' => 'Progress In Publics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="progress-in-public-create">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
