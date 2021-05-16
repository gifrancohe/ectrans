<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DriverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Conductores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear conductor'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'iddriver',
            'name',
            'last_name',
            'document_number',
            [
                'attribute' => 'type_driver',
                'value' => function ($model, $index, $widget) { return $model->type_driver == 1 ? 'Propio' : 'Tercero'; },
                'filter' => [1 => 'Propio', 0 => 'Tercero'],
            ],
            [
                'attribute' => 'status',
                'value' => function ($model, $index, $widget) { return $model->status == 1 ? 'Activo' : 'Inactivo'; },
                'filter' => [1 => 'Activo', 0 => 'Inactivo'],
            ],
            //'cel',
            //'email:email',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
