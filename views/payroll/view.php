<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Payroll */

$this->title = $model->idpayroll;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payrolls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="payroll-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idpayroll' => $model->idpayroll, 'driver_id' => $model->driver_id, 'car_id' => $model->car_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idpayroll' => $model->idpayroll, 'driver_id' => $model->driver_id, 'car_id' => $model->car_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'driver.name',
            'car.plaque',
            'km_initial',
            'km_final',
            'from',
            'hour',
            'to',
            [
                'format' => 'boolean',
                'attribute' => 'type_pay',
                'filter' => [1=>'Facturado',2=>'Efectivo'],
            ],
            'value',
            'voucher',
            'parking_value',
            'fuel_value',
            'others_value',
            'other_description',
            'flypass_value',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
