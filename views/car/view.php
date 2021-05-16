<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = $model->plaque;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Automoviles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="car-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->idcar], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idcar',
            'plaque',
            [
                'format' => 'raw',
                'attribute' => 'status',
                'value' => $model->status == 1 ? 'Activo' : 'Inactivo',
            ],
            'colour',
            'brand',
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
