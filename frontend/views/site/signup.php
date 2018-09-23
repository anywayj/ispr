<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Реєстрація';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <h3>Для доступу до повного функціоналу сайту<br>
     Вам необхідно пройти просту процедуру реєстрації</h3>
    <p>Будь ласка, заповніть наступні поля:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Номер студентського') ?>

                <?= $form->field($model, 'Student_surname') ?>

                <?= $form->field($model, 'email') ?>
                
                <?= $form->field($model, 'password')->passwordInput() ?>

                <?php // $form->field($model, 'created_at')->textInput()  ?>

                <?php // $form->field($model, 'updated_at')->textInput()  ?>

                <div class="form-group">
                <?= Html::submitButton('Зареєструватися', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                <?= Html::a(Yii::t("app", "Повернутися"), ["/site/login"] , ['class' => 'btn btn-info']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>