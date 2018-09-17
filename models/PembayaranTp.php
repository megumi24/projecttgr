<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembayaran_tp".
 *
 * @property int $no
 * @property string $nomor_surat
 * @property string $NIP
 * @property string $satuan_kerja
 * @property int $total
 *
 * @property Pegawai $nIP
 */
class PembayaranTp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembayaran_tp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor_surat', 'NIP', 'satuan_kerja', 'total'], 'required'],
            [['total'], 'integer'],
            [['nomor_surat', 'satuan_kerja'], 'string', 'max' => 50],
            [['NIP'], 'string', 'max' => 16],
            [['NIP'], 'unique'],
            [['NIP'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['NIP' => 'nip']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'no' => 'No',
            'nomor_surat' => 'Nomor Surat',
            'NIP' => 'Nip',
            'satuan_kerja' => 'Satuan Kerja',
            'total' => 'Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNIP()
    {
        return $this->hasOne(Pegawai::className(), ['nip' => 'NIP']);
    }
}
