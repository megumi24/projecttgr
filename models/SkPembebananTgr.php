<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sk_pembebanan_tgr".
 *
 * @property integer $nomor
 * @property integer $nilai_runeg
 */
class SkPembebananTgr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sk_pembebanan_tgr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['nomor', 'nilai_runeg'], 'required'],
            [['nomor', 'nilai_runeg'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor' => 'Nomor',
            'nilai_runeg' => 'Nilai Runeg',
        ];
    }
}
