<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_pelimpahan".
 *
 * @property string $nomor_surat
 * @property string $nip
 * @property string $jumlah
 */
class SuratPelimpahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_pelimpahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor_surat', 'nip', 'jumlah'], 'required'],
            [['nomor_surat'], 'string', 'max' => 50],
            [['nip'], 'string', 'max' => 30],
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
            'nip' => 'Nip',
            'jumlah' => 'Jumlah',
        ];
    }
}
