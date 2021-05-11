<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Payroll;

/**
 * PayrollSearch represents the model behind the search form of `app\models\Payroll`.
 */
class PayrollSearch extends Payroll
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idpayroll', 'driver_id', 'car_id', 'km_initial', 'km_final', 'type_pay', 'value', 'parking_value', 'fuel_value', 'others_value', 'flypass_value'], 'integer'],
            [['from', 'hour', 'to', 'voucher', 'other_description', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Payroll::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idpayroll' => $this->idpayroll,
            'driver_id' => $this->driver_id,
            'car_id' => $this->car_id,
            'km_initial' => $this->km_initial,
            'km_final' => $this->km_final,
            'hour' => $this->hour,
            'type_pay' => $this->type_pay,
            'value' => $this->value,
            'parking_value' => $this->parking_value,
            'fuel_value' => $this->fuel_value,
            'others_value' => $this->others_value,
            'flypass_value' => $this->flypass_value,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'from', $this->from])
            ->andFilterWhere(['like', 'to', $this->to])
            ->andFilterWhere(['like', 'voucher', $this->voucher])
            ->andFilterWhere(['like', 'other_description', $this->other_description]);

        return $dataProvider;
    }
}
