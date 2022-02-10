<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aduan;

/**
 * AduanSearch represents the model behind the search form about `app\models\Aduan`.
 */
class AduanSearch extends Aduan
{
    /**
     * @inheritdoc
     */
    public $nama_alat;
   //public $user;
    public $merk_type;
    public function rules()
    {
        return [
            [['kd_lapor', 'user', 'unit', 'jenis_rusak', 'respon', 'selesai', 'ganti_komp', 'tindak_lanjut', 'hapus'], 'integer'],
            [['merk_type','nama_alat','isi_lapor', 'tgl_lapor', 'jam_lapor', 'inven_id', 'nama_komp', 'teknisi', 'Keterangan', 'tgl_respon', 'jam_respon', 'tgl_selesai', 'jam_selesai'], 'safe'],
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
        $query = Aduan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['tgl_lapor' => SORT_DESC]],
        ]);
       

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query ->joinWith('data_alat');
        $query->andFilterWhere([
            'kd_lapor' => $this->kd_lapor,
            'user' => $this->user,
            'unit' => Yii::$app->user->identity->unit,
            'jenis_rusak' => $this->jenis_rusak,
            'respon' => $this->respon,
            'selesai' => $this->selesai,
            'tgl_lapor' => $this->tgl_lapor,
            'jam_lapor' => $this->jam_lapor,
            'ganti_komp' => $this->ganti_komp,
            'tgl_respon' => $this->tgl_respon,
            'jam_respon' => $this->jam_respon,
            'tgl_selesai' => $this->tgl_selesai,
            'jam_selesai' => $this->jam_selesai,
            'tindak_lanjut' => $this->tindak_lanjut,
            'hapus' => $this->hapus,
            'kode_group' => 2,
        ]);

        $query->andFilterWhere(['like', 'isi_lapor', $this->isi_lapor])
            ->andFilterWhere(['like', 'inven_id', $this->inven_id])
            ->andFilterWhere(['like', 'nama_komp', $this->nama_komp])
            ->andFilterWhere(['like', 'teknisi', $this->teknisi])
            ->andFilterWhere(['like', 'Keterangan', $this->Keterangan]);

        return $dataProvider;
    }
}
