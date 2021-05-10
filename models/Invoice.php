<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property int $idinvoice
 * @property string|null $voucher
 * @property int $type_pay
 * @property int|null $value
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Payroll[] $payrolls
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_pay', 'created_at'], 'required'],
            [['type_pay', 'value'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['voucher'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idinvoice' => 'Idinvoice',
            'voucher' => 'Voucher',
            'type_pay' => 'Type Pay',
            'value' => 'Value',
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
        return $this->hasMany(Payroll::className(), ['invoice_id' => 'idinvoice']);
    }
}
