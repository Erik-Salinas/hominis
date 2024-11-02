<?php
require_once '/xampp/htdocs/hominis/mvc/config/datebase.php';
require_once '/xampp/htdocs/hominis/mvc/app/controller/LoginController.php';

$controller = new LoginController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->IniciarSesion();
} elseif (isset($_GET['success'])) {
    include '/xampp/htdocs/hominis/mvc/resources/views/success.php';
} else {
    include '/xampp/htdocs/hominis/mvc/resources/views/login.php';

}
?>
