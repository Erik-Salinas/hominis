<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agendar Turno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require '/xampp/htdocs/hominis/mvc/resources/views/header.php'; ?>
    <div class="container mt-5">
        <h1>Agendar Turno</h1>
        <form action="/hominis/mvc/index.php?controller=Turnos&action=crearTurno" method="POST">
            <input type="hidden" name="formulario" value="turno">

            <div class="mb-3">
                <label for="afiliado_id" class="form-label">Afiliado:</label>
                <select id="afiliado_id" name="afiliado_id" class="form-select" required>
                    <?php foreach ($afiliados as $afiliado): ?>
                        <option value="<?= $afiliado['id_afiliado'] ?>"><?= $afiliado['nombre'] . ' ' . $afiliado['apellido'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="especialidad_id" class="form-label">Especialidad:</label>
                <select id="especialidad_id" name="especialidad_id" class="form-select" required>
                    <?php foreach ($especialidades as $especialidad): ?>
                        <option value="<?= $especialidad['id'] ?>"><?= $especialidad['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="empleado_id" class="form-label">Empleado:</label>
                <select id="empleado_id" name="empleado_id" class="form-select" required>
                    <?php foreach ($empleados as $empleado): ?>
                        <option value="<?= $empleado['id_empleado'] ?>"><?= $empleado['nombre'] . ' ' . $empleado['apellido'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha_turno" class="form-label">Fecha:</label>
                <input type="date" id="fecha_turno" name="fecha_turno" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="hora_turno" class="form-label">Horario:</label>
                <input type="time" id="hora_turno" name="hora_turno" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Agendar Turno</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>