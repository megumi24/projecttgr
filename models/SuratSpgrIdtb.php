<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_spgr_idtb".
 *
 * @property string $nosurat
 * @property string $tglsurat
 * @property string $tempat
 * @property string $tglLapor
 * @property string $tglMemorandum
 * @property string $tempatID
 * @property string $tempatTugas
 * @property integer $tahun
 * @property integer $lamaID
 * @property string $nomorSP
 * @property string $tglSP
 * @property string $perihalSP
 * @property string $namaPT
 * @property integer $nilaiRuneg
 */
class SuratSpgrIdtb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_spgr_idtb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['nosurat', 'tglsurat', 'tempat', 'tglLapor', 'tglMemorandum', 'tempatID', 'tempatTugas', 'tahun', 'lamaID', 'nomorSP', 'tglSP', 'perihalSP', 'namaPT', 'nilaiRuneg'], 'required'],
            [['tglsurat', 'tglLapor', 'tglMemorandum', 'tglSP'], 'safe'],
            [['tahun', 'lamaID', 'nilaiRuneg'], 'integer'],
            [['nosurat'], 'string', 'max' => 16],
            [['tempat', 'tempatID', 'tempatTugas', 'nomorSP', 'perihalSP', 'namaPT'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nosurat' => 'Nomor',
            'tglsurat' => 'Tanggal',
            'tempat' => 'Tempat',
            'tglLapor' => 'Tangal Lapor',
            'tglMemorandum' => 'Tanggal Memorandum',
            'tempatID' => 'Tempat Ikatan Dinas',
            'tempatTugas' => 'Tempat Tugas',
            'tahun' => 'Tahun',
            'lamaID' => 'Lama Ikatan Dinas',
            'nomorSP' => 'Nomor Surat Peringatan',
            'tglSP' => 'Tanggal Surat Peringatan',
            'perihalSP' => 'Perihal Sp',
            'namaPT' => 'Nama PT',
            'nilaiRuneg' => 'Nilai Runeg',
        ];
    }
}
