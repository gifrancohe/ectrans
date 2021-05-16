<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Reservation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->dropDownList($customers,['prompt'=>'Seleccione un cliente']); ?>

    <?= $form->field($model, 'from')->textInput(['maxlength' => true, 'placeholder' => "Ingrese el origen del viaje"]) ?>

    <?= $form->field($model, 'to')->textInput(['maxlength' => true, 'placeholder' => "Ingrese el destino del viaje"]) ?>

    <?= $form->field($model, 'reservation_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Ingrese la fecha del viaje ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ]); ?>

    <?= $form->field($model, 'reservation_hour')->widget(TimePicker::classname(), [
        'pluginOptions' => [
            'showSeconds' => true,
            'showMeridian' => false,
            'minuteStep' => 1,
            'secondStep' => 5,
        ]
    ]); ?>

    <?= $form->field($model, 'type_pay')->dropDownList(['1' => 'Efectivo', '2' => 'Voucher', '3' => 'Cuenta x Cobrar'],['prompt'=>'Seleccione el tipo de pago']); ?>

    <?= $form->field($model, 'reservation_status')->hiddenInput(['value'=> 1])->label(false); ?>

    <?= $form->field($model, 'voucher')->textInput(['maxlength' => true]) ?>

    <?php if($model->isNewRecord): ?>
          
        <?= $form->field($model, 'created_at')->hiddenInput(['value'=> date('Y-m-d H:i:s')])->label(false); ?>
    
        <?= $form->field($model, 'updated_at')->hiddenInput(['value'=> date('Y-m-d H:i:s')])->label(false); ?>
        
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
