<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Flight */

$this->title = 'Добавить рейс';
$this->params['breadcrumbs'][] = ['label' => 'Flights', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flight-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'   => $model,
        'drivers' => $drivers,
        'reasons' => $reasons
    ]) ?>

    <a href="/flight/">Назад</a>
</div>
