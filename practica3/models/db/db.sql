create table practica3;

use practica3;

CREATE TABLE citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_dueno VARCHAR(100) NOT NULl,
    nombre_mascota VARCHAR(100) NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL
);

INSERT INTO citas (nombre_dueno, nombre_mascota, fecha, hora) VALUES ('Juan Pérez', 'Firulais', '2024-12-01', '10:30:00');

INSERT INTO citas (nombre_dueno, nombre_mascota, fecha, hora) VALUES ('María López', 'Mia', '2024-12-02', '14:45:00');

INSERT INTO citas (nombre_dueno, nombre_mascota, fecha, hora) VALUES ('Carlos Gómez', 'Max', '2024-12-03', '09:15:00');
