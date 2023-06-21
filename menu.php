<?php
// Gestionar errores
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

/**
 * Nombre: plantilla-CRUD.php
 * Autor: Iván Rodríguez
 * Fecha: 2023-06-05-17:30
 * Info: Plantilla genérica para proyectos PHP y BBDD
 */
?>

<?php
// Zona de Funciones y Clases
function conectar($servidor, $usuario, $clave, $bbdd)
{
    // Creamos la conexión
    $conexion = mysqli_connect($servidor, $usuario, $clave, $bbdd);
    // Si Conexión-> TRUE, todo correcto!
    // Si Conexión-> FALSE, error!
    if (!$conexion) {
        // Mostrar mensaje de error
        echo "Error mysqli_connect_errno(): mysqli_connect_error() <br />";
    }
    return $conexion;
}

function desconectar($conexion)
{
    if ($conexion) {
        // Cerramos la conexión
        mysqli_close($conexion);
    }
}

// Probamos la conexión
$conexion = conectar("localhost", "root", "root", "islantilla");

function instalar($conexion, $archivo)
{
    $sql = file_get_contents($archivo);
    $resultado = mysqli_multi_query($conexion, $sql);
    return $resultado;
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.bundle.min.js"></script>
    <style>
        h1 {
            padding: 10px;
        }

        h1,
        h2,
        p {
            margin: 10px;
        }
    </style>
</head>

<body class="bg-dark">


    <?php
    /* Logica de la página o Hilo Principal*/
    if (isset($_REQUEST['enviar'])) {
        $nombre = $_REQUEST['nombre'];
    }
    ?>

    <!-- plantilla.php con BootStrap 5.3-->
    <h1 class="bg-light rounded-pill">Menú Principal</h1>

    <main class="container">
        <section class="row">
        
            
                <?php
                if (isset($_REQUEST['enviar'])) {
                    echo $nombre;
                }
                ?>
            </p>
        </section>
        <br><br>

        <section class="row">
            
            <hr>
            <form class="col-9 bg-light p-3 rounded alert alert-info" method="post" action="#">
                <nav>
                    
                    <p><a href="islantilla.php" class="btn btn-success mt-4">Instalar BBDD</a></p>
                    <p><a href="reservas.php" class="btn btn-success mt-4">Ir a Reservas</a></p>

                </nav>
            </form>
        </section>
        <hr>


    </main>

</body>

</html>

<?php
// Al terminar la página, quitamos la conexión
desconectar($conexion);
?>