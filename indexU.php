<?php 
    //variable de sesion
    session_start();
    include 'conexion.php';
    //variable de sesion
    $usuario = $_SESSION['NOMBRE_U'];
    if(!isset($usuario)){
        header("location: index1.php");
    }
    $query = "SELECT * FROM USUARIOS WHERE NOMBRE_U = '$usuario'";
    $ejecuta= $connection->query($query);
    $row = $ejecuta ->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La voz de los mayores</title>
    <link rel="stylesheet" href="css/estilo_index.css" />
    <link rel="shortcut icon" href="logo1.png">
</head>

<body>
    <div class="general">
        <div class="container-superior">
            <img class="logo" src="logo1.png">
            <h1 class="title">La Voz de los mayores</h1>
            <div class="registro-inicio">
                <h6><?php echo $usuario;?></h6>
                <a href="cerrars.php" class="inicio">Cerrar sesion</a>
            </div>
        </div>
        <div class="container-medio">
            <div class="container-musica">
                <a class="logmusica" href="musicaU.html"><img class="logomusica" src="logomusica.png" /></a><br>
                <a class="musica">Música</a>
            </div>
        </div>
        <div class="container-inferior">
            <ul>
                <li><a class="acercade" href="acercade.html">Acerca de</a></li>
                <li><a class="politica" href="politicaDePrivacidad.html">Política de privacidad</a></li>
                <li><a class="ayuda" href="ayuda.html">Ayuda</a></li>
                <li><a class="legal" href="legal.html">Legal</a></li>
            </ul>
        </div>
    </div>
</body>

</html>

