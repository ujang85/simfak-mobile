<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AlatRs;

/**
 * AlatMedisSearch represents the model behind the search form about `app\models\AlatMedis`.
 */
class AlatSanitasiSearch extends AlatRs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_alat','th_pengadaan', 'hrg_peroleh', 'periode_pm', 'id_suplayer', 'kode_group', 'periode_kl', 'konversi_pm', 'cost_tahun', 'konversi_kl', 'id_org'], 'integer'],
            [['inven_rs', 'inven_bmn', 'inven_pemda','pj_teknisi', 'id_pemakai','nama_alat', 'lokasi_brg', 'merk_type', 'no_seri', 'tgl_kalibrasi', 'status_milik', 'resiko', 'th_pasang', 'pm1', 'kondisi', 'hapus', 'sb_dana', 'tgl_peroleh', 'habis_garansi', 'habis_kso', 'ket_fungsi', 'prod_negara', 'asal_peroleh', 'teknologi', 'kalibrasi', 'satuan_periodepm', 'life_time', 'satuan_periodekl', 'pm_akhir', 'ket_pm_akhir', 'kalibrasi_akhir'], 'safe'],
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
        $query = AlatRs::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query ->joinWith('pemakai');
        $query ->joinWith('teknisi');
        $query->andFilterWhere([
            'kode_alat' => $this->kode_alat,
          //  'id_pemakai' => $this->id_pemakai,
          //  'pj_teknisi' => $this->pj_teknisi,
            'th_pengadaan' => $this->th_pengadaan,
            'hrg_peroleh' => $this->hrg_peroleh,
            'periode_pm' => $this->periode_pm,
            'id_suplayer' => $this->id_suplayer,
            'id_pemakai' => Yii::$app->user->identity->unit,
            'kode_group' =>'1',
            'tgl_peroleh' => $this->tgl_peroleh,
            'habis_garansi' => $this->habis_garansi,
            'habis_kso' => $this->habis_kso,
            'periode_kl' => $this->periode_kl,
            'konversi_pm' => $this->konversi_pm,
            'cost_tahun' => $this->cost_tahun,
            'konversi_kl' => $this->konversi_kl,
            'id_org' => $this->id_org,
        ]);

        $query->andFilterWhere(['like', 'inven_rs', $this->inven_rs])
            ->andFilterWhere(['like', 'nama_teknisi', $this->pj_teknisi])
            ->andFilterWhere(['like', 'inven_bmn', $this->inven_bmn])
            ->andFilterWhere(['like', 'inven_pemda', $this->inven_pemda])
            ->andFilterWhere(['like', 'nama_alat', $this->nama_alat])
            ->andFilterWhere(['like', 'user', $this->id_pemakai])
            ->andFilterWhere(['like', 'lokasi_brg', $this->lokasi_brg])
            ->andFilterWhere(['like', 'merk_type', $this->merk_type])
            ->andFilterWhere(['like', 'no_seri', $this->no_seri])
            ->andFilterWhere(['like', 'tgl_kalibrasi', $this->tgl_kalibrasi])
            ->andFilterWhere(['like', 'status_milik', $this->status_milik])
            ->andFilterWhere(['like', 'resiko', $this->resiko])
            ->andFilterWhere(['like', 'th_pasang', $this->th_pasang])
            ->andFilterWhere(['like', 'pm1', $this->pm1])
            ->andFilterWhere(['like', 'kondisi', $this->kondisi])
            ->andFilterWhere(['like', 'hapus', $this->hapus])
            ->andFilterWhere(['like', 'sb_dana', $this->sb_dana])
            ->andFilterWhere(['like', 'ket_fungsi', $this->ket_fungsi])
            ->andFilterWhere(['like', 'prod_negara', $this->prod_negara])
            ->andFilterWhere(['like', 'asal_peroleh', $this->asal_peroleh])
            ->andFilterWhere(['like', 'teknologi', $this->teknologi])
            ->andFilterWhere(['like', 'kalibrasi', $this->kalibrasi])
            ->andFilterWhere(['like', 'satuan_periodepm', $this->satuan_periodepm])
            ->andFilterWhere(['like', 'life_time', $this->life_time])
            ->andFilterWhere(['like', 'satuan_periodekl', $this->satuan_periodekl])
            ->andFilterWhere(['like', 'pm_akhir', $this->pm_akhir])
            ->andFilterWhere(['like', 'ket_pm_akhir', $this->ket_pm_akhir])
            ->andFilterWhere(['like', 'kalibrasi_akhir', $this->kalibrasi_akhir]);

        return $dataProvider;
    }
}
