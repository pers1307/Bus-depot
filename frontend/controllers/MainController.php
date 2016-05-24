<?php

namespace frontend\controllers;

use yii\base\Controller;
use yii\base\Exception;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use Yii;
use yii\base\ErrorException;

class MainController extends Controller
{
    public $layout = 'index';

    public function actionIndex()
    {
        /**
         * Пример отправки на 404
         */
        //throw new NotFoundHttpException('!!!',509);

        return $this->render('index');
    }
}
