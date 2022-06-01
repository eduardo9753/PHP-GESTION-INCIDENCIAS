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
                    <!-- Navbar Brand --><a href="dashboardJefe" class="navbar-brand d-none d-sm-inline-block">
                        <div class="brand-text d-none d-lg-inline-block"><span>SISTEMAS </span><strong>AREA</strong></div>
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
            <li class="<?php echo ($ruta == 'GraficosJefe') ? "active" : ""; ?>"><a href="GraficosJefe"> <i class="fa fa-bar-chart"></i>Graficos </a></li>
            <li class="<?php echo ($ruta == 'ProfileJefe') ? "active" : ""; ?>"><a href="ProfileJefe"> <i class='bx bx-user-circle bx-burst'></i>Profile</a></li>
            <li class="<?php echo ($ruta == 'Reporte') ? "active" : ""; ?>"><a href="Reporte"> <i class='bx bxs-report bx-burst'></i>Reporte</a></li>
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