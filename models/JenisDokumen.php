<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_dokumen".
 *
 * @property int $id
 * @property string $jenis_dokumen
 *
 * @property DokumenKerugian[] $dokumenKerugians
 */
class JenisDokumen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_dokumen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jenis_dokumen'], 'required'],
            [['id'], 'integer'],
            [['jenis_dokumen'], 'string', 'max' => 100],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_dokumen' => 'Jenis Dokumen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumenKerugians()
    {
        return $this->hasMany(DokumenKerugian::className(), ['id_dokumen' => 'id']);
    }
}
