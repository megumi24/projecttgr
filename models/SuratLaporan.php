<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_laporan".
 *
 * @property integer $nomor
 * @property string $tindakan
 * @property integer $nip
 */
class SuratLaporan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_laporan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tindakan', 'nip'], 'required'],
            [['nip'], 'integer'],
            [['tindakan'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor' => 'Nomor',
            'tindakan' => 'Tindakan',
            'nip' => 'Nip',
        ];
    }
}
