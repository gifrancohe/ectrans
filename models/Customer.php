<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $idcustomer
 * @property int $identification
 * @property string $outsider_customer_name
 * @property string $trade_name
 * @property int $customer_type
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Reservation[] $reservations
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['identification', 'outsider_customer_name', 'trade_name', 'customer_type'], 'required'],
            [['identification', 'customer_type', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['outsider_customer_name', 'trade_name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcustomer' => Yii::t('app', 'Idcustomer'),
            'identification' => Yii::t('app', 'Identification'),
            'outsider_customer_name' => Yii::t('app', 'Outsider Customer Name'),
            'trade_name' => Yii::t('app', 'Trade Name'),
            'customer_type' => Yii::t('app', 'Customer Type'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Reservations]].
     *
     * @return \yii\db\ActiveQuery|ReservationQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::className(), ['customer_id' => 'idcustomer']);
    }

    /**
     * {@inheritdoc}
     * @return CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CustomerQuery(get_called_class());
    }
}
