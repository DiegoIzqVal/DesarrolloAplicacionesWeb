<?php
require_once __DIR__ . "/../app/controllers/PeliculaController.php";
require_once __DIR__ . "/../app/controllers/DirectorController.php";

$peliculaController = new PeliculaController();
$directorController = new DirectorController();
$action = $_GET['action'] ?? 'listar';

if ($action === 'guardar') {
    $peliculaController->guardar();
} elseif ($action === 'eliminar') {
    $peliculaController->eliminar();
} elseif ($action === 'editar') {
    $peliculaController->editar();
} elseif ($action === 'actualizar') {
    $peliculaController->actualizar();
} elseif ($action === 'crear_director') {
    $directorController->crear();
} elseif ($action === 'guardar_director') {
    $directorController->guardar();
} else {
    $peliculaController->listar();
}