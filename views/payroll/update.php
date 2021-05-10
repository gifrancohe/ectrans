<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Payroll */

$this->title = 'Update Payroll: ' . $model->idpayroll;
$this->params['breadcrumbs'][] = ['label' => 'Payrolls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpayroll, 'url' => ['view', 'idpayroll' => $model->idpayroll, 'car_id' => $model->car_id, 'invoice_id' => $model->invoice_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payroll-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
