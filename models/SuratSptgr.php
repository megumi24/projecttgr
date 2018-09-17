<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_sptgr".
 *
 * @property string $nomor
 * @property integer $nilaiRuneg
 * @property string $tgl
 */
class SuratSptgr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_sptgr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['nomor', 'nilaiRuneg', 'tgl'], 'required'],
            [['nilaiRuneg'], 'integer'],
            [['tgl'], 'safe'],
            [['nomor'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor' => 'Nomor',
            'nilaiRuneg' => 'Nilai Runeg',
            'tgl' => 'Tgl',
        ];
    }
}
