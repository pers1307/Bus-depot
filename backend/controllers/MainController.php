<?php

namespace backend\controllers;

class MainController extends \yii\web\Controller
{
    /**
     * Главная страница CMS системы
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
