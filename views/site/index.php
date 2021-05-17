<?php

/* @var $this yii\web\View */

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
            <?= Carousel::widget([
                'items' => [
                    // the item contains only the image
                    '<img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-01.jpg"/>',
                    // equivalent to the above
                    ['content' => '<img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-02.jpg"/>'],
                    // the item contains both the image and the caption
                    [
                        'content' => '<img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-03.jpg"/>',
                        'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
                        'options' => [...],
                    ],
                ]
            ]);
            ?>
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
