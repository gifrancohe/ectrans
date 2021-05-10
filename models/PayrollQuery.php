<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Payroll]].
 *
 * @see Payroll
 */
class PayrollQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Payroll[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Payroll|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
