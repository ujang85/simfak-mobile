<?php

namespace app\models;
use app\models\AlatRs;
use Yii;

/**
 * This is the model class for table "aduan".
 *
 * @property int $kd_lapor
 * @property int|null $user
 * @property int|null $unit
 * @property string|null $isi_lapor
 * @property int|null $jenis_rusak
 * @property int|null $respon
 * @property int|null $selesai
 * @property string|null $tgl_lapor
 * @property string|null $jam_lapor
 * @property string|null $inven_id
 * @property int|null $ganti_komp
 * @property string|null $nama_komp
 * @property string|null $teknisi
 * @property string|null $Keterangan
 * @property string|null $tgl_respon
 * @property string|null $jam_respon
 * @property string|null $tgl_selesai
 * @property string|null $jam_selesai
 * @property int|null $tindak_lanjut
 * @property int|null $hapus
 */
class Aduan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $nama_alat;
    public $kode_group;
    public $merk_type;
    public static function tableName()
    {
        return 'aduan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'user', 'unit', 'jenis_rusak', 'respon', 'selesai', 'ganti_komp', 'tindak_lanjut', 'hapus'], 'integer'],
            [['group_id','merk_type','nama_alat','tgl_lapor', 'jam_lapor', 'tgl_respon', 'jam_respon', 'tgl_selesai', 'jam_selesai'], 'safe'],
            [['pelapor','merk_type','nama_alat','isi_lapor', 'nama_komp', 'Keterangan'], 'string', 'max' => 90],
            [['inven_id'], 'string', 'max' => 10],
            [['teknisi'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kd_lapor' => 'Kd Lapor',
            'user' => 'User',
            'unit' => 'Unit',
            'isi_lapor' => 'Isi Lapor',
            'jenis_rusak' => 'Jenis Rusak',
            'respon' => 'Respon',
            'selesai' => 'Selesai',
            'tgl_lapor' => 'Tgl Lapor',
            'jam_lapor' => 'Jam Lapor',
            'inven_id' => 'Inven ID',
            'ganti_komp' => 'Ganti Komp',
            'nama_komp' => 'Nama Komp',
            'teknisi' => 'Teknisi',
            'Keterangan' => 'Keterangan',
            'tgl_respon' => 'Tgl Respon',
            'jam_respon' => 'Jam Respon',
            'tgl_selesai' => 'Tgl Selesai',
            'jam_selesai' => 'Jam Selesai',
            'tindak_lanjut' => 'Tindak Lanjut',
            'pelapor' => 'pelapor',
            'hapus' => 'Hapus',
        ];
    }
    public function getData_alat()
    {
        return $this->hasOne(AlatRs::className(), [ 'kode_alat'=>'id_alat' ]);
    }
    /**
     * {@inheritdoc}
     * @return AduanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AduanQuery(get_called_class());
    }
}
