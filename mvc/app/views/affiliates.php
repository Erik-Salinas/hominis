<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afiliados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<?php
require '/xampp/htdocs/hominis/mvc/app/views/header.php';
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>

<body>
    <main class="container">
        <section>
            <h1 class="text-center mt-3 text-dark">Afiliados</h1>
            <div class="affiliate">
                <a href="record.php" class="btn btn-success d-block ms-auto mt-3">Agregar</a>
            </div>
            <table class="table table-primary table-hover mt-5">
                <thead class="text-center">
                    <tr>
                        <th>Nombre y Apellido</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Email</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    require '/xampp/htdocs/hominis/mvc/config/datebase.php';

                    $sql = "SELECT * FROM afiliaciones";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $afiliados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($afiliados as $afiliado) {
                        $nombre = ucfirst($afiliado['nombre']);
                        $apellido = ucfirst($afiliado['apellido']);
                        $direccion = ucfirst($afiliado['direccion']);
                        $fechaNacimiento = new DateTime($afiliado['fecha_nacimiento']);
                        $fechaFormateada = $fechaNacimiento->format('d/m/Y');
                    ?>
                        <tr>
                            <td><?= $nombre . " " . $apellido ?></td>
                            <td><?= $afiliado['dni'] ?></td>
                            <td><?= $afiliado['telefono'] ?></td>
                            <td><?= $direccion ?></td>
                            <td><?= $afiliado['email'] ?></td>
                            <td><?= $fechaFormateada ?></td>
                            <td>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarModal" onclick="cargarDatosModal(<?= $afiliado['id_afiliado'] ?>, '<?= $afiliado['nombre'] ?>', '<?= $afiliado['apellido'] ?>', <?= $afiliado['dni'] ?>, '<?= $afiliado['direccion'] ?>', <?= $afiliado['telefono'] ?>, '<?= $afiliado['email'] ?>', '<?= $afiliado['fecha_nacimiento'] ?>')">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="/hominis/mvc/index.php?action=delet&id=<?= $afiliado['id_afiliado'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este afiliado?');">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <!-- Modal de Edición -->
        <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarModalLabel">Editar Afiliado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formEditarAfiliado" method="POST" action="/hominis/mvc/index.php?action=editarDatos">
                            <input type="hidden" id="id_afiliado" name="id_afiliado">
                            <input type="hidden" id="id_afiliado" name="formulario">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>
                            <div class="mb-3">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="text" class="form-control" id="dni" name="dni" required>
                            </div>
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function cargarDatosModal(id, nombre, apellido, dni, direccion, telefono, email, fechaNacimiento) {
            document.getElementById('id_afiliado').value = id;
            document.getElementById('nombre').value = nombre;
            document.getElementById('apellido').value = apellido;
            document.getElementById('dni').value = dni;
            document.getElementById('direccion').value = direccion;
            document.getElementById('telefono').value = telefono;
            document.getElementById('email').value = email;
            document.getElementById('fecha_nacimiento').value = fechaNacimiento;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
