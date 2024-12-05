<?php
class Reservas {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function realizarReserva($dni, $nombreAlumno, $apellidoAlumno, $correoAlumno, $cursoASeleccionar, $libroASeleccionar, $estadoDelPago) {
        // Sanitizar las entradas
        $dni = $this->conexion->real_escape_string($dni);
        $nombreAlumno = $this->conexion->real_escape_string($nombreAlumno);
        $apellidoAlumno = $this->conexion->real_escape_string($apellidoAlumno);
        $correoAlumno = $this->conexion->real_escape_string($correoAlumno);
        $cursoASeleccionar = $this->conexion->real_escape_string($cursoASeleccionar);
        $libroASeleccionar = $this->conexion->real_escape_string($libroASeleccionar);
        $estadoDelPago = $this->conexion->real_escape_string($estadoDelPago);

        // Insertar la reserva
        $sqlReserva = "INSERT INTO reserva (DNI, fechaReserva, libroReservado, estado_reserva)
                       VALUES ('$dni', CURDATE(), '$libroASeleccionar', 'pendiente')";
        if ($this->conexion->query($sqlReserva) === TRUE) {
            $idReserva = $this->conexion->insert_id;

            // Insertar en reserva_libros
            $sqlLibroReserva = "INSERT INTO reserva_libros (idReserva, isbn)
                                VALUES ('$idReserva', '$libroASeleccionar')";
            if (!$this->conexion->query($sqlLibroReserva)) {
                return "Error al reservar el libro: " . $this->conexion->error;
            }

            // Mensaje de confirmación
            $mensaje = "Reserva realizada con éxito.";
            if ($estadoDelPago === 'pagoConfirmado') {
                $mensaje .= "<br>Pago confirmado.";
            }
            return $mensaje;
        } else {
            return "Error al realizar la reserva: " . $this->conexion->error;
        }
    }
}
