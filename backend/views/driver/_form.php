<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Driver */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="driver-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($passportData, 'name')->textInput() ?>

    <?= $form->field($passportData, 'patronymic')->textInput() ?>

    <?= $form->field($passportData, 'surname')->textInput() ?>

    <?=
    $form
        ->field($passportData, 'birth')
        ->widget(\kartik\date\DatePicker::className())
    ?>

    <?=
    $form
        ->field($passportData, 'when')
        ->widget(\kartik\date\DatePicker::className())
    ?>

    <?= $form->field($passportData, 'series')->textInput() ?>

    <?= $form->field($passportData, 'number')->textInput() ?>

    <?= $form->field($passportData, 'address')->textInput() ?>

    <?= $form->field($passportData, 'issued')->textarea(['style' => 'resize : none']) ?>

    <?= $form->field($model, 'salary')->textInput() ?>

    <?=
        $form
            ->field($model, 'start_work_date')
            ->widget(\kartik\date\DatePicker::className())
            ->label('Дата начала работы');
    ?>

    <?=
    $form
        ->field($model, 'id_class')->widget(\kartik\select2\Select2::classname(), [
            'data' => $driverClasses,
            'options' => ['placeholder' => ''],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])
        ->label('Класс водителя');
    ?>

    <?=
    $form
        ->field($model, 'id_bus')->widget(\kartik\select2\Select2::classname(), [
            'data' => $buses,
            'options' => ['placeholder' => ''],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])
        ->label('Автобус');
    ?>

    <?=
    $form
        ->field($model, 'id_route')->widget(\kartik\select2\Select2::classname(), [
            'data' => $routes,
            'options' => ['placeholder' => ''],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])
        ->label('Маршрут');
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
