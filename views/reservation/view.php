<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Reservation */

$this->title = $model->idreservation;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reservaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reservation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->idreservation], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idreservation',
            'customer.trade_name',
            'from',
            'to',
            [
                'format' => 'raw',
                'attribute' => 'reservation_date',
                'value' => Yii::$app->formatter->asDate($model->reservation_date),
            ],
            [
                'format' => 'raw',
                'attribute' => 'reservation_hour',
                'value' => Yii::$app->formatter->asTime($model->reservation_hour),
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
                'attribute' => 'reservation_status',
                'value' => $model->reservation_status == 1 ? 'Activa' : 'Inactiva',
            ],
            'contact_person',
            'passenger_number',
            'voucher',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>