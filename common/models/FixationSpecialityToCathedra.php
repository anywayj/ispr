<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Fixation_speciality_to_cathedra".
 *
 * @property int $Fix_speciality_to_cathedra_id
 * @property int $Speciality_id
 * @property int $Cathedra_id
 * @property string $Date1
 * @property string $Date2
 * @property int $Actuality
 */
class FixationSpecialityToCathedra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Fixation_speciality_to_cathedra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Speciality_id', 'Cathedra_id', 'Date1', 'Date2', 'Actuality'], 'required'],
            [['Speciality_id', 'Cathedra_id', 'Actuality'], 'integer'],
            [['Date1', 'Date2'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Fix_speciality_to_cathedra_id' => 'Fix Speciality To Cathedra ID',
            'Speciality_id' => 'Speciality ID',
            'Cathedra_id' => 'Cathedra ID',
            'Date1' => 'Date1',
            'Date2' => 'Date2',
            'Actuality' => 'Actuality',
        ];
    }
}
