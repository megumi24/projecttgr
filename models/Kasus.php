<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kasus_tgr".
 *
 * @property int $id_kasus
 * @property string $nama_peristiwa
 * @property string $tgl_dibuat
 * @property string $tgl_peristiwa
 * @property string $kdsatker
 * @property string $status_kasus
 * @property int $jenis_kerugian
 * @property int $nilai
 * @property string $tahun
 * @property string $ket_lain
 * @property int $nip
 * @property string $wilayah
 *
 * @property JenisKerugian $jenisKerugian
 * @property Satker $kdsatker0
 * @property Pegawai $nip0
 * @property Wilayah $wilayah0
 */
class Kasus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kasus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kasus', 'nama_peristiwa', 'tgl_peristiwa', 'kdsatker', 'status_kasus', 'jenis_kerugian', 'nilai', 'id_debitur', 'tipe_kasus','tata_cara'], 'required'],
            [['id_kasus', 'jenis_kerugian','nilai'], 'integer'],
            [['tgl_dibuat', 'tgl_peristiwa'], 'safe'],
            [['status_kasus', 'ket_lain', 'tipe_kasus','tata_cara'], 'string'],
            [['nama_peristiwa'], 'string', 'max' => 100],
            [['kdsatker'], 'string', 'max' => 50],
            [['wilayah'], 'string', 'max' => 4],
            [['id_kasus'], 'unique'],
            [['jenis_kerugian'], 'exist', 'skipOnError' => true, 'targetClass' => JenisKerugian::className(), 'targetAttribute' => ['jenis_kerugian' => 'id']],
            [['kdsatker'], 'exist', 'skipOnError' => true, 'targetClass' => Satker::className(), 'targetAttribute' => ['kdsatker' => 'kdsatker']],
            [['id_debitur'], 'exist', 'skipOnError' => true, 'targetClass' => Debitur::className(), 'targetAttribute' => ['id_debitur' => 'id_debitur']],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kasus' => 'Id Kasus',
            'nama_peristiwa' => 'Nama Peristiwa',
            'tgl_dibuat' => 'Tanggal Dibuat',
            'tgl_peristiwa' => 'Tanggal Peristiwa',
            'kdsatker' => 'Kode Satker',
            'status_kasus' => 'Status Kasus',
            'jenis_kerugian' => 'Jenis Kerugian',
            'nilai' => 'Nilai',
            'tahun' => 'Tahun',
            'ket_lain' => 'Keterangan Lain',
            'id_debitur'=>'ID Debitur',
			'nomor_sktjm' => 'Nomor SKTJM',
			'tipe_kasus' => 'Tipe Kasus',
            'tata_cara' => 'Tata Cara',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisKerugian()
    {
        return $this->hasOne(JenisKerugian::className(), ['id' => 'jenis_kerugian']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKdsatker0()
    {
        return $this->hasOne(Satker::className(), ['kdsatker' => 'kdsatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDebitur()
    {
        return $this->hasOne(Debitur::className(), ['id_debitur' => 'id_debitur']);
    }

    
	
	public function getCaritahun() {
       $yearNow = date("Y");
       $yearFrom = $yearNow - 10;
       $yearTo = $yearNow;
 
       $arrYears = array();
       foreach (range($yearFrom, $yearTo) as $number) {
              $arrYears[$number] = $number; 
       }
       $arrYears2 = array_reverse($arrYears, true);
 
       return $arrYears2;
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom($this->email)
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }

    
}
