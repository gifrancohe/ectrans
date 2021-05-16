<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'identification')->textInput() ?>

    <?= $form->field($model, 'outsider_customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trade_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_type')->dropDownList(['1' => 'Cliente', '2' => 'Otro'],['prompt'=>'Seleccione el tipo de cliente']); ?>

    <?= $form->field($model, 'status')->dropDownList(['1' => 'Activo', '0' => 'Inactivo']); ?>

    <?php if($model->isNewRecord): ?>

        <?= $form->field($model, 'created_at')->hiddenInput(['value'=> date('Y-m-d H:i:s')])->label(false); ?>

        <?= $form->field($model, 'updated_at')->hiddenInput(['value'=> date('Y-m-d H:i:s')])->label(false); ?>
    
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
