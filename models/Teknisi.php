<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teknisi".
 *
 * @property int $id_tek
 * @property string $nama_teknisi
 * @property string $jenis_agen
 * @property string $hapus
 */
class Teknisi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teknisi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_agen', 'hapus'], 'string'],
            [['nama_teknisi'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tek' => 'Id Tek',
            'nama_teknisi' => 'Nama Teknisi',
            'jenis_agen' => 'Jenis Agen',
            'hapus' => 'Hapus',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TeknisiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TeknisiQuery(get_called_class());
    }
}
