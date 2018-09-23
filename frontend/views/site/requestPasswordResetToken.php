<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Запросити скидання паролю';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Будь ласка, заповніть свою адресу електронної пошти. Тут буде надіслане посилання на скидання пароля.</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Відправити', ['class' => 'btn btn-primary']) ?>
                    <?= Html::a(Yii::t("app", "Повернутися"), ["/site/login"] , ['class' => 'btn btn-info']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
