<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[AlatMedis]].
 *
 * @see AlatMedis
 */
class AlatListrikQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AlatMedis[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AlatMedis|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
