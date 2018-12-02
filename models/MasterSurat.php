<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_surat".
 *
 * @property int $id
 * @property string $jenis_surat
 *
 * @property Surat[] $surats
 */
class MasterSurat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_surat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jenis_surat'], 'required'],
            [['id'], 'integer'],
            [['jenis_surat'], 'string', 'max' => 50],
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
            'jenis_surat' => 'Jenis Surat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurats()
    {
        return $this->hasMany(Surat::className(), ['id_jenissurat' => 'id']);
    }
}
