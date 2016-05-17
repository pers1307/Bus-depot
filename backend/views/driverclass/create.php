<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DriverClass */

$this->title = 'Create Driver Class';
$this->params['breadcrumbs'][] = ['label' => 'Driver Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-class-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <a href="/driverclass/">Назад</a>

</div>
