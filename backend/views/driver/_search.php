<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DriverSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="driver-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_class') ?>

    <?= $form->field($model, 'start_work_date') ?>

    <?= $form->field($model, 'salary') ?>

    <?= $form->field($model, 'id_bus') ?>

    <?php // echo $form->field($model, 'id_route') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
