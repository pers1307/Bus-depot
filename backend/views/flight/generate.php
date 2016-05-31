<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Flight */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Генератор рейсов';
$this->params['breadcrumbs'][] = ['label' => 'Flights', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flight-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <? if(!empty($result)): ?>
        <p><?= $result ?></p>
    <? endif; ?>

    <div class="flight-form">

        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-6">
                <?=
                $form
                    ->field($generateForm, 'startDate')
                    ->widget(\kartik\datetime\DateTimePicker::className(), [
                    ])
                ?>
            </div>
            <div class="col-md-6">
                <?=
                $form
                    ->field($generateForm, 'endDate')
                    ->widget(\kartik\datetime\DateTimePicker::className(), [
                    ])
                ?>
            </div>
        </div>

        <?=
        $form
            ->field($generateForm, 'idDriver')->widget(\kartik\select2\Select2::classname(), [
                'data' => $drivers,
                'options' => ['placeholder' => ''],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])
            ->label('Водитель');
        ?>

        <div class="form-group">
            <?= Html::submitButton('Сгенерировать', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

    <a href="/flight/">Назад</a>
</div>
