<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat".
 *
 * @property int $id_surat
 * @property int $id_jenissurat
 * @property int $id_kasus
 * @property string $nomor_surat
 * @property string $tgl_upload
 * @property string $path_surat
 *
 * @property Kasus $kasus
 * @property MasterSurat $jenissurat
 */
class Surat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_surat', 'id_jenissurat', 'id_kasus', 'nomor_surat', 'path_surat'], 'required'],
            [['id_surat', 'id_jenissurat', 'id_kasus'], 'integer'],
            [['tgl_upload'], 'safe'],
            [['nomor_surat'], 'string', 'max' => 50],
            [['path_surat'], 'string', 'max' => 100],
            [['id_surat'], 'unique'],
            [['id_kasus'], 'exist', 'skipOnError' => true, 'targetClass' => Kasus::className(), 'targetAttribute' => ['id_kasus' => 'id_kasus']],
            [['id_jenissurat'], 'exist', 'skipOnError' => true, 'targetClass' => MasterSurat::className(), 'targetAttribute' => ['id_jenissurat' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_surat' => 'Id Surat',
            'id_jenissurat' => 'Id Jenissurat',
            'id_kasus' => 'Id Kasus',
            'nomor_surat' => 'Nomor Surat',
            'tgl_upload' => 'Tgl Upload',
            'path_surat' => 'Path Surat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKasus()
    {
        return $this->hasOne(Kasus::className(), ['id_kasus' => 'id_kasus']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenissurat()
    {
        return $this->hasOne(MasterSurat::className(), ['id' => 'id_jenissurat']);
    }
}
