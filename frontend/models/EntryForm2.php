<?php

namespace frontend\models;

use yii\base\Model;

class EntryForm2 extends Model
{
    public $disc1;
    public $disc2;
    public $disc3;
    public $student;

    public function rules()
    {
        return [
            [['disc1', 'disc2','disc3', 'student'], 'required'],
            [['student'], 'integer']
        ];
    }


}