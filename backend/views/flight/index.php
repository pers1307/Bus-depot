<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FlightSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Рейсы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flight-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить рейс', ['create'], ['class' => 'btn btn-success']) ?>

        <?= Html::a('Сгенерировать рейсы', ['generate'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label'  => 'Маршрут',
                'format' => 'raw',
                'value' => function($data) {

                    $driver = \backend\models\Driver::find()
                        ->where(['id' => $data->id_driver])
                        ->one();

                    $route = \backend\models\Route::find()
                        ->where(['id' => $driver->id_route])
                        ->one();

                    return $route->number;
                }
            ],
            [
                'label' => 'Дата и время отправки',
                'format' => 'raw',
                'value' => function($data) {
                    return \Yii::$app->formatter->asDatetime($data->start_date, 'php:d/m/Y H:i');
                }
            ],
            [
                'label' => 'Дата и время прибытия',
                'format' => 'raw',
                'value' => function($data) {
                    return \Yii::$app->formatter->asDatetime($data->end_date, 'php:d/m/Y H:i');
                }
            ],
            [
                'label'  => 'Водитель',
                'format' => 'raw',
                'value' => function($data) {

                    $driver = \backend\models\Driver::find()
                        ->where(['id' => $data->id_driver])
                        ->one();

                    $passportData = \backend\models\PassportData::find()
                        ->where(['id' => $driver->id])
                        ->one();

                    return $passportData->name . ' ' . $passportData->surname;
                }
            ],
            [
                'label'  => 'Номер автобуса',
                'format' => 'raw',
                'value' => function($data) {

                    $driver = \backend\models\Driver::find()
                        ->where(['id' => $data->id_driver])
                        ->one();

                    $bus = \backend\models\Bus::find()
                        ->where(['id' => $driver->id_bus])
                        ->one();

                    return $bus->number;
                }
            ],
            [
                'label'  => 'Состояние рейса',
                'format' => 'raw',
                'value' => function($data) {

                    if ($data->wrong === 1) {
                        return Html::label('Отменен', null, ['style' => ['background-color' => 'red']]);
                    }

                    return '';
                }
            ],
            [
                'label'  => 'Причина отмены',
                'format' => 'raw',
                'value' => function($data) {
                    /**
                     * todo: I don't understand, how it do more simple in Yii2
                     */
                    $reason = \backend\models\Reason::find()
                        ->where(['id' => $data->id_reason])
                        ->one();

                    return $reason->name;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
