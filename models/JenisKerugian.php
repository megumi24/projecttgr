<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_kerugian".
 *
 * @property int $id
 * @property string $jenis_kerugian
 *
 * @property KasusTgr[] $kasusTgrs
 */
class JenisKerugian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_kerugian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jenis_kerugian'], 'required'],
            [['id'], 'integer'],
            [['jenis_kerugian'], 'string', 'max' => 50],
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
            'jenis_kerugian' => 'Jenis Kerugian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKasusTgrs()
    {
        return $this->hasMany(KasusTgr::className(), ['jenis_kerugian' => 'id']);
    }
}
