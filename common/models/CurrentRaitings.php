<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Current_raitings".
 *
 * @property int $Current_raiting_id
 * @property int $Plan_id
 * @property int $Raiting_type_id
 * @property int $Student_id
 * @property int $Raiting
 * @property string $Date
 */
class CurrentRaitings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Current_raitings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Plan_id', 'Raiting_type_id', 'Student_id', 'Raiting', 'Date'], 'required'],
            [['Plan_id', 'Raiting_type_id', 'Student_id', 'Raiting'], 'integer'],
            [['Date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Current_raiting_id' => 'Current Raiting ID',
            'Plan_id' => 'Plan ID',
            'Raiting_type_id' => 'Raiting Type ID',
            'Student_id' => 'Student ID',
            'Raiting' => 'Raiting',
            'Date' => 'Date',
        ];
    }
}
