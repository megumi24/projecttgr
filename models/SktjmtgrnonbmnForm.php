<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SktjmtgrnonbmnForm extends Model
{
    public $nominal;
    public $idtb;
    public $bpssetor;
    public $blnangsur;
    public $blnstart;
    public $thnstart;
    public $blnstop;
    public $thnstop;

    public function rules()
    {
        return [
            [['nominal', 'idtb', 'bpssetor', 'blnangsur', 'blnstart', 'thnstart', 'blnstop', 'thnstop'], 'required'],
        ];
    }
}