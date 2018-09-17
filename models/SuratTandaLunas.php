<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_tanda_lunas".
 *
 * @property string $nomor_surat
 * @property string $nama
 * @property string $jumlah
 * @property string $nomor_spgr
 * @property string $tanggal
 */
class SuratTandaLunas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_tanda_lunas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor_surat', 'nama', 'jumlah', 'nomor_spgr'], 'required'],
            [['tanggal'], 'safe'],
            [['nomor_surat', 'nomor_spgr'], 'string', 'max' => 50],
            [['nama'], 'string', 'max' => 100],
            [['jumlah'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor_surat' => 'Nomor Surat',
            'nama' => 'Nama',
            'jumlah' => 'Jumlah',
            'nomor_spgr' => 'Nomor Spgr',
            'tanggal' => 'Tanggal',
        ];
    }
}
