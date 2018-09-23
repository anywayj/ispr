<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Students".
 *
 * @property int $Student_id
 * @property string $Student_FIO
 * @property string $Student_surname
 * @property string $Student_name
 * @property string $Student_lastname
 * @property string $Birhdate
 * @property string $Home_adress
 * @property string $Student_phone
 * @property string $Student_email
 * @property int $Certificate_raiting
 * @property int $Certificate_ZNO_1
 * @property int $Certificate_ZNO_2
 * @property int $Certificate_ZNO_3
 * @property string $Student_password
 *
 * @property Application[] $applications
 * @property Publication[] $publications
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Student_FIO', 'Student_surname', 'Student_name', 'Student_lastname'], 'required'],
            [['Student_FIO', 'Student_surname', 'Student_name', 'Student_lastname',
             'Student_phone','SR_ball_doc','Year','Class','Sum_ball'], 'string'],
            [['Birhdate'], 'safe'],
            [['Certificate_raiting', 'Certificate_ZNO_1', 'Certificate_ZNO_2', 'Certificate_ZNO_3'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Student_id' => 'Студентський',
            'Student_FIO' => 'ПIБ',
            'Student_surname' => 'Прізвище',
            'Student_name' => "Им'я",
            'Student_lastname' => 'По батькові',
            'Birhdate' => 'Дата народження',
            'Student_phone' => 'Номер телефону',
            'Certificate_raiting' => 'Средний балл аттестата',
            'Certificate_ZNO_1' => 'Сертифікат  ЗНО 1',
            'Certificate_ZNO_2' => 'Сертифікат  ЗНО 2',
            'Certificate_ZNO_3' => 'Сертифікат  ЗНО 3',
            'SR_ball_doc' => 'Середній бал документа',
            'Year' => 'Рiк',
            'Class' => 'Курс',
            'Sum_ball' => 'Підсумковий бал',
         // 'AvgRait' => 'AvgRait',
           // 'SumBall1' => 'SumBall1',
         //   'SumBall2' => 'SumBall2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getFixationbygroup1()
    {
        return $this->hasOne(FixationByGroup::className(), ['Student_id' => 'Student_id']);
    }

    public function getSessions()
    {
        return $this->hasOne(Session::className(), ['Student_id' => 'Student_id']);
    }

    public function getPsciences()
    {
        return $this->hasOne(ProgressInScience::className(), ['Student_id' => 'Student_id']);
    }

    

    
}
