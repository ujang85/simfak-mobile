<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dokumen".
 *
 * @property int $id
 * @property string|null $jenis_dokumen
 */
class Dokumen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dokumen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_dokumen'], 'string', 'max' => 90],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_dokumen' => 'Jenis Dokumen',
        ];
    }

    /**
     * {@inheritdoc}
     * @return DokumenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DokumenQuery(get_called_class());
    }
}
