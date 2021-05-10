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
            [['idpayroll', 'driver_id', 'car_id', 'invoice_id', 'km_initial', 'km_final'], 'integer'],
            [['from', 'to', 'created_at', 'updated_at'], 'safe'],
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
            'invoice_id' => $this->invoice_id,
            'km_initial' => $this->km_initial,
            'km_final' => $this->km_final,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'from', $this->from])
            ->andFilterWhere(['like', 'to', $this->to]);

        return $dataProvider;
    }
}
