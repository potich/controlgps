<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <link rel="shortcut icon" href="http://www.controlgps.es/wp-content/uploads/2015/11/favicon.jpg" />
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Html::img('@web/images/logo.png', ['alt' => Yii::$app->name, 'width' => "150px", "height" => "50px", "style" => "position:relative;top:-15px;"]),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            if (Yii::$app->user->identity) {
                $menuItems = [
                    ['label' => 'Videos', 'url' => ['/video/index']],
                    ['label' => 'Vehiculos', 'url' => ['/car/index']],
                    ['label' => 'Dispositivos', 'url' => ['/device/index']],
                    ['label' => 'Marcas', 'url' => ['/brand/index']],
                    ['label' => 'Usuarios', 'url' => ['/user/index']],
                    ['label' => 'Novedades', 'url' => ['/report/index']],
                    ['label' => 'Servidores', 'url' => ['/server/index']],
                    ['label' => 'Configuración', 'url' => ['/configuracion/index']],
                ];
            }
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link']
                        )
                        . Html::endForm()
                        . '</li>';
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; ControlGPS <?= date('Y') ?></p>

                <p class="pull-right">Desarrollado por Matias Luzardi</p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
