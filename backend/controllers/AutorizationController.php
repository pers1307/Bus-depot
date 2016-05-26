<?php

namespace backend\controllers;

use backend\models\LoginForm;
use common\models\User;

class AutorizationController extends \yii\web\Controller
{
    public $layout = 'autorization';

    /**
     * Login page
     * @return string
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            $this->redirect('/cabinet/');
        }

        $model = new LoginForm();
        $error = '';

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            /**
             * common\models\User
             */
            $user = User::findByUsername($model->login);

            if (!is_null($user)) {

                if ($user->validatePassword($model->password)) {
                    \Yii::$app->user->login($user);
                    return $this->redirect('/cabinet/');
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

    /**
     * Logout page
     */
    public function actionLogout()
    {
        \Yii::$app->user->logout();
        $this->redirect('/autorization/login/');
    }

}