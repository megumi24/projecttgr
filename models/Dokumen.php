<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;


/**
 * This is the model class for table "dokumen".
 *
 * @property int $id_dokumen
 * @property int $id_jenis
 * @property string $nama_dokumen
 * @property string $path_dokumen
 * @property int $id_kasus
 */
class Dokumen extends \yii\db\ActiveRecord
{
    public $upload;
	
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dokumen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dokumen', 'id_jenis', 'nama_dokumen', 'path_dokumen', 'id_kasus'], 'required'],
            [['id_dokumen', 'id_jenis', 'id_kasus'], 'integer'],
            [['nama_dokumen', 'path_dokumen'], 'string', 'max' => 100],
            [['id_dokumen'], 'unique'],
			[['upload'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dokumen' => 'Id Dokumen',
            'id_jenis' => 'Id Jenis',
            'nama_dokumen' => 'Nama Dokumen',
            'path_dokumen' => 'Path Dokumen',
            'id_kasus' => 'Id Kasus',
			'upload' => 'Upload Dokumen'
        ];
    }
	
}
