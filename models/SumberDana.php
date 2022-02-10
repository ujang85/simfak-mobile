<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sumber_dana".
 *
 * @property int $id
 * @property string $sumber_dana
 */
class SumberDana extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sumber_dana';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sumber_dana'], 'string', 'max' => 90],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sumber_dana' => 'Sumber Dana',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SumberDanaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SumberDanaQuery(get_called_class());
    }
}
