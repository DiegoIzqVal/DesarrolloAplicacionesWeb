USE proyecto_cine;

CREATE TABLE directores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    nacionalidad VARCHAR(50) NOT NULL
);

CREATE TABLE peliculas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    genero VARCHAR(50) NOT NULL,
    anio INT NOT NULL,
    director_id INT NOT NULL,
    FOREIGN KEY (director_id) REFERENCES directores(id) ON DELETE CASCADE
);

INSERT INTO directores (nombre, nacionalidad) VALUES ('James Cameron', 'Canadiense');
