<?php

namespace backend\controllers;

use backend\models\Driver;
use backend\models\Route;
use backend\models\RouteSelectForm;

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

    public function actionRoutes()
    {
        $formRoute = new RouteSelectForm();

        if ($formRoute->load(\Yii::$app->request->post())) {

        }

        $sumDuration = Route::find()
            ->select('SUM(duration) AS summ')
            ->asArray()
            ->one();

        return $this->render('routes', [
            'sumDuration' => $sumDuration,
            'routes'      => $this->getAllRoute(),
            'formRoute'   => $formRoute
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
}
