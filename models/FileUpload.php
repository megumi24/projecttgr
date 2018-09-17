<?php

namespace app\models;
use yii\base\Model;
use yii\web\UploadedFile;

use Yii;

/**
 * This is the model class for table "file_upload".
 *
 * @property string $id_surat
 * @property string $nama_surat
 * @property string $id_kasus
 *
 * @property KasusTgr $kasus
 */
class FileUpload extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file_upload';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['nama_surat', 'id_kasus'], 'required'],
            [['id_kasus'], 'integer'],
            [['nama_surat'], 'string', 'max' => 100],
            [['id_kasus'], 'exist', 'skipOnError' => true, 'targetClass' => KasusTgr::className(), 'targetAttribute' => ['id_kasus' => 'id_kasus']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_surat' => 'Id Surat',
            'nama_surat' => 'Nama Surat',
            'id_kasus' => 'Id Kasus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKasus()
    {
        return $this->hasOne(KasusTgr::className(), ['id_kasus' => 'id_kasus']);
    }
}
