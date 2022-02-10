<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Teknisi]].
 *
 * @see Teknisi
 */
class TeknisiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Teknisi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Teknisi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
