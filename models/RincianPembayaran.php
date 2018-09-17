<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rincian_pembayaran".
 *
 * @property string $nomor_sktjm
 * @property integer $ntpn
 * @property integer $pembayaran
 * @property integer $kode_satker
 * @property string $status
 *
 * @property PembayaranTgr $nomorSktjm
 */
class RincianPembayaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rincian_pembayaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor_sktjm', 'ntpn', 'pembayaran', 'kode_satker', 'status'], 'required'],
            [['ntpn', 'pembayaran', 'kode_satker'], 'integer'],
            [['nomor_sktjm'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 10],
            [['nomor_sktjm'], 'exist', 'skipOnError' => true, 'targetClass' => PembayaranTgr::className(), 'targetAttribute' => ['nomor_sktjm' => 'nomor_sktjm']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor_sktjm' => 'Nomor Sktjm',
            'ntpn' => 'Ntpn',
            'pembayaran' => 'Pembayaran',
            'kode_satker' => 'Kode Satker',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNomorSktjm()
    {
        return $this->hasOne(PembayaranTgr::className(), ['nomor_sktjm' => 'nomor_sktjm']);
    }
}
