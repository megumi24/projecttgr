<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rincian_pembayaran".
 *
 * @property int $id
 * @property string $nomor_sktjm
 * @property int $pembayaran
 * @property int $sisa_pembayaran
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
            [['id', 'nomor_sktjm', 'pembayaran', 'sisa_pembayaran'], 'required'],
            [['id', 'pembayaran', 'sisa_pembayaran'], 'integer'],
            [['nomor_sktjm'], 'string', 'max' => 50],
            [['id'], 'unique'],
            [['nomor_sktjm'], 'exist', 'skipOnError' => true, 'targetClass' => PembayaranTgr::className(), 'targetAttribute' => ['nomor_sktjm' => 'nomor_sktjm']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomor_sktjm' => 'Nomor SKTJM',
            'pembayaran' => 'Pembayaran',
            'sisa_pembayaran' => 'Sisa Pembayaran',
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
