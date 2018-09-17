<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_jawabansanggahan".
 *
 * @property int $nomor
 * @property string $tgl_rapat
 * @property int $nominal
 * @property string $pernyataan
 */
class SuratJawabansanggahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_jawabansanggahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['tgl_rapat', 'nominal', 'pernyataan'], 'required'],
            [['tgl_rapat'], 'safe'],
            [['nominal'], 'integer'],
            [['pernyataan'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor' => 'Nomor',
            'tgl_rapat' => 'Tgl Rapat',
            'nominal' => 'Nilai Kerugian Terbaru',
            'pernyataan' => 'Pernyataan',
        ];
    }
}
