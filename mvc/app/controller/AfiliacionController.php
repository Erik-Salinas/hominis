<?php
require_once '/xampp/htdocs/hominis/mvc/app/model/AfiliacionModel.php';

class AfiliacionController {
    private $modelo;

    public function __construct($pdo) {
        $this->modelo = new AfiliacionModel($pdo);
    }
    
    /* public function mostrarFormulario($showModal = false) {
        // Incluye la vista y pasa el valor de $showModal
        require 'app/views/record.php';
    }
 */
    public function procesarFormulario() {
        // Validar
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
            // Redirige a la misma página pero con un parámetro para mostrar la modal
            header('Location: http://localhost/hominis/mvc/resources/views/affiliates.php?modal=1');
            exit();
        } else {
            echo "Error al procesar la afiliación.";
        }
    }

    public function editar(){

        $dni = htmlspecialchars($_POST['dni']);

        $resultado = $this->modelo->editarAfiliado($dni);
        if ($resultado) {
            // Redirige a la misma página pero con un parámetro para mostrar la modal
            header('Location: http://localhost/hominis/mvc/resources/views/record.php');
            exit();
        } else {
            echo "Error al procesar la afiliación.";
        }
    }
}
