<?php

namespace backend\controllers;

use backend\models\Bus;
use backend\models\Route;

class CabinetController extends \yii\web\Controller
{
    public $layout = 'inner';

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
