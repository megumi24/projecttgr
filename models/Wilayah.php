<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wilayah".
 *
 * @property string $kdwilayah
 * @property string $nama_wilayah
 * @property string $alias_wilayah
 * @property int $kdurut
 */
class Wilayah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wilayah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kdwilayah', 'nama_wilayah', 'alias_wilayah', 'kdurut'], 'required'],
            [['kdurut'], 'integer'],
            [['kdwilayah'], 'string', 'max' => 4],
            [['nama_wilayah'], 'string', 'max' => 30],
            [['alias_wilayah'], 'string', 'max' => 255],
            [['kdwilayah'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kdwilayah' => 'Kdwilayah',
            'nama_wilayah' => 'Nama Wilayah',
            'alias_wilayah' => 'Alias Wilayah',
            'kdurut' => 'Kdurut',
        ];
    }

    public function getNamaWilayahById($kdwilayah){
        $wilayah = self::find()
                ->select('nama_wilayah')
                ->where(array('kdwilayah' => Yii::$app->user->identity->username))
                ->scalar();
        return $wilayah;
    }
}
