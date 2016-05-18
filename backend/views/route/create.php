<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Route */

$this->title = 'Добавить маршрут';
$this->params['breadcrumbs'][] = ['label' => 'Routes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="route-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'stations' => $stations
    ]) ?>

    <a href="/route/">Назад</a>

</div>
