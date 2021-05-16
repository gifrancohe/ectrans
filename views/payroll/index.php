<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PayrollSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Payrolls');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Planilla'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'idpayroll',
            'driver.name',
            'car.plaque',
            //'km_initial',
            //'km_final',
            'from',
            'to',
            'hour',
            [
                'attribute' => 'type_pay',
                'value' => function ($model, $index, $widget) { 
                    if ($model->type_pay == 1) {
                        return 'Efectivo';
                    } elseif ($model->type_pay == 2) {
                        return 'Voucher';
                    } else {
                        return 'Cuenta x Cobrar';
                    }
                },
                'filter' => [1 => 'Efectivo', 2 => 'Voucher', 3 => 'Cuenta x Cobrar'],
            ],
            'value',
            //'voucher',
            //'parking_value',
            //'fuel_value',
            //'others_value',
            //'other_description',
            //'flypass_value',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
