<?php
namespace frontend\controllers;

use Yii;
use GuzzleHttp\Client; 
use yii\helpers\Url;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\SignupForm1;
use frontend\models\ContactForm;
use frontend\models\EntryForm;
use frontend\models\EntryForm1;
use frontend\models\EntryForm2;
use frontend\models\Grants;
use common\models\Teachers;
use common\models\Disciplines;
use common\models\FixationByPositionTeacher;
use common\models\Blog;
use common\models\BlogSearch;
use common\models\Plan;
use common\models\GroupAcademy;
use common\models\FixationByGroup;
use common\models\Session;
use common\models\ProgressInScience;
use common\models\ScienceWork;
use common\models\PublicWork;
use yii\data\ActiveDataProvider;
use common\models\Students;
use common\models\Position;
use common\models\Diplom;
use yii\data\Pagination;
use common\models\CurrentEstimates;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
/*            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],*/
            
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['login','error','index','teachers','about',
                        'control','signup','contact','resetPassword','requestPasswordResetToken','request-password-reset','reset-password'],
                        'allow' => true,
                        //'roles' => ['?'],
                    ],
                    

                    [
                        'actions' => ['logout','entry','entry1','entry2','andrey','grants'],
                    //'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['vika'],
                        'allow' => true,
                       // 'roles' => ['canAdmin'], //для 3-х ролей если наследует в item_child
                        'roles' => ['canAdmin'], 
                    ],

                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */

    public function actionGrants()
    {
        $modelf = new Grants();
        $modelf->progressStartdate = '2016-01-01';
        $modelf->progressEnddate = '2018-01-01';
        $modelf->sessionStartdate = '2018-01-01';
        $modelf->sessionEnddate = '2018-01-01';

        if ($modelf->load(Yii::$app->request->post()) && $modelf->validate()) {
        
        $stipend = "SELECT name FROM science_work 
        WHERE science_id >= 24 AND science_id <= 29
        order by science_id desc
        ";

        $one = "
            SELECT Students.Student_FIO, B.s1, C.s2, A.sr, Students.Student_id
            FROM ((((Students 

            LEFT JOIN (SELECT SUM(more_rank) as s1, Students.Student_id 
            FROM Students INNER JOIN progress_in_science ON Students.Student_id = progress_in_science.Student_id 
            WHERE progress_in_science.date Between '$modelf->progressStartdate' And '$modelf->progressEnddate'
            group by Students.Student_id) AS B ON Students.Student_id = B.Student_id) 

            LEFT JOIN (SELECT SUM(more_rank) as s2, Students.Student_id
            FROM Students INNER JOIN progress_in_public ON Students.Student_id  = progress_in_public.Student_id
            WHERE progress_in_public.date Between '$modelf->progressStartdate' And '$modelf->progressEnddate'
            group by Students.Student_id) AS C ON Students.Student_id = C.Student_id) 

            INNER JOIN (SELECT round(avg(Raiting_100),5) as sr, Students.Student_id
            FROM ((Students INNER JOIN Session ON Students.Student_id = Session.Student_id)
            INNER JOIN List_stud ON Session.Student_id = List_stud.Student_id)
            WHERE Session.Raiting_date Between '$modelf->sessionStartdate' And '$modelf->sessionEnddate' 
            
            group by Students.Student_id) AS A ON Students.Student_id = A.Student_id)
            
            )

            order by sr desc limit 6 
        ";

        $academy = Students::findBySql($one)->all();
        $stipends = ScienceWork::findBySql($stipend)->all();

            return $this->render('grants', [
                'modelf' => $modelf,
                'academy' => $academy,
                'stipends' => $stipends,
                ]);
        } else {
            return $this->render('grants', ['modelf' => $modelf]);
        }
    }

    public function actionEstimate()
    {
        $modelf = new EntryForm();
        $modelf->disc = '23';
        $modelf->group = '3';

        
        $sm1 = 
        "SELECT *
        FROM ((Current_estimates
        INNER JOIN Fixation_by_group ON Current_estimates.Student_id = Fixation_by_group.Student_id) 
        INNER JOIN Students ON Current_estimates.Student_id = Students.Student_id)
        WHERE ((Fixation_by_group.Group_id = '3') AND (Current_estimates.Plan_id = '46'))
        Order by Students.Student_FIO
        ";
        $estimates = CurrentEstimates::findBySql($sm1)->all();

        //$estimates = CurrentEstimates::find()->where('Plan_id = 121')->andwhere('Student_id = 47004108')->all();
        return $this->render('estimate', [
            'estimates' => $estimates,
            'modelf' => $modelf,
        ]);
    }

    public function actionEntry()
    {
        $modelf = new EntryForm();
        $modelf->raitingstart = '2017-02-01';
        $modelf->raitingend = '2017-02-25';
        $modelf->raitingstart1 = '2017-06-01';
        $modelf->raitingend1 = '2017-06-25';
        $modelf->disc = '58';
        $modelf->group = '3';
        $modelf->student = '46372257';
        $modelf->raitingstart2 = '2017-02-01';
        $modelf->raitingend2 = '2017-02-25';

        if ($modelf->load(Yii::$app->request->post()) && $modelf->validate()) {
        
        $ind1 = 
        "SELECT DISTINCT Students.Student_id, Students.Student_FIO, Session.Raiting_100 
        FROM (Students 
        INNER JOIN (Group_academy INNER JOIN Fixation_by_group ON Group_academy.Group_id = Fixation_by_group.Group_id) 
        ON Students.Student_id = Fixation_by_group.Student_id) 
        INNER JOIN ((Disciplines INNER JOIN Plan ON Disciplines.Discipline_id = Plan.Discipline_id) 
        INNER JOIN Session ON Plan.Plan_id = Session.Plan_id) ON Students.Student_id = Session.Student_id 
        WHERE ((Session.Raiting_date BETWEEN '$modelf->raitingstart' AND '$modelf->raitingend') AND (Group_academy.Group_id='$modelf->group') 
        AND (Disciplines.Discipline_id='$modelf->disc')) 
        ";

        $ind2 = 
        "SELECT DISTINCT Students.Student_id, Students.Student_FIO, Session.Raiting_100 
        FROM (Students 
        INNER JOIN (Group_academy INNER JOIN Fixation_by_group ON Group_academy.Group_id = Fixation_by_group.Group_id) 
        ON Students.Student_id = Fixation_by_group.Student_id) 
        INNER JOIN ((Disciplines INNER JOIN Plan ON Disciplines.Discipline_id = Plan.Discipline_id) 
        INNER JOIN Session ON Plan.Plan_id = Session.Plan_id) ON Students.Student_id = Session.Student_id 
        WHERE ((Session.Raiting_date BETWEEN '$modelf->raitingstart1' AND '$modelf->raitingend1') AND (Group_academy.Group_id='$modelf->group') 
        AND (Disciplines.Discipline_id='$modelf->disc')) 
        ";

        $ind5 = "SELECT Session.Raiting_100
        FROM Students INNER JOIN ((Disciplines INNER JOIN Plan ON Disciplines.Discipline_id = Plan.Discipline_id) INNER JOIN Session ON Plan.Plan_id = Session.Plan_id) ON Students.Student_id = Session.Student_id
        WHERE (((Students.Student_id)='$modelf->student') AND ((Session.Raiting_date) Between '$modelf->raitingstart2' And '$modelf->raitingend2') AND ((Disciplines.Discipline_id)='$modelf->disc'));
        ";

        $and5 = Session::findBySql($ind5)->all();
        $and1 = Session::findBySql($ind1)->all();
        $and2 = Session::findBySql($ind2)->all();

            return $this->render('entry1', [
                'modelf' => $modelf,
                'and1' => $and1,
                'and2' => $and2,
                'and5' => $and5,
                ]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('entry', ['modelf' => $modelf]);
        }
    }

    public function actionEntry1()
    {
        $modelf = new EntryForm1();
        $modelf->raitingstart2 = '2017-02-01';
        $modelf->raitingend2 = '2017-02-25';
        $modelf->disc = '58';
        $modelf->student = '46372257';
        if ($modelf->load(Yii::$app->request->post()) && $modelf->validate()) {

        $ind5 = "SELECT Session.Raiting_100
        FROM Students INNER JOIN ((Disciplines INNER JOIN Plan ON Disciplines.Discipline_id = Plan.Discipline_id) INNER JOIN Session ON Plan.Plan_id = Session.Plan_id) ON Students.Student_id = Session.Student_id
        WHERE (((Students.Student_id)='$modelf->student') AND ((Session.Raiting_date) Between '$modelf->raitingstart2' And '$modelf->raitingend2') AND ((Disciplines.Discipline_id)='$modelf->disc'));
        ";

        $and5 = Session::findBySql($ind5)->all();

            return $this->render('entry1', [
                'modelf' => $modelf,
                'and5' => $and5,
                ]);
        } else {
            return $this->render('entry1', ['modelf' => $modelf]);
        }
    }

    public function actionEntry2()
    {
        $modelf = new EntryForm2();
        $modelf->disc1 = '30';
        $modelf->disc2 = '57';
        $modelf->disc3 = '58';
        $modelf->student = '46372257';

        if ($modelf->load(Yii::$app->request->post()) && $modelf->validate()) {
        
        $ind4 = "
        SELECT Students.Student_id,Students.Student_FIO, A.Raiting_100, B.Raiting_100 as Raiting_ETS, C.Raiting_100 as Raiting_classic FROM Students, 
        (SELECT DISTINCT Raiting_100, Students.Student_id FROM Students INNER JOIN ((Disciplines INNER JOIN Plan 
        ON Disciplines.Discipline_id = Plan.Discipline_id) INNER JOIN Session ON Plan.Plan_id = Session.Plan_id) 
        ON Students.Student_id = Session.Student_id WHERE Disciplines.Discipline_id='$modelf->disc1')  AS A, 
        (SELECT DISTINCT Raiting_100, Students.Student_id FROM Students INNER JOIN ((Disciplines INNER JOIN Plan 
        ON Disciplines.Discipline_id = Plan.Discipline_id) INNER JOIN Session ON Plan.Plan_id = Session.Plan_id) 
        ON Students.Student_id = Session.Student_id WHERE Disciplines.Discipline_id='$modelf->disc2')  AS B, 
        (SELECT DISTINCT Raiting_100, Students.Student_id FROM Students INNER JOIN ((Disciplines INNER JOIN Plan 
        ON Disciplines.Discipline_id = Plan.Discipline_id) INNER JOIN Session ON Plan.Plan_id = Session.Plan_id) 
        ON Students.Student_id = Session.Student_id WHERE Disciplines.Discipline_id='$modelf->disc3')  AS C 
        WHERE Students.Student_id = A.Student_id and Students.Student_id = B.Student_id 
        and Students.Student_id = C.Student_id
        ";

        $ind3 = "
        SELECT Students.Student_id,Students.Student_FIO, A.Raiting_100, B.Raiting_100 as Raiting_classic FROM Students, (SELECT DISTINCT Raiting_100, Students.Student_id FROM Students 
        INNER JOIN ((Disciplines INNER JOIN Plan ON Disciplines.Discipline_id = Plan.Discipline_id) INNER JOIN Session ON Plan.Plan_id = Session.Plan_id) 
        ON Students.Student_id = Session.Student_id WHERE Disciplines.Discipline_id='$modelf->disc1') AS A, (SELECT DISTINCT Raiting_100, Students.Student_id 
        FROM Students INNER JOIN ((Disciplines INNER JOIN Plan ON Disciplines.Discipline_id = Plan.Discipline_id) INNER JOIN Session 
        ON Plan.Plan_id = Session.Plan_id) ON Students.Student_id = Session.Student_id WHERE Disciplines.Discipline_id='$modelf->disc2')  AS B 
        WHERE Students.Student_id = A.Student_id and Students.Student_id = B.Student_id and Students.Student_id = '$modelf->student'   
        limit 1 
        ";

        $and4 = Session::findBySql($ind4)->all();
        $and3 = Session::findBySql($ind3)->all();

            return $this->render('entry2', [
                'modelf' => $modelf,
                'and4' => $and4,
                'and3' => $and3,
                ]);
        } else {
            return $this->render('entry2', ['modelf' => $modelf]);
        }
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {   
        
        $client = new Client();
        // отправляем запрос к странице Дгма
        $res = $client->request('GET', 'http://www.dgma.donetsk.ua/');
   
        // получаем данные между открывающим и закрывающим тегами body
        $body = $res->getBody();

        

        // подключаем phpQuery
        $document = \phpQuery::newDocumentHTML($body);
        //Смотрим html страницы ДГМА, определяем внешний класс списка и считываем его командой find
        /*$news = $document->find(".center_coloumn"); */
        $news1 = $document->find(".news_c, style"); 
        $news2 = $document->find(".adv_c, style"); 

        $query = Blog::find();
        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count(),
        ]);

        $blogs = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'blogs' => $blogs,
            'pagination' => $pagination,
            'body' => $body,
            'news1' => $news1,
            'news2' => $news2,
        ]); 
    }

    public function actionVika()
    {
        $position = Position::find()->all();
        $diplom = Diplom::find()->all();
        $students = Students::find()
    ->orderBy(['Year' => SORT_ASC,'Sum_ball' => SORT_ASC])
    ->all();
        $stud2012skor = Students::find()
    ->orderBy(['Sum_ball' => SORT_ASC])
    ->where(['Year' => '2012','Class' => 'прискорений'])
    ->all();
        $stud2012pov = Students::find()
    ->orderBy(['Sum_ball' => SORT_ASC])
    ->where(['Year' => '2012','Class' => 'повний'])
    ->all();
        $stud2013skor = Students::find()
    ->orderBy(['Sum_ball' => SORT_ASC])
    ->where(['Year' => '2013','Class' => 'прискорений'])
    ->all();
        $stud2013pov = Students::find()
    ->orderBy(['Sum_ball' => SORT_ASC])
    ->where(['Year' => '2013','Class' => 'повний'])
    ->all();
        $stud2014skor = Students::find()
    ->orderBy(['Sum_ball' => SORT_ASC])
    ->where(['Year' => '2014','Class' => 'прискорений'])
    ->all();
        $stud2014pov = Students::find()
    ->orderBy(['Sum_ball' => SORT_ASC])
    ->where(['Year' => '2014','Class' => 'повний'])
    ->all();
        $stud2015skor = Students::find()
    ->orderBy(['Sum_ball' => SORT_ASC])
    ->where(['Year' => '2015','Class' => 'прискорений'])
    ->all();
        $stud2015pov = Students::find()
    ->orderBy(['Sum_ball' => SORT_ASC])
    ->where(['Year' => '2015','Class' => 'повний'])
    ->all();
        $stud2016skor = Students::find()
    ->orderBy(['Sum_ball' => SORT_ASC])
    ->where(['Year' => '2016','Class' => 'прискорений'])
    ->all();
        $stud2016pov = Students::find()
    ->orderBy(['Sum_ball' => SORT_ASC])
    ->where(['Year' => '2016','Class' => 'повний'])
    ->all();
        $stud2017skor = Students::find()
    ->orderBy(['Sum_ball' => SORT_ASC])
    ->where(['Year' => '2017','Class' => 'прискорений'])
    ->all();
        $stud2017pov = Students::find()
    ->orderBy(['Sum_ball' => SORT_ASC])
    ->where(['Year' => '2017','Class' => 'повний'])
    ->all();

        $start_date2012='2012-01-01';
        $end_date2012='2012-12-30';
    
        $start_date2013='2013-01-01';
        $end_date2013='2013-12-30';

        $start_date2014='2014-01-01';
        $end_date2014='2014-12-30';

        $start_date2015='2015-01-01';
        $end_date2015='2015-12-30';

        $start_date2016='2016-01-01';
        $end_date2016='2016-12-30';

        $start_date2017='2017-01-01';
        $end_date2017='2017-12-30';   

        $diplom2012 = Diplom::find()
    ->where('Raiting_date BETWEEN "'. date('Y-m-d', strtotime($start_date2012)).
     '" and "'. date('Y-m-d', strtotime($end_date2012)).'"')
    ->andWhere('Raiting_100<>0')
    ->all(); 
        $diplom2013 = Diplom::find()
    ->where('Raiting_date BETWEEN "'. date('Y-m-d', strtotime($start_date2013)).
     '" and "'. date('Y-m-d', strtotime($end_date2013)).'"')
    ->andWhere('Raiting_100<>0')
    ->all();
        $diplom2014 = Diplom::find()
    ->where('Raiting_date BETWEEN "'. date('Y-m-d', strtotime($start_date2014)).
     '" and "'. date('Y-m-d', strtotime($end_date2014)).'"')
    ->andWhere('Raiting_100<>0')
    ->all();
        $diplom2015 = Diplom::find()
    ->where('Raiting_date BETWEEN "'. date('Y-m-d', strtotime($start_date2015)).
     '" and "'. date('Y-m-d', strtotime($end_date2015)).'"')
    ->andWhere('Raiting_100<>0')
    ->all();
        $diplom2016 = Diplom::find()
    ->where('Raiting_date BETWEEN "'. date('Y-m-d', strtotime($start_date2016)).
     '" and "'. date('Y-m-d', strtotime($end_date2016)).'"')
    ->andWhere('Raiting_100<>0')
    ->all();
        $diplom2017 = Diplom::find()
    ->where('Raiting_date BETWEEN "'. date('Y-m-d', strtotime($start_date2017)).
     '" and "'. date('Y-m-d', strtotime($end_date2017)).'"')
    ->andWhere('Raiting_100<>0')
    ->all();
    

$teach12 = 
"SELECT Count(Teachers.Teacher_id) AS Kolteach, Position.Position_name, Position.Position_id, Position.ETS
FROM ((Teachers  
INNER JOIN Fixation_by_position_teacher ON Teachers.Teacher_id = Fixation_by_position_teacher.Teacher_id) 
INNER JOIN Position ON Fixation_by_position_teacher.Position_id = Position.Position_id)
WHERE ((Fixation_by_position_teacher.Actuality = False) 
AND (Fixation_by_position_teacher.Start_date <= '2012-09-01') 
AND (Fixation_by_position_teacher.End_date >= '2013-08-01')) 
OR ((Fixation_by_position_teacher.Actuality = True) AND
(Fixation_by_position_teacher.Start_date <= '2012-09-01'))
GROUP BY Position.Position_name, Position.Position_id, Position.ETS
ORDER BY Position.Position_id DESC
";

$teach13 = 
"SELECT Count(Teachers.Teacher_id) AS Kolteach, Position.Position_name, Position.Position_id, Position.ETS
FROM ((Teachers  
INNER JOIN Fixation_by_position_teacher ON Teachers.Teacher_id = Fixation_by_position_teacher.Teacher_id) 
INNER JOIN Position ON Fixation_by_position_teacher.Position_id = Position.Position_id)
WHERE ((Fixation_by_position_teacher.Actuality = False) 
AND (Fixation_by_position_teacher.Start_date <= '2013-09-01') 
AND (Fixation_by_position_teacher.End_date >= '2014-08-01')) 
OR ((Fixation_by_position_teacher.Actuality = True) AND
(Fixation_by_position_teacher.Start_date <= '2013-09-01'))
GROUP BY Position.Position_name, Position.Position_id, Position.ETS
ORDER BY Position.Position_id DESC";

$teach14 = 
"SELECT Count(Teachers.Teacher_id) AS Kolteach, Position.Position_name, Position.Position_id, Position.ETS
FROM ((Teachers  
INNER JOIN Fixation_by_position_teacher ON Teachers.Teacher_id = Fixation_by_position_teacher.Teacher_id) 
INNER JOIN Position ON Fixation_by_position_teacher.Position_id = Position.Position_id)
WHERE ((Fixation_by_position_teacher.Actuality = False) 
AND (Fixation_by_position_teacher.Start_date <= '2014-09-01') 
AND (Fixation_by_position_teacher.End_date >= '2015-08-01')) 
OR ((Fixation_by_position_teacher.Actuality = True) AND
(Fixation_by_position_teacher.Start_date <= '2014-09-01'))
GROUP BY Position.Position_name, Position.Position_id, Position.ETS
ORDER BY Position.Position_id DESC";

$teach15 = 
"SELECT Count(Teachers.Teacher_id) AS Kolteach, Position.Position_name, Position.Position_id, Position.ETS
FROM ((Teachers  
INNER JOIN Fixation_by_position_teacher ON Teachers.Teacher_id = Fixation_by_position_teacher.Teacher_id) 
INNER JOIN Position ON Fixation_by_position_teacher.Position_id = Position.Position_id)
WHERE ((Fixation_by_position_teacher.Actuality = False) 
AND (Fixation_by_position_teacher.Start_date <= '2015-09-01') 
AND (Fixation_by_position_teacher.End_date >= '2016-08-01')) 
OR ((Fixation_by_position_teacher.Actuality = True) AND
(Fixation_by_position_teacher.Start_date <= '2015-09-01'))
GROUP BY Position.Position_name, Position.Position_id, Position.ETS
ORDER BY Position.Position_id DESC";

$teach16 = 
"SELECT Count(Teachers.Teacher_id) AS Kolteach, Position.Position_name, Position.Position_id, Position.ETS
FROM ((Teachers  
INNER JOIN Fixation_by_position_teacher ON Teachers.Teacher_id = Fixation_by_position_teacher.Teacher_id) 
INNER JOIN Position ON Fixation_by_position_teacher.Position_id = Position.Position_id)
WHERE ((Fixation_by_position_teacher.Actuality = False) 
AND (Fixation_by_position_teacher.Start_date <= '2016-09-01') 
AND (Fixation_by_position_teacher.End_date >= '2017-08-01')) 
OR ((Fixation_by_position_teacher.Actuality = True) AND
(Fixation_by_position_teacher.Start_date <= '2016-09-01'))
GROUP BY Position.Position_name, Position.Position_id, Position.ETS
ORDER BY Position.Position_id DESC";

$teach17 = 
"SELECT Count(Teachers.Teacher_id) AS Kolteach, Position.Position_name, Position.Position_id, Position.ETS
FROM ((Teachers  
INNER JOIN Fixation_by_position_teacher ON Teachers.Teacher_id = Fixation_by_position_teacher.Teacher_id) 
INNER JOIN Position ON Fixation_by_position_teacher.Position_id = Position.Position_id)
WHERE ((Fixation_by_position_teacher.Actuality = False) 
AND (Fixation_by_position_teacher.Start_date <= '2017-09-01') 
AND (Fixation_by_position_teacher.End_date >= '2018-08-01')) 
OR ((Fixation_by_position_teacher.Actuality = True) AND
(Fixation_by_position_teacher.Start_date <= '2017-09-01'))
GROUP BY Position.Position_name, Position.Position_id, Position.ETS
ORDER BY Position.Position_id DESC";

    $teachz12 = FixationByPositionTeacher::findBySql($teach12)->all();
    $teachz13 = FixationByPositionTeacher::findBySql($teach13)->all();
    $teachz14 = FixationByPositionTeacher::findBySql($teach14)->all();
    $teachz15 = FixationByPositionTeacher::findBySql($teach15)->all();
    $teachz16 = FixationByPositionTeacher::findBySql($teach16)->all();
    $teachz17 = FixationByPositionTeacher::findBySql($teach17)->all();

$estimates2012pov1 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates 
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id)
WHERE ((Current_estimates.Start_year = 2012) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 104))";

$estimates2012pov2 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2012) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 68))";

$estimates2012pov3 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2012) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 113))";

$estimates2012pov4 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2012) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 46))";

$estimates2012pov5 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2012) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 95))";

$estimates2012skor1 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2012) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 121))";

$estimates2012skor2 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2012) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 122))";

$estimates2012skor3 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2012) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 123))";

$estimates2012skor4 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2012) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 124))";

$estimates2012skor5 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2012) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 125))";

$estimates2013pov1 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2013) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 104))";

$estimates2013pov2 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2013) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 68))";

$estimates2013pov3 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2013) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 113))";

$estimates2013pov4 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2013) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 46))";

$estimates2013pov5 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2013) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 95))";

$estimates2013skor1 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2013) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 121))";

$estimates2013skor2 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2013) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 122))";

$estimates2013skor3 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2013) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 123))";

$estimates2013skor4 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2013) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 124))";

$estimates2013skor5 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2013) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 125))";

$estimates2014pov1 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2014) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 104))";

$estimates2014pov2 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2014) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 68))";

$estimates2014pov3 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2014) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 113))";

$estimates2014pov4 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2014) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 46))";

$estimates2014pov5 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2014) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 95))";

$estimates2014skor1 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2014) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 121))";

$estimates2014skor2 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2014) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 122))";

$estimates2014skor3 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2014) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 123))";

$estimates2014skor4 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2014) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 124))";

$estimates2014skor5 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2014) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 125))";

$estimates2015pov1 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2015) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 104))";

$estimates2015pov2 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2015) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 68))";

$estimates2015pov3 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2015) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 113))";

$estimates2015pov4 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2015) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 46))";

$estimates2015pov5 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2015) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 95))";

$estimates2015skor1 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2015) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 121))";

$estimates2015skor2 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2015) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 122))";

$estimates2015skor3 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2015) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 123))";

$estimates2015skor4 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2015) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 124))";

$estimates2015skor5 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2015) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 125))";

$estimates2016pov1 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2016) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 104))";

$estimates2016pov2 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2016) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 68))";

$estimates2016pov3 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2016) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 113))";

$estimates2016pov4 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2016) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 46))";

$estimates2016pov5 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2016) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 95))";

$estimates2016skor1 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2016) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 121))";

$estimates2016skor2 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2016) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 122))";

$estimates2016skor3 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2016) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 123))";

$estimates2016skor4 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2016) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 124))";

$estimates2016skor5 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2016) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 125))";


$estimates2017pov1 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2017) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 104))";

$estimates2017pov2 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2017) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 68))";

$estimates2017pov3 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2017) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 113))";

$estimates2017pov4 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2017) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 46))";

$estimates2017pov5 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2017) AND (Current_estimates.Course = 'повний') AND (Current_estimates.Plan_id = 95))";

$estimates2017skor1 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2017) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 121))";

$estimates2017skor2 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year
FROM (Current_estimates 
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2017) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 122))";

$estimates2017skor3 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2017) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 123))";

$estimates2017skor4 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2017) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 124))";

$estimates2017skor5 = 
"SELECT Plan.Lecture_hours, Plan.Practice_hours, Sum(LR_1+LR_2+LR_3+LR_4+LR_5+LR_6+LR_7+LR_8+LR_9+LR_10+LR_11+LR_12+LR_13+LR_14+LR_15) As View_id, Sum(Sum_mark) AS Sum_mark, Sum(Vh_control) AS Vh_control,Sum(KR_1) AS KR_1,Max(KR_1) AS KR_2, Start_year 
FROM (Current_estimates
LEFT JOIN Plan ON Current_estimates.Plan_id = Plan.Plan_id) 
WHERE ((Current_estimates.Start_year = 2017) AND (Current_estimates.Course = 'прискорений') AND (Current_estimates.Plan_id = 125))";

$est2012 = 
"SELECT *
FROM Current_estimates 
";

$esti2012 = 
"SELECT Sum(Sum_mark) AS Sum_mark, Start_year
FROM Current_estimates 
WHERE Start_year = 2012";

$esti2013 = 
"SELECT Sum(Sum_mark) AS Sum_mark, Start_year
FROM Current_estimates 
WHERE Start_year = 2013";

$esti2014 = 
"SELECT Sum(Sum_mark) AS Sum_mark, Start_year
FROM Current_estimates 
WHERE Start_year = 2014";

$esti2015 = 
"SELECT Sum(Sum_mark) AS Sum_mark, Start_year
FROM Current_estimates 
WHERE Start_year = 2015";

$esti2016 = 
"SELECT Sum(Sum_mark) AS Sum_mark, Start_year
FROM Current_estimates 
WHERE Start_year = 2016";

$esti2017 = 
"SELECT Sum(Sum_mark) AS Sum_mark, Start_year
FROM Current_estimates 
WHERE Start_year = 2017";

$esti2012e = CurrentEstimates::findBySql($esti2012)->all();
$esti2013e = CurrentEstimates::findBySql($esti2013)->all();
$esti2014e = CurrentEstimates::findBySql($esti2014)->all();
$esti2015e = CurrentEstimates::findBySql($esti2015)->all();
$esti2016e = CurrentEstimates::findBySql($esti2016)->all();
$esti2017e = CurrentEstimates::findBySql($esti2017)->all();

$y1mark2012 = CurrentEstimates::findBySql($estimates2012pov1)->all();
$y2mark2012 = CurrentEstimates::findBySql($estimates2012pov2)->all();
$y3mark2012 = CurrentEstimates::findBySql($estimates2012pov3)->all();
$y4mark2012 = CurrentEstimates::findBySql($estimates2012pov4)->all();
$y5mark2012 = CurrentEstimates::findBySql($estimates2012pov5)->all();

$y1mark2012s = CurrentEstimates::findBySql($estimates2012skor1)->all();
$y2mark2012s = CurrentEstimates::findBySql($estimates2012skor2)->all();
$y3mark2012s = CurrentEstimates::findBySql($estimates2012skor3)->all();
$y4mark2012s = CurrentEstimates::findBySql($estimates2012skor4)->all();
$y5mark2012s = CurrentEstimates::findBySql($estimates2012skor5)->all();

$y1mark2013 = CurrentEstimates::findBySql($estimates2013pov1)->all();
$y2mark2013 = CurrentEstimates::findBySql($estimates2013pov2)->all();
$y3mark2013 = CurrentEstimates::findBySql($estimates2013pov3)->all();
$y4mark2013 = CurrentEstimates::findBySql($estimates2013pov4)->all();
$y5mark2013 = CurrentEstimates::findBySql($estimates2013pov5)->all();

$y1mark2013s = CurrentEstimates::findBySql($estimates2013skor1)->all();
$y2mark2013s = CurrentEstimates::findBySql($estimates2013skor2)->all();
$y3mark2013s = CurrentEstimates::findBySql($estimates2013skor3)->all();
$y4mark2013s = CurrentEstimates::findBySql($estimates2013skor4)->all();
$y5mark2013s = CurrentEstimates::findBySql($estimates2013skor5)->all();

$y1mark2014 = CurrentEstimates::findBySql($estimates2014pov1)->all();
$y2mark2014 = CurrentEstimates::findBySql($estimates2014pov2)->all();
$y3mark2014 = CurrentEstimates::findBySql($estimates2014pov3)->all();
$y4mark2014 = CurrentEstimates::findBySql($estimates2014pov4)->all();
$y5mark2014 = CurrentEstimates::findBySql($estimates2014pov5)->all();

$y1mark2014s = CurrentEstimates::findBySql($estimates2014skor1)->all();
$y2mark2014s = CurrentEstimates::findBySql($estimates2014skor2)->all();
$y3mark2014s = CurrentEstimates::findBySql($estimates2014skor3)->all();
$y4mark2014s = CurrentEstimates::findBySql($estimates2014skor4)->all();
$y5mark2014s = CurrentEstimates::findBySql($estimates2014skor5)->all();

$y1mark2015 = CurrentEstimates::findBySql($estimates2015pov1)->all();
$y2mark2015 = CurrentEstimates::findBySql($estimates2015pov2)->all();
$y3mark2015 = CurrentEstimates::findBySql($estimates2015pov3)->all();
$y4mark2015 = CurrentEstimates::findBySql($estimates2015pov4)->all();
$y5mark2015 = CurrentEstimates::findBySql($estimates2015pov5)->all();

$y1mark2015s = CurrentEstimates::findBySql($estimates2015skor1)->all();
$y2mark2015s = CurrentEstimates::findBySql($estimates2015skor2)->all();
$y3mark2015s = CurrentEstimates::findBySql($estimates2015skor3)->all();
$y4mark2015s = CurrentEstimates::findBySql($estimates2015skor4)->all();
$y5mark2015s = CurrentEstimates::findBySql($estimates2015skor5)->all();

$y1mark2016 = CurrentEstimates::findBySql($estimates2016pov1)->all();
$y2mark2016 = CurrentEstimates::findBySql($estimates2016pov2)->all();
$y3mark2016 = CurrentEstimates::findBySql($estimates2016pov3)->all();
$y4mark2016 = CurrentEstimates::findBySql($estimates2016pov4)->all();
$y5mark2016 = CurrentEstimates::findBySql($estimates2016pov5)->all();

$y1mark2016s = CurrentEstimates::findBySql($estimates2016skor1)->all();
$y2mark2016s = CurrentEstimates::findBySql($estimates2016skor2)->all();
$y3mark2016s = CurrentEstimates::findBySql($estimates2016skor3)->all();
$y4mark2016s = CurrentEstimates::findBySql($estimates2016skor4)->all();
$y5mark2016s = CurrentEstimates::findBySql($estimates2016skor5)->all();

$y1mark2017 = CurrentEstimates::findBySql($estimates2017pov1)->all();
$y2mark2017 = CurrentEstimates::findBySql($estimates2017pov2)->all();
$y3mark2017 = CurrentEstimates::findBySql($estimates2017pov3)->all();
$y4mark2017 = CurrentEstimates::findBySql($estimates2017pov4)->all();
$y5mark2017 = CurrentEstimates::findBySql($estimates2017pov5)->all();

$y1mark2017s = CurrentEstimates::findBySql($estimates2017skor1)->all();
$y2mark2017s = CurrentEstimates::findBySql($estimates2017skor2)->all();
$y3mark2017s = CurrentEstimates::findBySql($estimates2017skor3)->all();
$y4mark2017s = CurrentEstimates::findBySql($estimates2017skor4)->all();
$y5mark2017s = CurrentEstimates::findBySql($estimates2017skor5)->all();

$est2012e = CurrentEstimates::findBySql($est2012)->all();
   



$newmark1e = "SELECT Disciplines.Discipline_id,Disciplines.Discipline_name, Plan.Plan_id,Plan.Lecture_hours, Plan.LR_hours FROM (Plan 
LEFT JOIN Disciplines ON Plan.Discipline_id = Disciplines.Discipline_id)
Where ((Plan_id = '104') OR (Plan_id = '68') OR (Plan_id = '113') OR (Plan_id = '46') OR (Plan_id = '95'))";

$newmark1s = "SELECT Disciplines.Discipline_id,Disciplines.Discipline_name, Plan.Plan_id,Plan.Lecture_hours, Plan.LR_hours FROM (Plan 
LEFT JOIN Disciplines ON Plan.Discipline_id = Disciplines.Discipline_id)
Where ((Plan_id = '121') OR (Plan_id = '122') OR (Plan_id = '123') OR (Plan_id = '124') OR (Plan_id = '125'))";

$newmark1 = Plan::findBySql($newmark1e)->all();
$newmark1s = Plan::findBySql($newmark1s)->all();

        return $this->render('vika', [
            'students' => $students,
            'stud2012skor' => $stud2012skor,
            'stud2013skor' => $stud2013skor,
            'stud2014skor' => $stud2014skor,
            'stud2015skor' => $stud2015skor,
            'stud2016skor' => $stud2016skor,
            'stud2017skor' => $stud2017skor,
            'stud2012pov' => $stud2012pov,
            'stud2013pov' => $stud2013pov,
            'stud2014pov' => $stud2014pov,
            'stud2015pov' => $stud2015pov,
            'stud2016pov' => $stud2016pov,
            'stud2017pov' => $stud2017pov,
            'position' => $position,
            'diplom' => $diplom,
            'diplom2012' => $diplom2012,
            'diplom2013' => $diplom2013,
            'diplom2014' => $diplom2014,
            'diplom2015' => $diplom2015,
            'diplom2016' => $diplom2016,
            'diplom2017' => $diplom2017,
            'teachz12' => $teachz12,
            'teachz13' => $teachz13,
            'teachz14' => $teachz14,
            'teachz15' => $teachz15,
            'teachz16' => $teachz16,
            'teachz17' => $teachz17,
            'y1mark2012' => $y1mark2012,
            'y2mark2012' => $y2mark2012,
            'y3mark2012' => $y3mark2012,
            'y4mark2012' => $y4mark2012,
            'y5mark2012' => $y5mark2012,
            'y1mark2012s' => $y1mark2012s,
            'y2mark2012s' => $y2mark2012s,
            'y3mark2012s' => $y3mark2012s,
            'y4mark2012s' => $y4mark2012s,
            'y5mark2012s' => $y5mark2012s,
            'y1mark2013' => $y1mark2013,
            'y2mark2013' => $y2mark2013,
            'y3mark2013' => $y3mark2013,
            'y4mark2013' => $y4mark2013,
            'y5mark2013' => $y5mark2013,
            'y1mark2013s' => $y1mark2013s,
            'y2mark2013s' => $y2mark2013s,
            'y3mark2013s' => $y3mark2013s,
            'y4mark2013s' => $y4mark2013s,
            'y5mark2013s' => $y5mark2013s,
            'y1mark2014' => $y1mark2014,
            'y2mark2014' => $y2mark2014,
            'y3mark2014' => $y3mark2014,
            'y4mark2014' => $y4mark2014,
            'y5mark2014' => $y5mark2014,
            'y1mark2014s' => $y1mark2014s,
            'y2mark2014s' => $y2mark2014s,
            'y3mark2014s' => $y3mark2014s,
            'y4mark2014s' => $y4mark2014s,
            'y5mark2014s' => $y5mark2014s,
            'y1mark2015' => $y1mark2015,
            'y2mark2015' => $y2mark2015,
            'y3mark2015' => $y3mark2015,
            'y4mark2015' => $y4mark2015,
            'y5mark2015' => $y5mark2015,
            'y1mark2015s' => $y1mark2015s,
            'y2mark2015s' => $y2mark2015s,
            'y3mark2015s' => $y3mark2015s,
            'y4mark2015s' => $y4mark2015s,
            'y5mark2015s' => $y5mark2015s,
            'y1mark2016' => $y1mark2016,
            'y2mark2016' => $y2mark2016,
            'y3mark2016' => $y3mark2016,
            'y4mark2016' => $y4mark2016,
            'y5mark2016' => $y5mark2016,
            'y1mark2016s' => $y1mark2016s,
            'y2mark2016s' => $y2mark2016s,
            'y3mark2016s' => $y3mark2016s,
            'y4mark2016s' => $y4mark2016s,
            'y5mark2016s' => $y5mark2016s,
            'y1mark2017' => $y1mark2017,
            'y2mark2017' => $y2mark2017,
            'y3mark2017' => $y3mark2017,
            'y4mark2017' => $y4mark2017,
            'y5mark2017' => $y5mark2017,
            'y1mark2017s' => $y1mark2017s,
            'y2mark2017s' => $y2mark2017s,
            'y3mark2017s' => $y3mark2017s,
            'y4mark2017s' => $y4mark2017s,
            'y5mark2017s' => $y5mark2017s,
            'est2012e' => $est2012e,
            'esti2012e' => $esti2012e,
            'esti2013e' => $esti2013e,
            'esti2014e' => $esti2014e,
            'esti2015e' => $esti2015e,
            'esti2016e' => $esti2016e,
            'esti2017e' => $esti2017e,
            'newmark1' => $newmark1,
            'newmark1s' => $newmark1s,
        ]);
    }

/*
WHERE (((Fixation_by_teacher.Actuality)=False) 
AND ((Fixation_by_teacher.Start_date)<=CVDate('01/'+'09/'+[p])) 
AND ((Fixation_by_teacher.End_date)>=CVDate('01/'+'06/'+[k]))) 
OR (((Fixation_by_teacher.Actuality)=True) 
AND ((Fixation_by_teacher.Start_date)<=CVDate('01/'+'09/'+[p]))) 
*/


    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            //Yii::$app->getSession()->setFlash('success', 'This is a setFlash message!');
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        $model->created_at = date("Y-m-d");
        $model->updated_at = date("Y-m-d");
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                    //Yii::$app->session->setFlash('success','Спасибо за регистрацию!');
                    //Yii::$app->session->setFlash('error','Такого студента нет в базе!');
                } 
            }  
        }
        return $this->render('signup', compact('model'));
       /* return $this->render('signup', [
            'model' => $model,
        ]); */
    }

   

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionTeachers()
    {
        //$teachers = Teachers::find()->all();
    $teachers1 =  "SELECT * FROM (Teachers 
    LEFT JOIN Fixation_teacher_to_cathedra ON Teachers.Teacher_id = Fixation_teacher_to_cathedra.Teacher_id)
    /*LEFT JOIN Fixation_by_rank_teacher ON Ranks.Rank_id = Fixation_by_rank_teacher.Rank_id) */
    WHERE Fixation_teacher_to_cathedra.Actuality = True
    ";
       /*
        $teachers = Teachers::find()
        ->select(['Teacher_FIO'])
        ->from('Teachers')
        ->where(['Teacher_name' => 'Александр'])
        ->limit(2)
        ->all(); */

        $teachers = Teachers::findBySql($teachers1)->all();
        return $this->render('teachers', [
            'teachers' => $teachers,       
        ]);
    }

    public function actionControl()
    {     


        return $this->render('control', [


        ]);

    }

        
}


      



/* 

//$one = "SELECT * FROM Progress_in_science"; //таблица
        $fix1 = Fixationbygroup::find()
        ->select(count('*') as k, 'Group_id')
        ->from('Fixation_by_group')
        ->GroupBy('Group_id')
        ->all()
        ; 

$pub = ScienceWork::find()
        ->select('*')
        ->where(['like', 'view', 'Публікації'])
        ->all();
$modelCategory = new Category2_2();
$cats = $modelCategory::find()->where('id=3')->all();
$cats = $modelCategory::find()->where(['like', 'name', 'категор'])->all();
$cats = Category2_2::find()->select(['*'])->where(['like', 'name', 'категор'])->andWhere('id<4')->all(); //orderBy('name ASC')
$cats = Category2_2::find()->select(['*'])->where(['like', 'name', 'категор'])->andWhere('id<4')->orderBy('name DESC')->all();
$cats = Category2_2::find()->select(['id', 'name'])->limit(3)->offset(1)->all(); //начиная со второй,всего 3 штуки
*/ 
      