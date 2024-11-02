<?php
require_once '/xampp/htdocs/hominis/mvc/app/model/AfiliacionModel.php';

class AfiliacionController {
    private $modelo;

    public function __construct($pdo) {
        $this->modelo = new AfiliacionModel($pdo);
    }
    
    public function mostrarFormulario() {
        require 'app/views/afiliacion/formulario.php';
    }

    public function procesarFormulario() {
        

        
        //Validar
        $datos = [
            'nombre' => htmlspecialchars($_POST['nombre']),
            'apellido' => htmlspecialchars($_POST['apellido']),
            'dni' => htmlspecialchars($_POST['dni']),
            'direccion' => htmlspecialchars($_POST['direccion']),
            'telefono' => htmlspecialchars($_POST['telefono']),
            'email' => htmlspecialchars($_POST['email']),
            'fecha_nacimiento' => htmlspecialchars($_POST['fecha_nacimiento'])
        ];
        
        $resultado = $this->modelo->guardarAfiliacion($datos);
        
        if ($resultado) {
            //require 'app/views/afiliacion/confirmacion.php';
            header('Location: http://localhost:8080/hominis/mvc/index.php?confirmacion');
        } else {
            echo "Error al procesar la afiliación.";
        }
    }
}