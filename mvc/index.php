<?php
require_once '/xampp/htdocs/hominis/mvc/config/datebase.php';
require_once '/xampp/htdocs/hominis/mvc/app/controller/LoginController.php';
require '/xampp/htdocs/hominis/mvc/app/controller/AfiliacionController.php'; 

$controller = new LoginController($pdo);
$afiliacion = new AfiliacionController($pdo);

// Verifica si la solicitud es POST y de qué formulario proviene
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['formulario']) && $_POST['formulario'] === 'login') {
        $controller->IniciarSesion();
    } elseif (isset($_POST['formulario']) && $_POST['formulario'] === 'afiliacion') {
        $afiliacion->procesarFormulario();
    }
<<<<<<< HEAD
} elseif (isset($_GET['home'])) {
=======
} elseif (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $controller->CerrarSesion();
}elseif (isset($_GET['home'])) {
>>>>>>> 938f11ffbbd1dc22907d9ed0585b791898034820
    include '/xampp/htdocs/hominis/mvc/resources/views/home.php';
} else {
    include '/xampp/htdocs/hominis/mvc/resources/views/login.php';
}

?>
