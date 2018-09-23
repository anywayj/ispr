<?php

namespace frontend\models;

use yii\base\Model;

class Grants extends Model
{
    public $progressStartdate;
    public $progressEnddate;
    public $sessionStartdate;
    public $sessionEnddate;

    public function rules()
    {
        return [
            [['progressStartdate', 'progressEnddate','sessionStartdate','sessionEnddate'], 'required'],
            [['progressStartdate', 'progressEnddate','sessionStartdate','sessionEnddate'], 'safe'],
            [['progressStartdate', 'progressEnddate','sessionStartdate','sessionEnddate'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }


}