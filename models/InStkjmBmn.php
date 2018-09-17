<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_stkjm_bmn".
 *
 * @property integer $nomor_surat
 * @property string $nama
 * @property string $nip
 * @property string $alamat
 * @property integer $nohp
 * @property string $email
 * @property double $nominal
 * @property string $jenis
 * @property string $merk
 * @property string $milikbps
 * @property string $tatacara
 * @property string $tgl_awal
 * @property string $tgl_akhir
 * @property string $saksi1
 * @property string $saksi2
 */
class InStkjmBmn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'in_stkjm_bmn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'nip', 'alamat', 'nohp', 'email', 'nominal', 'jenis', 'merk', 'milikbps', 'tatacara', 'tgl_awal', 'tgl_akhir', 'saksi1', 'saksi2'], 'required'],
            [['nohp'], 'integer'],
            [['nominal'], 'number'],
            [['tgl_awal', 'tgl_akhir'], 'safe'],
            [['nama', 'alamat', 'merk', 'milikbps', 'saksi1', 'saksi2'], 'string', 'max' => 52],
            [['nip'], 'string', 'max' => 16],
            [['email', 'jenis'], 'string', 'max' => 30],
            [['tatacara'], 'string', 'max' => 15],
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
            'nama' => 'Nama Debitur (contoh: Hanafys)',
            'nip' => 'NIP (contoh: 196212261982031001)',
            'alamat' => 'Alamat (contoh: Jl. Azki Aris No 17 Q RT 10 Kelurahan Kampung Dagang Rengat)',
            'nohp' => 'No Handphone (contoh: 08561234567',
            'email' => 'Email',
            'nominal' => 'Nilai Kerugian Negara (contoh: Rp 40.000.000,00)',
            'jenis' => 'Jenis',
            'merk' => 'Merk',
            'milikbps' => 'Milikbps',
            'tatacara' => 'Tatacara',
            'tgl_awal' => 'Tgl Awal',
            'tgl_akhir' => 'Tgl Akhir',
            'saksi1' => 'Saksi1',
            'saksi2' => 'Saksi2',
        ];
    }
}
