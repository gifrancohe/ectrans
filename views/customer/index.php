<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clientes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Cliente'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'idcustomer',
            'identification',
            //'outsider_customer_name',
            'trade_name',
            [
                'attribute' => 'customer_type',
                'value' => function ($model, $index, $widget) { return $model->customer_type == 1 ? 'Cliente' : 'Otro'; },
                'filter' => [1 => 'Cliente', 2 => 'Otro'],
            ],
            [
                'attribute' => 'status',
                'value' => function ($model, $index, $widget) { return $model->status == 1 ? 'Activo' : 'Inactivo'; },
                'filter' => [1 => 'Activo', 0 => 'Inactivo'],
            ],
            //'created_at',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
