<?php
require_once '/xampp/htdocs/hominis/mvc/config/datebase.php';
require_once '/xampp/htdocs/hominis/mvc/app/controller/LoginController.php';

$controller = new LoginController($pdo);
$controller->IniciarSesion();
?>