<?php
require_once __DIR__ . "/../../config/conexion.php";

class Pelicula
{
    public static function obtenerTodas() {
        $conn = Conexion::conectar();
        $sql = "SELECT p.id, p.titulo, p.genero, p.anio, d.nombre AS director 
                FROM peliculas p 
                INNER JOIN directores d ON p.director_id = d.id";
        $res = $conn->query($sql);
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public static function guardar($titulo, $genero, $anio, $director_id) {
        $conn = Conexion::conectar();
        $titulo = $conn->real_escape_string($titulo);
        $genero = $conn->real_escape_string($genero);
        
        $sql = "INSERT INTO peliculas (titulo, genero, anio, director_id) 
                VALUES ('$titulo', '$genero', $anio, $director_id)";
        return $conn->query($sql);
    }

    public static function eliminar($id) {
        $conn = Conexion::conectar();
        return $conn->query("DELETE FROM peliculas WHERE id = $id");
    }
    public static function obtenerPorId($id) {
        $conn = Conexion::conectar();
        $res = $conn->query("SELECT * FROM peliculas WHERE id = $id");
        return $res->fetch_assoc();
    }

    public static function actualizar($id, $titulo, $genero, $anio, $director_id) {
        $conn = Conexion::conectar();
        $titulo = $conn->real_escape_string($titulo);
        $genero = $conn->real_escape_string($genero);
        
        $sql = "UPDATE peliculas SET titulo='$titulo', genero='$genero', anio=$anio, director_id=$director_id WHERE id=$id";
        return $conn->query($sql);
    }
}