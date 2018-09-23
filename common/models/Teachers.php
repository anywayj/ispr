<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Teachers".
 *
 * @property int $Teacher_id
 * @property string $Teacher_FIO
 * @property string $Teacher_surname
 * @property string $Teacher_name
 * @property string $Teacher_lastname
 * @property string $Teacher_phone
 * @property string $Teacher_email
 */
class Teachers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Teachers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Teacher_FIO', 'Teacher_surname', 'Teacher_name', 'Teacher_lastname'], 'required'],
            [['Teacher_FIO', 'Teacher_surname', 'Teacher_name', 'Teacher_lastname', 'Teacher_phone', 'Teacher_email'], 'string'],
            [['Kolteach'], 'integer'], 
            [['image'],'file', 'extensions' => 'jpg, png']   
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Teacher_id' => 'iд',
            'Teacher_FIO' => 'ПIБ',
            'Teacher_surname' => 'Прізвище',
            'Teacher_name' => "ім'я",
            'Teacher_lastname' => 'по батькові',
            'Teacher_phone' => 'Телефон',
            'Teacher_email' => 'Пошта',
            'image' => 'Фото',
            'Kolteach' => 'кількість',
        ];
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getFixationByRankTeacher()
    {
        return $this->hasOne(FixationByRankTeacher::className(), ['Teacher_id' => 'Teacher_id']);
    }
        
    public function getFixationByPositionTeacher()
    {
        return $this->hasOne(FixationByPositionTeacher::className(), ['Teacher_id' => 'Teacher_id']);
    }
}
