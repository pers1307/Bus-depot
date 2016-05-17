<?php

namespace backend\controllers;

use backend\models\LoginForm;

class AutorizationController extends \yii\web\Controller
{
    public $layout = 'autorization';

    /**
     * Страница авторизации
     * @return string
     */
    public function actionLogin()
    {
        $model = new LoginForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            $this->redirect('/cabinet/');
            // данные в $model удачно проверены

            // делаем что-то полезное с $model ...

            //return $this->render('entry-confirm', ['model' => $model]);
        }

        return $this->render('login', [
            'model' => $model
        ]);
    }

}
