<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Group".
 *
 * @property int $Group_id
 * @property int $Speciality_id
 * @property string $Group_name
 * @property string $Start_year
 * @property string $End_year
 * @property int $Actuality
 *
 * @property EnforcementAcademy $group
 */
class GroupAcademy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Group_academy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Speciality_id', 'Group_name', 'Start_year', 'End_year', 'Actuality'], 'required'],
            [['Speciality_id', 'Actuality','Kolstud'], 'integer'],
            [['Start_year', 'End_year'], 'safe'],
            [['Group_name'], 'string', 'max' => 255],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Group_id' => 'Group ID',
            'Speciality_id' => 'Speciality ID',
            'Group_name' => 'Group Name',
            'Start_year' => 'Start Year',
            'End_year' => 'End Year',
            'Actuality' => 'Actuality',
            'KolStud' => 'Kolstud',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getFixationByGroup()
    {
        return $this->hasOne(FixationByGroup::className(), ['Group_id' => 'Group_id']);
    }
}
