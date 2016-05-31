<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Flight */

$this->title = 'Обновить рейс: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Flights', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="flight-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'drivers' => $drivers,
        'reasons' => $reasons
    ]) ?>

    <a href="/flight/">Назад</a>

</div>
