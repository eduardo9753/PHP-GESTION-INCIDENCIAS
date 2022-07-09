<header class="header">
    <nav class="navbar">
        <!-- Search Box-->
        <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
                <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
        </div>
        <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <!-- Navbar Header-->
                <div class="navbar-header">
                    <!-- Navbar Brand --><a href="dashboardCoordinador" class="navbar-brand d-none d-sm-inline-block">
                        <div class="brand-text d-none d-lg-inline-block"><span>SIS </span><strong>PAUS</strong></div>
                        <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div>
                    </a>
                    <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                </div>
                <!-- Navbar Menu -->
            </div>
        </div>
    </nav>
</header>


<div class="page-content d-flex align-items-stretch">
    <!-- Side Navbar -->
    <nav class="side-navbar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
            <div class=""><img src="<?php echo $_SESSION['foto'] ?>" alt="..." class="img-usuario"></div>
            <div class="title">
                <h1 class="h4"><?php echo $_SESSION['nombre_usuario'] ?></h1>
                <p><?php echo $_SESSION['perfil'] ?></p>
            </div>
        </div>

        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
            <li class="<?php echo ($ruta == 'Incidencia') ? "active" : ""; ?>"><a href="Incidencia"> <i class="icon-home"></i>Incidencias</a></li>
            <li class="<?php echo $active_seguimiento ?>"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>SEGUIMIENTO</a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled <?php echo $show_seguimiento ?>">
                    <li class="<?php echo ($ruta == 'InidenciaPendiente') ? "active" : ""; ?>" id="pendienteIncidencia"><a href="InidenciaPendiente">Incidencias - Pendientes</a></li>
                    <li class="<?php echo ($ruta == 'ReclamoPendiente') ? "active" : ""; ?>"><a href="ReclamoPendiente">Reclamos - Pendientes</a></li>
                </ul>
            </li>
            <li class="<?php echo ($ruta == 'Buscador') ? "active" : ""; ?>"><a href="Buscador"> <i class='bx bx-search-alt'></i>Buscador</a></li>
            <li class="<?php echo ($ruta == 'GraficosCoordinador') ? "active" : ""; ?>"><a href="GraficosCoordinador"> <i class="fa fa-bar-chart"></i>Mis Graficos</a></li>
            <li class="<?php echo ($ruta == 'BuscarDatos') ? "active" : ""; ?>"><a href="BuscarDatos"> <i class='bx bx-list-check'></i>Mi Lista</a></li>
            <li class="<?php echo ($ruta == 'ProfileCoordinador') ? "active" : ""; ?>"><a href="ProfileCoordinador"> <i class='bx bx-user-circle bx-burst'></i>Profile</a></li>
            <li><a href="Close" class="mt-5 border-dark"> <i class='bx bx-log-out-circle bx-spin'></i> Logout </a></li>
        </ul>
    </nav>

    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom" class=""><?php echo $titulo; ?></h2>
            </div>
        </header>