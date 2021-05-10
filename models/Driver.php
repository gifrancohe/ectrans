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
            [['name', 'last_name', 'document_number'], 'required'],
            [['document_number'], 'integer'],
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
            'iddriver' => 'Iddriver',
            'name' => 'Name',
            'last_name' => 'Last Name',
            'document_number' => 'Document Number',
            'cel' => 'Cel',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Payrolls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayrolls()
    {
        return $this->hasMany(Payroll::className(), ['driver_id' => 'iddriver']);
    }
}
