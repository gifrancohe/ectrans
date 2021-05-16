<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Payroll */

$this->title = Yii::t('app', 'Descargar Planilla');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-download">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_download', [
        'drivers' => $drivers
    ]) ?>

</div>