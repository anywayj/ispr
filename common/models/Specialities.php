<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Specialities".
 *
 * @property int $Speciality_id
 * @property string $Speciality_name
 * @property string $Cipher
 */
class Specialities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Specialities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Speciality_name', 'Cipher'], 'required'],
            [['Speciality_name', 'Cipher'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Speciality_id' => 'Speciality ID',
            'Speciality_name' => 'Speciality Name',
            'Cipher' => 'Cipher',
        ];
    }
}
