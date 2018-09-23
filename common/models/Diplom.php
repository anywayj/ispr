<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Diplom".
 *
 * @property int $Diplom_id
 * @property int $Student_id
 * @property int $Teacher_id
 * @property string $Raiting_100
 * @property string $Raiting_ETS
 * @property string $Raiting_classic
 * @property string $Raiting_date
 * @property string $Theme
 * @property string $Practise_base
 * @property int $Act_introduction
 */
class Diplom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Diplom';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Student_id', 'Teacher_id', 'Raiting_100', 'Raiting_ETS', 'Raiting_classic', 'Raiting_date', 'Theme', 'Practise_base', 'Act_introduction'], 'required'],
            [['Student_id', 'Teacher_id', 'Act_introduction'], 'integer'],
            [['Raiting_date'], 'safe'],
            [['Raiting_100', 'Raiting_ETS', 'Raiting_classic', 'Theme', 'Practise_base'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Diplom_id' => 'Diplom ID',
            'Student_id' => 'Student ID',
            'Teacher_id' => 'Teacher ID',
            'Raiting_100' => 'Raiting 100',
            'Raiting_ETS' => 'Raiting  Ets',
            'Raiting_classic' => 'Raiting Classic',
            'Raiting_date' => 'Raiting Date',
            'Theme' => 'Theme',
            'Practise_base' => 'Practise Base',
            'Act_introduction' => 'Act Introduction',
        ];
    }

    public function getStudents()
    {
        return $this->hasOne(Students::className(), ['Student_id' => 'Student_id']);
    }
}
