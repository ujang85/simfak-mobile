<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Pemakai]].
 *
 * @see Pemakai
 */
class PemakaiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Pemakai[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Pemakai|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
