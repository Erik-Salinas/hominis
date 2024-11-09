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
                            <a class="nav-link active fs-5" href="/hominis/mvc/resources/views/affiliates.php">Afiliados</a>                            </li>
                            <li class="nav-item">
                                <a class="nav-link   fs-5" href="/hominis/mvc/resources/views/shifts.php">Turnos</a>
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
        <section>
            <h1>AFILIADOSssssssssssssss</h1>
            <div>
                <button type="submit">Agregar</button>
            </div>
        </section>
    </main>
    <?php 

require '/xampp/htdocs/hominis/mvc/config/datebase.php';

$sql = "SELECT * FROM afiliaciones";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Obtener todos los resultados en un arreglo asociativo
$afiliados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Inicializamos una variable para almacenar el contenido
$contenido = "";

// Mostrar los datos
foreach ($afiliados as $afiliado) {
    // Aplicar ucfirst antes de generar el contenido HTML
    $nombre = ucfirst($afiliado['nombre']);
    $apellido = ucfirst($afiliado['apellido']);
    $direccion = ucfirst($afiliado['direccion']);

    // Usamos comillas invertidas (heredoc) para construir el HTML
    $contenido .= <<<HTML
    <div class='d-flex justify-content-center mt-5'>
        <div>
            <p class='fs-5'> <span class='fw-bold'> ID:  </span>{$afiliado['id_afiliado']}</p>
            <p class='fs-5'> <span class='fw-bold'> Nombre y Apellido:  </span>{$nombre} {$apellido}</p>
            <p class='fs-5'> <span class='fw-bold'> DNI:  </span>{$afiliado['dni']}</p>
            <p class='fs-5'> <span class='fw-bold'> Teléfono:  </span>{$afiliado['telefono']}</p>
            <p class='fs-5'> <span class='fw-bold'> Dirección:  </span>{$direccion}</p>
            <p class='fs-5'> <span class='fw-bold'> Email:  </span>{$afiliado['email']}</p>
HTML;

    // Formatear la fecha de nacimiento
    $fechaNacimiento = new DateTime($afiliado['fecha_nacimiento']);
    $contenido .= "<p class='fs-5'> <span class='fw-bold'> Fecha de Nacimiento: </span>" . $fechaNacimiento->format('d/m/Y') . "</p>";

    // Cerramos las etiquetas del div
    $contenido .= "</div></div>";
}

// Finalmente, mostramos todo el contenido de una vez
echo $contenido;
    ?>

    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Título del Modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Afiliado Eliminado Correctamente
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>

    </main>
    <footer>

    </footer>
    <script>
  // Función para obtener los parámetros de la URL
  function getUrlParameter(name) {
    return new URLSearchParams(window.location.search).get(name);
  }

  // Comprobar si el parámetro 'modal' existe y es igual a '1'
  window.onload = function() {
    if (getUrlParameter('modal') === '1') {
      // Si el parámetro modal=1 está presente, mostrar el modal
      var myModal = new bootstrap.Modal(document.getElementById('myModal'));
      myModal.show();
    }
  };
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>