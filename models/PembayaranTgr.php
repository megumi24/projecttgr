<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembayaran_tgr".
 *
 * @property int $id
 * @property string $nomor_sktjm
 * @property string $jenis_peristiwa
 * @property string $nip
 * @property string $satuan_kerja
 * @property string $tata_cara
 * @property string $target_memenuhi
 * @property int $periode
 * @property int $total
 * @property string $sisa_pembayaran
 * @property string $status_cicilan
 * @property string $ntpn
 * @property string $pembayaran
 * @property int $kode_satker
 * @property string $status
 *
 * @property Pegawai $nip0
 * @property RincianPembayaran[] $rincianPembayarans
 */
class PembayaranTgr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembayaran_tgr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor_sktjm', 'jenis_peristiwa', 'nip', 'satuan_kerja', 'tata_cara', 'target_memenuhi', 'periode', 'total', 'sisa_pembayaran', 'status_cicilan', 'ntpn', 'pembayaran', 'kode_satker', 'status'], 'required'],
            [['tata_cara', 'status_cicilan', 'status'], 'string'],
            [['target_memenuhi'], 'safe'],
            [['periode', 'total', 'pembayaran', 'kode_satker'], 'integer'],
            [['nomor_sktjm', 'satuan_kerja'], 'string', 'max' => 50],
            [['jenis_peristiwa', 'ntpn'], 'string', 'max' => 30],
            [['nip'], 'string', 'max' => 16],
            [['sisa_pembayaran'], 'string', 'max' => 12],
            [['nip'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['nip' => 'nip']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomor_sktjm' => 'Nomor Sktjm',
            'jenis_peristiwa' => 'Jenis Peristiwa',
            'nip' => 'Nip',
            'satuan_kerja' => 'Satuan Kerja',
            'tata_cara' => 'Tata Cara',
            'target_memenuhi' => 'Target Memenuhi',
            'periode' => 'Periode',
            'total' => 'Total',
            'sisa_pembayaran' => 'Sisa Pembayaran',
            'status_cicilan' => 'Status Cicilan',
            'ntpn' => 'Ntpn',
            'pembayaran' => 'Pembayaran',
            'kode_satker' => 'Kode Satker',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNip0()
    {
        return $this->hasOne(Pegawai::className(), ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRincianPembayarans()
    {
        return $this->hasMany(RincianPembayaran::className(), ['nomor_sktjm' => 'nomor_sktjm']);
    }
}
