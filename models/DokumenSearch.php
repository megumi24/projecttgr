<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dokumen;

/**
 * DokumenSearch represents the model behind the search form of `app\models\Dokumen`.
 */
class DokumenSearch extends Dokumen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dokumen', 'id_jenis', 'id_kasus'], 'integer'],
            [['nama_dokumen', 'path_dokumen'], 'safe'],
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
        $query = Dokumen::find();

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
            'id_dokumen' => $this->id_dokumen,
            'id_jenis' => $this->id_jenis,
            'id_kasus' => $this->id_kasus,
        ]);

        $query->andFilterWhere(['like', 'nama_dokumen', $this->nama_dokumen])
            ->andFilterWhere(['like', 'path_dokumen', $this->path_dokumen]);

        return $dataProvider;
    }
}
