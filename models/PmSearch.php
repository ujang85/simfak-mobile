<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pm;

/**
 * PmSearch represents the model behind the search form of `app\models\Pm`.
 */
class PmSearch extends Pm
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pm', 'kondisi_alat', 'masa_garansi_pm', 'periode_garansi', 'konversi_garansi', 'hapus', 'id_pengguna', 'group_id', 'id_alat', 'thn_pm'], 'integer'],
            [['nomor_pm', 'uraian_pm', 'id_inven', 'terjadwal_pm', 'tgl_pm', 'tgl_pm_berikut', 'teknisi', 'garansi_pm', 'kode_pm'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Pm::find();

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
            'id_pm' => $this->id_pm,
            'terjadwal_pm' => $this->terjadwal_pm,
            'tgl_pm' => $this->tgl_pm,
            'tgl_pm_berikut' => $this->tgl_pm_berikut,
            'kondisi_alat' => $this->kondisi_alat,
            'garansi_pm' => $this->garansi_pm,
            'masa_garansi_pm' => $this->masa_garansi_pm,
            'periode_garansi' => $this->periode_garansi,
            'konversi_garansi' => $this->konversi_garansi,
            'hapus' => $this->hapus,
            'id_pengguna' => $this->id_pengguna,
            'group_id' => $this->group_id,
            'id_alat' => $this->id_alat,
            'thn_pm' => $this->thn_pm,
        ]);

        $query->andFilterWhere(['like', 'nomor_pm', $this->nomor_pm])
            ->andFilterWhere(['like', 'uraian_pm', $this->uraian_pm])
            ->andFilterWhere(['like', 'id_inven', $this->id_inven])
            ->andFilterWhere(['like', 'teknisi', $this->teknisi])
            ->andFilterWhere(['like', 'kode_pm', $this->kode_pm]);

        return $dataProvider;
    }
}
