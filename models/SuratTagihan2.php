<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_tagihan_2".
 *
 * @property integer $no
 * @property string $nomor_surat
 * @property string $nip
 * @property string $tanggal
 *
 * @property Pegawai $nip0
 */
class SuratTagihan2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_tagihan_2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no', 'nomor_surat', 'nip'], 'required'],
            [['no'], 'integer'],
            [['tanggal'], 'safe'],
            [['nomor_surat'], 'string', 'max' => 50],
            [['nip'], 'string', 'max' => 16],
            [['nip'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['nip' => 'nip']],
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
            'nip' => 'Nip',
            'tanggal' => 'Tanggal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNip0()
    {
        return $this->hasOne(Pegawai::className(), ['nip' => 'nip']);
    }
}
