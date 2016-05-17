<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BusType */

$this->title = 'Create Bus Type';
$this->params['breadcrumbs'][] = ['label' => 'Bus Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
