<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Driver */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Conductores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="driver-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->iddriver], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iddriver',
            'name',
            'last_name',
            'document_number',
            [
                'format' => 'raw',
                'attribute' => 'type_driver',
                'value' => $model->type_driver == 1 ? 'Propio' : 'Tercero',
            ],
            [
                'format' => 'raw',
                'attribute' => 'status',
                'value' => $model->status == 1 ? 'Activo' : 'Inactivo',
            ],
            'cel',
            'email:email',
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
