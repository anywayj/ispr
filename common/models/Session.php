<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Session".
 *
 * @property int $Session_id
 * @property int $Plan_id
 * @property int $Student_id
 * @property int $Raiting_100
 * @property string $Raiting_ETS
 * @property int $Raiting_classic
 * @property string $Raiting_date
 */
class Session extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Session';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Plan_id', 'Student_id', 'Raiting_100', 'Raiting_ETS', 'Raiting_classic', 'Raiting_date'], 'required'],
            [['Plan_id', 'Student_id', 'Raiting_100', 'Raiting_classic'], 'integer'],
            [['Raiting_date'], 'safe'],
            [['Raiting_ETS'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Session_id' => 'iд сесiї',
            'Plan_id' => 'iд плану',
            'Student_id' => 'iд студента',
            'Raiting_100' => 'Рейтинг 100',
            'Raiting_ETS' => 'Рейтинг ЕТС',
            'Raiting_classic' => 'Рейтинг класичний',
            'Raiting_date' => 'Дата',
        ];
    }

    public function getStudents()
    {
        return $this->hasOne(Students::className(), ['Student_id' => 'Student_id']);
    }

    public function getPlan()
    {
        return $this->hasOne(Plan::className(), ['Plan_id' => 'Plan_id']);
    }
}
