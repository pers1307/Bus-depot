<?php

namespace backend\controllers;

use backend\models\Bus;
use backend\models\DriverClass;
use backend\models\PassportData;
use backend\models\Route;
use Yii;
use backend\models\Driver;
use backend\models\DriverSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DriverController implements the CRUD actions for Driver model.
 */
class DriverController extends CustomController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Driver models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DriverSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Driver model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $driverClass = DriverClass::find()
            ->where(['id' => $model->id_class])
            ->one();

        $bus = Bus::find()
            ->where(['id' => $model->id_bus])
            ->one();

        $route = Route::find()
            ->where(['id' => $model->id_route])
            ->one();

        $passportData = PassportData::find()
            ->where(['id' => $model->id])
            ->one();

        return $this->render('view', [
            'model'       => $model,
            'driverClass' => $driverClass,
            'bus'         => $bus,
            'route'       => $route,
            'passportData' => $passportData
        ]);
    }

    /**
     * Creates a new Driver model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Driver();
        $passportData = new PassportData();

        if (
            $model->load(Yii::$app->request->post())
            && $passportData->load(Yii::$app->request->post())
        ) {
            $passportData->save();
            $model->link('passportData', $passportData);
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model'         => $model,
                'buses'         => $this->getAllBus(),
                'routes'        => $this->getAllRoute(),
                'driverClasses' => $this->getAllDriverClass(),
                'passportData'  => $passportData
            ]);
        }
    }

    /**
     * Updates an existing Driver model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $driverClass = DriverClass::find()
            ->where(['id' => $model->id_class])
            ->one();

        $bus = Bus::find()
            ->where(['id' => $model->id_bus])
            ->one();

        $route = Route::find()
            ->where(['id' => $model->id_route])
            ->one();

        $passportData = PassportData::find()
            ->where(['id' => $model->id])
            ->one();

        $passportDataInsert = new PassportData();

        if (
            $model->load(Yii::$app->request->post())
            && $passportDataInsert->load(Yii::$app->request->post())
        ) {
            $passportDataInsert->id = $model->id;
            $passportDataInsert->update();
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model'        => $model,
                'driverClass'  => $driverClass,
                'bus'          => $bus,
                'route'        => $route,
                'passportData' => $passportData,
                'buses'         => $this->getAllBus(),
                'routes'        => $this->getAllRoute(),
                'driverClasses' => $this->getAllDriverClass(),
            ]);
        }
    }

    /**
     * Deletes an existing Driver model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Driver model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Driver the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Driver::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
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
    protected function getAllBus()
    {
        $buses = Bus::find()->all();

        $busesArray = [];

        foreach ($buses as $bus) {
            $busesArray[$bus->id] = $bus->number;
        }

        return $busesArray;
    }

    /**
     * @return array
     */
    protected function getAllDriverClass()
    {
        $driverClasses = DriverClass::find()->all();

        $driverClassesArray = [];

        foreach ($driverClasses as $driverClass) {
            $driverClassesArray[$driverClass->id] = $driverClass->name;
        }

        return $driverClassesArray;
    }
}
