<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Device */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="device-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand_id')->dropDownList(ArrayHelper::map(common\models\BrandDevice::find()->all(), 'id', 'name'), ['prompt' => Yii::t('app', 'Select...')]) ?>

    <?= $form->field($model, 'RESET_GPS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OFF_IBUTTON')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ON_IBUTTON')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'active')->checkbox() ?>

    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
