<?php

namespace frontend\controllers;


class MainController extends \yii\web\Controller
{
    public $layout = 'index';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionNotFound()
    {

    }
}
