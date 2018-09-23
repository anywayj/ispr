<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use kartik\sidenav\SideNav;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use frontend\assets\MyAsset;
use common\widgets\Alert;
use miloschuman\highcharts\Highcharts;
MyAsset::register($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        //'brandLabel' => Yii::$app->name,
        'brandLabel' => '<div class="logo">Кафедра IСПР <i class="fa fa-comments"></i></div>', 
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top xx',
        ],
    ]);
    
    if (Yii::$app->user->isGuest) {
      //  $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];

       // $menuItems[] = ['label' => 'Вход', 'url' => ['/site/login']];

        $menuItems = [
        ['label' => 'Головна', 'url' => ['/site/index']],
        ['label' => 'Про нас', 'url' => ['/site/about']],
        //['label' => 'Якість освіти', 'url' => ['/site/vika']],
        ['label' => 'Викладачі', 'url' => ['/site/teachers']],
        ['label' => 'Студенту', 'url' => ['/site/control']],


        ['label' => 'Вхiд', 'url' => ['/site/login']],
        ];

    } else {
        $menuItems = [
        ['label' => 'Головна', 'url' => ['/site/index']],
        //['label' => 'Уведомления', 'url' => ['/site/index1']],
        ['label' => 'Прогноз успішності', 'items' => [
                    ['label' => 'Прогноз для групи', 'url' => ['site/entry']],
                    ['label' => 'Iндивідуальний прогноз', 'url' => ['site/entry2']],
                ]],
        ['label' => 'Якість освіти', 'url' => ['/site/vika'], 'visible' => Yii::$app->user->can('canAdmin')],
        ['label' => 'Викладачi', 'url' => ['/site/teachers']],
        //['label' => 'Дисциплiни', 'url' => ['/site/index4']],
       // ['label' => 'Положение', 'url' => ['/site/control']],
        
        ['label' => 'Журнали', 'items' => [
                    ['label' => 'Успішність', 'url' => ['site/estimate']],
                    ['label' => 'Відвідуванність', 'url' => ['site/estimate1']],
                ]],
        ['label' => 'Управління', 'url' => ['/blog/index']],
        '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                //'Вихiд (' . Yii::$app->user->identity->students->Student_FIO . ')',
                'Вихiд (' . Yii::$app->user->identity->Student_surname . ')',
                ['class' => 'btn btn-link logout',
                'style' => 'color: #fff; '
                //font-size: 1.6rem;'
                ]
            )
            . Html::endForm()
            . 
        '</li>',
            
        ]; 


    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    
    <?php if(Yii::$app->user->isGuest): ?>

    <div class="container-fluid">
        <?= $content ?>
    </div> 
         
      <?php else: ?>
    <div class="container">
        <?php/* Breadcrumbs::widget([
            'homeLink' => ['label' => 'Главная', 'url' => '/site/index'],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() */?>
    
<section id="container1">
<div class="col-lg-3">
    <?php
echo SideNav::widget([
    'type' => $type,
    'encodeLabels' => false,
    'heading' => $heading,
    'items' => [
        ['label' => '<i class="fa fa-phone-square"></i>     Телефон', 'url' => Url::to(['/site/home', 'type'=>$type]), 'active' => ($item == 'home')],
        ['label' => '<i class="fa fa-comment"></i>     Повідомлення', 'url' => Url::to(['/site/home', 'type'=>$type]), 'active' => ($item == 'home')],
        ['label' => '<i class="fa fa-envelope"></i>     Пошта', 'url' => Url::to(['/site/home', 'type'=>$type]), 'active' => ($item == 'home')],
        ['label' => '<i class="fa fa-gear"></i>     Налаштування профілю', 'url' => Url::to(['/site/home', 'type'=>$type]), 'active' => ($item == 'home')],
    ],
]); 
?>
</div>
</section>
    <div class="col-lg-9"><?= $content ?></div>
        
    </div> 
  <? endif ?>



</div>



  
<div id="footer">
            <div class="container">
                <div class="row centered">

    <div class="col-lg-12">
    
        <a href="https://www.facebook.com/groups/414390968948060/"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-dribbble"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
        <a href="#"><i class="fa fa-vk"></i></a>

    </div>
    <div class="col-lg-12">
            <i class="fa fa-map-marker"></i>84313, Донецька обл., м. Краматорськ, вул. Академічна (Шкадінова), 72
            <br>
            <i class="fa fa-phone"></i>(0626) 41-67-13
            <i class="fa fa-envelope-o"></i></strong>dgma@dgma.donetsk.ua<br>
            </div>

        </div>
    </div>
</div>





<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
