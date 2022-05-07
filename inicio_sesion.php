<?php 
    include('conexion.php');

    $usuario= $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $usuario1 = str_replace("'", "’", $usuario);
    $contrasena1 = str_replace("'", "’", $contrasena);

    $query = "SELECT * FROM USUARIOS WHERE NOMBRE_U='$usuario1' and CONTRASENIA_U='$contrasena1' ";
    $validar_inicio = mysqli_query($connection , $query);

    $row_cont = $validar_inicio->num_rows;

    if($row_cont >0){
       header("location: indexU.html");
        exit();
    }else{
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
          <title>La Voz de los mayores</title>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-widtg, initiak-scale=1.0'>
        
          <link href='css/style-ventana.css' rel='stylesheet'>
          <link rel='shortcut icon' href='logo1.png'>
        </head>
        <body>
          <header class='header'>
              <div class='container-superior'>
                  <div>
                      <a href='index.html'><img class='logo' src='logo1.png'> </a> 
                      <h1 class='title'>  La voz de los mayores</h1>   
                  </div>
                  <nav class='navigation'>
                      <ul>
                          <li><a class='pagprinc' href='index.html'>Atrás</a></li>
                      </ul>
                  </nav>
                  
              </div>
          </header>
          <main class='main'>
            <div class='container-medio'>
              <div class='ventana'>
                  <h2 class='form-title'> Por favor verifique los datos introducidos </h2>
                  <div class='block'>
                  </div>
                
        
              <div class='botones'>
                  <a href='IniciarSesion.html'><button class='ok'>OK</button></a> 
        
              </div>
          </div>        
        </main>
   </body>
   
   <footer>
       <div class='container-inferior'>
   
       </div>
   
   </footer>
   
   </html>";
            exit();
    }
?>
