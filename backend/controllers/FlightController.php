<?php

namespace backend\controllers;

use backend\models\Bus;
use backend\models\Driver;
use backend\models\PassportData;
use backend\models\Reason;
use backend\models\Route;
use Yii;
use backend\models\Flight;
use backend\models\FlightSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FlightController implements the CRUD actions for Flight model.
 */
class FlightController extends CustomController
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
     * Lists all Flight models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FlightSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Flight model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $passportData = PassportData::find()
            ->where(['id' => $model->id_driver])
            ->one();

        $reason = Reason::find()
            ->where(['id' => $model->id_reason])
            ->one();

        $driver = Driver::find()
            ->where(['id' => $model->id_driver])
            ->one();

        $bus = Bus::find()
            ->where(['id' => $driver->id_bus])
            ->one();

        $route = Route::find()
            ->where(['id' => $driver->id_route])
            ->one();

        return $this->render('view', [
            'model'        => $model,
            'passportData' => $passportData,
            'reason'       => $reason,
            'bus'          => $bus,
            'route'        => $route
        ]);
    }

    /**
     * Creates a new Flight model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Flight();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model'   => $model,
                'drivers' => $this->getAllDriver(),
                'reasons' => $this->getAllReason()
            ]);
        }
    }

    /**
     * Updates an existing Flight model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'drivers' => $this->getAllDriver(),
                'reasons' => $this->getAllReason()
            ]);
        }
    }

    /**
     * Deletes an existing Flight model.
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
     * Finds the Flight model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Flight the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Flight::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @return array
     */
    protected function getAllDriver()
    {
        $drivers = Driver::find()->with('passportData')->all();
        $driversArray = [];

        foreach ($drivers as $driver) {
            $driversArray[$driver->id] = $driver->name . ' ' . $driver->surname;
        }

        return $driversArray;
    }

    /**
     * @return array
     */
    protected function getAllReason()
    {
        $reasons = Reason::find()->all();
        $reasonsArray = [];

        foreach ($reasons as $reason) {
            $reasonsArray[$reason->id] = $reason->name;
        }

        return $reasonsArray;
    }
}
