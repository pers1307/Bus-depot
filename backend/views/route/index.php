<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RouteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Маршруты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="route-index">

    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <p>
        <?= Html::a('Добавить маршрут', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'number',
            'startStationName',
            'endStationName',
            'interval',
            'duration',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
