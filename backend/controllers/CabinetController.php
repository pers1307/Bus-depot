<?php

namespace backend\controllers;

use backend\models\Bus;
use backend\models\Route;
use common\models\User;
use yii\web\NotFoundHttpException;

class CabinetController extends \yii\web\Controller
{
    /** @var string */
    public $layout = 'inner';

    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            throw new NotFoundHttpException(
                'У вас нет доступа к данной странице. Пожалуйста авторизуйтесь.',
                401
            );
        }

        return true;
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $countBus = Bus::find()
            ->count();

        $countRoute = Route::find()
            ->count();

        $userId = \Yii::$app->user->id;
        $user = User::findIdentity($userId);
        \Yii::$app->view->params['username'] = $user->username;

        return $this->render('index', [
            'countBus'   => $countBus,
            'countRoute' => $countRoute
        ]);
    }
}
