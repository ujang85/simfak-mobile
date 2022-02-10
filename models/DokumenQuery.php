<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Dokumen]].
 *
 * @see Dokumen
 */
class DokumenQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Dokumen[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Dokumen|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
