<?php

namespace backend\controllers;

use backend\models\Bus;
use backend\models\Driver;
use backend\models\Flight;
use backend\models\Route;

class CabinetController extends CustomController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $countBus = Bus::find()
            ->count();

        $countRoute = Route::find()
            ->count();

        $countDrivers = Driver::find()
            ->count();

        $countFlight = Flight::find()
            ->count();

        $timeTable = Flight::find()

            ->all();

        return $this->render('index', [
            'countBus'     => $countBus,
            'countRoute'   => $countRoute,
            'countDrivers' => $countDrivers,
            'countFlight'  => $countFlight,
            'timeTable'    => $timeTable,
        ]);
    }
}
