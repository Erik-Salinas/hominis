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
        echo $contenido;
        ?>
    </main>

    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>



