<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DriverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отчет по автопарку';
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
                    <th>Параметр</th>
                    <th>Результат</th>
                </tr>
                </thead>

                <tbody>
                    <tr class="row-flight">
                        <th>Суммарная протяженность всех маршрутов</th>
                        <th><?= $summDuration ?></th>
                    </tr>
                </tbody>
            </table>

            <br/>

            <h3>Маршруты в разрезе классов автобусов</h3>

            <br/>

            <? foreach($typeBus as $key => $item): ?>
                <h4><?= $key ?></h4>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Маршрут</th>
                            <th>Автобус</th>
                            <th>Станция отбытия</th>
                            <th>Станция прибытия</th>
                            <th>Длительность пути</th>
                            <th>Интервал движения</th>
                            <th>Водитель</th>
                        </tr>
                    </thead>

                    <tbody>
                        <? foreach($item as $elem): ?>
                            <tr class="row-flight">
                                <th><?= $elem['route'] ?></th>
                                <th><?= $elem['bus'] ?></th>
                                <th><?= $elem['start_station'] ?></th>
                                <th><?= $elem['end_station'] ?></th>
                                <th><?= $elem['duration'] ?></th>
                                <th><?= $elem['interval'] ?></th>
                                <th><?= $elem['name'] ?> <?= $elem['patronymic'] ?> <?= $elem['surname'] ?></th>
                            </tr>
                        <? endforeach; ?>
                    </tbody>
                </table>
            <? endforeach; ?>

            <br/>

            <h3>Количество автобусов каждого класса</h3>

            <br/>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Тип автобуса</th>
                    <th>Количество</th>
                </tr>
                </thead>

                <tbody>
                    <? foreach($busTypeCount as $item): ?>
                        <tr class="row-flight">
                            <th><?= $item['name'] ?></th>
                            <th><?= $item['count'] ?></th>
                        </tr>
                    <? endforeach; ?>
                </tbody>
            </table>

        </section>
    </div>
</div>