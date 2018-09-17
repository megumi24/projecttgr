<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rekonsiliasi".
 *
 * @property string $tanggal
 * @property integer $pembayaran
 * @property integer $NTPN
 */
class Rekonsiliasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rekonsiliasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal', 'pembayaran', 'NTPN'], 'required'],
            [['tanggal'], 'safe'],
            [['pembayaran', 'NTPN'], 'integer'],
            [['NTPN'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tanggal' => 'Tanggal',
            'pembayaran' => 'Pembayaran',
            'NTPN' => 'Ntpn',
        ];
    }
}
