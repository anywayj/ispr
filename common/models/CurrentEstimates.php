<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Current_estimates".
 *
 * @property int $estimates_id
 * @property int $Student_id
 * @property int $Plan_id
 * @property int $View_id
 * @property int $Vh_control
 * @property string $Date
 * @property int $KR_1
 * @property int $KR_2
 * @property int $KR_3
 * @property int $KR_4
 * @property int $LR_1
 * @property string $LR_2
 * @property int $LR_3
 * @property int $LR_4
 * @property int $LR_5
 * @property int $LR_6
 * @property int $LR_7
 * @property int $LR_8
 * @property int $LR_9
 * @property int $LR_10
 * @property int $LR_11
 * @property int $LR_12
 * @property int $LR_13
 * @property int $LR_14
 * @property int $LR_15
 * @property string $Start_year
 * @property string $Course
 * @property int $Sum_mark
 */
class CurrentEstimates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Current_estimates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Student_id', 'Plan_id', 'View_id', 'Vh_control', 'KR_1', 'KR_2', 'KR_3', 'KR_4', 'LR_1', 'LR_3', 'LR_4', 'LR_5', 'LR_6', 'LR_7', 'LR_8', 'LR_9', 'LR_10', 'LR_11', 'LR_12', 'LR_13', 'LR_14', 'LR_15', 'Sum_mark'], 'integer'],
            [['Date'], 'safe'],
            [['LR_2', 'Start_year', 'Course'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'estimates_id' => 'Estimates ID',
            'Student_id' => 'Student ID',
            'Plan_id' => 'Plan ID',
            'View_id' => 'View ID',
            'Vh_control' => 'Vh Control',
            'Date' => 'Date',
            'KR_1' => 'Kr 1',
            'KR_2' => 'Kr 2',
            'KR_3' => 'Kr 3',
            'KR_4' => 'Kr 4',
            'LR_1' => 'Lr 1',
            'LR_2' => 'Lr 2',
            'LR_3' => 'Lr 3',
            'LR_4' => 'Lr 4',
            'LR_5' => 'Lr 5',
            'LR_6' => 'Lr 6',
            'LR_7' => 'Lr 7',
            'LR_8' => 'Lr 8',
            'LR_9' => 'Lr 9',
            'LR_10' => 'Lr 10',
            'LR_11' => 'Lr 11',
            'LR_12' => 'Lr 12',
            'LR_13' => 'Lr 13',
            'LR_14' => 'Lr 14',
            'LR_15' => 'Lr 15',
            'Start_year' => 'Start Year',
            'Course' => 'Course',
            'Sum_mark' => 'Sum Mark',
        ];
    }

    public function getStudents()
    {
        return $this->hasOne(Students::className(), ['Student_id' => 'Student_id']);
    }

    public function getSessions()
    {
        return $this->hasOne(Session::className(), ['Student_id' => 'Student_id']);
    }

    public function getPlan()
    {
        return $this->hasOne(Plan::className(), ['Plan_id' => 'Plan_id']);
    }
}
