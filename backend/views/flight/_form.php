<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Flight */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flight-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form
        ->field($model, 'start_date')
        ->widget(\kartik\datetime\DateTimePicker::className(), [
        ])
    ?>

    <?=
    $form
        ->field($model, 'end_date')
        ->widget(\kartik\datetime\DateTimePicker::className(), [
        ])
    ?>

    <?=
    $form
        ->field($model, 'id_driver')->widget(\kartik\select2\Select2::classname(), [
            'data' => $drivers,
            'options' => ['placeholder' => ''],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])
        ->label('Водитель');
    ?>

<!--    Здесь подтыкать информацию о водителе-->

    <?= $form->field($model, 'wrong')->checkbox() ?>

    <?=
    $form
        ->field($model, 'id_reason')->widget(\kartik\select2\Select2::classname(), [
            'data' => $reasons,
            'options' => ['placeholder' => ''],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])
        ->label('Причина отмены');
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
