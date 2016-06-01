<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Route */

$this->title = 'Обновить маршрут: ' . $model->number;
$this->params['breadcrumbs'][] = ['label' => 'Routes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="route-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'    => $model,
        'stations' => $stations
    ]) ?>

    <a href="/route/">Назад</a>

</div>
