<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SkpembebasanForm extends Model
{
    public $thnsk;
    public $nama;
    public $nip;
    public $nmrsuratsestama;
    public $tglsuratsestama;
    public $perihalsuratsestama;
    public $nmrberitaacaratpkn;
    public $tempatditetapkan;
    public $tglditetapkan;

    public function rules()
    {
        return [
            [['thnsk', 'nama', 'nip', 'nmrsuratsestama', 'tglsuratsestama', 'perihalsuratsestama', 'nmrberitaacaratpkn', 'tempatditetapkan'], 'tglditetapkan'],'required'],
        ];
    }
}