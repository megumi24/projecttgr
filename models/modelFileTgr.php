<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * This is the model class for table "kasus_tgr".
 *
 * @property string $nomor
 * @property string $nama_peristiwa
 * @property string $tgl_dibuat
 * @property string $tgl_peristiwa
 * @property string $satker
 * @property string $status
 * @property string $jenis_kerugian
 * @property integer $nilai
 * @property string $tahun
 * @property string $ket_lain
 * @property string $file1
 * @property string $file2
 * @property string $file3
 * @property string $file4
 * @property string $file5
 * @property string $file6
 * @property string $file7
 * @property string $file8
 * @property string $file9
 * @property string $file10
 */
class ModelFileTgr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $files;
    
    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            // [['nama_peristiwa', 'tgl_peristiwa', 'nilai', 'tahun', 'ket_lain', 'file1', 'file2', 'file3', 'file4', 'file5', 'file6', 'file7', 'file8', 'file9', 'file10'], 'required'],
            // [['files1', 'files2', 'files3', 'files4', 'files5', 'files6', 'files7', 'files8', 'files9'], 'file', 'skipOnEmpty'=>true, 'extensions' => 'pdf'],
            // [['files10'], 'file', 'skipOnEmpty'=>true, 'extensions' => 'jpg, png, jpeg']
            [['files'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
        ];,
        ];
    }

    /**
     * @inheritdoc
     */

    // public function upload()
    // {
    //     if ($this->validate()) {
    //         $this->file1->saveAs('uploads/' . $this->file1->baseName . '.' . $this->file1->extension);
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }


    public function attributeLabels()
    {
        return [
            'files()'
            // 'files1' => 'Bukti Surat/tanda penerimaan laporan dari pihak kepolisian',
            // 'files2' => 'Berita Acara Pemeriksaan Kepolisian*',
            // 'files3' => 'Isian daftar pertanyaan untuk menyusun laporan kerugian negara',
            // 'files4' => 'Fotokopi Kartu Identitas Barang (KIB)',
            // 'files5' => 'Fotokopi STNK',
            // 'files6' => 'Fotokopi BPKB',
            // 'files7' => 'Berita Acara Serah Terima Barang Milik Negara',
            // 'files8' => 'Surat laporan kehilangan barang milik negara dari kab/kota ke Propinsi',
            // 'files9' => 'Surat laporan kehilangan barang milik negara dari Propinsi ke TPKN',
            // 'files10' => 'Foto 2 kunci kendaraan disertai tanda tangan',
        ];
    }
}
