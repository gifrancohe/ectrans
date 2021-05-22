<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Payroll */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <i class="fa fa-asterisk text-danger"></i>
            <?= $form->field($model, 'driver_id')->dropDownList($drivers,['prompt'=>'Seleccione un conductor']); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'car_id')->dropDownList($cars,['prompt'=>'Seleccione un vehiculo']); ?>    
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'km_initial')->textInput(['placeholder' => "Ingrese el kilometraje inicial"]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'km_final')->textInput(['placeholder' => "Ingrese el kilometraje final"]) ?>    
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'from')->textInput(['maxlength' => true, 'placeholder' => "Ingrese el origen del viaje"]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'to')->textInput(['maxlength' => true, 'placeholder' => "Ingrese el destino del viaje"]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'hour')->widget(TimePicker::classname(), [
                'pluginOptions' => [
                    'showSeconds' => true,
                    'showMeridian' => false,
                    'minuteStep' => 1,
                    'secondStep' => 5,
                ]
            ]); ?>    
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'type_pay')->dropDownList(['1' => 'Efectivo', '2' => 'Voucher', '3' => 'Cuenta x Cobrar'],['prompt'=>'Seleccione el tipo de pago']); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'voucher')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'value')->textInput(['placeholder' => "Ingrese el valor del viaje"]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'parking_value')->textInput(['placeholder' => "Ingrese los gastos por parqueadero"]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'fuel_value')->textInput(['placeholder' => "Ingrese los gastos por combustible"]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'others_value')->textInput(['placeholder' => "Ingrese el valor de otros gastos"]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'other_description')->textInput(['maxlength' => true, 'placeholder' => "Haga una pequeña descripción de los otros gastos"]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'flypass_value')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'settlement_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Ingrese la fecha a liquidar ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'startDate'=> date('Y-m-d', strtotime('-5 days')),
                    'autoclose'=>true
                ]
            ]); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Enviar planilla'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>