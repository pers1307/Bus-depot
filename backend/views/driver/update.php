<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Driver */

$this->title = 'Обновить данные о водителе: ' . $passportData->name . ' ' . $passportData->patronymic . ' ' . $passportData->surname;
$this->params['breadcrumbs'][] = ['label' => 'Drivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить  ';
?>
<div class="driver-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'         => $model,
        'driverClass'   => $driverClass,
        'bus'           => $bus,
        'route'         => $route,
        'passportData'  => $passportData,
        'buses'         => $buses,
        'routes'        => $routes,
        'driverClasses' => $driverClasses,
    ]) ?>

    <a href="/driver/">Назад</a>

</div>
