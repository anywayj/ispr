<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Fixation_by_teacher".
 *
 * @property int $Fix_by_teach_id
 * @property int $Teacher_id
 * @property int $Rank_id
 * @property string $Start_date
 * @property string $End_date
 * @property int $Actuality
 */
class FixationByPositionTeacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Fixation_by_position_teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Teacher_id', 'Position_id', 'Start_date', 'End_date', 'Actuality'], 'required'],
            [['Teacher_id', 'Position_id', 'Actuality','Kolteach'], 'integer'],
            [['Start_date', 'End_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Fix_by_teach_id' => 'Fix By Teach ID',
            'Teacher_id' => 'Teacher ID',
            'Position_id' => 'Rank ID',
            'Start_date' => 'Start Date',
            'End_date' => 'End Date',
            'Actuality' => 'Actuality',
            'Kolteach' => 'Kolteach',
        ];
    }

    

    

    public function getPos()
    {
        return $this->hasOne(Position::className(), ['Position_id' => 'Position_id']);
    }

}
