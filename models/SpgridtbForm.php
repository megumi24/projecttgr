<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SpgridtbForm extends Model
{
    public $nama;
    public $tglpengundurandiri;
    public $tglmemorandum;
    public $tahunmasuk;
    public $tahunlulus;
    public $bulantuntas;
    public $bulanbelum;
    public $tahunakhirikatan;
    public $nmrsuratperjanjian;
    public $tglsuratperjanjian;
    public $perihalsuratperjanjian;
    public $besartgr;

    public function rules()
    {
        return [
            [['nama', 'tglpengundurandiri', 'tglmemorandum', 'tahunmasuk', 'tahunlulus', 'bulantuntas', 'bulanbelum', 'tahunakhirikatan', 'nmrsuratperjanjian', 'tglsuratperjanjian', 'perihalsuratperjanjian', 'besartgr'], 'required'],
        ];
    }
}