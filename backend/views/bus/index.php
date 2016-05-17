<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Автобусы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-index">

    <div class="col-lg-12">

        <div class="text-center">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>

        <p>
            <?= Html::a('Добавить автобус', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'number',
                'id_type',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>

</div>
