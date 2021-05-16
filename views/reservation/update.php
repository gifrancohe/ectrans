<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reservation */

$this->title = Yii::t('app', 'Actualizar Reservación: {name}', [
    'name' => $model->idreservation,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reservaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idreservation, 'url' => ['view', 'id' => $model->idreservation]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="reservation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'customers' => $customers
    ]) ?>

</div>
