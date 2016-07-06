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
        $user = User::findOne(['username' => $username, 'password' => $password]);

        if ($user) {
            $response = ['User' => ['id' => $user->id, 'username' => $username, 'url' => $user->code]];
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
        $reports = \common\models\Report::find()->innerJoin('server_report', 'server_report.report_id = report.id')->where(['server_report.server_id' => $user->server->id])->asArray()->all();
        return $reports;
    }

    public function actionRecovery($email) {

        $user = User::findOne(['email' => $email]);

        return \Yii::$app->mailer->compose(['html' => 'contact-html'], ['model' => $user])
                        ->setFrom([$email => \Yii::$app->name . ' robot'])
                        ->setTo($user->email)
                        ->setSubject("Recupero de contraseña ControlGPS")
                        ->send();
    }

}
