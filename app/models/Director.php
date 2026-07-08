<?php
require_once __DIR__ . "/../../config/conexion.php";

class Director
{
    public static function obtenerTodos() {
        $conn = Conexion::conectar();
        $res = $conn->query("SELECT * FROM directores");
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public static function guardar($nombre, $nacionalidad) {
        $conn = Conexion::conectar();
        $nombre = $conn->real_escape_string($nombre);
        $nacionalidad = $conn->real_escape_string($nacionalidad);
        
        $sql = "INSERT INTO directores (nombre, nacionalidad) VALUES ('$nombre', '$nacionalidad')";
        return $conn->query($sql);
    }
}