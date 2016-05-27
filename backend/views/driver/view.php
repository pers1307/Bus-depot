<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Driver */

$this->title = $passportData->name . ' ' . $passportData->patronymic . ' ' . $passportData->surname;
$this->params['breadcrumbs'][] = ['label' => 'Drivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этого водителя?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Имя',
                'format' => 'raw',
                'value' => $passportData->name
            ],
            [
                'label' => 'Отчество',
                'format' => 'raw',
                'value' => $passportData->patronymic
            ],
            [
                'label' => 'Фамилия',
                'format' => 'raw',
                'value' => $passportData->surname
            ],
            [
                'label' => 'Дата рождения',
                'format' => 'raw',
                'value' => \Yii::$app->formatter->asDate($passportData->birth, 'php:d-m-Y')
            ],
            [
                'label' => 'Серия паспорта',
                'format' => 'raw',
                'value' => $passportData->series
            ],
            [
                'label' => 'Номер паспорта',
                'format' => 'raw',
                'value' => $passportData->number
            ],
            [
                'label' => 'Адрес прописки',
                'format' => 'raw',
                'value' => $passportData->address
            ],
            [
                'label' => 'Когда выдан',
                'format' => 'raw',
                'value' => \Yii::$app->formatter->asDate($passportData->when, 'php:d-m-Y')
            ],
            [
                'label' => 'Кем выдан',
                'format' => 'raw',
                'value' => $passportData->issued
            ],
            [
                'label' => 'Класс водителя',
                'format' => 'raw',
                'value' => $driverClass->name
            ],
            [
                'label' => 'Стаж водителя',
                'format' => 'raw',
                'value' => date('Y') - \Yii::$app->formatter->asDate($model->start_work_date, 'yyyy')
            ],
            [
                'label' => 'Автобус водителя',
                'format' => 'raw',
                'value' => $bus->number
            ],
            [
                'label' => 'Номер маршрута',
                'format' => 'raw',
                'value' => $route->number
            ],
        ],
    ]) ?>

    <a href="/driver/">Назад</a>

</div>
