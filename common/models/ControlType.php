<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Control_type".
 *
 * @property int $Control_type_id
 * @property int $Laba
 * @property int $Lecture
 * @property int $SR
 * @property int $KR
 * @property int $Additional_points
 */
class ControlType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Control_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Laba', 'Lecture', 'SR', 'KR', 'Additional_points'], 'required'],
            [['Laba', 'Lecture', 'SR', 'KR', 'Additional_points'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Control_type_id' => 'Control Type ID',
            'Laba' => 'Laba',
            'Lecture' => 'Lecture',
            'SR' => 'Sr',
            'KR' => 'Kr',
            'Additional_points' => 'Additional Points',
        ];
    }
}
