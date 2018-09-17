<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "satker".
 *
 * @property string $kdsatker
 * @property string $kdwilayah
 * @property string $nama_satker
 * @property int $id_operator
 */
class Satker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'satker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kdsatker', 'kdwilayah'], 'required'],
            [['id_operator'], 'integer'],
            [['kdsatker'], 'string', 'max' => 6],
            [['kdwilayah'], 'string', 'max' => 4],
            [['nama_satker'], 'string', 'max' => 105],
            [['kdsatker'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kdsatker' => 'Kdsatker',
            'kdwilayah' => 'Kdwilayah',
            'nama_satker' => 'Nama Satker',
            'id_operator' => 'Id Operator',
        ];
    }

    public function getNamaSatkerById($kdsatker){
        $satker = self::find()
                ->select('nama_satker')
                ->where(array('kdsatker' => $kdsatker))
                ->scalar();
        return $satker;
    }  

    public function getKodeWilayahById($kdsatker){
            $satker = self::find()
                    ->select('kdwilayah')
                    ->where(array('kdsatker' => $kdsatker))
                    ->scalar();
            return $satker;
        }  
    
}
