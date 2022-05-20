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
    <title>Registrar Audiolibro - La voz de los mayores</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/estilo_regAudiolibro.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/logo1.png">

</head>

<body>
    <header class="header">
        <div class="container-superior">
            <div>
                <a href="../indexU.php"><img class="logo" src="../img/logo1.png"> </a>
                <h1 class="title"> La Voz de los mayores</h1>
            </div>
            <nav class="navigation">
                <ul>
                    <li><a class="pagprinc" href="../html/audiolibroU.php">Atrás</a></li>
                </ul>
            </nav>

        </div>
    </header>

    <main class="main">
        <div class="container-medio">
            <div class="reg-audiolibro">
                <form action="subir_audiolibro.php" method="post" enctype="multipart/form-data" class="form-disable">
                    <h2 class="form-title">Registrar Audiolibro</h2>
                    <div class="block">
                        <label>Nombre : </label>
                        <input required type="text" maxlength="50" name="name" id="name"
                        required onkeyup = "this.value=this.value.replace(/^\s+/,'');"
                        >
                    </div>
                    <div class="block">
                        <label>Autor : </label>
                        <input required type="text" maxlength="50" name="autor" id="autor"
                        required onkeyup = "this.value=this.value.replace(/^\s+/,'');"
                        >
                    </div>
                    <div class="block">
                        <label>Narrador : </label>
                        <input  type="text" maxlength="50" name="narrador" id="narrador"
                         onkeyup = "this.value=this.value.replace(/^\s+/,'');"
                        >
                    </div>
                    <div class="block">
                        <label>Género : </label>
                        <select name="categoria" id="categoria">
                            <option value="Narrativo">Narrativo</option>   
                            <option value="Lirico">Lírico</option>
                            <option value="Dramatico">Dramático</option>
                            <option value="Didactico">Didáctico</option>
                        </select>
                    </div>
                    <div class="block">
                        <label>Audiolibro : </label>
                        <input required class="bot1" type="file" name="archivo" id="archivo"  accept=".mp3">
                    </div>

                    <div class="botones">
                        <button type="submit" class="registrar" name="registrar" id="registrar" disabled  >Registrar</button>
                        <button class="cancelar" type="reset" onclick = "desactivar()">Cancelar</button></a>
                    </div>
                </form>
            </div>
        </div>

    </main>
    <script src="../js/btnA.js"></script>
</body>

<footer>
    <div class="container-inferior">

    </div>

</footer>

</html>