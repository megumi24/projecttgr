<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "debitur".
 *
 * @property string $id_debitur
 * @property string $jenis_debitur
 * @property string $NIP
 * @property string $nama
 * @property string $alamat
 * @property string $email
 */
class Debitur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'debitur';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_debitur', 'jenis_debitur'], 'required'],
            [['jenis_debitur'], 'string'],
            [['id_debitur'], 'string', 'max' => 16],
            [['NIP'], 'string', 'max' => 20],
            [['nama', 'email'], 'string', 'max' => 100],
            [['alamat'], 'string', 'max' => 150],
            [['id_debitur'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_debitur' => 'Id Debitur',
            'jenis_debitur' => 'Jenis Debitur',
            'NIP' => 'NIP',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'email' => 'Email',
        ];
    }
}
