<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[AlatRs]].
 *
 * @see AlatRs
 */
class AlatRsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AlatRs[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AlatRs|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
