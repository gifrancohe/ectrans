<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Payroll */

$this->title = $model->idpayroll;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Planillas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="payroll-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest): ?>
        <p>
            <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'idpayroll' => $model->idpayroll, 'driver_id' => $model->driver_id, 'car_id' => $model->car_id], ['class' => 'btn btn-primary']) ?>
        </p>
    <?php endif; ?>

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
                'value' => function ($model) {
                    if ($model->type_pay == 1) {
                        return 'Efectivo';
                    }elseif ($model->type_pay == 2) {
                        return 'Voucher';
                    }else {
                        return 'Cuenta x Cobrar';
                    }
                }
            ],
            [
                'format' => 'raw',
                'attribute' => 'value',
                'value' => Yii::$app->formatter->asCurrency($model->value),
            ],
            'voucher',
            [
                'format' => 'raw',
                'attribute' => 'Gasto parqueadero',
                'value' => Yii::$app->formatter->asCurrency($model->parking_value),
            ],
            [
                'format' => 'raw',
                'attribute' => 'Gasto combustible',
                'value' => Yii::$app->formatter->asCurrency($model->fuel_value),
            ],
            [
                'format' => 'raw',
                'attribute' => 'Otros gastos',
                'value' => Yii::$app->formatter->asCurrency($model->others_value),
            ],
            'other_description',
            'flypass_value',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
