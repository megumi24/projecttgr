<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_tagihan_3".
 *
 * @property integer $no
 * @property string $nomor_surat
 * @property string $nip
 *
 * @property Pegawai $nip0
 */
class SuratTagihan3 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_tagihan_3';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no', 'nomor_surat', 'nip'], 'required'],
            [['no'], 'integer'],
            [['nomor_surat'], 'string', 'max' => 50],
            [['nip'], 'string', 'max' => 30],
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
