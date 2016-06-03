<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DriverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статистика о станциях';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistics-drivers">
    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <br/>

<!--    <div class="row">-->
<!--        <section class="col-lg-12">-->
<!--            <table class="table table-hover">-->
<!--                <thead>-->
<!--                    <tr>-->
<!--                        <th>Параметр</th>-->
<!--                        <th>Результат</th>-->
<!--                    </tr>-->
<!--                </thead>-->
<!---->
<!--                <tbody>-->
<!--                    <tr class="row-flight">-->
<!--                        <th>Общая протяженность всех маршрутов</th>-->
<!--                        <th>--><?//= $sumDuration['summ'] ?><!--</th>-->
<!--                    </tr>-->
<!--                </tbody>-->
<!--            </table>-->
<!--        </section>-->
<!--    </div>-->
<!---->
<!--    <div class="row">-->
<!--        --><?php //$form = ActiveForm::begin(); ?>
<!--            <section class="col-lg-3">-->
<!--                --><?//=
//                $form
//                    ->field($formRoute, 'id')->widget(\kartik\select2\Select2::classname(), [
//                        'data' => $routes,
//                        'options' => ['placeholder' => ''],
//                        'pluginOptions' => [
//                            'allowClear' => true
//                        ],
//                    ])
//                    ->label('Маршрут');
//                ?>
<!--            </section>-->
<!---->
<!--            <section class="col-lg-2">-->
<!--                <div class="margin-button">-->
<!--                    --><?//= Html::submitButton('Получить данные', ['class' => 'btn btn-primary']) ?>
<!--                </div>-->
<!--            </section>-->
<!--        --><?php //ActiveForm::end(); ?>
<!--    </div>-->
<!---->
<!---->
<!--    --><?// if (!empty($formRoute->id)): ?>
<!--        <div class="row">-->
<!--            <section class="col-lg-6">-->
<!--                <table class="table table-hover">-->
<!--                    <thead>-->
<!--                        <tr>-->
<!--                            <th>Параметр</th>-->
<!--                            <th>Результат</th>-->
<!--                        </tr>-->
<!--                    </thead>-->
<!---->
<!--                    <tbody>-->
<!--                        <tr class="row-flight">-->
<!--                            <th>Протяженность</th>-->
<!--                            <th>--><?//= $durationSelectedRoute ?><!--</th>-->
<!--                        </tr>-->
<!--                        <tr class="row-flight">-->
<!--                            <th>Интервал</th>-->
<!--                            <th>--><?//= $intervalSelectedRoute ?><!--</th>-->
<!--                        </tr>-->
<!--                        <tr class="row-flight">-->
<!--                            <th>Пункт отбытия</th>-->
<!--                            <th>--><?//= $stationsSelectedRoute['from_station'] ?><!--</th>-->
<!--                        </tr>-->
<!--                        <tr class="row-flight">-->
<!--                            <th>Пункт прибытия</th>-->
<!--                            <th>--><?//= $stationsSelectedRoute['in_station'] ?><!--</th>-->
<!--                        </tr>-->
<!--                    </tbody>-->
<!--                </table>-->
<!---->
<!--                --><?// if (!empty($busesOnRoute)): ?>
<!--                    <table class="table table-hover">-->
<!--                        <thead>-->
<!--                            <tr>-->
<!--                                <th>Автобусы на маршруте</th>-->
<!--                            </tr>-->
<!--                        </thead>-->
<!---->
<!--                        <tbody>-->
<!--                            --><?// foreach ($busesOnRoute as $busOnRoute): ?>
<!--                                <tr class="row-flight">-->
<!--                                    <th>--><?//= $busOnRoute['number'] ?><!--</th>-->
<!--                                </tr>-->
<!--                            --><?// endforeach; ?>
<!--                        </tbody>-->
<!--                    </table>-->
<!---->
<!--                --><?// else: ?>
<!--                    <p>Данный маршрут не обслуживается автобусами</p>-->
<!--                --><?// endif; ?>
<!---->
<!--                --><?// if (!empty($driversOnRoute)): ?>
<!--                    <table class="table table-hover">-->
<!--                        <thead>-->
<!--                            <tr>-->
<!--                                <th>Водители на маршруте</th>-->
<!--                            </tr>-->
<!--                        </thead>-->
<!---->
<!--                        <tbody>-->
<!--                        --><?// foreach ($driversOnRoute as $driverOnRoute): ?>
<!--                            <tr class="row-flight">-->
<!--                                <th>--><?//= $driverOnRoute['name'] ?><!-- --><?//= $driverOnRoute['patronymic'] ?><!-- --><?//= $driverOnRoute['surname'] ?><!--</th>-->
<!--                            </tr>-->
<!--                        --><?// endforeach; ?>
<!--                        </tbody>-->
<!--                    </table>-->
<!---->
<!--                --><?// else: ?>
<!--                    <p>Данный маршрут не обслуживается водителями</p>-->
<!--                --><?// endif; ?>
<!--            </section>-->
<!---->
<!--            <section class="col-lg-6">-->
<!--                --><?// if (!empty($flightSelectedRoute)): ?>
<!--                    <table class="table table-hover">-->
<!--                        <thead>-->
<!--                            <tr>-->
<!--                                <th>Время отбытия</th>-->
<!--                                <th>Время прибытия</th>-->
<!--                                <th>Водитель</th>-->
<!--                            </tr>-->
<!--                        </thead>-->
<!---->
<!--                        <tbody>-->
<!--                        --><?// foreach ($flightSelectedRoute as $item): ?>
<!--                            --><?//
//                            $trClass = '';
//
//                            if ((int)$item['wrong'] === 1) {
//                                $trClass = 'danger cancel-flight row-flight red';
//                            } elseif ((int)$item['active'] === 1) {
//                                $trClass = 'row-flight success';
//                            } else {
//                                $trClass = 'row-flight';
//                            }
//                            ?>
<!--                            <tr class="--><?//= $trClass ?><!--">-->
<!--                                <th>--><?//= $item['start_date'] ?><!--</th>-->
<!--                                <th>--><?//= $item['end_date'] ?><!--</th>-->
<!--                                <th>--><?//= $item['name'] ?><!-- --><?//= $item['patronymic'] ?><!-- --><?//= $item['surname'] ?><!--</th>-->
<!--                            </tr>-->
<!--                        --><?// endforeach; ?>
<!--                        </tbody>-->
<!--                    </table>-->
<!---->
<!--                --><?// else: ?>
<!--                    <p>Данный маршрут не стоит в расписании</p>-->
<!--                --><?// endif; ?>
<!--            </section>-->
<!--        </div>-->
<!--    --><?// endif; ?>
</div>