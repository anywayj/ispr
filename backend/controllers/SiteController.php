<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\SignupForm;
use common\models\UploadImage;
use yii\web\UploadedFile;

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
                        'actions' => ['index','signup'],
                        'allow' => true,
                       // 'roles' => ['canAdmin'], //для 3-х ролей если наследует в item_child
                        'roles' => ['admin'], 
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
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionRole() 
    {
        /*
        $admin = Yii::$app->authManager->createRole('admin');
        $admin->description = 'Администратор';
        Yii::$app->authManager->add($admin);

        $teacher = Yii::$app->authManager->createRole('teacher');
        $teacher->description = 'Преподаватель';
        Yii::$app->authManager->add($teacher);

        $student = Yii::$app->authManager->createRole('student');
        $student->description = 'Студент';
        Yii::$app->authManager->add($student);

        $ban = Yii::$app->authManager->createRole('banned');
        $ban->description = 'Заблокированный';
        Yii::$app->authManager->add($ban); 

        $permit = Yii::$app->authManager->createPermission('canAdmin');
        $permit->description = 'Право входа в админку';
        Yii::$app->authManager->add($permit); */

        /*
        $role_admin = Yii::$app->authManager->getRole('admin');
        $role_teacher = Yii::$app->authManager->getRole('teacher');
        $role_student = Yii::$app->authManager->getRole('student');
        $permit = Yii::$app->authManager->getPermission('canAdmin');
        Yii::$app->authManager->addChild($role_admin, $permit);
        Yii::$app->authManager->addChild($role_teacher, $permit);
        Yii::$app->authManager->addChild($role_student, $permit); */

        /*
        if (Yii::$app->user->can('canAdmin')) { // для троих
          //  if (Yii::$app->user->can('Admin')) только админ
        } else {

        } */

        /*
        $userRole = Yii::$app->authManager->getRole('admin');
        //Yii::$app->authManager->assign($userRole, Yii::$app->user->getId());
        Yii::$app->authManager->assign($userRole, 1); //для пользователя с id = 1 в базе user
        */

        /*
        $permit = Yii::$app->authManager->createPermission('updatePost');
        $permit->description = 'Право редактировать пост';
        Yii::$app->authManager->add($permit);  */
        /*
        $auth = Yii::$app->authManager;
        $rule = new AuthorRule();
        $auth->add($rule); */

        return 123;

    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
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

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            // Yii::$app->session->setFlash('success','Викладач успішно зареєстрований');
            if ($user = $model->signup()) {
                // Yii::$app->session->setFlash('success','Викладач успішно зареєстрований');
                //Yii::$app->session->setFlash('success','Спасибо за регистрацию!');
               // if (Yii::$app->getUser()->login($user)) {
                Yii::$app->getSession()->setFlash('success', 'Викладач успішно зареєстрований.');
                    return $this->goHome();
                
              //  } 
            }  
        }

        return $this->render('signup', compact('model'));
       /* return $this->render('signup', [
            'model' => $model,
        ]); */
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }




    
}
