<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sk_pembebanan".
 *
 * @property integer $nomor
 * @property integer $nilai_kesanggupan
 * @property integer $nilai_runeg
 * @property integer $hm
 */
class SkPembebanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sk_pembebanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor', 'nilai_kesanggupan', 'nilai_runeg', 'hm'], 'required'],
            [['nomor', 'nilai_kesanggupan', 'nilai_runeg', 'hm'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor' => 'Nomor',
            'nilai_kesanggupan' => 'Nilai Kesanggupan',
            'nilai_runeg' => 'Nilai Runeg',
            'hm' => 'Hm',
        ];
    }
}
