<?php
//  A. Aqui usamamos el metodo GET (navegación)
$seccion = isset($_GET['seccion']) ? $_GET['seccion'] : 'inicio';

//  B. Aqui usamamos el metodo POST (formulario)
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$correo = isset($_POST['correo']) ? $_POST['correo'] : null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad de Guayaquil - Actividad PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
        }
        header {
            background-color: #003366; 
            color: white;
            text-align: center;
            padding: 20px 0;
        }
        header h1 {
            margin: 0;
            font-size: 24px;
        }
        nav {
            background-color: #004080;
            text-align: center;
            padding: 10px 0;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 3px;
        }
        nav a:hover, nav a.activo {
            background-color: #0059b3;
        }
        .contenedor {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            flex: 1; 
            width: 90%;
        }
        h2 {
            color: #003366;
            border-bottom: 2px solid #003366;
            padding-bottom: 5px;
        }
        .img-ug {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }
        input[type="text"], input[type="email"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            background-color: #003366;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
            font-weight: bold;
        }
        button:hover {
            background-color: #004080;
        }
        .resultado {
            background-color: #e6f2ff;
            border: 1px solid #b3d9ff;
            padding: 15px;
            margin-top: 20px;
            border-radius: 4px;
            color: #003366;
        }
        footer {
            background-color: #003366;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 40px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Universidad de Guayaquil</h1>
        <p>Sistema de Navegación y Contacto</p>
    </header>

    <nav>
        <a href="?seccion=inicio" class="<?php echo $seccion == 'inicio' ? 'activo' : ''; ?>">Inicio</a>
        <a href="?seccion=unidades" class="<?php echo $seccion == 'unidades' ? 'activo' : ''; ?>">Unidades Académicas</a>
        <a href="?seccion=contacto" class="<?php echo $seccion == 'contacto' ? 'activo' : ''; ?>">Contacto</a>
    </nav>

    <div class="contenedor">
        <h2>Sección: <?php echo ucfirst(str_replace('-', ' ', htmlspecialchars($seccion))); ?></h2>

        <?php if ($seccion == 'inicio'): ?>
            <p>Bienvenido al portal. Selecciona una opción en el menú superior para navegar.</p>
            <img src="https://www.ug.edu.ec/wp-content/uploads/2024/08/SEOgenerico.jpg" alt="Logo Universidad de Guayaquil" class="img-ug">
            
        <?php elseif ($seccion == 'unidades'): ?>
            <p>Has seleccionado la sección Carreras de la Facultad de Ciencias Matematicas y Fisicas.</p>
            <ul>
                <li>- Ingeniería en Software</li>
                <li>- Sistemas de Información</li>
                <li>- Ingenieria en Inteligencia Artifical</li>
            </ul>

        <?php elseif ($seccion == 'contacto'): ?>
            <p>Ingresa tus datos para comunicarte con nosotros.</p>
            
            <form method="POST" action="?seccion=contacto">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" required>
                
                <label for="correo">Correo Institucional:</label>
                <input type="email" id="correo" name="correo" required>
                
                <button type="submit">Enviar Información</button>
            </form>
        <?php endif; ?>

        <?php if ($nombre && $correo): ?>
            <div class="resultado">
                <h3> Datos Recibidos Correctamente!!</h3>
                <p><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre); ?></p>
                <p><strong>Correo:</strong> <?php echo htmlspecialchars($correo); ?></p>
            </div>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Diego Izquierdo. Todos los derechos reservados.</p>
    </footer>

</body>
</html>