<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rincian_pembayaran".
 *
 * @property int $id
 * @property int $id_kasus
 * @property string $ntpn
 * @property int $pembayaran
 * @property int $sisa_pembayaran
 * @property int $periode_bayar
 *
 * @property KasusTgr $kasus
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
            [['id', 'id_kasus', 'ntpn', 'pembayaran', 'sisa_pembayaran', 'tgl_bayar'], 'required'],
            [['id', 'id_kasus', 'pembayaran', 'sisa_pembayaran'], 'integer'],
            [['tgl_bayar', 'tgl_input'], 'safe'],
            [['ntpn'], 'string', 'max' => 20],
            [['id'], 'unique'],
            [['id_kasus'], 'exist', 'skipOnError' => true, 'targetClass' => Kasus::className(), 'targetAttribute' => ['id_kasus' => 'id_kasus']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kasus' => 'Id Kasus',
            'ntpn' => 'Nomor Dokumen',
            'pembayaran' => 'Pembayaran',
            'sisa_pembayaran' => 'Sisa Pembayaran',
            'tgl_bayar' => 'Tanggal Pembayaran',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKasus()
    {
        return $this->hasOne(Kasus::className(), ['id_kasus' => 'id_kasus']);
    }
}
