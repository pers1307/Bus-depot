<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DriverClass */

$this->title = 'Обновить класс: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Driver Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="driver-class-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <a href="/driverclass/">Назад</a>

</div>
