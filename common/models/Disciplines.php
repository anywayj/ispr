<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Disciplines".
 *
 * @property int $Discipline_id
 * @property string $Discipline_name
 */
class Disciplines extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Disciplines';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Discipline_name'], 'required'],
            [['Discipline_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Discipline_id' => 'iд дисциплiни',
            'Discipline_name' => 'Найменування',
        ];
    }
}
