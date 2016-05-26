<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Driver */

$this->title = 'Добавить водителя';
$this->params['breadcrumbs'][] = ['label' => 'Drivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
