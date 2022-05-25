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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Reproductora Música - La voz de los mayores </title>
    <link rel="stylesheet" href="../css/estilo_musica.css" />
    <link rel="shortcut icon" href="../img/logo1.png">
</head>

<body>
    <div class="general">
        <div class="container-superior">
            <a href="../indexU.php"><img class="logo" src="../img/logo1.png"></a>
            <h1 class="title">La Voz de los mayores - Musicas </h1>
            <div class="registro-inicio">
                <a href="../php/register_musica.php" class="inicio">Registrar música</a>
                <a href="../include/cerrars.php" class="registro">Cerrar Sesión</a>
            </div>
        </div>

        <div class="container-medio">
            <br>
            <div class="busqueda">
                <div class="lupa">
                        <img class="lupita" src="../img/lupa.png" >
                    </div>
                <div class="buscador">
                    <input type="search" class="buscar" name="busqueda" id="busqueda" placeholder="Buscar"
                    maxlength="50"  spellcheck="false" >
                </div>
            </div>
            <br>
            <div class="title-musica">
                <table class="titulos">
                    <tr>
                        <td class='t1'><b>N°</b></td>
                        <td class='t2'><b>Música</b></td>
                        <td class='t3'><b>Artista</b></td>
                        <td class='t4'><b>Género</b></td>
                    </tr>
                </table>
            </div>
            <div class="lista-musica" id="lista-musica">
                        <h2 class='alerta'>No se ha registrado ningún archivo</h2>
            </div>
        </div>
        <div class="container-inferior">
            <div class="info-musica">
                <h1 id="nombreM"></h1>
                <h3 id="nombreA"></h3>
            </div>
            <div class="herramientas">
                <table>
                    <tr>
                        <td>
                            <button class="boton-anterior">
                                <img class="anterior" src="../img/siguiente musica.png">
                            </button>
                        </td>
                        <td class="tabla-audio">
                            <div class="audio-container" id="audio">
                                <audio controls class="audio-class" id="audio-player" autoplay>
                                    <source id="music-source" src="" type="audio/mp3">
                                </audio>
                            </div>
                        </td>
                        <td>
                            <button class="boton-siguiente">
                                <img class="anterior" src="../img/siguiente musica.png">
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../js/appPrueba.js"></script>
</body>

</html>