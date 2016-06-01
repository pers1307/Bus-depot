<?php

namespace frontend\controllers;

use yii\base\Controller;
use Yii;
use backend\models\Flight;

class MainController extends Controller
{
    public $layout = 'index';

    public function actionIndex()
    {
        $timeTable = Flight::find()
            ->select(
                [
                    'flight.id',
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

        return $this->render('index',
            [
                'timeTable' => $timeTable
            ]
        );
    }
}
