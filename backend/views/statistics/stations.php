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

    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <section class="col-lg-3">
            <?=
                $form
                    ->field($formStation, 'id')->widget(\kartik\select2\Select2::classname(), [
                        'data' => $stations,
                        'options' => ['placeholder' => ''],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])
                    ->label('Станция');
            ?>
        </section>

        <section class="col-lg-2">
            <div class="margin-button">
                <?= Html::submitButton('Найти маршруты', ['class' => 'btn btn-primary']) ?>
            </div>
        </section>
        <?php ActiveForm::end(); ?>
    </div>

    <div class="row">
        <section class="col-lg-12">
            <? if(!empty($routes)): ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Маршрут</th>
                            <th>Пункт отбытия</th>
                            <th>Пункт прибытия</th>
                        </tr>
                    </thead>

                    <tbody>
                        <? foreach($routes as $route): ?>
                            <tr class="row-flight">
                                <th><?= $route['number'] ?></th>
                                <th
                                    <?
                                    if ((int)$route['is_start'] === 1) {
                                        echo 'class="info"';
                                    }
                                    ?>
                                    ><?= $route['start_station'] ?>
                                </th>
                                <th
                                    <?
                                    if ((int)$route['is_end'] === 1) {
                                        echo 'class="info"';
                                    }
                                    ?>
                                    ><?= $route['end_station'] ?>
                                </th>
                            </tr>
                        <? endforeach; ?>
                    </tbody>
                </table>
            <? else: ?>
                <p>Станция не входит не в один маршрут</p>
            <? endif; ?>
        </section>
    </div>
</div>