<header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo">
                            <img src="{{ asset('images/logo.png') }}" style="height: 50px;" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="{{ url('/') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ url('potenciais-clientes') }}">
                                <i class="fas fa-users"></i>Potenciais Clientes</a>
                        </li>
                        <li>
                            <a href="{{ url('pedidos') }}">
                                <i class="fas fa-tags"></i>Pedidos</a>
                        </li>
                        <li>
                            <a href="{{ url('perguntas-e-respostas') }}">
                                <i class="far fa-check-square"></i>Perguntas & Respostas</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-cogs"></i>Configurações</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{ url('servicos') }}">Serviços</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo d-flex justify-content-center" style="box-shadow:none;  background-color:#fff; border-color:#ccc;" >
                    <img src="{{ asset('images/logo.png') }}" style="height: 70px;" />
                    <h3>lia</h3>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{ url('/') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ url('potenciais-clientes') }}">
                                <i class="fas fa-users"></i>Potenciais Clientes</a>
                        </li>
                        <li>
                            <a href="{{ url('pedidos') }}">
                                <i class="fas fa-tags"></i>Pedidos</a>
                        </li>
                        <li>
                            <a href="{{ url('perguntas-e-respostas') }}">
                                <i class="far fa-check-square"></i>Perguntas & Respostas</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-cogs"></i>Configurações</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ url('servicos') }}">Serviços</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>