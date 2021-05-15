<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "driver".
 *
 * @property int $iddriver
 * @property string $name
 * @property string $last_name
 * @property int $document_number
 * @property int $type_driver
 * @property int $status
 * @property string|null $cel
 * @property string|null $email
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Payroll[] $payrolls
 */
class Driver extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'driver';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'last_name', 'document_number', 'type_driver'], 'required'],
            [['document_number', 'type_driver', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'last_name', 'cel'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddriver' => Yii::t('app', 'Id Conductor'),
            'name' => Yii::t('app', 'Nombre'),
            'last_name' => Yii::t('app', 'Apellido'),
            'document_number' => Yii::t('app', 'Documento de indentificación'),
            'type_driver' => Yii::t('app', 'Tipo de conductor'),
            'status' => Yii::t('app', 'Estado'),
            'cel' => Yii::t('app', 'Celular'),
            'email' => Yii::t('app', 'Email'),
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
        return $this->hasMany(Payroll::className(), ['driver_id' => 'iddriver']);
    }

    /**
     * {@inheritdoc}
     * @return DriverQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DriverQuery(get_called_class());
    }
}
