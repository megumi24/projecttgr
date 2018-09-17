<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kasus_tgr".
 *
 * @property string $id_kasus
 * @property string $nama_peristiwa
 * @property string $tgl_dibuat
 * @property string $tgl_peristiwa
 * @property string $satker
 * @property string $status
 * @property string $jenis_kerugian
 * @property integer $nilai
 * @property string $tahun
 * @property string $ket_lain
 * @property string $nip
 */
class KasusTgr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    // public files1;

    public $files1, $files2, $files3, $files4, $files5, $files6, $files7, $files8, $files9, $files10, $files11, $files12, $jumlah_surat;
    public static function tableName()
    {
        return 'kasus_tgr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['nama_peristiwa', 'tgl_peristiwa', 'nilai', 'tahun', 'ket_lain', 'nip'], 'required'],
            [['tgl_dibuat', 'tgl_peristiwa', 'tahun'], 'safe'],
            [['status', 'ket_lain', 'jumlah_surat'], 'string'],
            [['nilai'], 'integer'],
            [['jumlah_dokumen'], 'integer'],
            [['nama_peristiwa'], 'string', 'max' => 100],
            [['satker'], 'string', 'max' => 50],
            [['wilayah'], 'string', 'max' => 4],
            [['jenis_kerugian'], 'string', 'max' => 30],
            [['nip'], 'string', 'max' => 18],
            [['files1', 'files2', 'files3', 'files4', 'files5', 'files6', 'files7', 'files8', 'files9', 'files10', 'files11', 'files12'], 'file', 'skipOnEmpty' => false],
            [['file1', 'file2', 'file3', 'file4', 'file5', 'file6', 'file7', 'file8', 'file9', 'file10'], 'string'],

             ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kasus' => 'Nomor Kasus',
            'nama_peristiwa' => 'Nama Peristiwa',
            'tgl_dibuat' => 'Tanggal Dibuat',
            'tgl_peristiwa' => 'Tanggal Peristiwa',
            'satker' => 'Satker',
            'status' => 'Status',
            'jenis_kerugian' => 'Jenis Kerugian',
            'nilai' => 'Nilai Perolehan',
            'tahun' => 'Tahun Perolehan',
            'ket_lain' => 'Keterangan Lain',
            'nip' => 'NIP',
        ];
    }


    public function getCaritahun() {
       $yearNow = date("Y");
       $yearFrom = $yearNow - 10;
       $yearTo = $yearNow;
 
       $arrYears = array();
       foreach (range($yearFrom, $yearTo) as $number) {
              $arrYears[$number] = $number; 
       }
       $arrYears2 = array_reverse($arrYears, true);
 
       return $arrYears2;
    }
}
