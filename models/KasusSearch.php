<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kasus;

/**
 * KasusSearch represents the model behind the search form of `app\models\Kasus`.
 */
class KasusSearch extends Kasus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kasus', 'jenis_kerugian', 'nilai', 'id_debitur'], 'integer'],
            [['nama_peristiwa', 'tgl_dibuat', 'tgl_peristiwa', 'kdsatker', 'status_Kasus', 'ket_lain'], 'safe'],
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
        $query = Kasus::find();

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
            'id_kasus' => $this->id_kasus,
            'tgl_dibuat' => $this->tgl_dibuat,
            'tgl_peristiwa' => $this->tgl_peristiwa,
            'jenis_kerugian' => $this->jenis_kerugian,
            'nilai' => $this->nilai,
            'id_debitur' => $this->id_debitur,
        ]);

        $query->andFilterWhere(['like', 'nama_peristiwa', $this->nama_peristiwa])
            ->andFilterWhere(['like', 'kdsatker', $this->kdsatker])
            ->andFilterWhere(['like', 'status_kasus', $this->status_kasus])
            ->andFilterWhere(['like', 'tipe_kasus', $this->tipe_kasus])
            ->andFilterWhere(['like', 'ket_lain', $this->ket_lain]);

        return $dataProvider;
    }
}
