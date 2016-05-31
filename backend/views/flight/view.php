<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Flight */

$cancel = '';

if ($model->wrong === 1) {
    $cancel = 'Отменен';
}

$this->title = $model->start_date . ' : ' . $route->number;
$this->params['breadcrumbs'][] = ['label' => 'Flights', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flight-view">

    <h1>
        <?= Html::encode($this->title) ?> <?= Html::label($cancel, null, ['style' => ['background-color' => 'red']]) ?>
    </h1>

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
                'label'  => 'Номер маршрута',
                'format' => 'raw',
                'value'  => $route->number
            ],
            [
                'label'  => 'Отмена рейса',
                'format' => 'raw',
                'value' => Html::label($cancel, null, ['style' => ['background-color' => 'red']]),
            ],
            [
                'label'  => 'Причина отмены',
                'format' => 'raw',
                'value' => Html::label($reason->name, null, ['style' => ['color' => 'blue']]),
            ],
        ],
    ]) ?>

    <a href="/flight/">Назад</a>

</div>
