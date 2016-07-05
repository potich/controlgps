<?php

use yii\bootstrap\Html;

/* @var $this yii\web\View */

$this->title = 'ControlGPS';
?>
<div class="site-index">

    <div class="jumbotron">
        <?= Html::img('@web/images/logo.png', ['alt' => Yii::$app->name]); ?>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Gestión de noticias</h2>

                <p>Desde esta aplicación podras administrar las noticias que se ven en la aplicación de los clientes</p>

                <p><a class="btn btn-default" href="<?=  yii\helpers\Url::to(['report/index']) ?>">Noticias &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Gestión de servidores</h2>

                <p>Se podran dar de alta los diferentes servidores disponibles para que los usuarios entren a la aplicación directamente</p>

                <p><a class="btn btn-default" href="<?=  yii\helpers\Url::to(['server/index']) ?>">Servidores &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Gestión de usuarios</h2>

                <p>Desde el panel de administración se podran gestionar todos los usuarios y asignarles a que servidor corresponden.</p>

                <p><a class="btn btn-default" href="<?=  yii\helpers\Url::to(['user/index']) ?>">Usuarios &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
