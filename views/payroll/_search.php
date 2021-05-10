<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PayrollSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idpayroll') ?>

    <?= $form->field($model, 'driver_id') ?>

    <?= $form->field($model, 'car_id') ?>

    <?= $form->field($model, 'invoice_id') ?>

    <?= $form->field($model, 'km_initial') ?>

    <?php // echo $form->field($model, 'km_final') ?>

    <?php // echo $form->field($model, 'from') ?>

    <?php // echo $form->field($model, 'to') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
