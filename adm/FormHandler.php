<?php
class FormHandler {

    private $conexion;

    // Se define el constructor para recibir la conexión de base de datos
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Se valida que el método sea POST y que el curso esté definido
    public function validarCurso($metodo, $curso) {
        return $metodo === 'POST' && isset($curso) && !empty($curso);
    }

    // Se ejecutan consultas SQL y se devuelve el resultado
    public function ejecutarConsulta($sql) {
        $resultado = $this->conexion->query($sql);
        if (!$resultado) {
            // Se manejan errores de consulta
            return ['error' => $this->conexion->error];
        }
        return $resultado;
    }

    // Se devuelven los resultados en formato JSON
    public function toJson($resultado) {
        $data = [];
        if ($resultado && $resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $data[] = $fila;
            }
        }
        return json_encode($data);
    }

    // Se obtienen los libros relacionados a un curso dado
    public function obtenerLibrosPorCurso($curso) {
        // Se escapa el valor del curso para evitar inyecciones SQL
        $curso = $this->conexion->real_escape_string($curso);

        // Se realiza la consulta para obtener los libros relacionados al curso (usando idCurso)
        $sql = "SELECT l.isbn, l.titulo 
                FROM libros l
                INNER JOIN libros_curso lc ON l.isbn = lc.isbn
                INNER JOIN curso c ON lc.idCurso = c.idCurso
                WHERE c.idCurso = '$curso'"; // Se usa idCurso en lugar de nombre

        // Se ejecuta la consulta
        $resultado = $this->ejecutarConsulta($sql);

        // Se verifica si la consulta fue exitosa
        if ($resultado->num_rows > 0) {
            // Se procesan los resultados
            $libros = [];
            while ($fila = $resultado->fetch_assoc()) { // Se usa fetch_assoc() para obtener un array asociativo
                $libros[] = ['value' => $fila['isbn'], 'text' => $fila['titulo']];
            }

            // Se devuelven los libros en formato JSON
            return $libros;
        } else {
            // Si no se encuentran libros, se devuelve un mensaje de error
            return json_encode(["error" => "No se encontraron libros para este curso"]);
        }
    }
}
