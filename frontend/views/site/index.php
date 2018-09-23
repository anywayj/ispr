<?php
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\helpers\Html;
/* @var $this yii\web\View */
use frontend\assets\AppAsset;
use frontend\assets\MyAsset;
use miloschuman\highcharts\Highcharts;
MyAsset::register($this);
AppAsset::register($this);
$this->title = 'Головна';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="site-index">
    <div class="row">
      <?php if(Yii::$app->user->isGuest): ?>
      <div class="col-lg-9">
      <?php else: ?>
        <div class="col-lg-8">
      <?php endif ?>

        <div class="col-lg-6">
            <?php   echo $news1; ?>
        </div>
        <?php if(Yii::$app->user->isGuest): ?>
        <div class="col-lg-6">
            <?php   echo $news2; ?>
        </div>
        <?php endif ?>
           
      </div>

    <?php if(Yii::$app->user->isGuest): ?>
      <div class="col-lg-3">
    <?php else: ?>
      <div class="col-lg-4">
    <?php endif ?>
            <div class="ds" style="border: 1px solid rgba(0,0,0,0.2);">
                        <h3>Категорії</h3>
                                        
                      <!-- First Action -->
                      <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-graduation-cap"></i></span>
                        </div>
                        <div class="details">
                            <p style="font-size: 1.5rem;">Сесія</p>
                        </div>
                      </div>
                      <!-- Second Action -->
                      <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-star"></i></span>
                        </div>
                        <div class="details">
                            <p style="font-size: 1.5rem;">Олімпіади</p>
                        </div>
                      </div>
                      <!-- Third Action -->
                      <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-hotel"></i></span>
                        </div>
                        <div class="details">
                            <p style="font-size: 1.5rem;">Позанавчальна діяльність</p>
                        </div>
                      </div>

                        <h3>Популярні новини</h3>
                      <div class="hot-news">
                        <p>СТУДЕНТІВ ЗАПРОШУЮТЬ СТАТИ ГРОМАДЯНАМИ «СТУДРЕСПУБЛІКИ»</p>
                      </div>
                      <div class="hot-news">
                        <p>ДОЛУЧИСЬ ДО АКЦІЇ «Я СКЛАДАЮ СЕСІЮ БЕЗ ХАБАРІВ»</p>
                      </div>
                      <div class="hot-news">
                        <p>ПРОДОВЖУЄТЬСЯ РОБОТА В СТАРТАП ШКОЛІ СІКОРСЬКІ ЧЕЛЕНДЖ</p>
                      </div>
                    <?if (!Yii::$app->user->isGuest): ?>
                      <h3>Топ</h3>

                      <!-- three Member -->
                      <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                            <p><a href="/site/grants">Кращi студенти для заоходщення</a><br/>
                            <muted>Детальнiше</muted>
                            </p>
                        </div>
                      </div>
                    <?endif ?>
                      <!--<h3>Працевлаштування студентів</h3>
                      <div>
                      <?php /*
                        echo Highcharts::widget([
                        'options' => [
                            'title' => ['text' => ''],
                            'plotOptions' => [
                                'pie' => [
                                    'cursor' => 'pointer',
                                ],
                            ],
                            'series' => [
                                [ // new opening bracket
                                    'type' => 'pie',
                                    'name' => 'Elements',
                                    'data' => [
                                        ['Працевлаштованi', 90.0],
                                        ['Непрацевлаштованi', 10.0]
                                    ],
                                ] // new closing bracket
                            ],
                        ],
                    ]);
                    */?>
                    </div> -->
            </div>
      </div>
    </div> 
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

