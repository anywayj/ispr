<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Повiдомлення');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (\Yii::$app->user->can('canAdmin', ['author_id' => $model->user_id])): ?>

<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Додати повiдомлення'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,

       // 'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'title',
           // 'text:ntext',
           // 'status_id',
           // 'date',
            //'image',
            [
              'header'=>'Ид',
              'headerOptions' => ['style'=>'text-align: center;'],
              'attribute'=>'id',
              
            ],

            [
              'header'=>'Заголовок',
              'headerOptions' => ['style'=>'text-align: center;'],
              'attribute'=>'title',
              
            ],

            [
              'header'=>'Дата',
              'headerOptions' => ['style'=>'text-align: center;'],
              'attribute'=>'date',
              
            ],
/*
            [
              'header'=>'Ссылка',
              'attribute'=>'url',
              
            ], */

            [
              'header'=>'Автор',
              'attribute'=>'author.Student_surname',
              
            ],
            

            [
              'class' => 'yii\grid\ActionColumn',
              'header'=>'Дії', 
              'headerOptions' => ['style'=>'text-align: center;'],

              'template' => '{update} {view} {link}',
              'contentOptions' => ['style'=>'padding:0px 10px 0px 10px;vertical-align: middle;'],
            ], 

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
    
    
</div>

<?php endif; ?>


<?php foreach($blog as $k): ?>



<div class="post_box">
            
              <h2><?= $k->title ?></h2>   
              <div class="news_meta">Опубліковано: <?= $k->date?> | Автор: <?= $k->author->username?> </div>
              <div class="image_wrapper"><img src="/img/31.jpg" width="100%"  alt="рисунок" /></a></div>
              <p align="justify">
              <?= $k->text?> </p>
              <a href="#" class="continue"><?= $k->url ?></a>
              
              <div class="cleaner"></div>
            </div>

<?php endforeach ?>




<?php foreach ($blogs as $k):?> 
                <div class="panel panel-primary">
                  <div class="panel-heading ">
                    <h3 class="panel-title x1">
                        <?= $k->title?>                    
                    </h3>
                  </div>
                  <div class="panel-body x">
                      <?= $k->text?> 
                  </div>
                </div>
            <?php endforeach ?> 
              <?= LinkPager::widget(['pagination' => $pagination]) ?>