<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservation".
 *
 * @property int $idreservation
 * @property int $customer_id
 * @property string $from
 * @property string $to
 * @property string $reservation_date
 * @property string $reservation_hour
 * @property int $type_pay
 * @property int $reservation_status
 * @property string|null $voucher
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Customer $customer
 */
class Reservation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'from', 'to', 'reservation_date', 'reservation_hour', 'type_pay'], 'required'],
            [['customer_id', 'type_pay', 'reservation_status'], 'integer'],
            [['reservation_date', 'created_at', 'updated_at'], 'safe'],
            [['from', 'to'], 'string', 'max' => 150],
            [['reservation_hour', 'voucher'], 'string', 'max' => 45],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'idcustomer']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idreservation' => Yii::t('app', 'Idreservation'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'from' => Yii::t('app', 'From'),
            'to' => Yii::t('app', 'To'),
            'reservation_date' => Yii::t('app', 'Reservation Date'),
            'reservation_hour' => Yii::t('app', 'Reservation Hour'),
            'type_pay' => Yii::t('app', 'Type Pay'),
            'reservation_status' => Yii::t('app', 'Reservation Status'),
            'voucher' => Yii::t('app', 'Voucher'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery|CustomerQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['idcustomer' => 'customer_id']);
    }

    /**
     * {@inheritdoc}
     * @return ReservationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReservationQuery(get_called_class());
    }
}
