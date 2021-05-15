<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = Yii::t('app', 'Actualizar Automóvil: {name}', [
    'name' => $model->plaque,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Automoviles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcar, 'url' => ['view', 'id' => $model->idcar]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="car-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
