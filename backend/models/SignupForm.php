<?php
namespace backend\models;
use Yii;
use yii\base\Model;
use common\models\User;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $Student_surname;
    public $email;
    public $password;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            [['username','email','Student_surname','password'], 'required','message' => 'Заполните поле'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'цей користувач вже існує.'],
            ['username', 'string'],
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
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->Student_surname = $this->Student_surname;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save(false);

            

            return $user;
        }

        return null;
    }
        


    public function attributeLabels()
    {
        return [
            'username' => 'Логiн',
            'Student_surname' => 'ПIБ',
            'email' => 'Пошта',
            'password' => 'Пароль',
        ];
    }

    
}
