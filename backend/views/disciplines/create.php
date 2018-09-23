<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Disciplines */

$this->title = 'Додати дисциплiну';
$this->params['breadcrumbs'][] = ['label' => 'Disciplines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disciplines-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
