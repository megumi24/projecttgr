<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kasus_tp".
 *
 * @property integer $nomor
 * @property string $nama_peristiwa
 * @property string $tgl_dibuat
 * @property string $tgl_peristiwa
 * @property string $satker
 * @property string $status
 * @property string $jenis_kerugian
 * @property integer $nilai
 * @property string $nama_pihak
 * @property string $nip
 * @property string $ket_lain
 * @property string $dokumen
 */
class KasusTp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kasus_tp';
    }

    /**
     * @inheritdoc
     */
    public $files1, $files2, $files3, $files4, $files5, $files6, $files7, $files8, $files9, $files10, $files11, $files12;
    public function rules()
    {
        return [
            [['nomor', 'nama_peristiwa', 'tgl_dibuat', 'tgl_peristiwa', 'satker', 'status', 'jenis_kerugian', 'nilai', 'nama_pihak', 'nip', 'ket_lain', 'dokumen'], 'required'],
            [['nomor', 'nilai'], 'integer'],
            [['tgl_dibuat', 'tgl_peristiwa'], 'safe'],
            [['ket_lain', 'dokumen'], 'string'],
            [['nama_peristiwa'], 'string', 'max' => 100],
            [['satker'], 'string', 'max' => 50],
            [['status', 'jenis_kerugian', 'nama_pihak'], 'string', 'max' => 30],
            [['nip'], 'string', 'max' => 18],
            [['files1', 'files2', 'files3', 'files4', 'files5', 'files6', 'files7', 'files8', 'files9', 'files10', 'files11', 'files12'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor' => 'Nomor',
            'nama_peristiwa' => 'Nama Peristiwa',
            'tgl_dibuat' => 'Tanggal Laporan',
            'tgl_peristiwa' => 'Tanggal Peristiwa',
            'satker' => 'Satker',
            'status' => 'Status',
            'jenis_kerugian' => 'Jenis Kerugian',
            'nilai' => 'Dugaan Nilai Kerugian Negara',
            'nama_pihak' => 'Nama Pihak yang Terlibat',
            'nip' => 'NIP',
            'ket_lain' => 'Keterangan Lain',
            'dokumen' => 'Dokumen',
            'files1' => 'SK Pengangkatan Bendahara',
            'files2' => 'Register Penutupan Kas',
            'files3' => 'Perhitungan bendahara sebagai pertanggungjawaban',
            'files4' => 'Surat tanda penerimaan laporan',
            'files5' => 'Laporan Kepala BPS Kab/Kota ke BPS Propinsi',
            'files6' => 'Laporan Kepala BPS Propinsi ke BPS TPKN',
            'files7' => 'Berita Acara Pemeriksaan kas',
            'files8' => 'Daftar pertanyaan untuk menyusun laporan kerugian negara',
            'files9' => 'Fotokopi/rekaman buku kas umum bulan bersangkutan yang menunjukkan adanya kerugian negara',
            'files10' => 'Surat Keterangan bank tentang salldo kas bank bersangkutan',
            'files11' => 'Berita Acara pemeriksaan perkara dari kepolisian jika kerugian negara terjadi karena pencurian/perampokan *',
            'files12' => 'Berita Acara Pemeriksaan perkara dari kepolisian jika kerugian negara terjadi karena pencurian/perampokan',
        ];
    }
}
