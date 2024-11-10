<!-- * Inicio -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../public/css/admin.css">
</head>
<?php session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}; ?>
<body> 
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
                    <div class="offcanvas-header">
                        <img src="../public/img/hominis-logo.png" alt="Logo de hominis" class="img-fluid w-50 m-auto">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active fs-5" aria-current="page" href="/hominis/mvc/resources/views/home.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link  fs-5" href="/hominis/mvc/resources/views/affiliates.php">Afiliados</a>                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-5" href="/hominis/mvc/resources/views/shifts.php">Turnos</a>
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
    <main class="container">
        <br>
        <br>
        <br>
        <?php
require '/xampp/htdocs/hominis/mvc/config/datebase.php';
$user = $_SESSION['user'];
$password = $_SESSION['password'];

$sql = "SELECT * FROM empleado WHERE user = :user AND password = :password";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user', $user);
$stmt->bindParam(':password', $password);
$stmt->execute();

// Obtener todos los resultados en un arreglo asociativo
$empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Inicializamos una variable para almacenar el contenido
$contenido = "";

// Mostrar los datos
foreach ($empleados as $empleado) {
    // Aplicar ucfirst antes de generar el contenido HTML
    $nombre = ucfirst($empleado['nombre']);
    $apellido = ucfirst($empleado['apellido']);
    $direccion = ucfirst($empleado['direccion']);

    // Usamos comillas invertidas (heredoc) para construir el HTML
    $contenido .= <<<HTML
    <div class='d-flex justify-content-center mt-5'>
        <img src='../public/img/iconoPersona.jpg' alt='Icono Persona' class='homeEmployee'>
        <div>
            <p class='fs-5'> <span class='fw-bold'> ID:  </span>{$empleado['id_empleado']}</p>
            <p class='fs-5'> <span class='fw-bold'> Nombre y Apellido:  </span>{$nombre} {$apellido}</p>
            <p class='fs-5'> <span class='fw-bold'> DNI:  </span>{$empleado['dni']}</p>
            <p class='fs-5'> <span class='fw-bold'> Teléfono:  </span>{$empleado['telefono']}</p>
            <p class='fs-5'> <span class='fw-bold'> Dirección:  </span>{$direccion}</p>
            <p class='fs-5'> <span class='fw-bold'> Email:  </span>{$empleado['email']}</p>
HTML;

    // Formatear la fecha de nacimiento
    $fechaNacimiento = new DateTime($empleado['fecha_nacimiento']);
    $contenido .= "<p class='fs-5'> <span class='fw-bold'> Fecha de Nacimiento: </span>" . $fechaNacimiento->format('d/m/Y') . "</p>";

    // Cerramos las etiquetas del div
    $contenido .= "</div></div>";
}

// Finalmente, mostramos todo el contenido de una vez


// Obtener los últimos 5 registros de turnos
$sql = "SELECT * FROM turnos ORDER BY id_turno DESC LIMIT 5";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$turnos = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
// Mostrar los turnos
$contenido .= "<table class='table table-primary table-hover mt-5'>
        <h3 class='mt-5 text-decoration-underline'>Ultimos Turnos Dados</h3>
        <tr>
        <th scope='col' class='fs-5 text-center'>Nombre y Apellido</th>
        <th scope='col' class='fs-5 text-center'>DNI</th>
        <th scope='col' class='fs-5 text-center'>Email</th>
        <th scope='col' class='fs-5 text-center'>Telefono</th>
        <th scope='col' class='fs-5 text-center'>Especialidad</th>
        <th scope='col'class='fs-5 text-center'>Fecha y Hora</th>
        </tr>
    ";

foreach ($turnos as $turno) {
    $nombre = ucfirst($turno['nombre_paciente']);
    $apellido = ucfirst($turno['apellido_paciente']);
    $especialidad = ucfirst($turno['especialidad']);
    $fechaTurno = new DateTime($turno['diaHora']);
    $fechaFormateada = $fechaTurno->format('d/m/Y H:i'); // Formatear la fecha

    $contenido .= <<<HTML
    <tr>
        <td class='fs-5 text-center' > {$nombre} {$apellido}</td>
        <td class='fs-5 text-center'> {$turno['dni_paciente']}</td>
        <td class='fs-5 text-center'> {$turno['email_paciente']}</td>
        <td class='fs-5 text-center'>{$turno['tel_paciente']}</td>
        <td class='fs-5 text-center'>{$especialidad}</td>           
        <td class='fs-5 text-center'>{$fechaFormateada}hs</td>
    </tr>
HTML;
}

$contenido .= "</table>";

// Finalmente, mostramos todo el contenido de una vez
echo $contenido;
?>


    </main>
    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>