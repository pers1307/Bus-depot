<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Flight */

$this->title = $model->start_date . ' : ' . $route->number;
$this->params['breadcrumbs'][] = ['label' => 'Flights', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flight-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить данный рейс?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'start_date',
            'end_date',
            [
                'label'  => 'Водитель',
                'format' => 'raw',
                'value'  => $passportData->name . ' ' . $passportData->surname
            ],
            [
                'label'  => 'Водитель',
                'format' => 'raw',
                'value'  => $route->number
            ],
            [
                'label'  => 'Отмена',
                'format' => 'raw',
                'value'  => function($data) {

                }
            ],
            'wrong',
            [
                'label'  => 'Причина отмены',
                'format' => 'raw',
                'value'  => $reason->name
            ],
        ],
    ]) ?>

</div>
