<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //  echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
//            'password_hash',
//            'password_reset_token',
            'email:email',
            'code',
            'server.name',
            [
                'attribute' => 'rol.name',
                'label' => 'Rol'
            ],
            // 'created_at',
            // 'updated_at',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-cog"></span>', yii\helpers\Url::to(['user/view', 'id' => $model->id]), [
                                    'title' => Yii::t('yii', 'Update'),
                        ]);
                    },
                        ]
                    ],
                ],
            ]);
            ?>
            <?php Pjax::end(); ?></div>
