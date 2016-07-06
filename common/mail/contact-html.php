<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
?>
<div class="contact-reset">
    <h2>Recupero de contraseña</h2>
    <center><img src="<?= Html::img('images/logo.png'); ?>"</center>
    <p>Usuario : <?= Html::encode($model->username) ?></p>
    <p>Contraseña : <?= Html::encode($model->password) ?></p>
</div>
