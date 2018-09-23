<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "science_work".
 *
 * @property int $id_science
 * @property string $name
 * @property int $rank_stud
 * @property int $rank_group
 * @property string $view
 * @property int $competition_stud
 * @property int $competition_group
 */
class ScienceWork extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'science_work';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'rank_stud', 'rank_group', 'view', 'competition_stud', 'competition_group'], 'required'],
            [['rank_stud', 'rank_group', 'competition_stud', 'competition_group'], 'integer'],
            [['name', 'view'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'science_id' => 'Ид',
            'name' => 'Найменування',
            'rank_stud' => 'Оценка лучший студент',
            'rank_group' => 'Оценка лучшая группа',
            'view' => 'Вид',
            'competition_stud' => 'Конкурс лучший студент',
            'competition_group' => 'Конкурс лучшая группа',
        ];
    }

    public function getSc()
    {
        return $this->hasOne(ProgressInScience::className(), ['science_id' => 'science_id']);
    }
   

    
}
