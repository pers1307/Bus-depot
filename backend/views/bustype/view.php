<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BusType */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bus Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот тип?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'capacity',
        ],
    ]) ?>

    <a href="/bustype/">Назад</a>
</div>
