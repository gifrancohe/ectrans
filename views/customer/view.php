<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = $model->trade_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->idcustomer], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idcustomer',
            'identification',
            'outsider_customer_name',
            'trade_name',
            [
                'format' => 'raw',
                'attribute' => 'customer_type',
                'value' => $model->customer_type == 1 ? 'Cliente' : 'Otro',
            ],
            [
                'format' => 'raw',
                'attribute' => 'status',
                'value' => $model->status == 1 ? 'Activo' : 'Inactivo',
            ],
            [
                'format' => 'raw',
                'attribute' => 'created_at',
                'value' => function($model) {
                    return date('Y-m-d H:i:s', strtotime('-5 hour', strtotime($model->created_at)));
                }
            ],
            [
                'format' => 'raw',
                'attribute' => 'updated_at',
                'value' => function($model) {
                    return date('Y-m-d H:i:s', strtotime('-5 hour', strtotime($model->updated_at)));
                }
            ],
        ],
    ]) ?>

</div>
