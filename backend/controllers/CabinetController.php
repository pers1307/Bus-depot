<?php

namespace backend\controllers;

use backend\models\Bus;
use backend\models\Route;
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

        parent::beforeAction($action);
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

        return $this->render('index', [
            'countBus' => $countBus,
            'countRoute' => $countRoute
        ]);
    }

}
