<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Payroll */

$this->title = Yii::t('app', 'Update Payroll: {name}', [
    'name' => $model->idpayroll,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payrolls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpayroll, 'url' => ['view', 'idpayroll' => $model->idpayroll, 'driver_id' => $model->driver_id, 'car_id' => $model->car_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="payroll-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
