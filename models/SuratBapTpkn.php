<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_bap_tpkn".
 *
 * @property integer $nomor
 * @property string $hari
 * @property string $tgl
 * @property string $jenis
 * @property string $merk/type
 * @property string $no_pol
 * @property string $warna
 * @property string $no_mesin
 * @property string $no_rangka
 * @property string $no_surat_pol
 * @property string $tgl_surat_pol
 * @property string $bap_polisi
 * @property string $no_bap_bps
 * @property string $tgl_bap_bps
 * @property string $tgl_daftarpertanyaan
 * @property string $tgl_bmn
 * @property string $cara_bmn
 * @property string $kelalaian
 * @property string $keputusan
 * @property integer $nilai_rureg
 */
class SuratBapTpkn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_bap_tpkn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['nomor', 'hari', 'tgl', 'jenis', 'merk_type', 'no_pol', 'warna', 'no_mesin', 'no_rangka', 'no_surat_pol', 'tgl_surat_pol', 'bap_polisi', 'no_bap_bps', 'tgl_bap_bps', 'tgl_daftarpertanyaan', 'tgl_bmn', 'cara_bmn', 'kelalaian', 'keputusan', 'nilai_rureg'], 'required'],
            [['nomor', 'nilai_runeg', 'id_kasus'], 'integer'],
            [['cara_bmn'], 'string'],
            [['tgl', 'tgl_surat_pol', 'bap_polisi', 'tgl_bap_bps', 'tgl_daftarpertanyaan', 'tgl_bmn'], 'safe'],
            [['hari', 'jenis', 'merk_type', 'no_pol', 'warna', 'no_mesin', 'no_rangka', 'kelalaian'], 'string', 'max' => 10],
            [['no_surat_pol', 'no_bap_bps', 'keputusan'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor' => 'Nomor',
            'id_kasus' => 'Nomor Kasus',
            'hari' => 'Hari Rapat',
            'tgl' => 'Tanggal Rapat',
            'jenis' => 'Jenis',
            'merk_type' => 'Merk/type',
            'no_pol' => 'Nomor Polisi',
            'warna' => 'Warna',
            'no_mesin' => 'Nomor Mesin',
            'no_rangka' => 'Nomor Rangka',
            'no_surat_pol' => 'Nomor Surat Tanda Bukti Lapor dari Kepolisian',
            'tgl_surat_pol' => 'Tanggal Surat Polisi',
            'bap_polisi' => 'Nomor BAP Polisi',
            'no_bap_bps' => 'Nomor BAP BPS',
            'tgl_bap_bps' => 'Tanggal Bap BPS',
            'tgl_daftarpertanyaan' => 'Tanggal Daftar Pertanyaan',
            'tgl_bmn' => 'Tanggal BMN',
            'cara_bmn' => 'Pertimbangan',
            'kelalaian' => 'Kelalaian',
            'keputusan' => 'Keputusan',
            'nilai_runeg' => 'Nilai Kerugian Negara',
        ];
    }
}
