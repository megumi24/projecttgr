<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_tgr".
 *
 * @property integer $nomor
 * @property string $no_surat
 * @property string $tgl_dibuat
 * @property string $satker
 * @property string $nama_debitur
 * @property string $status
 * @property string $sanggahan
 * @property string $dokumen
 * @property string $tgl_kejadian
 * @property string $nama_peristiwa
 */
class SuratTgr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_tgr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor', 'no_surat', 'tgl_dibuat', 'satker', 'nama_debitur', 'status', 'sanggahan', 'dokumen', 'tgl_kejadian', 'nama_peristiwa'], 'required'],
            [['nomor'], 'integer'],
            [['tgl_dibuat', 'tgl_kejadian'], 'safe'],
            [['sanggahan', 'dokumen'], 'string'],
            [['no_surat', 'satker', 'nama_debitur', 'nama_peristiwa'], 'string', 'max' => 30],
            [['status'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor' => 'Nomor',
            'no_surat' => 'No Surat',
            'tgl_dibuat' => 'Tgl Dibuat',
            'satker' => 'Satker',
            'nama_debitur' => 'Nama Debitur',
            'status' => 'Status',
            'sanggahan' => 'Sanggahan',
            'dokumen' => 'Dokumen',
            'tgl_kejadian' => 'Tgl Kejadian',
            'nama_peristiwa' => 'Nama Peristiwa',
        ];
    }
}
