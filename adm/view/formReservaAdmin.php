<!-- Levi Josué Candeias de Figueiredo -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Registro de Libros</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../assets/css/formAdm.css" rel="stylesheet" />
    </head>
    <body>
        <header>
            <h1>ESCUELA VIRGEN DE GUADALUPE</h1>
            <a id="botonRegresar" href="index.html">Regresar</a>
        </header>
        <h1 id="tituloForm">Añadir Reserva</h1>
        <main>
            <form id="formularioPrincipal" method="post" action="../adm/controller/subirDatos.php">
                <label>
                    DNI: <input type="text" name="dni" placeholder="Introduce tu dni..." required/>
                </label>
                <label>
                    Nombre: <input type="text" name="nombreAlumno" placeholder="Introduce tu nombre..." required/>
                </label>
                <label>
                    Apellido: <input type="text" name="apellidoAlumno" placeholder="Introduce tu apellido..." required/>
                </label>
                <label>
                    Correo: <input type="mail" name="correoAlumno" placeholder="Introduce tu correo..." required/>
                </label>
                <br/>
                <label for="cursoASeleccionar">Seleccione el curso:</label>
                <?php
                // Se conecta a la base de datos
                require '../modeloDeDatos/configdb.php';

                // Se realiza la consulta para obtener los cursos de la base de datos
                $sql = "SELECT idCurso, nombre FROM curso";
                $resultado = $conexion->query($sql);

                // Se verifica si hay resultados
                if ($resultado->num_rows > 0) {
                    echo '<select id="curso" name="cursoASeleccionar" required>';
                    echo '<option value="" selected disabled>Seleccione una opción</option>';

                    // Se generan las opciones del select
                    while ($fila = $resultado->fetch_assoc()) {
                        echo '<option value="' . $fila['idCurso'] . '">' . $fila['nombre'] . '</option>';
                    }

                    echo '</select>';
                } else {
                    echo "No se encontraron cursos disponibles.";
                }
                ?> 
                <label for="libroASeleccionar">Seleccione un libro:</label>
                <select id="libros" name="libroASeleccionar" required>
                    <!-- Se rellena dinámicamente -->
                    <option value="" disabled selected>Seleccione una opción</option>
                </select>
                <label for="confirmacionPAgo">Se ha realizado el pago:</label>
                <select name="estadoDelPago" required>
                    <option value="">Seleccione una opción</option>
                    <option value="pagoConfirmado">Si</option>
                    <option value="pagoNoConfirmado">No</option>
                </select>
                <br><input type="submit" value="Realizar Reserva" id="botonDeReserva" />
                <input type="reset" value="Realizar Reserva" id="botonDeResetear" />
            </form>
        </main>

        <!-- Script de verificacion de los inputs del usuario -->
        <script type="text/javascript" src="../adm/assets/js/formHandler.js"></script>
        <!-- Se incluyen los scripts para manejar las peticiones asincronas -->
        <script type="text/javascript" src="../adm/assets/js/fetchLibros.js"></script>
    </body>
</html>
