<?php 
    include('conexion.php');

    $usuario1= $_POST['usuario'];
    $contrasena1 = $_POST['contrasena'];

    $usuario=str_replace("'", "`", $usuario1);
    $contrasena=str_replace("'", "`", $contrasena1);

    $queryNombre = "SELECT * FROM USUARIOS WHERE NOMBRE_U='$usuario' ";
    $queryContraseña=  "SELECT * FROM USUARIOS WHERE CONTRASENIA_U='$contrasena' ";
    $validar_nombre = mysqli_query($connection , $queryNombre);
    $validar_contraseña = mysqli_query($connection , $queryContraseña);

    $row_contN = $validar_nombre->num_rows;
    $row_contC = $validar_contraseña->num_rows;
    //caso de exito
    if($row_contN >0 and $row_contC>0){
       header("location: musica.html");
        exit();
    }else{
      /* if($row_contN >0 and $row_contC<1){
            echo "<!DOCTYPE html>
                <html lang='es'>
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
                              <h1 class='title'>  La Voz de los mayores</h1>   
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
                          <h2 class='form-title'>Contraseña incorrecta, revise Por favor!</h2>
                          <div class='block'>
                          </div>
                        
                
                      <div class='botones'>
                          <a href='iniciarSesion.html'><button class='ok'>OK</button></a> 
                
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
        }else{*/
            echo "<!DOCTYPE html>
                <html lang='es'>
                <head>
                  <title>La Voz de los mayores</title>
                  <meta charset='UTF-8'>
                  <meta name='viewport' content='width=device-widtg, initiak-scale=1.0'>
                
                  <link href='css/style-ventana2.css' rel='stylesheet'>
                  <link rel='shortcut icon' href='logo1.png'>
                </head>
                <body>
                  <header class='general'>
                        <div class='container-Msuperior'>
                            <a href='index.html'><img class='logo' src='logo1.png'></a>
                            <h1 class='title'>La Voz de los mayores</h1>
                        </div>
                        <div class='atras'>
                            <a href='index.html'><button class='Atras' type='submit' name='Atras'>Atrás</button></a>
                        </div>
                  </header>
                  <main class='main'>
                    <div class='container-medio'>
                      <div class='ventana'>
                          <h2 class='form-title'>Por favor verifique los datos ingresados, gracias!</h2>
                          <div class='block'>
                          </div>
                        
                
                      <div class='botones'>
                          <a href='iniciarSesion.html'><button class='ok'>OK</button></a> 
                
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
       // }
    }
?>