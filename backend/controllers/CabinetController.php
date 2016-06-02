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
            ->where('end_date > NOW()')
            ->count();

        /**
         * origin sql query

            SELECT
            route.number,
            FL.start_date,
            START_ST.`name` start_station,
            FL.end_date,
            END_ST.`name` end_station,
            bus.number AS auto,
            bus_type.capacity,
            FL.wrong,
            IF (NOW() >= FL.start_date AND NOW() <= FL.end_date, 1, 0) AS active
            FROM flight AS FL
            JOIN driver AS DR ON FL.id_driver = DR.id
            LEFT JOIN bus ON DR.id_bus = bus.id
            LEFT JOIN route ON DR.id_route = route.id
            JOIN station AS START_ST ON route.start_id_station = START_ST.id
            JOIN station AS END_ST ON route.end_id_station = END_ST.id
            WHERE FL.end_date > NOW()
            ORDER BY FL.start_date ASC
         */
        $timeTable = Flight::find()
            ->select(
                [
                    'route.number number',
                    'start_date',
                    'START_ST.`name` start_station',
                    'end_date',
                    'END_ST.`name` end_station',
                    'bus.number AS auto',
                    'bus_type.capacity',
                    'wrong',
                    'IF (NOW() >= start_date AND NOW() <= end_date, 1, 0) AS active',
                ]
            )
            ->join('JOIN', 'driver AS DR', 'id_driver = DR.id')
            ->leftJoin('bus', 'DR.id_bus = bus.id')
            ->join('JOIN', 'bus_type', 'bus.id_type = bus_type.id')
            ->leftJoin('route', 'DR.id_route = route.id')
            ->join('JOIN', 'station AS START_ST', 'route.start_id_station = START_ST.id')
            ->join('JOIN', 'station AS END_ST', 'route.end_id_station = END_ST.id')
            ->where('end_date > NOW()')
            ->orderBy('start_date ASC')
            ->asArray()
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
