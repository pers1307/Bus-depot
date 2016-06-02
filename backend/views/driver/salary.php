<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DriverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Расчет оклада водителей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-index">

    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="row">
        <section class="col-lg-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>ФИО</th>
                    <th>Класс</th>
                    <th>Стаж</th>
                    <th>Оклад</th>
                </tr>
                </thead>

                <tbody>
                    <tr class="row-flight">
                        <? foreach($tableDrivers as $key => $item): ?>
                            <tr class="row-flight">
                                <th><?= $key + 1 ?></th>
                                <th><?= $item['name'] ?> <?= $item['patronymic'] ?> <?= $item['surname'] ?></th>
                                <th><?= $item['class'] ?></th>
                                <th><?= $item['experiense'] ?></th>
                                <th><?= $item['salary'] ?></th>
                            </tr>
                        <? endforeach; ?>
                </tbody>
            </table>
            <br/>
        </section>
    </div>

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <section class="col-lg-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Форма для оклада</th>
                    </tr>
                </thead>

                <tbody>
                    <? foreach($classes as $class): ?>

                        <? $post = ''; ?>

                        <? foreach($newSalary as $item): ?>
                            <? if ((int)$item['id'] === (int)$class['id']): ?>
                                <? $post = $item['salary'] ?>
                            <? endif; ?>
                        <? endforeach; ?>

                        <tr class="row-flight">
                            <th>
                                <div class="input-group">
                                    <span class="input-group-addon"><?= $class['name'] ?></span>
                                    <input
                                        type="text"
                                        name="<?= $class['id'] ?>"
                                        class="form-control"
                                        value="<?= $post ?>"
                                        placeholder="Оклад за год стажа"
                                    >
                                </div>
                            </th>
                        </tr>
                    <? endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Рассчитать', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>