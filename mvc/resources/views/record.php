<!-- * Registro -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/admin.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-primary  fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <img src="../public/img/hominis-logo.png" alt="Logo de hominis" class="img-fluid w-50 m-auto ">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link fs-5" aria-current="page" href="home.html">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active  fs-5" href="record.html">Registro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-5" href="shifts.html">Turnos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        
    </header>
    <main>
    <h2>Formulario de Afiliación a Obra Social</h2>
<form action="../../index.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <br><br>

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required>
    <br><br>

    <label for="dni">DNI:</label>
    <input type="text" id="dni" name="dni" required>
    <br><br>

    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" required>
    <br><br>

    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="telefono" required>
    <br><br>

    <label for="email">Correo Electrónico:</label>
    <input type="email" id="email" name="email" required>
    <br><br>

    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
    <br><br>

    <button type="submit">Enviar Solicitud</button>
</form>
    </main>
    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>