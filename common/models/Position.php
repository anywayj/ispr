<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Position".
 *
 * @property int $Position_id
 * @property string $Position_name
 * @property string $ETS
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Position_name', 'ETS'], 'required'],
            [['Position_name', 'ETS'], 'string', 'max' => 255],
            [['Kolteach'],'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Position_id' => 'Position ID',
            'Position_name' => 'Position Name',
            'ETS' => 'Ets',
            'Kolteach' => 'Kolteach',
        ];
    }

   

    
}
