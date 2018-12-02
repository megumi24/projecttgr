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
 * @property string $pangkat_gol
 * @property string $jabatan
 * @property string $alamat_rumah
 *
 * @property Kasus[] $kasuses
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
            [['nip', 'nama', 'email', 'no_hp', 'pangkat_gol', 'jabatan', 'alamat_rumah'], 'required'],
            [['nip'], 'string', 'max' => 20],
            [['nama'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 50],
            [['no_hp'], 'string', 'max' => 14],
            [['pangkat_gol', 'jabatan', 'alamat_rumah'], 'string', 'max' => 30],
            [['nip'], 'unique'],
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
            'pangkat_gol' => 'Pangkat Gol',
            'jabatan' => 'Jabatan',
            'alamat_rumah' => 'Alamat Rumah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKasuses()
    {
        return $this->hasMany(Kasus::className(), ['nip' => 'nip']);
    }
}
