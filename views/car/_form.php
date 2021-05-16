<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Car */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'plaque')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(['1' => 'Activo', '0' => 'Inactivo']); ?>

    <?= $form->field($model, 'colour')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?php if($model->isNewRecord): ?>
          
        <?= $form->field($model, 'created_at')->hiddenInput(['value'=> date('Y-m-d H:i:s')])->label(false); ?>

        <?= $form->field($model, 'updated_at')->hiddenInput(['value'=> date('Y-m-d H:i:s')])->label(false); ?>
    
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
