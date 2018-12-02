<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RincianPembayaran;

/**
 * RincianPembayaranSearch represents the model behind the search form of `app\models\RincianPembayaran`.
 */
class RincianPembayaranSearch extends RincianPembayaran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_kasus', 'pembayaran', 'sisa_pembayaran'], 'integer'],
            [['ntpn', 'tgl_bayar', 'tgl_input'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = RincianPembayaran::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_kasus' => $this->id_kasus,
            'pembayaran' => $this->pembayaran,
            'sisa_pembayaran' => $this->sisa_pembayaran,
            'tgl_bayar' => $this->tgl_bayar,
            'tgl_input' => $this->tgl_input,
        ]);

        $query->andFilterWhere(['like', 'ntpn', $this->ntpn]);

        return $dataProvider;
    }
}
