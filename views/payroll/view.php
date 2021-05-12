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
            [
                'format' => 'raw',
                'attribute' => 'km_initial',
                'value' => Yii::$app->formatter->asDecimal($model->km_initial),
            ],
            [
                'format' => 'raw',
                'attribute' => 'km_final',
                'value' => Yii::$app->formatter->asDecimal($model->km_final),
            ],
            'from',
            'to',
            [
                'format' => 'raw',
                'attribute' => 'hour',
                'value' => Yii::$app->formatter->asTime($model->hour),
            ],
            [
                'format' => 'raw',
                'attribute' => 'type_pay',
                'value' => $model->type_pay == 1 ? 'Facturado' : 'Efectivo',
            ],
            [
                'format' => 'raw',
                'attribute' => 'value',
                'value' => Yii::$app->formatter->asCurrency($model->value),
            ],
            'voucher',
            [
                'format' => 'raw',
                'attribute' => 'value',
                'value' => Yii::$app->formatter->asCurrency($model->parking_value),
            ],
            [
                'format' => 'raw',
                'attribute' => 'value',
                'value' => Yii::$app->formatter->asCurrency($model->fuel_value),
            ],
            [
                'format' => 'raw',
                'attribute' => 'value',
                'value' => Yii::$app->formatter->asCurrency($model->others_value),
            ],
            'other_description',
            'flypass_value',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
