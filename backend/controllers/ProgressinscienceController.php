<?php

namespace backend\controllers;

use Yii;
use common\models\ProgressInScience;
use common\models\ProgressInPublic;
use common\models\ProgressInScienceSearch;
use common\models\ProgressInPublicSearch;
use common\models\sciencework;
use common\models\publicwork;
use common\models\Session;
use common\models\GroupAcademy;
use common\models\Students;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

/**
 * ProgressinscienceController implements the CRUD actions for ProgressInScience model.
 */
class ProgressinscienceController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['login','error'],
                        'allow' => true,
                      //  'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index','view','update','create','delete'],
                        'allow' => true,
                       // 'roles' => ['canAdmin'], //для 3-х ролей если наследует в item_child
                        'roles' => ['admin'], 
                    ],

                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProgressInScience models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProgressInScienceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

$startdate = '2018.01.01';
$enddate = '2018.04.10';

$one = "
SELECT Students.Student_FIO, Avg(Session.Raiting_100) AS AvgRait, Sum(progress_in_science.more_rank) AS SumBall1, Sum(progress_in_public.more_rank) AS SumBall2, progress_in_science.Student_id, progress_in_public.Student_id, Session.Student_id,Session.Raiting_100
FROM ((Students 
LEFT JOIN progress_in_science ON Students.Student_id = progress_in_science.Student_id 
and (progress_in_science.date between '$startdate' and '$enddate')) 
LEFT JOIN progress_in_public ON Students.Student_id = progress_in_public.Student_id 
and (progress_in_public.date between '$startdate' and '$enddate')) 
INNER JOIN Session ON Students.Student_id = Session.Student_id 
and (Session.Raiting_date between '$startdate' and '$enddate') 
GROUP BY Students.Student_FIO
        "; 



        $academy = Students::findBySql($one)->all();


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'academy' => $academy,
           // 'pagination' => $pagination,
          //  'academystud' => $academystud,
           // 'academystudpub' => $academystudpub,
           // 'academystud1' => $academystud1,
           // 'academygroup' => $academygroup,
          //  'group' => $group,
        ]);
    }


//index ->>



        //$searchModel = new ProgressInScienceSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        /*
        $one = "SELECT Students.Student_id, SUM(rank_stud+rank_group) AS sum1
            FROM ((progress_in_science
            LEFT JOIN Students ON progress_in_science.Student_id = Students.Student_id) 
            LEFT JOIN science_work ON progress_in_science.science_id = science_work.id_science)
            WHERE competition_stud=1    
            GROUP BY Students.Student_id
        "; 

       
        
        $three = "SELECT Group_id, Group_name, COUNT(Fixation_by_group.Students_id) AS Kolstud
        FROM ((Group_academy
        LEFT JOIN Fixation_by_group ON Group_academy.Group_id = Fixation_by_group.Groups_id)
        LEFT JOIN progress_in_science ON Group_academy.Group_id = progress_in_science.id_progress_science)
        
        WHERE Group_academy.Actuality=1
        GROUP BY Group_id, Group_name         
                
        ";

        $academystud = ProgressInScience::findBySql($one)->all();

        

        $group = GroupAcademy::findBySql($three)->all();

        $dataProvider = new ActiveDataProvider([
        'query' => ProgressInScience::find(),
        'pagination' => [
            'pageSize' => 10,
        ],
        ]); 
        

        <----

        */
    /**
     * Displays a single ProgressInScience model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProgressInScience model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProgressInScience();
        $model->date = date("Y-m-d H:i:s");
        $model->more_rank = 0;
        $model->number = 1;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_progress_science]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProgressInScience model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_progress_science]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProgressInScience model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProgressInScience model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProgressInScience the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProgressInScience::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
