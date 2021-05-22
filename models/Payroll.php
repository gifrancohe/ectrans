<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payroll".
 *
 * @property int $idpayroll
 * @property int $driver_id
 * @property int $car_id
 * @property int $km_initial
 * @property int $km_final
 * @property string $from
 * @property string $hour
 * @property string $to
 * @property int $type_pay
 * @property int $value
 * @property string $settlement_date
 * @property string|null $voucher
 * @property int|null $parking_value
 * @property int|null $fuel_value
 * @property int|null $others_value
 * @property string|null $other_description
 * @property int|null $flypass_value
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Car $car
 * @property Driver $driver
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
            [['driver_id', 'car_id', 'km_initial', 'km_final', 'from', 'hour', 'to', 'type_pay', 'value', 'settlement_date'], 'required'],
            [['driver_id', 'car_id', 'km_initial', 'km_final', 'type_pay', 'value', 'parking_value', 'fuel_value', 'others_value', 'flypass_value'], 'integer'],
            [['hour', 'settlement_date', 'created_at', 'updated_at'], 'safe'],
            [['from'], 'string', 'max' => 150],
            [['to', 'voucher'], 'string', 'max' => 45],
            [['other_description'], 'string', 'max' => 250],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['car_id' => 'idcar']],
            [['driver_id'], 'exist', 'skipOnError' => true, 'targetClass' => Driver::className(), 'targetAttribute' => ['driver_id' => 'iddriver']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpayroll' => Yii::t('app', 'Id Planilla'),
            'driver_id' => Yii::t('app', 'Conductor'),
            'car_id' => Yii::t('app', 'Automóvil'),
            'km_initial' => Yii::t('app', 'Kilometraje inicial'),
            'km_final' => Yii::t('app', 'Kilometraje final'),
            'from' => Yii::t('app', 'Desde'),
            'to' => Yii::t('app', 'Hasta'),
            'hour' => Yii::t('app', 'Hora'),
            'type_pay' => Yii::t('app', 'Tipo de pago'),
            'value' => Yii::t('app', 'Valor'),
            'settlement_date' => Yii::t('app', 'Fecha liquidación'),
            'voucher' => Yii::t('app', 'Voucher'),
            'parking_value' => Yii::t('app', 'Gasto parqueadero'),
            'fuel_value' => Yii::t('app', 'Gasto combustible'),
            'others_value' => Yii::t('app', 'Otros gastos'),
            'other_description' => Yii::t('app', 'Descripción otros gastos'),
            'flypass_value' => Yii::t('app', 'Gasto Flypass'),
            'created_at' => Yii::t('app', 'Creado en'),
            'updated_at' => Yii::t('app', 'Actualizado en'),
        ];
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
     * Gets query for [[Driver]].
     *
     * @return \yii\db\ActiveQuery|DriverQuery
     */
    public function getDriver()
    {
        return $this->hasOne(Driver::className(), ['iddriver' => 'driver_id']);
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
