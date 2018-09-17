<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_surat".
 *
 * @property string $id_level
 * @property int $level_kasus
 * @property string $jenis_kasus
 * @property string $nama_surat
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
            [['level_kasus', 'jenis_kasus', 'nama_surat'], 'required'],
            [['level_kasus'], 'integer'],
            [['jenis_kasus'], 'string', 'max' => 20],
            [['nama_surat'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_level' => 'Id Level',
            'level_kasus' => 'Level Kasus',
            'jenis_kasus' => 'Jenis Kasus',
            'nama_surat' => 'Nama Surat',
        ];
    }
}
