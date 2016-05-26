<header class="main-header">
    <a href="#" class="logo">
        <span class="logo-mini"><b>А</b>П</span>
        <span class="logo-lg"><b>Автобусный</b> парк</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a>
                        <img src="http://www.placecage.com/160/160" class="user-image" alt="User Image">
                        <? if(!empty($this->params['username'])): ?>
                            <span class="hidden-xs"><?= $this->params['username'] ?></span>
                        <? endif; ?>
                    </a>
                </li>
                <li>
                    <a href="/autorization/logout/">Выйти</a>
                </li>
            </ul>
        </div>
    </nav>
</header>