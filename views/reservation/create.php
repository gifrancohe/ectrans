<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reservation */

$this->title = Yii::t('app', 'Crear Reservación');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'customers' => $customers
    ]) ?>

</div>
