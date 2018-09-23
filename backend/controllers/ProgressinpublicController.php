<?php

namespace backend\controllers;

use Yii;
use common\models\ProgressInPublic;
use common\models\ProgressInPublicSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

/**
 * ProgressinpublicController implements the CRUD actions for ProgressInPublic model.
 */
class ProgressinpublicController extends Controller
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
     * Lists all ProgressInPublic models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$searchModel = new ProgressInPublicSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $one = "SELECT Students.Student_id, SUM(rank_stud+rank_group) AS sum1
            FROM ((progress_in_public
            LEFT JOIN Students ON progress_in_public.Student_id = Students.Student_id) 
            LEFT JOIN public_work ON progress_in_public.public_id = public_work.public_id)
                 
            GROUP BY Students.Student_id
        ";

        $academystud = ProgressInPublic::findBySql($one)->all();

        $dataProvider = new ActiveDataProvider([
        'query' => ProgressInPublic::find(),
        'pagination' => [
            'pageSize' => 10,
        ],
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'academystud' => $academystud,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Displays a single ProgressInPublic model.
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
     * Creates a new ProgressInPublic model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProgressInPublic();
        $model->date = date("Y-m-d H:i:s");
        $model->more_rank = 0;
        $model->number = 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_progress_public]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProgressInPublic model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_progress_public]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProgressInPublic model.
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
     * Finds the ProgressInPublic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProgressInPublic the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProgressInPublic::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
