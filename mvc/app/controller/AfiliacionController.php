<?php
require_once '/xampp/htdocs/hominis/mvc/app/model/AfiliacionModel.php';

class AfiliacionController {
    private $modelo;

    public function __construct($pdo) {
        $this->modelo = new AfiliacionModel($pdo);
    }
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
            header('Location: http://localhost/hominis/mvc/resources/views/record.php');
            exit();
        } else {
            echo "Error al procesar la afiliación.";
        }
    }

    public function editarDatos() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Procesa los datos del formulario de edición en el modal
            if (isset($_POST['id_afiliado'])) {
                $id_afiliado = $_POST['id_afiliado'];
                echo "ID del afiliado recibido: " . $id_afiliado; // Solo para depurar
            } else {
                echo "ID del afiliado no recibido.";
            }
            
            $datos = [
                'id_afiliado' => $id_afiliado,
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'dni' => $_POST['dni'],
                'direccion' => $_POST['direccion'],
                'telefono' => $_POST['telefono'],
                'email' => $_POST['email'],
                'fecha_nacimiento' => $_POST['fecha_nacimiento']
            ];
    
            $this->modelo->editarAfiliado($datos);
            header('Location: /hominis/mvc/resources/views/affiliates.php');
            exit();
        }
    }
    public function eliminar($id) {
        $this->modelo->eliminarAfiliado($id);
        header('Location: http://localhost/hominis/mvc/resources/views/affiliates.php');
        exit();
        
    }
    
    
}
