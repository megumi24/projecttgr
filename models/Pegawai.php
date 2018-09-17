<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property string $nip
 * @property string $nama
 * @property string $email
 * @property string $no_hp
 *
 * @property SuratTagihan3[] $suratTagihan3s
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip', 'nama', 'email', 'no_hp'], 'required'],
            [['nip'], 'string', 'max' => 30],
            [['nama'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 50],
            [['no_hp'], 'string', 'max' => 14],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nip' => 'Nip',
            'nama' => 'Nama',
            'email' => 'Email',
            'no_hp' => 'No Hp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratTagihan2s()
    {
        return $this->hasMany(SuratTagihan2::className(), ['nip' => 'nip']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratTagihan3s()
    {
        return $this->hasMany(SuratTagihan3::className(), ['nip' => 'nip']);
    }
}
