<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    {{-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js"
        integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous">
    </script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body data-layout="horizontal" data-topbar="dark">
    <div id="app">
        <div id="layout-wrapper">

            <!-- ========== Left Sidebar Start ========== -->

            <!-- Left Sidebar End -->
            <header id="page-topbar" class="ishorizontal-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">


                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="../images/logo.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="../images/logo.png" alt="" height="22">
                                    <span class="logo-txt">{{ config('app.name', 'Laravel') }}
                                    </span>
                                </span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item"
                            data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <i class="fas fa-fw fa-bars"></i>
                        </button>



                        {{-- menu principal --}}
                        <div class="topnav">
                            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                                <div class="collapse navbar-collapse" id="topnav-menu-content">
                                    <ul class="navbar-nav">
                                        {{-- dashboard --}}
                                        <li class="nav-item">
                                            <a class="nav-link dropdown-toggle arrow-none" href="{{ url('/home') }}"
                                                id="topnav-dashboard" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-tachometer-alt"></i>
                                                <span data-key="t-dashboards">Dashboard</span>
                                            </a>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none {{ request()->is('usuarios*') ? 'active' : '' }}"
                                                href="#" id="topnav-pages" role="button">
                                                <i class="fas fa-users"></i>
                                                <span data-key="t-apps">Usuarios</span>
                                                <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                                <div class="dropdown">
                                                    <a href="{{ url('/usuarios/listar') }}" class="dropdown-item"
                                                        data-key="t-read-email">Listar</a>
                                                    <a href="{{ url('/usuarios/create') }}" class="dropdown-item"
                                                        data-key="t-read-email">Crear</a>

                                                </div>



                                            </div>
                                        </li>
                                        {{-- <apps></apps> --}}
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="#"
                                                id="topnav-pages" role="button">

                                                <span data-key="t-apps">menu1</span>
                                                <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-pages">



                                                <div class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                                        id="topnav-email" role="button">
                                                        <span data-key="t-email">submenu1</span>
                                                        <div class="arrow-down"></div>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="topnav-email">
                                                        <a href="email-inbox.html" class="dropdown-item"
                                                            data-key="t-inbox">item1</a>
                                                        <a href="email-read.html" class="dropdown-item"
                                                            data-key="t-read-email">item2</a>
                                                    </div>
                                                </div>



                                            </div>
                                        </li>
                                        {{-- bootstrap --}}
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="#"
                                                id="topnav-uielement" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">

                                                <span data-key="t-bootstrap">Menu2</span>
                                                <div class="arrow-down"></div>
                                            </a>


                                        </li>
                                        {{-- components --}}

                                        {{-- pages --}}


                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    {{-- barra buscar --}}
                    <div class="d-flex">
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-binoculars   fa-fw"></i>

                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">

                                <form class="p-3">
                                    <div class="search-box">
                                        <div class="position-relative">
                                            <input type="search" name="search" id="search" class="form-control"
                                                placeholder="Buscar aqui...">

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- idiomas y banderas --}}
                        <div class="dropdown d-inline-block language-switch">
                            <button type="button" class="btn header-item" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img class="header-lang-img" src="/images/flags/spain.jpg" alt="Header Language"
                                    height="16">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language"
                                    data-lang="eng">
                                    <img src="/images/flags/us.jpg" alt="user-image" class="me-1" height="12">
                                    <span class="align-middle">English</span>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language"
                                    data-lang="sp">
                                    <img src="/images/flags/spain.jpg" alt="user-image" class="me-1"
                                        height="12">
                                    <span class="align-middle">Spanish</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language"
                                    data-lang="gr">
                                    <img src="/images/flags/germany.jpg" alt="user-image" class="me-1"
                                        height="12"> <span class="align-middle">German</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language"
                                    data-lang="it">
                                    <img src="/images/flags/italy.jpg" alt="user-image" class="me-1"
                                        height="12">
                                    <span class="align-middle">Italian</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language"
                                    data-lang="ru">
                                    <img src="/images/flags/russia.jpg" alt="user-image" class="me-1"
                                        height="12"> <span class="align-middle">Russian</span>
                                </a>
                            </div>
                        </div>
                        {{-- campana de mensajes --}}
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon"
                                id="page-header-notifications-dropdown" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell  fa-fw"></i>
                                {{-- conteo de mensaje  --}}
                                <span class="noti-dot bg-danger rounded-pill">2</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="m-0 font-size-15"> Notificaciones </h5>
                                        </div>
                                        <div class="col-auto">
                                            <a href="" class="small"> Marcar todo como leido</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2 border-top d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 btn-block text-decoration-underline fw-bold text-center"
                                        href="javascript:void(0)">
                                        <span>Ver todo <i class="fas fa-arrow-alt-circle-right fa-sm fa-fw"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- icono acciones de usuario --}}
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item user text-start d-flex align-items-center"
                                id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="/images/user.jpeg"
                                    alt="User">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end pt-0">
                                <a class="dropdown-item" href="contacts-profile.html"><i
                                        class='bx bx-user-circle text-muted font-size-18 align-middle me-1'></i> <span
                                        class="align-middle">Mi cuenta</span></a>
                                <a class="dropdown-item" href="apps-chat.html"><i
                                        class='bx bx-chat text-muted font-size-18 align-middle me-1'></i> <span
                                        class="align-middle">Chat</span></a>
                                <a class="dropdown-item" href="pages-faqs.html"><i
                                        class='bx bx-buoy text-muted font-size-18 align-middle me-1'></i> <span
                                        class="align-middle">Soporte</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="auth-lock-screen.html"><i
                                        class='bx bx-lock text-muted font-size-18 align-middle me-1'></i> <span
                                        class="align-middle">Bloquear pantalla</span></a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                        class="fas fa-sign-out-alt"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <main class="py-4">
                        @yield('content')
                    </main>

                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <?php echo date('Y'); ?> &copy; Symox plantilla.


                            </div>

                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Desarrollado con <i class="fas fa-heart    "></i> por <a href="#"
                                        target="_blank" class="text-reset">David
                                        Villa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>





    </div>
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js"
        integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous">
    </script>




</body>

</html>
