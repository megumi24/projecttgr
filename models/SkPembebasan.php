<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sk_pembebasan".
 *
 * @property integer $nomor
 * @property integer $no_sk_sistama
 * @property integer $tgl
 * @property integer $perihal
 */
class SkPembebasan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sk_pembebasan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['nomor', 'no_sk_sistama', 'tgl', 'perihal'], 'required'],
            [['nomor', 'no_sk_sistama', 'tgl', 'perihal'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor' => 'Nomor',
            'no_sk_sistama' => 'Nomor SK Sestama',
            'tgl' => 'Tanggal',
            'perihal' => 'Perihal',
        ];
    }
}
