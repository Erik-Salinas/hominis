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
<?php require '/xampp/htdocs/hominis/mvc/resources/views/header.php'; ?>
<main>
    <?php 

require '/xampp/htdocs/hominis/mvc/config/datebase.php';

$sql = "SELECT * FROM afiliaciones";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$afiliados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$contenido = "";

foreach ($afiliados as $afiliado) {
    $nombre = ucfirst($afiliado['nombre']);
    $apellido = ucfirst($afiliado['apellido']);
    $direccion = ucfirst($afiliado['direccion']);

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

    $fechaNacimiento = new DateTime($afiliado['fecha_nacimiento']);
    $contenido .= "<p class='fs-5'> <span class='fw-bold'> Fecha de Nacimiento: </span>" . $fechaNacimiento->format('d/m/Y') . "</p>";

    $contenido .= "</div></div>";
}

echo $contenido;
    ?>
    </main>
    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>