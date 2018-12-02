<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SktjmtgrbmnForm extends Model
{
    public $nominal;
    public $lamacicil;
    public $blnawal;
    public $blnakhir;
    public $tglcicil;

    public function rules()
    {
        return [
            [['nominal', 'lamacicil', 'blnawal', 'blnakhir', 'tglcicil'], 'required'],
        ];
    }
}