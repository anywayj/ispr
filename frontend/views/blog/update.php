<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Blog */

$this->title = 'Редагувати повiдомлення';
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Вiдновити';
?>
<div class="blog-update">

    <h1><?= Html::encode($this->title) ?></h1>
<?php if (\Yii::$app->user->can('updatePost', ['author_id' => $model->author_id])): ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
<?php else: ?>
	<div class="alert alert-danger">
	<?= nl2br(Html::encode('Ви не є автором повiдомленяя, дії заборонені.')) ?>
	</div>
<?php endif; ?>
</div>
