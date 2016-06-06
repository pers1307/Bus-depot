<?php

namespace backend\controllers;

use backend\models\Driver;
use backend\models\Flight;
use backend\models\Route;
use backend\models\RouteSelectForm;
use backend\models\Station;
use backend\models\StationSelectForm;

class StatisticsController extends CustomController
{
    /**
     * driver's statistics
     *
     * @return string
     */
    public function actionDrivers()
    {
        $driverWithMaxExperience = \Yii::$app->db->createCommand(
            '
                SELECT
                passport_data.`name`,
                passport_data.`patronymic`,
                passport_data.`surname`,
                FLOOR((TO_DAYS(NOW()) - TO_DAYS(start_work_date))/365) as experience
                FROM driver
                JOIN passport_data ON driver.id = passport_data.id
                WHERE start_work_date = (
                    SELECT MIN(start_work_date)
                    FROM driver
                )
            '
        )->queryOne();

        $countDrivers = Driver::find()
            ->count();

        $averageOld = Driver::find()
            ->select('FLOOR (AVG( FLOOR((TO_DAYS(NOW()) - TO_DAYS(passport_data.birth))/365) ) ) as old')
            ->leftJoin('passport_data', 'driver.id = passport_data.id')
            ->asArray()
            ->one();

        $averageExperiense = Driver::find()
            ->select('FLOOR (AVG( FLOOR((TO_DAYS(NOW()) - TO_DAYS(start_work_date))/365) ) ) as experiense')
            ->asArray()
            ->one();

        $driversClassCount = Driver::find()
            ->select(['class.`name`', 'COUNT(*) as count'])
            ->join('JOIN', 'class', 'driver.id_class = class.id')
            ->groupBy('class.`name`')
            ->asArray()
            ->all();

        return $this->render('drivers', [
            'driverWithMaxExperience' => $driverWithMaxExperience,
            'countDrivers'            => $countDrivers,
            'averageOld'              => $averageOld,
            'averageExperiense'       => $averageExperiense,
            'driversClassCount'       => $driversClassCount,
        ]);
    }

    /**
     * route's statistics
     *
     * @return string
     */
    public function actionRoutes()
    {
        $formRoute = new RouteSelectForm();

        $durationSelectedRoute = null;
        $intervalSelectedRoute = null;
        $busesOnRoute          = null;
        $driversOnRoute        = null;
        $stationsSelectedRoute = null;
        $flightSelectedRoute   = null;

        if ($formRoute->load(\Yii::$app->request->post())) {

            $selectRoute = Route::find()
                ->where(['id' => $formRoute->id])
                ->one();

            $durationSelectedRoute = $selectRoute->duration;
            $intervalSelectedRoute = $selectRoute->interval;

            $busesOnRoute = Route::find()
                ->select(['bus.number'])
                ->join('JOIN', 'driver', 'route.id = driver.id_route')
                ->join('JOIN', 'bus', 'driver.id_bus = bus.id')
                ->where('route.id = ' . $selectRoute->id)
                ->asArray()
                ->all();

            $driversOnRoute = Route::find()
                ->select(
                    [
                        'passport_data.`name`',
                        'passport_data.`patronymic`',
                        'passport_data.`surname`',
                    ]
                )
                ->join('JOIN', 'driver', 'route.id = driver.id_route')
                ->join('JOIN', 'passport_data', 'driver.id = passport_data.id')
                ->where('route.id = ' . $selectRoute->id)
                ->asArray()
                ->all();

            $stationsSelectedRoute = Route::find()
                ->select(
                    [
                        'start_station.`name` from_station',
                        'end_station.`name` in_station',
                    ]
                )
                ->join('JOIN', 'station AS start_station', 'route.start_id_station = start_station.id')
                ->join('JOIN', 'station AS end_station', 'route.end_id_station = end_station.id')
                ->where('route.id = ' . $selectRoute->id)
                ->asArray()
                ->one();

            $flightSelectedRoute = Route::find()
                ->select(
                    [
                        'flight.start_date',
                        'flight.end_date',
                        'flight.wrong',
                        'IF (NOW() >= flight.start_date AND NOW() <= flight.end_date, 1, 0) AS active',
                        'passport_data.`name`',
                        'passport_data.patronymic',
                        'passport_data.surname',
                    ]
                )
                ->join('JOIN', 'driver', 'route.id = driver.id_route')
                ->join('JOIN', 'flight', 'driver.id = flight.id_driver')
                ->join('JOIN', 'passport_data', 'driver.id = passport_data.id')
                ->where('route.id = ' . $selectRoute->id . ' AND flight.end_date > NOW()')
                ->orderBy('flight.start_date ASC')
                ->asArray()
                ->all();
        }

        $sumDuration = Route::find()
            ->select('SUM(duration) AS summ')
            ->asArray()
            ->one();

        return $this->render('routes', [
            'sumDuration'           => $sumDuration,
            'routes'                => $this->getAllRoute(),
            'formRoute'             => $formRoute,
            'durationSelectedRoute' => $durationSelectedRoute,
            'busesOnRoute'          => $busesOnRoute,
            'intervalSelectedRoute' => $intervalSelectedRoute,
            'driversOnRoute'        => $driversOnRoute,
            'stationsSelectedRoute' => $stationsSelectedRoute,
            'flightSelectedRoute'   => $flightSelectedRoute,
        ]);
    }

    /**
     * statistics of stations in routes
     *
     * @return string
     */
    public function actionStations()
    {
        $formStation = new StationSelectForm();

        $routes = null;

        if ($formStation->load(\Yii::$app->request->post())) {

            $routes = Route::find()
                ->select([
                    'route.number',
                    'start_station.`name` AS start_station',
                    'end_station.`name` AS end_station',
                    'IF (route.start_id_station = ' . $formStation->id . ', 1, 0) AS is_start',
                    'IF (route.end_id_station = ' . $formStation->id . ', 1, 0) AS is_end'
                ])
                ->join('JOIN', 'station AS start_station', 'route.start_id_station = start_station.id')
                ->join('JOIN', 'station AS end_station', 'route.end_id_station = end_station.id')
                ->where('route.start_id_station = ' . $formStation->id . ' OR route.end_id_station = ' . $formStation->id)
                ->asArray()
                ->all();
        }

        return $this->render('stations', [
            'stations'    => $this->getAllStations(),
            'formStation' => $formStation,
            'routes'      => $routes
        ]);
    }

    /**
     * statistics of cancel flights
     *
     * @return string
     */
    public function actionCancel()
    {
        $cancelFlights = Flight::find()
            ->select(
                [
                    'route.number',
                    'bus.number AS auto',
                    'passport_data.`name`',
                    'passport_data.patronymic',
                    'passport_data.surname',
                    'flight.start_date',
                    'flight.end_date',
                    'reason.`name` AS reason',
                ]
            )
            ->join('JOIN', 'reason', 'flight.id_reason = reason.id')
            ->join('JOIN', 'driver', 'flight.id_driver = driver.id')
            ->join('JOIN', 'passport_data', 'driver.id = passport_data.id')
            ->join('JOIN', 'bus', 'driver.id_bus = bus.id')
            ->join('JOIN', 'route', 'driver.id_route = route.id')
            ->where('flight.wrong = 1')
            ->orderBy('flight.start_date ASC')
            ->asArray()
            ->all();

        return $this->render('cancel', [
            'cancelFlights' => $cancelFlights
        ]);
    }

    public function actionReport()
    {
        return $this->render('report', [
        ]);
    }

    /**
     * @return array
     */
    protected function getAllRoute()
    {
        $routes = Route::find()->all();
        $routesArray = [];

        foreach ($routes as $route) {
            $routesArray[$route->id] = $route->number;
        }

        return $routesArray;
    }

    /**
     * @return array
     */
    protected function getAllStations()
    {
        $stations = Station::find()->all();
        $stationsArray = [];

        foreach ($stations as $station) {
            $stationsArray[$station->id] = $station->name;
        }

        return $stationsArray;
    }
}
