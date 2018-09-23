<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Cкидання паролю';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Виберіть новий пароль:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary']) ?>
                    <?= Html::a(Yii::t("app", "Повернутися"), ["/site/login"] , ['class' => 'btn btn-info']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
