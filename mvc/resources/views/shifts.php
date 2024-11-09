<!-- * Turnos -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/admin.css">
</head>
<?php session_start(); ?>
<body>
    <header>
        <nav class="navbar navbar-dark bg-primary  fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div>
                    <?php echo "<a class='nav-link active fs-5 text-white me-4' aria-current='page'>Bienvenido ".ucfirst($_SESSION['user']) ."</a>" ?> 
                </div>
                <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <img src="../public/img/hominis-logo.png" alt="Logo de hominis" class="img-fluid w-50 m-auto">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link fs-5" aria-current="page" href="/hominis/mvc/resources/views/home.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link  fs-5" href="/hominis/mvc/resources/views/affiliates.php">Afiliados</a>                            </li>
                            <li class="nav-item">
                                <a class="nav-link active  fs-5" href="/hominis/mvc/resources/views/shifts.php">Turnos</a>
                            </li>
                            <li class="nav-item">
                                <a class="fs-6 btn btn-danger" href="/hominis/mvc/index.php?action=logout">Cerrar Sesion</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
    </main>
    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>