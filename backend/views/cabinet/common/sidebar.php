<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="http://www.placecage.com/160/160" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <? if(!empty($this->params['username'])): ?>
                    <p><?= $this->params['username'] ?></p>
                <? endif; ?>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">

            <? if (strpos($_SERVER['REQUEST_URI'], 'cabinet/')): ?>
                <li>
                    <a class="text-aqua">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
            <? else: ?>
                <li>
                    <a href="/cabinet/">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
            <? endif; ?>

            <? if (strpos($_SERVER['REQUEST_URI'], 'driverclass/') || strpos($_SERVER['REQUEST_URI'], 'driver/')): ?>
                <li class="treeview active">

                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Водители</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>

                    <ul class="treeview-menu menu-open" style="display: block">

                        <li>
                            <? if (strpos($_SERVER['REQUEST_URI'], 'driverclass/')): ?>
                                <a class="text-aqua">
                                    <i class="fa fa-database"></i> Классы
                                </a>
                            <? else: ?>
                                <a href="/driverclass/">
                                    <i class="fa fa-database"></i> Классы
                                </a>
                            <? endif; ?>
                        </li>

                        <li>
                            <? if (strpos($_SERVER['REQUEST_URI'], 'driver/')): ?>
                                <a class="text-aqua">
                                    <i class="fa fa-users"></i> Данные
                                </a>
                            <? else: ?>
                                <a href="/driver/">
                                    <i class="fa fa-users"></i> Данные
                                </a>
                            <? endif; ?>
                        </li>
                    </ul>

                </li>
            <? else: ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Водители</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/driverclass/">
                                <i class="fa fa-database"></i> Классы
                            </a>
                        </li>
                        <li>
                            <a href="/driver/">
                                <i class="fa fa-users"></i> Данные
                            </a>
                        </li>
                    </ul>
                </li>
            <? endif; ?>

            <? if (strpos($_SERVER['REQUEST_URI'], 'bus/') || strpos($_SERVER['REQUEST_URI'], 'bustype/')): ?>
                <li class="treeview active">

                    <a href="#">
                        <i class="fa fa-bus"></i>
                        <span>Автопарк</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu menu-open">
                        <li>
                            <? if (strpos($_SERVER['REQUEST_URI'], 'bus/')): ?>
                                <a class="text-aqua">
                                    <i class="fa fa-bus"></i> Автобусы
                                </a>
                            <? else: ?>
                                <a href="/bus/">
                                    <i class="fa fa-bus"></i> Автобусы
                                </a>
                            <? endif; ?>
                        </li>
                        <li>
                            <? if (strpos($_SERVER['REQUEST_URI'], 'bustype/')): ?>
                                <a class="text-aqua">
                                    <i class="fa fa-database"></i> Типы автобусов
                                </a>
                            <? else: ?>
                                <a href="/bustype/">
                                    <i class="fa fa-database"></i> Типы автобусов
                                </a>
                            <? endif; ?>
                        </li>
                    </ul>
                </li>
            <? else: ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bus"></i>
                        <span>Автопарк</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/bus/">
                                <i class="fa fa-bus"></i> Автобусы
                            </a>
                        </li>
                        <li>
                            <a href="/bustype/">
                                <i class="fa fa-database"></i> Типы автобусов
                            </a>
                        </li>
                    </ul>
                </li>
            <? endif; ?>

            <? if (strpos($_SERVER['REQUEST_URI'], 'station/') || strpos($_SERVER['REQUEST_URI'], 'route/')): ?>
                <li class="treeview active">

                    <a href="#">
                        <i class="fa fa-truck"></i>
                        <span>Маршруты</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu menu-open">
                        <li>
                            <? if (strpos($_SERVER['REQUEST_URI'], 'station/')): ?>
                                <a class="text-aqua">
                                    <i class="fa fa-building"></i> Станции
                                </a>
                            <? else: ?>
                                <a href="/station/">
                                    <i class="fa fa-building"></i> Станции
                                </a>
                            <? endif; ?>
                        </li>
                        <li>
                            <? if (strpos($_SERVER['REQUEST_URI'], 'route/')): ?>
                                <a class="text-aqua">
                                    <i class="fa fa-map"></i> Маршруты
                                </a>
                            <? else: ?>
                                <a href="/route/">
                                    <i class="fa fa-map"></i> Маршруты
                                </a>
                            <? endif; ?>
                        </li>
                    </ul>
                </li>
            <? else: ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-truck"></i>
                        <span>Маршруты</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/station/">
                                <i class="fa fa-building"></i> Станции
                            </a>
                        </li>
                        <li>
                            <a href="/route/">
                                <i class="fa fa-map"></i> Маршруты
                            </a>
                        </li>
                    </ul>
                </li>
            <? endif; ?>

            <? if (strpos($_SERVER['REQUEST_URI'], '!') || strpos($_SERVER['REQUEST_URI'], 'reason/')): ?>
                <li class="treeview active">

                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>Расписание</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu menu-open">
                        <li>
                            <? if (strpos($_SERVER['REQUEST_URI'], '!')): ?>
                                <a class="text-aqua">
                                    <i class="fa fa-calendar-plus-o"></i> Добавить рейс
                                </a>
                            <? else: ?>
                                <a href="">
                                    <i class="fa fa-calendar-plus-o"></i> Добавить рейс
                                </a>
                            <? endif; ?>
                        </li>
                        <li>
                            <? if (strpos($_SERVER['REQUEST_URI'], 'reason/')): ?>
                                <a class="text-aqua">
                                    <i class="fa fa-calendar-minus-o"></i> Причины отмены рейсов
                                </a>
                            <? else: ?>
                                <a href="/reason/">
                                    <i class="fa fa-calendar-minus-o"></i> Причины отмены рейсов
                                </a>
                            <? endif; ?>
                        </li>
                    </ul>
                </li>
            <? else: ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>Расписание</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="">
                                <i class="fa fa-calendar-plus-o"></i> Добавить рейс
                            </a>
                        </li>
                        <li>
                            <a href="/reason/">
                                <i class="fa fa-calendar-minus-o"></i> Причины отмены рейсов
                            </a>
                        </li>
                    </ul>
                </li>
            <? endif; ?>
        </ul>
    </section>
</aside>