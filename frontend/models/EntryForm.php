<?php

namespace frontend\models;

use yii\base\Model;

class EntryForm extends Model
{
    public $disc;
    public $group;
    public $student;
    public $raitingstart;
    public $raitingend;
    public $raitingstart1;
    public $raitingend1;
    public $raitingstart2;
    public $raitingend2;

    public function rules()
    {
        return [
            [['disc', 'group','raitingstart','raitingend','raitingstart1','raitingend1'], 'required'],
            [['raitingstart', 'raitingend','raitingstart1','raitingend1','raitingstart1','raitingend1'], 'safe'],
            [['student'],'integer'],
        ];
    }


}