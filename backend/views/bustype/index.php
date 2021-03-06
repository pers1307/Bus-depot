<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BusTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Типы автобусов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-type-index">

    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <p>
        <?= Html::a('Добавить тип автобуса', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'capacity',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
