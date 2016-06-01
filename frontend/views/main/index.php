<?php
/* @var $this yii\web\View */
?>

<aside id="timetable" class="callout">
    <div class="text-vertical-center">
    </div>
</aside>

<section class="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <h1 class="timetable">Расписание</h1>
                <br/>
                <div class="row">
                    <section class="col-lg-20">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Маршрут</th>
                                <th>Дата и время отбытия</th>
                                <th>Пункт отбытия</th>
                                <th>Дата и время прибытия</th>
                                <th>Пункт прибытия</th>
                                <th>Автобус</th>
                                <th>Вместимость</th>
<!--                                <th></th>-->
                            </tr>
                            </thead>

                            <tbody>
                            <? foreach($timeTable as $key => $item): ?>
                                <?
                                $trClass = '';

                                if ((int)$item['wrong'] === 1) {
                                    $trClass = 'danger cancel-flight row-flight red';
                                } elseif ((int)$item['active'] === 1) {
                                    $trClass = 'row-flight success';
                                } elseif (($key + 1) % 2 === 0) {
                                    $trClass = 'active row-flight';
                                } else {
                                    $trClass = 'row-flight';
                                }
                                ?>

                                <tr class="<?= $trClass ?>">
                                    <? if ((int)$item['wrong'] === 1): ?>
                                        <th><i class="fa fa-ban" aria-hidden="true"></i></th>
                                    <? else: ?>
                                        <th><?= $key + 1 ?></th>
                                    <? endif; ?>

                                    <th><?= $item['number'] ?></th>
                                    <?
                                    $startDate = new \DateTime($item['start_date']);
                                    $formatStartDate = $startDate->format('d/m/Y H:i');
                                    ?>
                                    <th><?= $formatStartDate ?></th>
                                    <th><?= $item['start_station'] ?></th>
                                    <?
                                    $endDate = new \DateTime($item['end_date']);
                                    $formatEndDate = $endDate->format('d/m/Y H:i');
                                    ?>
                                    <th><?= $formatEndDate ?></th>
                                    <th><?= $item['end_station'] ?></th>
                                    <th><?= $item['auto'] ?></th>
                                    <th><?= $item['capacity'] ?></th>
<!--                                    <th>-->
<!--                                        --><?// if ((int)$item['wrong'] !== 1 && (int)$item['active'] !== 1): ?>
<!--                                            <button-->
<!--                                                type="button"-->
<!--                                                class="btn btn-default"-->
<!--                                                data-id="--><?//= $item['id'] ?><!--"-->
<!--                                                >Забронировать</button>-->
<!--                                        --><?// endif; ?>
<!--                                    </th>-->
                                </tr>
                            <? endforeach; ?>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>