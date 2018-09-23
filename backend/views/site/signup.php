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

    <h1><?= Html::encode($this->title) ?></h1>

    <h3>Реєстрація викладача</h3>
    <p>Будь ласка, заповніть наступні поля:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логiн') ?>

                <?= $form->field($model, 'Student_surname')->label('ПIБ') ?>

                <?= $form->field($model, 'email') ?>
                
                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                <?= Html::submitButton('Зареєструватися', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

