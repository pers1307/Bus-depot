<?php
/**
 * CustomController.php
 * Controller with custom settings for project
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     Mediasite LLC
 * @link        http://www.mediasite.ru/
 */

namespace backend\controllers;

use common\models\User;
use common\exception\CodeHttpException;
use yii\web\Controller;

/**
 * Class CustomController
 * Controller with custom settings for project
 * @package backend\controllers
 */
class CustomController extends Controller
{
    /** @var string */
    public $layout = 'inner';

    /**
     * @param \yii\base\Action $action
     * @return bool
     * @throws CodeHttpException
     */
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            throw new CodeHttpException(
                'У вас нет доступа к данной странице. Пожалуйста авторизуйтесь.',
                401
            );
        }

        $userId = \Yii::$app->user->id;
        $user = User::findIdentity($userId);
        \Yii::$app->view->params['username'] = $user->username;

        return true;
    }
}