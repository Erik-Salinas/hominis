<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Afiliación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../resources/public/css/admin.css">
</head>
<?php 
require '/xampp/htdocs/hominis/mvc/app/views/header.php';
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
};?>

<body>
    <main class="container">
        <section>
            <h2 class="text-dark mt-3 text-center">FORMULARIO DE AFILIACIÓN A OBRA SOCIAL</h2>
            <div class="d-flex align-items-center justify-content-center flex-column">
                <form action="/hominis/mvc/index.php" id="afiliacionForm" method="POST" class="border border-1 border-dark rounded w-50 p-5 d-flex flex-wrap flex-column gap-1 mt-3">
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
                    <div class="ms-auto mt-4">
                        <button type="reset" class="btn btn-danger border border-0">Limpiar</button>
                        <button type="submit" class="btn btn-success border border-0">Enviar Solicitud</button>
                    </div>
                </form>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmación de Envío</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Está seguro de que desea enviar su solicitud?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="confirmarEnvio">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('afiliacionForm');
            const modal = new bootstrap.Modal(document.getElementById('exampleModal'));

            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Evita el envío del formulario
                modal.show(); // Muestra el modal de confirmación
            });

            document.getElementById('confirmarEnvio').addEventListener('click', function() {
                form.submit(); // Envía el formulario
                header('/hominis/mvc/app/views/redord.php');
            });
        });
    </script>
</body>

</html>
