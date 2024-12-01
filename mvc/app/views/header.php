<?php session_start(); ?>
<header>
    <nav class="navbar navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div>
                <?php echo "<a class='nav-link active fs-5 text-white me-4' aria-current='page'>Bienvenido ".ucfirst($_SESSION['user']) ."</a>" ?> 
            </div>

            <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header bg-primary">
                <img src="/hominis/mvc/resources/public/img/hominis-logo.png" alt="Logo de hominis" class="img-fluid w-50 m-auto">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body bg-primary">
                    <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link fs-5 <?= !isset($_GET['action']) ? 'active' : '' ?>" href="/hominis/mvc/app/views/home.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 <?= isset($_GET['action']) && $_GET['action'] == 'affiliates' ? 'active' : '' ?>" href="/hominis/mvc/app/views/affiliates.php?action=affiliates">Afiliados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 <?= isset($_GET['action']) && $_GET['action'] == 'record' ? 'active' : '' ?>" href="/hominis/mvc/app/views/record.php?action=record">Afiliarte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 <?= isset($_GET['action']) && $_GET['action'] == 'turnos' ? 'active' : '' ?>" href="/hominis/mvc/index.php?action=turnos">Agendar Turno</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 <?= isset($_GET['action']) && $_GET['action'] == 'listar_turnos' ? 'active' : '' ?>" href="/hominis/mvc/index.php?action=listar_turnos">Modificar Turnos</a>
                        </li>
                        <li class="nav-item">
                            <a class="fs-6 btn btn-danger" href="/hominis/mvc/index.php?action=logout">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>