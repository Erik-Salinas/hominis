<?php
require_once 'app/models/AfiliacionModel.php';

class AfiliacionController {
    
    public function mostrarFormulario() {
        require 'app/views/afiliacion/formulario.php';
    }

    public function procesarFormulario() {
        $modelo = new AfiliacionModel();
        
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
        
        $resultado = $modelo->guardarAfiliacion($datos);
        
        if ($resultado) {
            require 'app/views/afiliacion/confirmacion.php';
        } else {
            echo "Error al procesar la afiliación.";
        }
    }
}