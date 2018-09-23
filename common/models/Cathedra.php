<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Cathedra".
 *
 * @property int $Cathedra_id
 * @property int $Faculty_id
 * @property string $Cathedra_name
 */
class Cathedra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Cathedra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Faculty_id', 'Cathedra_name'], 'required'],
            [['Faculty_id'], 'integer'],
            [['Cathedra_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Cathedra_id' => 'Cathedra ID',
            'Faculty_id' => 'Faculty ID',
            'Cathedra_name' => 'Cathedra Name',
        ];
    }
}
