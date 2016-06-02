<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DriverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статистика о маршрутах';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistics-drivers">
    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <br/>

    <div class="row">
        <section class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Параметр</th>
                        <th>Результат</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="row-flight">
                        <th>Общая протяженность всех маршрутов</th>
                        <th><?= $sumDuration['summ'] ?></th>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>

    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
            <section class="col-lg-3">
                <?=
                $form
                    ->field($formRoute, 'id')->widget(\kartik\select2\Select2::classname(), [
                        'data' => $routes,
                        'options' => ['placeholder' => ''],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])
                    ->label('Маршрут');
                ?>
            </section>

            <section class="col-lg-2">
                <div class="margin-button">
                    <?= Html::submitButton('Получить данные', ['class' => 'btn btn-primary']) ?>
                </div>
            </section>
        <?php ActiveForm::end(); ?>
    </div>

</div>