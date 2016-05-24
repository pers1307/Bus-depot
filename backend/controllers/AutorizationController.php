<?php

namespace backend\controllers;

use backend\models\LoginForm;
use common\models\User;

//use common\models\LoginForm;

class AutorizationController extends \yii\web\Controller
{
    public $layout = 'autorization';

    /**
     * Страница авторизации
     * @return string
     */
    public function actionLogin()
    {
        //$model = new LoginForm();
        $model = new LoginForm();
        $error = '';

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            /**
             * common\models\User
             */
            $user = User::findByUsername($model->login);

            var_dump($user);

            if (!is_null($user)) {

                if ($user->validatePassword($model->password)) {
                    $this->redirect('/cabinet/');
                } else {
                    $error = 'Неправильный пароль';
                }
            } else {
                $error = 'Такого пользователя не существует';
            }
        }

        return $this->render('login', [
            'model' => $model,
            'error' => $error
        ]);
    }

    public function actionLogout()
    {
        //Yii::$app->user->logout();

        return $this->goHome();
    }

}