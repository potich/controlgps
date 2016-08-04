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

    <?= $form->field($model, 'server_id')->dropDownList(ArrayHelper::map(common\models\Server::find()->all(), 'id', 'name'), ['prompt' => Yii::t('app', 'Select...')]) ?>

    <?= $form->field($model, 'active')->checkbox(['value' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
