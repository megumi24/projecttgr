<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sk_pembebanan_tp".
 *
 * @property integer $nomor
 * @property integer $LHP
 * @property integer $kep_hakim
 * @property string $upaya
 * @property integer $nilai_runeg
 */
class SkPembebananTp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sk_pembebanan_tp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor', 'LHP', 'kep_hakim', 'upaya', 'nilai_runeg'], 'required'],
            [['nomor', 'LHP', 'kep_hakim', 'nilai_runeg'], 'integer'],
            [['upaya'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor' => 'Nomor',
            'LHP' => 'Lhp',
            'kep_hakim' => 'Kep Hakim',
            'upaya' => 'Upaya',
            'nilai_runeg' => 'Nilai Runeg',
        ];
    }
}
