<?php
require_once __DIR__ . "/../models/Pelicula.php";
require_once __DIR__ . "/../models/Director.php";

class PeliculaController
{
    public function listar()
    {
        $peliculas = Pelicula::obtenerTodas();
        $directores = Director::obtenerTodos();
        require_once __DIR__ . "/../views/peliculas/listar.php";
    }

    public function guardar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $titulo = trim($_POST["titulo"] ?? "");
            $genero = trim($_POST["genero"] ?? "");
            $anio = $_POST["anio"] ?? 0;
            $director_id = $_POST["director_id"] ?? 0;


            if(!empty($titulo) && !empty($genero) && $anio > 0 && $director_id > 0){
                Pelicula::guardar($titulo, $genero, $anio, $director_id);
            }
            

            header("Location: index.php");
            exit();
        }
    }

    public function eliminar()
    {
        $id = $_GET["id"] ?? 0;
        if($id > 0){
            Pelicula::eliminar($id);
        }
        header("Location: index.php");
        exit();
    }
    public function editar()
    {
        $id = $_GET["id"] ?? 0;
        if ($id > 0) {
            
            $pelicula = Pelicula::obtenerPorId($id);
            $directores = Director::obtenerTodos();
            
            require_once __DIR__ . "/../views/peliculas/editar.php";
        } else {
            header("Location: index.php");
        }
    }

    public function actualizar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"] ?? 0;
            $titulo = trim($_POST["titulo"] ?? "");
            $genero = trim($_POST["genero"] ?? "");
            $anio = $_POST["anio"] ?? 0;
            $director_id = $_POST["director_id"] ?? 0;

            
            if($id > 0 && !empty($titulo) && !empty($genero) && $anio > 0 && $director_id > 0){
                Pelicula::actualizar($id, $titulo, $genero, $anio, $director_id);
            }
            
            header("Location: index.php");
            exit();
        }
    }
}