<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $idcar
 * @property string $plaque
 * @property int $status
 * @property string|null $colour
 * @property string|null $brand
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Payroll[] $payrolls
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plaque'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['plaque', 'colour'], 'string', 'max' => 45],
            [['brand'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcar' => Yii::t('app', 'Id Auto'),
            'plaque' => Yii::t('app', 'Placa'),
            'status' => Yii::t('app', 'Estado'),
            'colour' => Yii::t('app', 'Color'),
            'brand' => Yii::t('app', 'Marca'),
            'created_at' => Yii::t('app', 'Creado en'),
            'updated_at' => Yii::t('app', 'Actualizado en'),
        ];
    }

    /**
     * Gets query for [[Payrolls]].
     *
     * @return \yii\db\ActiveQuery|PayrollQuery
     */
    public function getPayrolls()
    {
        return $this->hasMany(Payroll::className(), ['car_id' => 'idcar']);
    }

    /**
     * {@inheritdoc}
     * @return CarQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CarQuery(get_called_class());
    }
}
