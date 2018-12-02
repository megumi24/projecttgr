<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dokumen_kerugian".
 *
 * @property int $id
 * @property int $id_dokumen
 * @property int $id_kerugian
 *
 * @property JenisKerugian $kerugian
 * @property JenisDokumen $dokumen
 */
class DokumenKerugian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dokumen_kerugian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dokumen', 'id_kerugian'], 'required'],
            [['id_dokumen', 'id_kerugian'], 'integer'],
            [['id_kerugian'], 'exist', 'skipOnError' => true, 'targetClass' => JenisKerugian::className(), 'targetAttribute' => ['id_kerugian' => 'id']],
            [['id_dokumen'], 'exist', 'skipOnError' => true, 'targetClass' => JenisDokumen::className(), 'targetAttribute' => ['id_dokumen' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_dokumen' => 'Id Dokumen',
            'id_kerugian' => 'Id Kerugian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKerugian()
    {
        return $this->hasOne(JenisKerugian::className(), ['id' => 'id_kerugian']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumen()
    {
        return $this->hasOne(JenisDokumen::className(), ['id' => 'id_dokumen']);
    }
}
