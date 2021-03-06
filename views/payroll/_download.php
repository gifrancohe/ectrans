<?php

use yii\helpers\Html;
use kartik\time\TimePicker;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Payroll */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-download-form">
    <?= Html::beginForm(['/payroll/download', 'id' => 'payroll-download'], 'POST'); ?>

        <div class="row">
            <div class="col-md-6">
                <?= '<label class="control-label">Fecha Inicial</label>'; ?>
                <?= DatePicker::widget([
                    'name' => 'date_from',
                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                    'value' => date('Y-m-d'),
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]);?>
            </div>
            <div class="col-md-6">
                <?= '<label class="control-label">Fecha Final</label>'; ?>
                <?= DatePicker::widget([
                    'name' => 'date_to',
                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]);?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group field-payroll-id_driver">
                    <label class="control-label" for="payroll-id_driver">Conductor</label>
                    <?= Html::dropDownList('id_driver', null, $drivers, ['class' => 'form-control', 'prompt'=> 'Seleccione un conductor']); ?>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <?= Html::submitButton('Descargar', ['class' => 'btn btn-primary']); ?>
        </div>
    <?= Html::endForm(); ?>
</div>