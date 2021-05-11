<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Payroll */

$this->title = Yii::t('app', 'Crear Planilla');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payrolls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'drivers' => $drivers,
        'cars' => $cars,
    ]) ?>

</div>
