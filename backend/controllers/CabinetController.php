<?php

namespace backend\controllers;

class CabinetController extends \yii\web\Controller
{
    public $layout = 'inner';

    public function actionIndex()
    {
        return $this->render('index');
    }

}
