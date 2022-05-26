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
  <title>Registrar Música - La voz de los mayores</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../css/style-regMus.css" rel="stylesheet">
  <link rel="shortcut icon" href="../img/logo1.png">

<body>
  <header class="header">
    <div class="container-superior">
      <div>
        <a href="../indexU.php"><img class="logo" src="../img/logo1.png"> </a>
        <h1 class="title"> La Voz de los mayores</h1>
      </div>
      <nav class="navigation">
        <ul>
          <li><a class="pagprinc" href="../html/musicaU.php">Atrás</a></li>
        </ul>
      </nav>

    </div>
  </header>
  <main class="main">
    <div class="container-medio">
      <div class="form-register">
        <form action="subir_musica.php" method="post" enctype="multipart/form-data">
          <h2 class="form-title">Registrar Música</h2>
          <div class="block">
            <label>Nombre : </label>
            <input required name="name" id="name" type="text" maxlength="50" 
            required onkeyup = "this.value=this.value.replace(/^\s+/,'');"
            spellcheck="false" minlength="3">

          </div>
          <div class="block">
            <label> Artista : </label>
            <input required name="artista" id="artista" type="text" maxlength="50" 
            required onkeyup = "this.value=this.value.replace(/^\s+/,'');"
            spellcheck="false" minlength="3">
          </div>
          <div class="block">
            <label> Género : </label>
            <select name="genero" id="genero">
              <option>Rap</option>
              <option>K-pop</option>
              <option>Rock</option>
              <option>Electrónica</option>
              <option>Pop</option>
              <option>Clásica</option>
              <option>Country</option>
              <option>Metal</option>
              <option>Folklorica</option>
              <option>Jazz</option>
              <option>Salsa</option>
              <option>Reguetón</option>
              <option>Punk</option>
              <option>Disco</option>
              <option>Hip Hop</option>
              <option>Instrumental</option>
            </select>
          </div>
          <div class="block">
            <label>Canción: </label>
            <input required class="bot1" name="archivo" id="archivo" type="file" accept=".mp3">
          </div>

          <div class="botones">
            <a href=""><button id="btn" class="registrar" type="submit" name="registrar" disabled >Registrar</button></a>
            
            <button class="cancelar" type="reset" onclick = "desactivar()">Cancelar</button>
          </div>
        </form>

      </div>

  

  </main>

  <script src="../js/btnM.js"></script>
</body>

<footer>
  <div class="container-inferior">

  </div>

</footer>

</html>