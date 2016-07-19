<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'server_id')->dropDownList(ArrayHelper::map(common\models\Server::find()->all(), 'id', 'name'), ['prompt' => Yii::t('app', 'Select...')]) ?>
    <?= $form->field($model, 'rol_id')->dropDownList(ArrayHelper::map(common\models\Rol::find()->all(), 'id', 'name'), ['prompt' => Yii::t('app', 'Select...')]) ?>
    <?= $form->field($model, 'code') ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>


