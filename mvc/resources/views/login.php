<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../public/css/admin.css"> -->
    <link rel="stylesheet" href="/hominis/mvc/resources/public/css/admin.css">
    <title>Login</title>
</head>
<body>
    <main>
        <section class="login   d-flex  align-items-center justify-content-center">
            <form action="/hominis/mvc/index.php" method="post" class=" d-flex flex-column bg-white w-25 p-4 rounded border border-2" autocomplete="off">
                <img src="/hominis/mvc/resources/public/img/hominis-logo.png" alt="Logo de ericin" class=" img-fluid w-50 m-auto">
                <label for="#" class="fs-4 text-dark mt-3">Usuario</label>
                <input type="text" id="user" name="user" required  class="form-control border border-dark p-2 mb-2 border-opacity-75">
                <label for="#" class="fs-4 text-dark mt-3">Contraseña</label>
                <input type="password" id="password" name="password" required class="form-control border border-dark p-2 mb-2 border-opacity-75">
                <input type="hidden" name="formulario" value="login">
                <button type="submit" class="btn btn-success fs-5 mt-4">Ingresar</button>
            </form>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>