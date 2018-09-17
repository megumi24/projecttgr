<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_sktjm_bmn_tpkn".
 *
 * @property integer $nomor_surat
 * @property string $nip
 * @property double $nominal
 * @property string $tatacara
 * @property string $tgl_awal
 * @property string $tgl_akhir
 * @property string $nomor_kasus
 */
class InSktjmBmnTpkn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'in_sktjm_bmn_tpkn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip', 'nominal', 'tatacara', 'tgl_awal', 'tgl_akhir', 'nomor_kasus'], 'required'],
            [['nominal'], 'number'],
            [['tgl_awal', 'tgl_akhir'], 'safe'],
            [['nip'], 'string', 'max' => 16],
            [['tatacara'], 'string', 'max' => 15],
            [['nomor_kasus'], 'string', 'max' => 30],
            [['nip'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor_surat' => 'Nomor Surat',
            'nip' => 'NIP',
            'nominal' => 'Jumlah Tuntutan Ganti Rugi',
            'tatacara' => 'Tata Cara Pembayaran',
            'tgl_awal' => 'Tanggal Awal Pembayaran',
            'tgl_akhir' => 'Tanggal Akhir Pembayaran',
            'nomor_kasus' => 'Nomor Kasus',
        ];
    }
}
