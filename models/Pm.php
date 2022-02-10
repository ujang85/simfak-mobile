<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pm".
 *
 * @property int $id_pm
 * @property string $nomor_pm
 * @property string $uraian_pm
 * @property string $id_inven
 * @property string $terjadwal_pm
 * @property string $tgl_pm
 * @property string $tgl_pm_berikut
 * @property string $teknisi
 * @property int $kondisi_alat
 * @property string $garansi_pm
 * @property int $masa_garansi_pm
 * @property int $periode_garansi
 * @property int $konversi_garansi
 * @property int $hapus
 * @property string $kode_pm
 */
class Pm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengguna','terjadwal_pm', 'tgl_pm', 'tgl_pm_berikut', 'garansi_pm'], 'safe'],
            [['kondisi_alat','id_pengguna', 'masa_garansi_pm', 'periode_garansi', 'konversi_garansi', 'hapus'], 'integer'],
            [['nomor_pm'], 'string', 'max' => 15],
            [['uraian_pm', 'teknisi'], 'string', 'max' => 200],
            [['id_inven'], 'string', 'max' => 20],
            [['kode_pm'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pm' => 'Id Pm',
            'nomor_pm' => 'Nomor Pm',
            'uraian_pm' => 'Uraian Pm',
            'id_inven' => 'Id Inven',
            'terjadwal_pm' => 'Terjadwal Pm',
            'tgl_pm' => 'Tgl Pm',
            'tgl_pm_berikut' => 'Tgl Pm Berikut',
            'teknisi' => 'Teknisi',
            'kondisi_alat' => 'Kondisi Alat',
            'garansi_pm' => 'Garansi Pm',
            'masa_garansi_pm' => 'Masa Garansi Pm',
            'periode_garansi' => 'Periode Garansi',
            'konversi_garansi' => 'Konversi Garansi',
            'hapus' => 'Hapus',
            'kode_pm' => 'Kode Pm',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PmQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PmQuery(get_called_class());
    }
}
