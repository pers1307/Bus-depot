<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $countBus ?></h3>
                <p>Количество автобусов</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-bus"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-light-blue">
            <div class="inner">
                <h3><?= $countDrivers ?></h3>
                <p>Количество водителей</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-stalker"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green-gradient">
            <div class="inner">
                <h3><?= $countRoute ?></h3>
                <p>Количество маршрутов</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-done-all"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red-gradient">
            <div class="inner">
                <h3><?= $countFlight ?></h3>
                <p>Количество рейсов</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-time-outline"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <section class="col-lg-12">
        <table class="table table-hover">
            <h2>Расписание</h2>

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
                        $trClass = 'info row-flight';
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
                        <th><?= $item['start_date'] ?></th>
                        <th><?= $item['start_station'] ?></th>
                        <th><?= $item['end_date'] ?></th>
                        <th><?= $item['end_station'] ?></th>
                        <th><?= $item['auto'] ?></th>
                        <th><?= $item['capacity'] ?></th>
                    </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    </section>
</div>