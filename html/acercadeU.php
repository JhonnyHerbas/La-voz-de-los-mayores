<?php 
    //variable de sesion
    session_start();
    include '../include/conexion.php';
    //variable de sesion
    $usuario = $_SESSION['NOMBRE_U'];
    if(!isset($usuario)){
        header("location: ../index.html");
    }
    $query = "SELECT * FROM USUARIOS WHERE NOMBRE_U = '$usuario'";
    $ejecuta= $connection->query($query);
    $row = $ejecuta ->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Acerca de - La voz de los mayores</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../img/logo1.png">
        <link href="../css/estilo_acercade.css" rel="stylesheet">

    </head>
    <body>
        <header class="header">
            <div class="container logo-nav-container">
                <h2><img src="../img/logo1.png" alt=""> ACERCA DE NOSOTROS</h2>
                <nav class="navigation">
                    <ul>
                        <li><a class="pagprinc" href="../indexU.php">Atras</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main class="main">
            <div class="container">
                <h1>¿Quiénes somos?</h1>
                <p>La voz de los mayores es una aplicación web de música que te brinda acceso a más de 90 millones 
                    de canciones de todo el mundo y otras experiencias de audio como podcasts. 
                    También obtienes recomendaciones personalizadas y contenido exclusivo de La voz de los mayores.</p>

                <p>Combinamos contenido de calidad con los mejores algoritmos de música para ayudar a los fans a 
                    descubrir las canciones, los artistas y los álbumes que les gustan.</p>

                <p>Escucha música en línea, colecciona tus canciones favoritas, crea playlists, crea tu propio 
                    contenido y compártelas con amigos.</p>
                
                <p>Ponle música a tu vida con La voz de los mayores.</p>

            </div>
        </main>

    </body>
</html>