<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Fixation_teacher_to_cathedra".
 *
 * @property int $Fix_teacher_to_cathedra
 * @property int $Teacher_id
 * @property int $Cathedra_id
 * @property int $Rank_id
 * @property string $Start_year
 * @property string $End_year
 * @property string $Rank
 * @property int $Actuality
 */
class FixationTeacherToCathedra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Fixation_teacher_to_cathedra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Teacher_id', 'Cathedra_id', 'Rank_id', 'Start_year', 'End_year', 'Rank', 'Actuality'], 'required'],
            [['Teacher_id', 'Cathedra_id', 'Rank_id', 'Actuality'], 'integer'],
            [['Start_year', 'End_year'], 'safe'],
            [['Rank'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Fix_teacher_to_cathedra' => 'Fix Teacher To Cathedra',
            'Teacher_id' => 'Teacher ID',
            'Cathedra_id' => 'Cathedra ID',
            'Rank_id' => 'Rank ID',
            'Start_year' => 'Start Year',
            'End_year' => 'End Year',
            'Rank' => 'Rank',
            'Actuality' => 'Actuality',
        ];
    }
}
