-- Insertar datos en la tabla administracion
INSERT INTO administracion (nombre, correo, contrasenia)
VALUES 
('Admin Uno', 'admin1@escuela.com', 'contrasenia123'),
('Admin Dos', 'admin2@escuela.com', 'contrasenia456'),
('Admin Tres', 'admin3@escuela.com', 'contrasenia789');

-- Insertar datos en la tabla usuarios
INSERT INTO usuarios (DNI, nombre, apellido, correo)
VALUES 
('12345678A', 'Juan', 'Pérez', 'juan.perez@escuela.com'),
('23456789B', 'Ana', 'Gómez', 'ana.gomez@escuela.com'),
('34567890C', 'Luis', 'Martínez', 'luis.martinez@escuela.com');

-- Insertar datos en la tabla curso
INSERT INTO curso (nombre)
VALUES 
('Ciclo Formativo de Grado Medio SMR'),
('Ciclo Formativo de Grado Superior DAW'),
('Ciclo Formativo de Grado Medio GA'),
('Bachillerato de Ciencias'),
('Bachillerato de Letras');

-- Insertar datos en la tabla libros
INSERT INTO libros (isbn, titulo, precio, stock)
VALUES 
('978-3-16-148410-0', 'Programación en PHP', 29.99, 50),
('978-0-13-110362-7', 'Estructuras de Datos', 34.99, 30),
('978-0-07-042264-9', 'Bases de Datos SQL', 39.99, 40),
('978-1-4919-2113-4', 'JavaScript Avanzado', 44.99, 60),
('978-0-321-68253-6', 'HTML y CSS desde cero', 19.99, 100);


-- Insertar datos en la tabla libros_curso
INSERT INTO libros_curso (idCurso, isbn)
VALUES 
(1, '978-3-16-148410-0'),  -- "Programación en PHP" está en SMR
(2, '978-0-13-110362-7'),  -- "Estructuras de Datos" está en DAW
(3, '978-0-07-042264-9'),  -- "Bases de Datos SQL" está en GA
(4, '978-1-4919-2113-4'),  -- "JavaScript Avanzado" está en Bachillerato Ciencias
(5, '978-0-321-68253-6');  -- "HTML y CSS desde cero" está en Bachillerato Letras
