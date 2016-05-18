<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bus */

$this->title = 'Обновить автобус: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Buses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <a href="/bus/">Назад</a>

</div>
