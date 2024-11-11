<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Turno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/hominis/mvc/resources/public/css/admin.css">
</head>

<body>
<?php require '/xampp/htdocs/hominis/mvc/resources/views/header.php';?>
        <div class="container mt-5">
        <h1 class="text-center">Editar Turno</h1>
        <form action="/hominis/mvc/index.php" method="POST">
            <input type="hidden" name="formulario" value="actualizar_turno">
            <input type="hidden" name="id_turno" value="<?= $turno['id_turno'] ?>">

            <div class="mb-3">
                <label for="id_afiliado" class="form-label">Afiliado</label>
                <select id="id_afiliado" name="id_afiliado" class="form-control" required>
                    <?php foreach ($afiliados as $afiliado): ?>
                        <option value="<?= $afiliado['id_afiliado'] ?>" <?= $afiliado['id_afiliado'] == $turno['id_afiliado'] ? 'selected' : '' ?>>
                            <?= $afiliado['nombre'] . ' ' . $afiliado['apellido'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_especialidad" class="form-label">Especialidad</label>
                <select id="id_especialidad" name="id_especialidad" class="form-control" required>
                    <?php foreach ($especialidades as $especialidad): ?>
                        <option value="<?= $especialidad['id'] ?>" <?= $especialidad['id'] == $turno['id_especialidad'] ? 'selected' : '' ?>>
                            <?= $especialidad['nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha_turno" class="form-label">Fecha del Turno</label>
                <input type="date" id="fecha_turno" name="fecha_turno" class="form-control" value="<?= $turno['fecha_turno'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="hora_turno" class="form-label">Hora del Turno</label>
                <input type="time" id="hora_turno" name="hora_turno" class="form-control" value="<?= $turno['hora_turno'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="id_empleado" class="form-label">Empleado</label>
                <select id="id_empleado" name="id_empleado" class="form-control" required>
                    <?php foreach ($empleados as $empleado): ?>
                        <option value="<?= $empleado['id_empleado'] ?>" <?= $empleado['id_empleado'] == $turno['id_empleado'] ? 'selected' : '' ?>>
                            <?= $empleado['nombre'] .' '. $empleado['apellido'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Turno</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

