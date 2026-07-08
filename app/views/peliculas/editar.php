<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Película</title>
    <link href="css/styles.css" rel="stylesheet" /> 
</head>
<body>
    <header>
        <h1 class="titulo">Edición de Películas</span></h1>
    </header>

    <div class="nav-bg">
        <nav class="navegacion-principal contenedor">
            <a href="index.php">Gestión de Películas</a>
            <a href="index.php?action=crear_director">Añadir Director</a>
        </nav>
    </div>

    <main class="sombra contenedor mt-4">
        <h2 style="text-align: center; color: var(--primario);">Modificar Registro</h2>
        
        <form id="formulario-pelicula" action="index.php?action=actualizar" method="POST" class="formulario">
            <input type="hidden" name="id" value="<?= $pelicula['id'] ?>">

            <div class="campo">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($pelicula['titulo']) ?>" required>
            </div>
            <div class="campo">
                <label for="genero">Género:</label>
                <input type="text" id="genero" name="genero" value="<?= htmlspecialchars($pelicula['genero']) ?>" required>
            </div>
            <div class="campo">
                <label for="anio">Año:</label>
                <input type="number" id="anio" name="anio" value="<?= $pelicula['anio'] ?>" required>
            </div>
            <div class="campo">
                <label for="director_id">Director:</label>
                <select id="director_id" name="director_id" required>
                    <?php foreach ($directores as $d): ?>
                        <option value="<?= $d['id'] ?>" <?= ($d['id'] == $pelicula['director_id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($d['nombre']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="boton w-100">Actualizar Película</button>
        </form>
    </main>
</body>
</html>