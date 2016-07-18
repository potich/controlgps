<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Car */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'licence')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telephone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(common\models\User::find()->all(), 'id', 'username'), ['prompt' => Yii::t('app', 'Select...')]) ?>

    <?= $form->field($model, 'device_id')->dropDownList(ArrayHelper::map(common\models\Device::find()->all(), 'id', 'name'), ['prompt' => Yii::t('app', 'Select...')]) ?>



    <?= $form->field($model, 'active')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
