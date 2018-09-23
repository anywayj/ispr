<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Користувачі';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1><br>    
    
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    
    
    <p>
        <?php// Html::a('Додати корисутвача', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'Student_surname',
            'auth_key',
           // 'password_hash',
            //'password_reset_token',
            'email:email',
           // 'status',
           // 'created_at',
           // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
