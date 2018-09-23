<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "progress_in_science".
 *
 * @property int $id_progress_science
 * @property int $science_id
 * @property int $student_id
 * @property int $more_rank
 * @property int $place
 * @property int $number
 * @property string $date
 */
class ProgressInScience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'progress_in_science';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['science_id', 'Student_id', 'number'], 'required'],
            [['science_id', 'Student_id', 'more_rank', 'place', 'number'], 'integer'],
            [['sum1'],'string'], 
            [['date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_progress_science' => 'iд',
            'science_id' => 'Найменування',
            'Student_id' => 'Студент',
            'more_rank' => 'Додатковий бал',
            'place' => 'Призове місце',
            'number' => 'Кількість учасників',
            'date' => 'Дата',
            'sum1' => 'Сума',
            
        ];
    }

    public function getStudents()
    {
        return $this->hasOne(Students::className(), ['Student_id' => 'Student_id']);
    }
    public function getSciences()
    {
        return $this->hasOne(ScienceWork::className(), ['science_id' => 'science_id']);
    }

}
