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
            $id_afiliado = $_POST['id_afiliado'] ?? null;

            // Verificar que el id_afiliado no esté vacío o nulo
            if (!$id_afiliado) {
                exit('Error: ID no recibido. Verifique que el formulario de edición esté enviando el ID correctamente.');
            }
    
            // Resto de los datos
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
    
            // Llamar a la función del modelo para editar los datos
            $this->modelo->editarAfiliado($id_afiliado, $dni, $nombre, $apellido, $direccion, $telefono, $email, $fecha_nacimiento);
            
            // Redirigir después de la edición
            header('Location: /hominis/mvc/resources/views/affiliates.php');
            exit();
        }
    }
    public function eliminar($id) {
        $resultado = $this->modelo->eliminarAfiliado($id);
        header('Location: http://localhost/hominis/mvc/resources/views/affiliates.php');
        exit();
        
    }
    
    
}
