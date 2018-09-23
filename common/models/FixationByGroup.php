<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Fixation_by_group".
 *
 * @property int $Fix_by_group_id
 * @property int $Student_id
 * @property int $Group_id
 * @property string $Group_start_date
 * @property string $Group_end_date
 * @property int $Actuality
 */
class FixationByGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Fixation_by_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Student_id', 'Group_id', 'Group_start_date', 'Group_end_date', 'Actuality'], 'required'],
            [['Student_id', 'Group_id', 'Actuality', 'Kolstud'], 'integer'],
            [['Group_start_date', 'Group_end_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Fix_by_group_id' => 'Fix By Group ID',
            'Student_id' => 'Student ID',
            'Group_id' => 'Group ID',
            'Group_start_date' => 'Group Start Date',
            'Group_end_date' => 'Group End Date',
            'Actuality' => 'Actuality',
            'Kolstud' => 'Kolstud',
        ];
    }

    public function getStudents()
    {
        return $this->hasOne(Students::className(), ['Student_id' => 'Student_id']);
    }

    public function getGroupAcademy()
    {
        return $this->hasOne(GroupAcademy::className(), ['Group_id' => 'Group_id']);
    }
   
}
