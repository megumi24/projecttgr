<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KasusTgr;

/**
 * KasusTgrSearch represents the model behind the search form about `app\models\KasusTgr`.
 */
class KasusTgrSearch extends KasusTgr
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kasus', 'nilai'], 'integer'],
            [['nama_peristiwa', 'tgl_dibuat', 'tgl_peristiwa', 'satker', 'status', 'wilayah', 'jenis_kerugian', 'tahun', 'ket_lain', 'nip'], 'safe'],
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
        $query = KasusTgr::find();

        if (Yii::$app->user->getIdentity()->level==2) {
             $query = KasusTgr::find()
            ->where(['satker' => Yii::$app->user->identity->username]);
        }
        else if (Yii::$app->user->getIdentity()->level==5){
            $query = KasusTgr::find()
            ->where(['wilayah' => Yii::$app->user->identity->username]);
        }
       
        // }
        // echo Yii::$app->user->identity->username;
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
            'nilai' => $this->nilai,
            'tahun' => $this->tahun,
        ]);

        $query->andFilterWhere(['like', 'nama_peristiwa', $this->nama_peristiwa])
            ->andFilterWhere(['like', 'satker', $this->satker])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'jenis_kerugian', $this->jenis_kerugian])
            ->andFilterWhere(['like', 'ket_lain', $this->ket_lain])
            ->andFilterWhere(['like', 'nip', $this->nip]);

        return $dataProvider;
    }
}
