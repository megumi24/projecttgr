<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Debitur;

/**
 * DebiturSearch represents the model behind the search form of `app\models\Debitur`.
 */
class DebiturSearch extends Debitur
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_debitur', 'jenis_debitur', 'nama', 'alamat', 'NIP', 'email'], 'safe'],
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
        $query = Debitur::find();

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
        $query->andFilterWhere(['like', 'id_debitur', $this->id_debitur])
            ->andFilterWhere(['like', 'jenis_debitur', $this->jenis_debitur])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'NIP', $this->NIP])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
