<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Report */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'typereport_id')->dropDownList(ArrayHelper::map(common\models\TypeReport::find()->all(), 'id', 'name'), ['prompt' => Yii::t('app', 'Select...')]) ?>
    <label>Servidores</label>
    <?php $servers = common\models\Server::find()->all();
    ?>

    <select class="form-control" multiple name="servers[]" id="report-servers">
        <?php
        foreach ($servers as $server) {
            $exist = common\models\ServerReport::findOne(['server_id' => $server->id, 'report_id' => $model->id]);
            if ($exist)
                echo '<option value = "' . $server->id . '" SELECTED>' . $server->name . '</option>';
            else
                echo '<option value = "' . $server->id . '" >' . $server->name . '</option>';
        }
        ?>
    </select>
    <div class = "form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
