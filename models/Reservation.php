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
 * @property string $contact_person
 * @property int $passenger_number
 * @property string|null $voucher	
 * @property string|null $passenger_name 
 * @property string|null $passenger_cel 
 * @property string|null $comments 
 * @property string|null $flight_details 
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
            [['customer_id', 'from', 'to', 'reservation_date', 'reservation_hour', 'type_pay', 'contact_person', 'passenger_number'], 'required'],
            [['customer_id', 'type_pay', 'reservation_status', 'passenger_number'], 'integer'],
            [['reservation_date', 'created_at', 'updated_at'], 'safe'],
            [['from', 'to'], 'string', 'max' => 150],
            [['reservation_hour', 'voucher'], 'string', 'max' => 45],
            [['contact_person', 'passenger_name', 'flight_details'], 'string', 'max' => 250],
            [['passenger_cel'], 'string', 'max' => 100],
            [['comments'], 'string', 'max' => 500],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'idcustomer']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idreservation' => Yii::t('app', 'Id Reservación'),
            'customer_id' => Yii::t('app', 'Cliente'),
            'from' => Yii::t('app', 'Desde'),
            'to' => Yii::t('app', 'Hasta'),
            'reservation_date' => Yii::t('app', 'Fecha reservación'),
            'reservation_hour' => Yii::t('app', 'Hora reservación'),
            'type_pay' => Yii::t('app', 'Tipo de pago'),
            'reservation_status' => Yii::t('app', 'Estado'),
            'contact_person' => Yii::t('app', 'Persona responsable'),
            'passenger_number' => Yii::t('app', 'Nro de pasajeros'),
            'voucher' => Yii::t('app', 'Voucher'),
            'passenger_name' => Yii::t('app', 'Nombre del pasajero'),
            'passenger_cel' => Yii::t('app', 'Número de contacto'),
            'comments' => Yii::t('app', 'Observaciones'),
            'flight_details' => Yii::t('app', 'Nro vuelo / Aerolinea'),
            'created_at' => Yii::t('app', 'Creado en'),
            'updated_at' => Yii::t('app', 'Actualizado en'),
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
