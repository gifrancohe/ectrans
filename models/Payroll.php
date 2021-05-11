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
 * @property string|null $voucher
 * @property int|null $parking_value
 * @property int|null $fuel_value
 * @property int|null $others_value
 * @property string|null $other_description
 * @property int|null $flypass_value
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Driver $driver
 * @property Car $car
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
            [['driver_id', 'car_id', 'km_initial', 'km_final', 'from', 'hour', 'to', 'type_pay', 'value'], 'required'],
            [['driver_id', 'car_id', 'km_initial', 'km_final', 'type_pay', 'value', 'parking_value', 'fuel_value', 'others_value', 'flypass_value'], 'integer'],
            [['hour', 'created_at', 'updated_at'], 'safe'],
            [['from'], 'string', 'max' => 150],
            [['to', 'voucher'], 'string', 'max' => 45],
            [['other_description'], 'string', 'max' => 250],
            [['driver_id'], 'exist', 'skipOnError' => true, 'targetClass' => Driver::className(), 'targetAttribute' => ['driver_id' => 'iddriver']],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['car_id' => 'idcar']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpayroll' => Yii::t('app', 'Idpayroll'),
            'driver_id' => Yii::t('app', 'Driver ID'),
            'car_id' => Yii::t('app', 'Car ID'),
            'km_initial' => Yii::t('app', 'Km Initial'),
            'km_final' => Yii::t('app', 'Km Final'),
            'from' => Yii::t('app', 'From'),
            'hour' => Yii::t('app', 'Hour'),
            'to' => Yii::t('app', 'To'),
            'type_pay' => Yii::t('app', 'Type Pay'),
            'value' => Yii::t('app', 'Value'),
            'voucher' => Yii::t('app', 'Voucher'),
            'parking_value' => Yii::t('app', 'Parking Value'),
            'fuel_value' => Yii::t('app', 'Fuel Value'),
            'others_value' => Yii::t('app', 'Others Value'),
            'other_description' => Yii::t('app', 'Other Description'),
            'flypass_value' => Yii::t('app', 'Flypass Value'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
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
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery|CarQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::className(), ['idcar' => 'car_id']);
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
