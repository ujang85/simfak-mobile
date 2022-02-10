<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Teknisi;

/**
 * TeknisiSearch represents the model behind the search form about `app\models\Teknisi`.
 */
class TeknisiSearch extends Teknisi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tek'], 'integer'],
            [['nama_teknisi', 'jenis_agen', 'hapus'], 'safe'],
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
        $query = Teknisi::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_tek' => $this->id_tek,
        ]);

        $query->andFilterWhere(['like', 'nama_teknisi', $this->nama_teknisi])
            ->andFilterWhere(['like', 'jenis_agen', $this->jenis_agen])
            ->andFilterWhere(['like', 'hapus', $this->hapus]);

        return $dataProvider;
    }
}
