<?php
namespace frontend\models;
use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Students;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $Student_surname;
    public $email;
    public $password;
    public $created_at;
    public $updated_at;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            [['username','email','Student_surname','password'], 'required','message' => 'Заповніть поле'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Цей студентський вже існує.'],
            ['username', 'integer'],
            [['created_at', 'updated_at'],'safe'],
            [['created_at', 'updated_at'], 'default', 'value' => date('y-m-d')],
            [['created_at', 'updated_at'], 'date', 'format' => 'y-m-d'],
           // ['Student_surname', 'required'], 
            ['Student_surname', 'string'],
            ['email', 'trim'],
           // ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Ця пошта вже існує.'],

           // ['password', 'required'],
            ['password', 'string', 'min' => 5],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */

    public function signup()
    {
 
        if (!$this->validate()) {
            return null;
        }
 
        $user = new User();
        $studone = Students::find()->select(['Student_id','Student_surname'])->all();
        $login = $this->username;
        $surname = $this->Student_surname;
        foreach ($studone as $k) {
            if (($k->Student_id == $login) && ($k->Student_surname == $surname)) {
                $user->username = $login; 
                $user->Student_surname = $surname; 
            } 
        }

        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->created_at = $this->created_at;
        $user->updated_at = $this->updated_at;
        if (($user->username == $login) && ($user->Student_surname == $surname))
            {
                    return $user->save() ? $user : null;
            } 
          
    }
        


    public function attributeLabels()
    {
        return [
            'username' => 'Логiн',
            'Student_surname' => 'Прізвище',
            'email' => 'Пошта',
            'password' => 'Пароль',
        ];
    }

    
}
