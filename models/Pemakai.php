<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemakai".
 *
 * @property int $id
 * @property string $user
 * @property string $hapus
 */
class Pemakai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemakai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hapus'], 'string'],
            [['user'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'Pengguna Alat',
            'hapus' => 'Hapus',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PemakaiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PemakaiQuery(get_called_class());
    }
}
