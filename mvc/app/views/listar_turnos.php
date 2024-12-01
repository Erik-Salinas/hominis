<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Turnos</title>
    <link rel="stylesheet" href="../public/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <?php require '/xampp/htdocs/hominis/mvc/app/views/header.php'; ?>

        <!-- Bloque de alerta para mostrar mensajes de la sesión -->
        <?php if (isset($_SESSION['mensaje'])): ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['mensaje']); // Eliminar mensaje después de mostrarlo ?>
        <?php endif; ?>

        <h1 class="text-center">Lista de Turnos</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Turno</th>
                    <th>Afiliado</th>
                    <th>Especialidad</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Empleado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($turnos as $turno): ?>
                    <tr>
                        <td><?= $turno['id_turno'] ?></td>
                        <td><?= $turno['id_afiliado'] ?></td>
                        <td><?= $turno['id_especialidad'] ?></td>
                        <td><?= $turno['fecha_turno'] ?></td>
                        <td><?= $turno['hora_turno'] ?></td>
                        <td><?= $turno['id_empleado'] ?></td>
                        <td>
                            <a href="/hominis/mvc/index.php?action=editar_turno&id_turno=<?= $turno['id_turno'] ?>" class="btn btn-warning">Editar</a>
                            <a href="/hominis/mvc/index.php?action=eliminar_turno&id_turno=<?= $turno['id_turno'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este turno?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
