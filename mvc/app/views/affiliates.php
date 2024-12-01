<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../resources/public/css/admin.css">
</head>
<?php 
require '/xampp/htdocs/hominis/mvc/app/views/header.php';
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}; ?>

<body>
    <main class="container">
        <section>
            <h1 class="text-center mt-3 text-dark">AFILIADOS</h1>
            <div class="affiliate">
                <a href="record.php" class="btn btn-success d-block ms-auto mt-3">Agregar</a>
            </div>
            <table class="table table-primary table-hover mt-5">
                <thead class="text-center">
                    <tr>
                        <th>NOMBRE Y APELLIDO</th>
                        <th>DNI</th>
                        <th>TELÉFONO</th>
                        <th>DIRECCIÓN</th>
                        <th>EMAIL</th>
                        <th>FECHA DE NACIMIENTO</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    require '/xampp/htdocs/hominis/mvc/config/datebase.php';

                    // Realizamos la consulta para obtener los datos de los afiliados
                    $sql = "SELECT * FROM afiliaciones";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();

                    // Obtener todos los resultados en un arreglo asociativo
                    $afiliados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Mostrar cada afiliado en una fila de la tabla

                    foreach ($afiliados as $afiliado) {
                        $nombre = ucfirst($afiliado['nombre']);
                        $apellido = ucfirst($afiliado['apellido']);
                        $direccion = ucfirst($afiliado['direccion']);
                        $fechaNacimiento = new DateTime($afiliado['fecha_nacimiento']);
                        $fechaNacimientoFormateada = $fechaNacimiento->format('d/m/Y');

                        echo "<tr>";
                        echo "<td>{$nombre} {$apellido}</td>";
                        echo "<td>{$afiliado['dni']}</td>";
                        echo "<td>{$afiliado['telefono']}</td>";
                        echo "<td>{$direccion}</td>";
                        echo "<td>{$afiliado['email']}</td>";
                        echo "<td>{$fechaNacimientoFormateada}</td>";
                        // Aquí agregamos los atributos data- para enviar los datos al modal
                        echo "<td><a href='#' data-bs-toggle='modal' data-bs-target='#exampleModal' data-id='{$afiliado['id_afiliado']}' data-nombre='{$afiliado['nombre']}' data-apellido='{$afiliado['apellido']}' data-dni='{$afiliado['dni']}' data-direccion='{$afiliado['direccion']}' data-telefono='{$afiliado['telefono']}' data-email='{$afiliado['email']}' data-fecha='{$afiliado['fecha_nacimiento']}'><i class='bi bi-pencil'></i></a></td>";
                        echo "<td><a href='/hominis/mvc/index.php?action=delet&id={$afiliado['id_afiliado']}' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este afiliado?\");'><i class='bi bi-trash'></i></a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>

            </table>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Afiliado</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center flex-column">
                        <form action="../../index.php?action=editarDatos" method="post" class="border border-1 border-dark rounded w-100 p-3 d-flex flex-wrap flex-column gap-1 mt-3">
                            <input type="number" id="id_afiliado" name="id_afiliado" value="">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" required>
                            <label for="apellido">Apellido:</label>
                            <input type="text" id="apellido" name="apellido" required>
                            <label for="dni">DNI:</label>
                            <input type="text" id="dni" name="dni" required>
                            <label for="direccion">Dirección:</label>
                            <input type="text" id="direccion" name="direccion" required>
                            <label for="telefono">Teléfono:</label>
                            <input type="tel" id="telefono" name="telefono" required>
                            <label for="email">Correo Electrónico:</label>
                            <input type="email" id="email" name="email" required>
                            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
                            <input type="hidden" name="formulario" value="afiliacion">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                    </div>
                    </form>
                </div>


            </div>
        </div>
    </main>
    <footer>

    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            event.preventDefault();
            const exampleModal = document.getElementById('exampleModal');
            exampleModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget; // Botón que abrió el modal
                // Extraer la información de los atributos data- del botón
                const id = button.getAttribute('data-id');
                const nombre = button.getAttribute('data-nombre');
                const apellido = button.getAttribute('data-apellido');
                const dni = button.getAttribute('data-dni');
                const direccion = button.getAttribute('data-direccion');
                const telefono = button.getAttribute('data-telefono');
                const email = button.getAttribute('data-email');
                const fechaNacimiento = button.getAttribute('data-fecha');

                // Asignar los valores a los campos del formulario en el modal
                document.getElementById('id_afiliado').value = id;
                document.getElementById('nombre').value = nombre;
                document.getElementById('apellido').value = apellido;
                document.getElementById('dni').value = dni;
                document.getElementById('direccion').value = direccion;
                document.getElementById('telefono').value = telefono;
                document.getElementById('email').value = email;
                document.getElementById('fecha_nacimiento').value = fechaNacimiento;
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>