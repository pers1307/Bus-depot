<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DriverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Водители';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-index">

    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <p>
        <?= Html::a('Добавить водителя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_class',
            [
                'label' => 'Стаж водителя',
                'format' => 'raw',
                'value' => function($data){
                    return date('Y') - \Yii::$app->formatter->asDate($data->start_work_date, 'yyyy');
                }
            ],
            'salary',
            'id_bus',
            'id_route',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
