<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Rank_fixation".
 *
 * @property int $Rank_fix_id
 * @property int $Teacher_id
 * @property int $Rank_id
 * @property string $Start_date
 * @property string $End_date
 * @property int $Actuality
 */
class RankFixation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Rank_fixation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Teacher_id', 'Rank_id', 'Start_date', 'End_date', 'Actuality'], 'required'],
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
            'Rank_fix_id' => 'Rank Fix ID',
            'Teacher_id' => 'Teacher ID',
            'Rank_id' => 'Rank ID',
            'Start_date' => 'Start Date',
            'End_date' => 'End Date',
            'Actuality' => 'Actuality',
        ];
    }
}
