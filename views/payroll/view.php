<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Payroll */

$this->title = $model->idpayroll;
$this->params['breadcrumbs'][] = ['label' => 'Payrolls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="payroll-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idpayroll' => $model->idpayroll, 'car_id' => $model->car_id, 'invoice_id' => $model->invoice_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idpayroll' => $model->idpayroll, 'car_id' => $model->car_id, 'invoice_id' => $model->invoice_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idpayroll',
            'driver_id',
            'car_id',
            'invoice_id',
            'km_initial',
            'km_final',
            'from',
            'to',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
