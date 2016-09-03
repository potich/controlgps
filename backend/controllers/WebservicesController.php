<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class WebservicesController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionLogin($username, $password) {

        \Yii::$app->response->format = 'json';
        $user = User::find()->joinWith('rol')->where(['username' => $username, 'password' => $password])->one();

        if ($user) {
            $response = ['User' => ['id' => $user->id, 'username' => $username, 'url' => $user->code, 'Rol' => $user->rol->name,'Server'=>($user->rol->name == 'CLIENT') ? $user->server->id : null]];
        } else {
            $response = ['no'];
        }
        return $response;
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionReports($id) {
        \Yii::$app->response->format = 'json';
        $user = User::findOne(['id' => $id]);
        $reports = \common\models\Report::find()
                        ->select(['report.title', 'report.description', 'report.created_at', 'type_report.name AS type'])
                        ->innerJoin('server_report', 'server_report.report_id = report.id')
                        ->innerJoin('type_report', 'type_report.id = report.typereport_id')
                        ->where(['server_report.server_id' => $user->server->id, 'active' => true])
                        ->orderBy('report.created_at DESC')
                        ->asArray()->all();
        return $reports;
    }

    public function actionRecovery($email) {
        \Yii::$app->response->format = 'json';
        $user = User::findOne(['email' => $email]);
        if ($user) {
            \Yii::$app->mailer->compose(['html' => 'contact-html'], ['model' => $user])
                    ->setFrom([$email => \Yii::$app->name . ' robot'])
                    ->setTo($user->email)
                    ->setSubject("Recuperación de contraseña ControlGPS")
                    ->send();
            return ['response' => true];
        } else {
            return ['response' => false];
        }
    }

    public function actionConfig() {
        \Yii::$app->response->format = 'json';
        $configs = \common\models\Configuracion::find()->asArray()->all();

        return $configs;
    }

    // get videos 
    public function actionVideos($serverId) {
        \Yii::$app->response->format = 'json';
        $videos = \common\models\Video::find()
                ->where(['server_id' => $serverId, 'active' => true])
               
                ->asArray()
                ->all();

        return $videos;
    }

    // get cars 
    public function actionCars($userId) {
        \Yii::$app->response->format = 'json';
        $cars = \common\models\Car::find()
                ->joinWith(['user', 'device'])
                ->andWhere(['user_id' => $userId, 'car.active' => true])
                ->asArray()
                ->all();

        return $cars;
    }

    // get clients 
    public function actionClients($userId) {
        \Yii::$app->response->format = 'json';

        $user = \common\models\User::findIdentity((int) $userId);

        if ($user && $user->rol->name == 'TECHNICAL') {
            $clients = \common\models\User::find()
                    ->joinWith(['rol'])
                    ->andWhere(['status' => 10, 'rol.name' => 'CLIENT'])
                    ->asArray()
                    ->all();
        }


        return $clients;
    }

    // update car 
    public function actionUpdatecar($id, $install) {
        \Yii::$app->response->format = 'json';

        $car = \common\models\Car::findOne(['id' => $id]);

        if ($car) {
            $car->install = $install;
            $car->save();
        } else {
            
        }

        return $car;
    }

}
