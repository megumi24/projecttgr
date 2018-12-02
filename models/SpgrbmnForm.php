<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SpgrbmnForm extends Model
{
    public $tglupload;
    public $nomor;
    public $bps;
    public $nama;
    public $tglrapat;
    public $nmrberitaacara;
    public $jmlunit;
    public $barang;
    public $jmlangsuran;

    public function rules()
    {
        return [
            [['tglupload', 'nomor', 'bps', 'nama', 'tglrapat', 'nmrberitaacara', 'jmlunit', 'barang', 'jmlangsuran'], 'required'],
        ];
    }
}