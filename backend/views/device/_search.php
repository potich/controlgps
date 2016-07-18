<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model common\models\DeviceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="device-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>

    <?= $form->field($model, 'name') ?>

<?= $form->field($model, 'brand_id')->dropDownList(ArrayHelper::map(common\models\BrandDevice::find()->all(), 'id', 'name'), ['prompt' => Yii::t('app', 'Select...')]) ?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
