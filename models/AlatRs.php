<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "alat_rs".
 *
 * @property int $kode_alat
 * @property string $inven_rs
 * @property string $inven_bmn
 * @property string $inven_pemda
 * @property int $id_pemakai
 * @property string $nama_alat
 * @property string $lokasi_brg
 * @property string $merk_type
 * @property string $no_seri
 * @property int $pj_teknisi
 * @property int $th_pengadaan
 * @property int $hrg_peroleh
 * @property string $tgl_kalibrasi
 * @property int $periode_pm
 * @property string $status_milik
 * @property int $id_suplayer
 * @property string $resiko
 * @property string $th_pasang
 * @property string $pm1
 * @property string $kondisi
 * @property string $hapus
 * @property string $sb_dana
 * @property int $kode_group
 * @property string $tgl_peroleh
 * @property string $habis_garansi
 * @property string $habis_kso
 * @property string $ket_fungsi
 * @property string $prod_negara
 * @property string $asal_peroleh
 * @property string $teknologi
 * @property int $periode_kl
 * @property int $kalibrasi
 * @property int $satuan_periodepm
 * @property int $konversi_pm
 * @property string $life_time
 * @property int $cost_tahun
 * @property int $satuan_periodekl
 * @property int $konversi_kl
 * @property string $pm_akhir
 * @property string $ket_pm_akhir
 * @property string $kalibrasi_akhir
 * @property string $nama_gedung
 * @property int $jml_lantai
 * @property int $luas_l1
 * @property int $luas_l2
 * @property string $no_imb
 * @property string $no_ipb
 * @property int $id_org
 * @property int $th_pendirian
 * @property int $th_penggunaan
 * @property int $jadwal_kalibrasi
 * @property int $jadwal_kl
 */
class AlatRs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $tgl_pm;
    public $user;
    public $unit;
    public $isi_lapor;
    public $pelapor;
    public $jenis_rusak;
    public $tgl_lapor;
    public $jam_lapor;
    public $inven_id;
    public static function tableName()
    {
        return 'alat_rs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemakai', 'pj_teknisi', 'th_pengadaan', 'hrg_peroleh', 'periode_pm', 'id_suplayer', 'kode_group', 'periode_kl', 'kalibrasi', 'satuan_periodepm', 'konversi_pm', 'cost_tahun', 'satuan_periodekl', 'konversi_kl', 'jml_lantai', 'luas_l1', 'luas_l2', 'id_org', 'th_pendirian', 'th_penggunaan', 'jadwal_kalibrasi', 'jadwal_pm'], 'integer'],
            [['hapus', 'teknologi'], 'string'],
            [['jam_lapor','tgl_lapor','tgl_peroleh', 'habis_garansi', 'habis_kso'], 'safe'],
            [['inven_rs', 'inven_bmn', 'inven_pemda', 'tgl_kalibrasi', 'ket_pm_akhir', 'kalibrasi_akhir'], 'string', 'max' => 20],
            [['nama_alat','isi_lapor'], 'string', 'max' => 90],
            [['lokasi_brg'], 'string', 'max' => 70],
            [['merk_type'], 'string', 'max' => 60],
            [['no_seri', 'status_milik', 'life_time'], 'string', 'max' => 30],
            [['resiko'], 'string', 'max' => 10],
            [['th_pasang'], 'string', 'max' => 5],
            [['pm1'], 'string', 'max' => 3],
            [['kondisi'], 'string', 'max' => 190],
            [['sb_dana', 'no_imb', 'no_ipb'], 'string', 'max' => 50],
            [['ket_fungsi', 'nama_gedung'], 'string', 'max' => 200],
            [['prod_negara'], 'string', 'max' => 150],
            [['asal_peroleh'], 'string', 'max' => 100],
            [['pm_akhir'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_alat' => 'Kode Alat',
            'inven_rs' => 'Inven. RS',
            'inven_bmn' => 'Inven Bmn',
            'inven_pemda' => 'Inven Pemda',
            'id_pemakai' => 'Pengguna Alat',
            'nama_alat' => 'Nama Alat',
            'lokasi_brg' => 'Lokasi Alat',
            'merk_type' => 'Merk Type',
            'no_seri' => 'No Seri',
            'pj_teknisi' => 'Pj Teknisi',
            'th_pengadaan' => 'Th Pengadaan',
            'hrg_peroleh' => 'Hrg Peroleh',
            'tgl_kalibrasi' => 'Tgl Kalibrasi',
            'periode_pm' => 'Periode Pm',
            'status_milik' => 'Status Milik',
            'id_suplayer' => 'Id Suplayer',
            'resiko' => 'Resiko',
            'th_pasang' => 'Th Pasang',
            'pm1' => 'Pm1',
            'kondisi' => 'Kondisi',
            'hapus' => 'Hapus',
            'sb_dana' => 'Sb Dana',
            'kode_group' => 'Kode Group',
            'tgl_peroleh' => 'Tgl Peroleh',
            'habis_garansi' => 'Habis Garansi',
            'habis_kso' => 'Habis Kso',
            'ket_fungsi' => 'Ket Fungsi',
            'prod_negara' => 'Prod Negara',
            'asal_peroleh' => 'Asal Peroleh',
            'teknologi' => 'Teknologi',
            'periode_kl' => 'Periode Kl',
            'kalibrasi' => 'Kalibrasi',
            'satuan_periodepm' => 'Satuan Periodepm',
            'konversi_pm' => 'Konversi Pm',
            'life_time' => 'Life Time',
            'cost_tahun' => 'Cost Tahun',
            'satuan_periodekl' => 'Satuan Periodekl',
            'konversi_kl' => 'Konversi Kl',
            'pm_akhir' => 'Pm Akhir',
            'ket_pm_akhir' => 'Ket Pm Akhir',
            'kalibrasi_akhir' => 'Kalibrasi Akhir',
            'nama_gedung' => 'Nama Gedung',
            'jml_lantai' => 'Jml Lantai',
            'luas_l1' => 'Luas L1',
            'luas_l2' => 'Luas L2',
            'no_imb' => 'No Imb',
            'no_ipb' => 'No Ipb',
            'id_org' => 'Id Org',
            'th_pendirian' => 'Th Pendirian',
            'th_penggunaan' => 'Th Penggunaan',
            'jadwal_kalibrasi' => 'Jadwal Kalibrasi',
            'jadwal_kl' => 'Jadwal Kl',
        ];
    }
    public function getTeknisi()
    {
        return $this->hasOne(Teknisi::className(), [ 'id_tek'=> 'pj_teknisi']);
    }

    public function getPemakai()
    {
        return $this->hasOne(Pemakai::className(), [ 'id'=> 'id_pemakai']);
    }

    public function getSuplayer()
    {
        return $this->hasOne(Suplayer::className(), [ 'id_suplayer'=> 'id_suplayer']);
    }

    public function getPeriode()
    {
        return $this->hasOne(SatuanPeriode::className(), [ 'id'=> 'satuan_periodepm']);
    }
    public function getSumberDana() { // could be a static func as well

        $models = SumberDana::find()->asArray()->all();

        return ArrayHelper::map($models, 'sumber_dana', 'sumber_dana');

    }
    public function getDatapm()
    {
        return $this->hasOne(Pm::className(),[ 'id_inven'=>'inven_rs' ]);
    }
    /**
     * {@inheritdoc}
     * @return AlatRsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AlatRsQuery(get_called_class());
    }
}
