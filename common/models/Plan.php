<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Plan".
 *
 * @property int $Plan_id
 * @property int $Discipline_id
 * @property int $Speciality_id
 * @property string $view_control
 * @property int $Lecture_hours
 * @property int $Practice_hours
 * @property int $Credits
 * @property string $Start_date
 * @property string $End_date
 * @property int $Semester
 * @property int $Actuality
 * @property string $discipline_one
 * @property string $discipline_two
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Plan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Discipline_id', 'Speciality_id', 'view_control', 'Lecture_hours', 'LR_hours', 'Practice_hours', 'Credits', 'Start_date', 'End_date', 'Semester', 'Actuality', 'discipline_one', 'discipline_two','Course'], 'required'],
            [['Discipline_id', 'Speciality_id', 'Lecture_hours', 'LR_hours', 'Practice_hours', 'Credits', 'Semester', 'Actuality'], 'integer'],
            [['Start_date', 'End_date'], 'safe'],
            [['view_control', 'discipline_one', 'discipline_two','Course'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Plan_id' => 'iд',
            'Discipline_id' => 'iд дисцiплини',
            'Speciality_id' => 'iд спецаільності',
            'view_control' => 'Вид контролю',
            'Lecture_hours' => 'Кількість годин лекцій',
            'LR_hours' => 'LR_hours',
            'Practice_hours' => 'Кількість годин практик',
            'Credits' => 'Credits',
            'Start_date' => 'Start Date',
            'End_date' => 'End Date',
            'Semester' => 'Семестр',
            'Actuality' => 'Actuality',
            'discipline_one' => 'Discipline One',
            'discipline_two' => 'Discipline Two',
            'Course' => 'Course',
        ];
    }

    public function getDiscipline()
    {
        return $this->hasOne(Disciplines::className(), ['Discipline_id' => 'Discipline_id']);
    }
}
