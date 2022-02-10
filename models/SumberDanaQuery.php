<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SumberDana]].
 *
 * @see SumberDana
 */
class SumberDanaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SumberDana[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SumberDana|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
