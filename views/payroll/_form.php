<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Payroll */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'driver_id')->dropDownList($drivers,['prompt'=>'Seleccione un conductor']); ?>

    <?= $form->field($model, 'car_id')->dropDownList($cars,['prompt'=>'Seleccione un vehiculo']); ?>

    <?= $form->field($model, 'km_initial')->textInput() ?>

    <?= $form->field($model, 'km_final')->textInput() ?>

    <?= $form->field($model, 'from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hour')->textInput() ?>

    <?= $form->field($model, 'to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_pay')->textInput() ?>

    <?= $form->field($model, 'value')->textInput() ?>

    <?= $form->field($model, 'voucher')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parking_value')->textInput() ?>

    <?= $form->field($model, 'fuel_value')->textInput() ?>

    <?= $form->field($model, 'others_value')->textInput() ?>

    <?= $form->field($model, 'other_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'flypass_value')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
