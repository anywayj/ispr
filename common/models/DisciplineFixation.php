<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Discipline_fixation".
 *
 * @property int $Discipline_fix_id
 * @property int $Plan_id
 * @property int $Teacher_id
 * @property string $Lecturer
 * @property string $Assistant
 */
class DisciplineFixation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Discipline_fixation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Plan_id', 'Teacher_id', 'Lecturer', 'Assistant'], 'required'],
            [['Plan_id', 'Teacher_id'], 'integer'],
            [['Lecturer', 'Assistant'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Discipline_fix_id' => 'Discipline Fix ID',
            'Plan_id' => 'Plan ID',
            'Teacher_id' => 'Teacher ID',
            'Lecturer' => 'Lecturer',
            'Assistant' => 'Assistant',
        ];
    }
}
