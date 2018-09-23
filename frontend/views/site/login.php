<?php
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'Вхiд';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

<?php /* Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) */?>

    <p>Будь ласка, заповніть наступні поля для входу:</p>
    
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>


                <div style="color:#999;margin:1em 0">
                    Якщо Ви забули свій пароль, Ви можете його <?= Html::a('Відновити', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Вхiд', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    <?= Html::a(Yii::t("app", "Реєстрація"), ["/site/signup"] , ['class' => 'btn btn-info']) ?>
                   
                    
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>