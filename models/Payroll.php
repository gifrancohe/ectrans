<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payroll".
 *
 * @property int $idpayroll
 * @property int $driver_id
 * @property int $car_id
 * @property int $invoice_id
 * @property int $km_initial
 * @property int $km_final
 * @property string $from
 * @property string $to
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Driver $driver
 * @property Car $car
 * @property Invoice $invoice
 */
class Payroll extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payroll';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['driver_id', 'car_id', 'invoice_id', 'km_initial', 'km_final', 'from', 'to'], 'required'],
            [['driver_id', 'car_id', 'invoice_id', 'km_initial', 'km_final'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['from'], 'string', 'max' => 150],
            [['to'], 'string', 'max' => 45],
            [['driver_id'], 'exist', 'skipOnError' => true, 'targetClass' => Driver::className(), 'targetAttribute' => ['driver_id' => 'iddriver']],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['car_id' => 'idcar']],
            [['invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['invoice_id' => 'idinvoice']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpayroll' => 'Idpayroll',
            'driver_id' => 'Driver ID',
            'car_id' => 'Car ID',
            'invoice_id' => 'Invoice ID',
            'km_initial' => 'Km Initial',
            'km_final' => 'Km Final',
            'from' => 'From',
            'to' => 'To',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Driver]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getDriver()
    {
        return $this->hasOne(Driver::className(), ['iddriver' => 'driver_id']);
    }

    /**
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery|CarQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::className(), ['idcar' => 'car_id']);
    }

    /**
     * Gets query for [[Invoice]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['idinvoice' => 'invoice_id']);
    }

    /**
     * {@inheritdoc}
     * @return PayrollQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PayrollQuery(get_called_class());
    }
}
