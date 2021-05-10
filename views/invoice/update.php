<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Invoice */

$this->title = 'Update Invoice: ' . $model->idinvoice;
$this->params['breadcrumbs'][] = ['label' => 'Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idinvoice, 'url' => ['view', 'id' => $model->idinvoice]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="invoice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
