<?php 
    //variable de sesion
    session_start();
    include 'include/conexion.php';
    //variable de sesion
    $usuario = $_SESSION['NOMBRE_U'];
    if(!isset($usuario)){
        header("location: index.html");
    }
    $query = "SELECT * FROM USUARIOS WHERE NOMBRE_U = '$usuario'";
    $ejecuta= $connection->query($query);
    $row = $ejecuta ->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La voz de los mayores</title>
    <link rel="stylesheet" href="css/estilos_indexU.css" />
    <link rel="shortcut icon" href="img/logo1.png">
</head>

<body>
    <div class="general">
        <div class="header">
            <div class="container-superior">
                <img class="logo" src="img/logo1.png">
                <h1 class="title">La Voz de los mayores</h1>
            </div>
            <div class="usuario">
                    <img src="img/usuario-de-perfil.png">
                    <h4 ><?php echo $usuario;?></h4>
            </div>
            <div class="cerrar_sesion">
                <a href="include/cerrars.php" class="cerrar"><img src="img/cerrar-sesion.png"></a>
                <h4>Cerrar sesión</h4>
            </div>
        </div>        
        <div class="container-medio">
            <div class="container-musica">
                <a class="logmusica" href="html/musicaU.php"><img class="logomusica" src="img/musica.png" /></a><br>
                <a class="musica">Música</a>
            </div>
            <div class="container-musica">
                <a class="logmusica" href="html/audiolibroU.php"><img class="logomusica" src="img/logo-audio.png" /></a><br>
                <a class="musica">Audiolibro</a>
            </div>
            <div class="container-musica">
                <a class="logmusica" href="html/historiaU.php"><img class="logomusica" src="img/microfono.png" /></a><br>
                <a class="musica">Historia</a>
            </div>
        </div>
        <div class="container-inferior">
            <ul>
                <li><a class="acercade" href="html/acercadeU.php">Acerca de</a></li>
                <li><a class="politica" href="html/politicaDePrivacidadU.php">Política de privacidad</a></li>
                <li><a class="ayuda" href="html/ayudaU.php">Ayuda</a></li>
                <li><a class="legal" href="html/legalU.php">Legal</a></li>
            </ul>
        </div>
    </div>
</body>

</html>