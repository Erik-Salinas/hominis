<?php
require_once '/xampp/htdocs/hominis/mvc/app/model/LoginModel.php';

class LoginController{
    private $model;
    private $user;
    private $password;

    public function __construct($pdo){
        $this->model = new LoginModel($pdo);
    }

    public function IniciarSesion()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $this->user =  $_POST['user'];
            $this->password = $_POST['password'];
    
            $resultado = $this->model->ingreso($this->user, $this->password);
            //Se redirecciona hay q ver si se puede mandar directo a la vista o si hay q pasar por el index
            if ($resultado) {
                // Redirige si los datos son correctos
                header('Location: home.php');
                exit();
            } else {
                echo $this->user ."<br>";
                echo $this->password ."<br>";
                header('Location: ../../resources/views/login.php');
                }
        }
        
    }
}
?>