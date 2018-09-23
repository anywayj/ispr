<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Fixation_by_rank_teacher".
 *
 * @property int $Fix_by_rank_teach_id
 * @property int $Teacher_id
 * @property int $Rank_id
 * @property string $Start_date
 * @property string $End_date
 * @property int $Actuality
 */
class FixationByRankTeacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Fixation_by_rank_teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Teacher_id', 'Rank_id', 'Actuality'], 'integer'],
            [['Start_date', 'End_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Fix_by_rank_teach_id' => 'Fix By Rank Teach ID',
            'Teacher_id' => 'Teacher ID',
            'Rank_id' => 'Rank ID',
            'Start_date' => 'Start Date',
            'End_date' => 'End Date',
            'Actuality' => 'Actuality',
        ];
    }

    public function getRanks()
    {
        return $this->hasOne(Ranks::className(), ['Rank_id' => 'Rank_id']);
    }
}
