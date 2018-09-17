<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tata_cara".
 *
 * @property string $id
 * @property string $cara
 */
class TataCara extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tata_cara';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cara'], 'required'],
            [['id'], 'string', 'max' => 1],
            [['cara'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cara' => 'Cara',
        ];
    }
}
