<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>

<div class="video-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'description')->textarea() ?>

    <?= $form->field($model, 'link_youtube')->textInput(['maxlength' => true]) ?>
    <label>Servidores</label>
    <?php $servers = common\models\Server::find()->all();
    ?>
    <select class="form-control" multiple name="servers[]" id="video-servers">
        <?php
        foreach ($servers as $server) {
            $exist = common\models\ServerVideo::findOne(['server_id' => $server->id, 'video_id' => $model->id]);
            if ($exist)
                echo '<option value = "' . $server->id . '" SELECTED>' . $server->name . '</option>';
            else
                echo '<option value = "' . $server->id . '" >' . $server->name . '</option>';
        }
        ?>
    </select>

    <?= $form->field($model, 'active')->checkbox(['value' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
