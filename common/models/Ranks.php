<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Ranks".
 *
 * @property int $Rank_id
 * @property string $Rank_name
 */
class Ranks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Ranks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Rank_name'], 'required'],
            [['Rank_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Rank_id' => 'Rank ID',
            'Rank_name' => 'Rank Name',
        ];
    }
}
