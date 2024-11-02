<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Afiliación a Obra Social</title>
</head>
<body>

<h2>Formulario de Afiliación a Obra Social</h2>
<form action="../../index.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <br><br>

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required>
    <br><br>

    <label for="dni">DNI:</label>
    <input type="text" id="dni" name="dni" required>
    <br><br>

    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" required>
    <br><br>

    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="telefono" required>
    <br><br>

    <label for="email">Correo Electrónico:</label>
    <input type="email" id="email" name="email" required>
    <br><br>

    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
    <br><br>

    <button type="submit">Enviar Solicitud</button>
</form>

</body>
</html>