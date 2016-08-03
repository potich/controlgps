<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \yii\widgets\Pjax;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->email;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email:email',
            'created_at:datetime',
            'server.name'
        ],
    ])
    ?>
    <div class="car-index">

        <p>
            <?= Html::a(Yii::t('app', '+ Vehiculo'), yii\helpers\Url::to(['car/create']) . "?userId=" . $model->id, ['class' => 'btn btn-success']) ?>
        </p>
        <?php
        $dataProvider = new ActiveDataProvider([
            'query' => \common\models\Car::find()->where(['user_id' => $model->id]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        Pjax::begin();
        ?>    <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => false,
            'columns' => [
                'licence',
                'install',
                'telephone_number',
                [
                    'attribute' => 'device.name',
                    'label' => 'Dispositivo',
                ],
                // 'active:boolean',
                ['class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-edit"></span>', yii\helpers\Url::to(['car/update', 'id' => $model->id]), [
                                        'title' => Yii::t('yii', 'Update'),
                            ]);
                        },
                                'delete' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', yii\helpers\Url::to(['car/delete', 'id' => $model->id]), [
                                        'title' => Yii::t('yii', 'Delete'),
                            ]);
                        },
                            ]
                        ],
                    ],
                ]);
                ?>
                <?php Pjax::end(); ?></div>

</div>
