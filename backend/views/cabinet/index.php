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
                <tr class="row-flight success">
                    <th>1</th>
                    <th>С096</th>
                    <th>25/02/2016</th>
                    <th>Чкаловская</th>
                    <th>26/03/2016</th>
                    <th>Проселочная</th>
                    <th>Г-100</th>
                    <th>66</th>
                </tr>

                <tr class="info row-flight">
                    <th>2</th>
                    <th>С096</th>
                    <th>25/02/2016</th>
                    <th>Чкаловская</th>
                    <th>26/03/2016</th>
                    <th>Проселочная</th>
                    <th>Г-100</th>
                    <th>66</th>
                </tr>

                <tr class="danger cancel-flight row-flight red">
                    <th><i class="fa fa-ban" aria-hidden="true"></i></th>
                    <th>С096</th>
                    <th>25/02/2016</th>
                    <th>Чкаловская</th>
                    <th>26/03/2016</th>
                    <th>Проселочная</th>
                    <th>Г-100</th>
                    <th>66</th>
                </tr>

                <tr class="info row-flight">
                    <th>4</th>
                    <th>С096</th>
                    <th>25/02/2016</th>
                    <th>Чкаловская</th>
                    <th>26/03/2016</th>
                    <th>Проселочная</th>
                    <th>Г-100</th>
                    <th>66</th>
                </tr>

                <tr class="row-flight">
                    <th>5</th>
                    <th>С096</th>
                    <th>25/02/2016</th>
                    <th>Чкаловская</th>
                    <th>26/03/2016</th>
                    <th>Проселочная</th>
                    <th>Г-100</th>
                    <th>66</th>
                </tr>

                <tr class="info row-flight">
                    <th>6</th>
                    <th>С096</th>
                    <th>25/02/2016</th>
                    <th>Чкаловская</th>
                    <th>26/03/2016</th>
                    <th>Проселочная</th>
                    <th>Г-100</th>
                    <th>66</th>
                </tr>
            </tbody>

        </table>

    </section>
</div>