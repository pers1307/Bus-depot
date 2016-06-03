<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DriverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отмененные рейсы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistics-drivers">
    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <br/>

    <div class="row">
        <section class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>Номер маршрута</th>
                        <th>Автобус</th>
                        <th>ФИО</th>
                        <th>Время отбытия</th>
                        <th>Время прибытия</th>
                        <th>Причина отмены</th>
                    </tr>
                </thead>

                <tbody>
                    <? foreach($cancelFlights as $cancelFlight): ?>
                        <tr class="row-flight">
                            <th><i class="fa fa-ban"></i></th>
                            <th><?= $cancelFlight['number'] ?></th>
                            <th><?= $cancelFlight['auto'] ?></th>
                            <th><?= $cancelFlight['name'] ?> <?= $cancelFlight['patronymic'] ?> <?= $cancelFlight['surname'] ?></th>
                            <th><?= $cancelFlight['start_date'] ?></th>
                            <th><?= $cancelFlight['end_date'] ?></th>
                            <th><?= $cancelFlight['reason'] ?></th>
                        </tr>
                    <? endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
</div>