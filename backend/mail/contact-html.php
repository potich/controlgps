<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
?>
<div class="contact-reset">
    <h2>Recuperación de Contraseña</h2>
    <p>Usuario : <?= Html::encode($model->username) ?></p>
    <p>Contraseña : <?= Html::encode($model->password) ?></p>
</div>
