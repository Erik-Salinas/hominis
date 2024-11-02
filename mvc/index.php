<?php
require_once '/xampp/htdocs/hominis/mvc/config/datebase.php';
require_once '/xampp/htdocs/hominis/mvc/app/controller/LoginController.php';
require '../app/controllers/AfiliacionController.php';

$controller = new AfiliacionController();

if ($_SERVER['REQUEST_URI'] === '/afiliacion/mostrar') {
    $controller->mostrarFormulario();
} elseif ($_SERVER['REQUEST_URI'] === '/afiliacion/procesar') {
    $controller->procesarFormulario();
} else {
    echo "Ruta no encontrada";
}

$controller = new LoginController($pdo);
$controller->IniciarSesion();
?>