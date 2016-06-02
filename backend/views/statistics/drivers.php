<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DriverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статистика о водителях';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistics-drivers">
    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <br/>

    <div class="row">
        <section class="col-lg-9">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Параметр</th>
                        <th>Результат</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="row-flight">
                        <th>Водитель с самым большим стажем работы</th>
                        <th>
                            <?=
                                $driverWithMaxExperience['name'] . ' '
                                . $driverWithMaxExperience['patronymic'] . ' '
                                . $driverWithMaxExperience['surname']
                            ?>
                                ( Стаж :
                            <?=
                                $driverWithMaxExperience['experience']
                            ?> лет)
                        </th>
                    </tr>

                    <tr class="row-flight">
                        <th>Общее количество водителей</th>
                        <th>
                            <?= $countDrivers ?>
                        </th>
                    </tr>

                    <tr class="row-flight">
                        <th>Средний возраст водителей</th>
                        <th><?= $averageOld['old'] ?></th>
                    </tr>

                    <tr class="row-flight">
                        <th>Средний стаж водителей</th>
                        <th><?= $averageExperiense['experiense'] ?></th>
                    </tr>

                </tbody>
            </table>

            <br/>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Класс</th>
                        <th>Количество</th>
                    </tr>
                </thead>

                <tbody>
                    <? foreach($driversClassCount as $item): ?>
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