<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Payroll */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'driver_id')->dropDownList($drivers,['prompt'=>'Seleccione un conductor']); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'car_id')->dropDownList($cars,['prompt'=>'Seleccione un vehiculo']); ?>    
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'km_initial')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'km_final')->textInput() ?>    
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'from')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'to')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'hour')->textInput() ?>    
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'type_pay')->textInput() ?>    
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'voucher')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'value')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'parking_value')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'fuel_value')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'others_value')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'other_description')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'flypass_value')->textInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Enviar planilla'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
