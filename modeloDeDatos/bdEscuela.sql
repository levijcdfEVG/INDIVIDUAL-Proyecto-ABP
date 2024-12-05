
-- Crear la tabla reserva
CREATE TABLE reserva (
    idReserva SMALLINT AUTO_INCREMENT PRIMARY KEY,
    DNI CHAR(9),
    justificante VARCHAR(255),
    fechaReserva DATE,
    detalles VARCHAR(500),
    estado_reserva VARCHAR(50),
    CONSTRAINT ch_motivo_rechazo CHECK (estado_reserva != 'rechazado' OR (estado_reserva = 'rechazado' AND detalles IS NOT NULL))
);

-- Crear la tabla libros
CREATE TABLE libros (
    isbn CHAR(20) PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    precio DECIMAL(10, 2),
    stock INT
);

-- Crear la tabla reserva_libros
CREATE TABLE reserva_libros (
    idReserva SMALLINT,
    isbn CHAR(20),
    PRIMARY KEY (idReserva, isbn),
    FOREIGN KEY (idReserva) REFERENCES reserva(idReserva),
    FOREIGN KEY (isbn) REFERENCES libros(isbn)
);

-- Crear la tabla curso
CREATE TABLE curso (
    idCurso TINYINT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Crear la tabla libros_curso (modificar idCurso de tinyint a int)
CREATE TABLE libros_curso (
    idCurso TINYINT,  -- Cambiar de tinyint a int
    isbn CHAR(20),
    PRIMARY KEY (idCurso, isbn),
    FOREIGN KEY (idCurso) REFERENCES curso(idCurso),
    FOREIGN KEY (isbn) REFERENCES libros(isbn)
);
