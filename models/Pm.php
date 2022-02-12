<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pm".
 *
 * @property int $id_pm
 * @property string|null $nomor_pm
 * @property string|null $uraian_pm
 * @property string|null $id_inven
 * @property string|null $terjadwal_pm
 * @property string|null $tgl_pm
 * @property string|null $tgl_pm_berikut
 * @property string|null $teknisi
 * @property int|null $kondisi_alat
 * @property string|null $garansi_pm
 * @property int|null $masa_garansi_pm
 * @property int|null $periode_garansi
 * @property int|null $konversi_garansi
 * @property int|null $hapus
 * @property string|null $kode_pm
 * @property int|null $id_pengguna
 * @property int|null $group_id
 * @property int|null $id_alat
 * @property int|null $thn_pm
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
            [['terjadwal_pm', 'tgl_pm', 'tgl_pm_berikut', 'garansi_pm'], 'safe'],
            [['kondisi_alat', 'masa_garansi_pm', 'periode_garansi', 'konversi_garansi', 'hapus', 'id_pengguna', 'group_id', 'id_alat', 'thn_pm'], 'integer'],
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
            'id_pm' => Yii::t('app', 'Id Pm'),
            'nomor_pm' => Yii::t('app', 'Nomor Pm'),
            'uraian_pm' => Yii::t('app', 'Uraian Pm'),
            'id_inven' => Yii::t('app', 'Id Inven'),
            'terjadwal_pm' => Yii::t('app', 'Terjadwal Pm'),
            'tgl_pm' => Yii::t('app', 'Tgl Pm'),
            'tgl_pm_berikut' => Yii::t('app', 'Tgl Pm Berikut'),
            'teknisi' => Yii::t('app', 'Teknisi'),
            'kondisi_alat' => Yii::t('app', 'Kondisi Alat'),
            'garansi_pm' => Yii::t('app', 'Garansi Pm'),
            'masa_garansi_pm' => Yii::t('app', 'Masa Garansi Pm'),
            'periode_garansi' => Yii::t('app', 'Periode Garansi'),
            'konversi_garansi' => Yii::t('app', 'Konversi Garansi'),
            'hapus' => Yii::t('app', 'Hapus'),
            'kode_pm' => Yii::t('app', 'Kode Pm'),
            'id_pengguna' => Yii::t('app', 'Id Pengguna'),
            'group_id' => Yii::t('app', 'Group ID'),
            'id_alat' => Yii::t('app', 'Id Alat'),
            'thn_pm' => Yii::t('app', 'Thn Pm'),
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
