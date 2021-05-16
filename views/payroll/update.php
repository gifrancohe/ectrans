<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Payroll */

$this->title = Yii::t('app', 'Actualzar Planilla: {name}', [
    'name' => $model->idpayroll,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Planillas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpayroll, 'url' => ['view', 'idpayroll' => $model->idpayroll, 'driver_id' => $model->driver_id, 'car_id' => $model->car_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="payroll-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'drivers' => $drivers,
        'cars' => $cars
    ]) ?>

</div>
