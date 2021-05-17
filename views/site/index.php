<?php

/* @var $this yii\web\View */
use kv4nt\owlcarousel\OwlCarouselWidget;
use yii\helpers\Html;

$this->title = 'EC Transportes';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>EC Transportes</h1>

        <p class="lead">Administración de viajes y conductores.</p>

        <div class="buttons-actions">
            <a class="btn btn-lg btn-home" href="http://ec2-18-188-114-164.us-east-2.compute.amazonaws.com/index.php?r=payroll%2Fcreate">Conductor</a>
            <a class="btn btn-lg btn-home" href="http://ec2-18-188-114-164.us-east-2.compute.amazonaws.com/index.php?r=reservation%2Fcreate">Cliente</a>
        </div>

        <div class="slider-image">
            <?php 
                OwlCarouselWidget::begin([
                    'container' => 'div',
                    'assetType' => OwlCarouselWidget::ASSET_TYPE_CDN,
                    'jqueryFunction' => 'jQuery',// or $
                    'containerOptions' => [
                        'id' => 'container-id',
                        'class' => 'container-class owl-theme'
                    ],
                    'pluginOptions'    => [
                        'autoplay'          => true,
                        'autoplayTimeout'   => 3000,
                        'items'             => 3,
                        'loop'              => true,
                        'itemsDesktop'      => [1199, 3],
                        'itemsDesktopSmall' => [979, 3]
                    ]
                ]);
            ?>
                <div class="item-class"><?= Html::img('@web/ec-background-drivers.jpeg', ['alt'=>'image-1']);?></div>
                <div class="item-class"><?= Html::img('@web/ec-background-drivers.jpeg', ['alt'=>'image-2']);?></div>
                <div class="item-class"><?= Html::img('@web/ec-background-drivers.jpeg', ['alt'=>'image-3']);?></div>
                <div class="item-class"><?= Html::img('@web/ec-background-drivers.jpeg', ['alt'=>'image-4']);?></div>
            <?php OwlCarouselWidget::end(); ?>
        </div>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Servicios</h2>

                <p>Contamos con vehículos de lujo marca BMW, Mercedes Benz y Toyota porque entendemos que la seguridad y comodidad de nuestros clientes es primordial.</p>
                <p>Nos enfocamos en dar un servicio preferencial que cubre con excelencia todas tus necesidades.</p>

                <p><a class="btn btn-default" target="_blank" href="https://ectransportes.com/#services">Servicios &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Características</h2>

                <p>Capacidad para movilizar desde 1 hasta 45 pasajeros.</p>
                <p>Conductores bilingües privados y certificados.</p>
                <p>Presentación personal impecable.</p>
                <p>Puntualidad garantizada.</p>
                <p>Sistema de monitoreo satelital de toda la flota.</p>
                <p>Reservas ágiles y personalizadas.</p>

                <p><a class="btn btn-default" target="_blank" href="https://ectransportes.com/#caracteristicas">Características &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Transporte</h2>

                <p>Somos expertos en transporte de pasajeros en Medellín, Colombia. Nos destacamos por prestar un servicio de alto nivel.</p>
                <p>Somos expertos en transporte de calidad en Medellín, Colombia. Nos destacamos por prestar un servicio de alto nivel.</p>

                <p><a class="btn btn-default" target="_blank" href="https://ectransportes.com/">Transporte &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
