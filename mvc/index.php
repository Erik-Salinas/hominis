<?php
require_once '/xampp/htdocs/hominis/mvc/config/datebase.php';
require_once '/xampp/htdocs/hominis/mvc/app/controller/LoginController.php';
require '/xampp/htdocs/hominis/mvc/app/controller/AfiliacionController.php';

$controller = new LoginController($pdo);


//Formulario Login
/* if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->IniciarSesion();
} else if (isset($_GET['home'])) {
    include '/xampp/htdocs/hominis/mvc/resources/views/home.php';
} else {
    include '/xampp/htdocs/hominis/mvc/resources/views/login.php';

} */

$afiliacion = new AfiliacionController($pdo);
//Formulario Afiliacion


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $afiliacion->procesarFormulario();
} else if (isset($_GET['confirmacion'])) {
    include '/xampp/htdocs/hominis/mvc/resources/views/confirmacion.php';
} else {
    include '/xampp/htdocs/hominis/mvc/resources/views/record.php';

}
?>
