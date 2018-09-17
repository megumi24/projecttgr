<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_spgr_bmn".
 *
 * @property string $nomor
 * @property string $tgl
 */
class SuratSpgrBmn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_spgr_bmn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor'], 'required'],
            [['tgl'], 'safe'],
            [['nomor'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor' => 'Nomor Surat',
            'tgl' => 'Tanggal',
        ];
    }
}
