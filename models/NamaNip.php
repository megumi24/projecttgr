<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nama_nip".
 *
 * @property string $nama
 * @property integer $nip
 *
 * @property KasusTgr $nip0
 */
class NamaNip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nama_nip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['nama', 'nip'], 'required'],
            [['nip'], 'integer'],
            [['nama'], 'string', 'max' => 30],
            [['nip'], 'exist', 'skipOnError' => true, 'targetClass' => KasusTgr::className(), 'targetAttribute' => ['nip' => 'nip']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nama' => 'Nama',
            'nip' => 'NIP',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNip0()
    {
        return $this->hasOne(KasusTgr::className(), ['nip' => 'nip']);
    }
}
