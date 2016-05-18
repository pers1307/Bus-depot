<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bus */

$this->title = 'Добавить автобус';
$this->params['breadcrumbs'][] = ['label' => 'Buses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'busTypes' => $busTypes
    ]) ?>

    <a href="/bus/">Назад</a>

</div>
