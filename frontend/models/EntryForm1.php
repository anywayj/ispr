<?php

namespace frontend\models;

use yii\base\Model;

class EntryForm1 extends Model
{
    public $disc;
    public $student;
    public $raitingstart2;
    public $raitingend2;

    public function rules()
    {
        return [
            [['disc','student','raitingstart2','raitingend2'], 'required'],
            [['raitingstart2','raitingend2'], 'safe'],
            [['student'],'integer'],
        ];
    }
}