<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SkpembebanantgrForm extends Model
{
    public $thnsk;
    public $nmrkasus;
    public $penemuan;
    public $nominalkerugian;
    public $nama;
    public $nip;
    public $tglsuratpernyataan;

    public function rules()
    {
        return [
            [['thnsk', 'nmrkasus', 'penemuan', 'nominalkerugian', 'nama', 'nip', 'tglsuratpernyataan'], 'required'],
        ];
    }
}