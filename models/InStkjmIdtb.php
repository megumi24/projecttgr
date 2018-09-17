<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_stkjm_idtb".
 *
 * @property string $nama
 * @property string $nip
 * @property string $alamat
 * @property double $nominal
 * @property string $idtb
 * @property string $tatacara
 * @property string $setoran
 * @property string $tgl_awal
 * @property string $tgl_akhir
 * @property string $dik1
 * @property string $dik2
 */
class InStkjmIdtb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'in_stkjm_idtb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'nip', 'alamat', 'nominal', 'idtb', 'tatacara', 'setoran', 'tgl_awal', 'tgl_akhir', 'dik1', 'dik2'], 'required'],
            [['nominal'], 'number'],
            [['tgl_awal', 'tgl_akhir'], 'safe'],
            [['nama', 'alamat', 'idtb', 'setoran', 'dik1', 'dik2'], 'string', 'max' => 52],
            [['nip'], 'string', 'max' => 16],
            [['tatacara'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nama' => 'Nama',
            'nip' => 'NIP',
            'alamat' => 'Alamat',
            'nominal' => 'Jumlah Pembayaran',
            'idtb' => 'Idtb',
            'tatacara' => 'Tata Cara Pembayaran',
            'setoran' => 'Setoran',
            'tgl_awal' => 'Tgl Awal',
            'tgl_akhir' => 'Tgl Akhir',
            'dik1' => 'Diketahui1',
            'dik2' => 'Dik2',
        ];
    }
}
