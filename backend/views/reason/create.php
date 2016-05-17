<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Reason */

$this->title = 'Добавить причину';
$this->params['breadcrumbs'][] = ['label' => 'Reasons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reason-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <a href="/reason/">Назад</a>

</div>
