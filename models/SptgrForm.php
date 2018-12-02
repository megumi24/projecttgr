<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SptgrForm extends Model
{
    public $nomor;
    public $bps;
    public $nama;
    public $tglsktjm;
    public $jmlangsuran;

    public function rules()
    {
        return [
            [['nomor', 'bps', 'nama', 'tglsktjm', 'jmlangsuran'], 'required'],
        ];
    }
}