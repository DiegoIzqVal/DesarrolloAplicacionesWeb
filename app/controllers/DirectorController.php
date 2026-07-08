<?php
require_once __DIR__ . "/../models/Director.php";

class DirectorController
{
    public function crear()
    {
        require_once __DIR__ . "/../views/directores/crear.php";
    }

    public function guardar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = trim($_POST["nombre"] ?? "");
            $nacionalidad = trim($_POST["nacionalidad"] ?? "");

            $patron = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/";

            if(!empty($nombre) && !empty($nacionalidad)){
                if(preg_match($patron, $nombre) && preg_match($patron, $nacionalidad)) {
                    Director::guardar($nombre, $nacionalidad);
                }
            }
            
            header("Location: index.php");
            exit();
        }
    }
}