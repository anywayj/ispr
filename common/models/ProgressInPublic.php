<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%progress_in_public}}".
 *
 * @property int $id_progress_public
 * @property int $public_id
 * @property int $students_id
 * @property int $more_rank
 * @property int $place
 * @property int $number
 * @property string $date
 * @property string $sum
 */
class ProgressInPublic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%progress_in_public}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['public_id', 'Student_id', 'number'], 'required'],
            [['public_id', 'Student_id', 'more_rank', 'place', 'number'], 'integer'],
            [['date'], 'safe'],
            [['sum1'], 'string', 'max' => 255],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_progress_public' => 'Ид',
            'public_id' => 'Наименование',
            'Student_id' => 'Студент',
            'more_rank' => 'Дополнительный балл',
            'place' => 'Призовое место',
            'number' => 'Кол-во участников',
            'date' => 'Дата',
            'sum1' => 'Сумма',
        ];
    }

    public function getStudents()
    {
        return $this->hasOne(Students::className(), ['Student_id' => 'Student_id']);
    }
    public function getPublic()
    {
        return $this->hasOne(PublicWork::className(), ['public_id' => 'public_id']);
    }
}
