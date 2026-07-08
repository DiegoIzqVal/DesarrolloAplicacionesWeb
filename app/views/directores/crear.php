<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Director</title>
    <link href="css/styles.css" rel="stylesheet" /> 
</head>
<body>
    <header>
        <h1 class="titulo">Registrar Director de la Película</span></h1>
    </header>

    <div class="nav-bg">
        <nav class="navegacion-principal contenedor">
            <a href="index.php">Gestión de Películas</a>
            <a href="index.php?action=crear_director" class="activo">Añadir Director</a>
        </nav>
    </div>

    <main class="sombra contenedor mt-4">
        <h2 style="text-align: center; color: var(--primario);">Nuevo Director</h2>
        
        <form id="formulario-director" action="index.php?action=guardar_director" method="POST" class="formulario">
            <div id="error-director" class="alerta oculto">Solo se permiten letras y espacios.</div>
            
            <div class="campo">
                <label for="nombre">Nombre del Director:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ej. Christopher Nolan">
            </div>
            <div class="campo">
                <label for="nacionalidad">Nacionalidad:</label>
                <input type="text" id="nacionalidad" name="nacionalidad" placeholder="Ej. Británico">
            </div>
            <button type="submit" class="boton w-100">Guardar Director</button>
        </form>
    </main>

    <footer class="footer mt-4">
        <p>Todos los derechos reservados por Diego Izquierdo. Proyecto Segundo Parcial </p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const formDirector = document.getElementById('formulario-director');
            if (formDirector) {
                formDirector.addEventListener('submit', function (e) {
                    const nombre = document.getElementById('nombre').value.trim();
                    const nacionalidad = document.getElementById('nacionalidad').value.trim();
                    const msjError = document.getElementById('error-director');
                    
                    const regexLetras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;

                    if (nombre === '' || nacionalidad === '') {
                        e.preventDefault(); 
                        msjError.textContent = 'Todos los campos son obligatorios.';
                        msjError.classList.remove('oculto');
                        setTimeout(() => { msjError.classList.add('oculto'); }, 3000);
                    } else if (!regexLetras.test(nombre) || !regexLetras.test(nacionalidad)) {
                        e.preventDefault(); 
                        msjError.textContent = 'Solo se permiten letras y espacios, sin símbolos o números.';
                        msjError.classList.remove('oculto');
                        setTimeout(() => { msjError.classList.add('oculto'); }, 3000);
                    }
                });
            }
        });
    </script>
</body>
</html>