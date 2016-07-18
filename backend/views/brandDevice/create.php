<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BrandDevice */

$this->title = Yii::t('app', 'Create Brand Device');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Brand Devices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-device-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
