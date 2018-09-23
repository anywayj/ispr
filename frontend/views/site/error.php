<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'Не знайдено (# 404)';
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode('Сторінку не знайдено або недостатньо прав.')) ?>
    </div>

    <p>
        Вище виникла помилка під час обробки Вашого запиту веб-сервером.
    </p>
    <p>
        Будь ласка, зв'яжіться з нами, якщо Ви вважаєте, що це помилка сервера. Дякую.
    </p>

</div>
