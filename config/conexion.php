<?php
class Conexion
{
    public static function conectar()
    {
        $host = "sql112.infinityfree.com"; 
        
        $bd = "if0_42364237_proyecto_cine"; 
        
        $usuario = "if0_42364237"; 
        
        $clave = "lgBkpG68gTn"; 

        $conn = new mysqli($host, $usuario, $clave, $bd);

        if ($conn->connect_error) {
            die("Error de conexion: " . $conn->connect_error);
        }
        return $conn;
    }
}