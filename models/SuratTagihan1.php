<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_tagihan_1".
 *
 * @property string $nomor_surat
 * @property string $nama_debitur
 * @property string $tanggal
 */
class SuratTagihan1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_tagihan_1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor_surat', 'nama_debitur'], 'required'],
            [['tanggal'], 'safe'],
            [['nomor_surat'], 'string', 'max' => 50],
            [['nama_debitur'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor_surat' => 'Nomor Surat',
            'nama_debitur' => 'Nama Debitur',
            'tanggal' => 'Tanggal',
        ];
    }
}
