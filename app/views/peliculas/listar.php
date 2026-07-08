<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de Películas</title>
    <link href="css/styles.css" rel="stylesheet" /> 
</head>
<body>
    <div class="header-contenedor">
    <h1 class="titulo">Panel de Control de Películas</span></h1>
</div>

    <div class="nav-bg">
        <nav class="navegacion-principal contenedor">
            <a href="index.php" class="activo">Gestión de Películas</a>
            <a href="index.php?action=crear_director">Añadir Director</a>
        </nav>
    </div>

    <main class="sombra contenedor mt-4">
        <h2>Registrar Nueva Película</h2>
        
        <form id="formulario-pelicula" action="index.php?action=guardar" method="POST" class="formulario">
            <div id="error-crud" class="alerta oculto">Todos los campos son obligatorios.</div>
            
            <div class="campo">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Ej. Titanic">
            </div>
            <div class="campo">
                <label for="genero">Género:</label>
                <input type="text" id="genero" name="genero" placeholder="Ej. Romance">
            </div>
            <div class="campo">
                <label for="anio">Año:</label>
                <input type="number" id="anio" name="anio" placeholder="Ej. 1997">
            </div>
            <div class="campo">
                <label for="director_id">Director:</label>
                <select id="director_id" name="director_id">
                    <option value="" disabled selected> Seleccionar director....</option>
                    <?php foreach ($directores as $d): ?>
                        <option value="<?= $d['id'] ?>"><?= htmlspecialchars($d['nombre']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="boton w-100">Guardar Película</button>
        </form>

        <hr>

        <h2>Películas Registradas</h2>
        
        <div class="contenedor-tabla">
            <table class="tabla-crud">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Género</th>
                        <th>Año</th>
                        <th>Director</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($peliculas)): ?>
                        <?php foreach ($peliculas as $p): ?>
                            <tr>
                                <td><strong><?= $p['id'] ?></strong></td>
                                <td><?= htmlspecialchars($p['titulo']) ?></td>
                                <td><?= htmlspecialchars($p['genero']) ?></td>
                                <td><?= $p['anio'] ?></td>
                                <td><?= htmlspecialchars($p['director']) ?></td>
                                <td>
                                    <a href="index.php?action=editar&id=<?= $p['id'] ?>" class="btn-editar">Editar</a>
                                    <a href="index.php?action=eliminar&id=<?= $p['id'] ?>" class="btn-eliminar" onclick="return confirm('¿Seguro que deseas eliminar esta película?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6">No hay películas registradas en el sistema.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="footer mt-4">
        <p>Todos los derechos reservados por Diego Izquierdo. Proyecto Segundo Parcial</p>
    </footer>

    <script src="js/app.js"></script>
</body>
</html>