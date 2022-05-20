<?php
    session_start();
    error_reporting(0);
    include('include/conexion.php');

    $nombre_usuario1= $_POST['nombre'];
    $correo1 = $_POST['correo'];
    $contrasena1 = $_POST['contrasena'];
    $confirmar_contrasena1= $_POST['contrasena2'];
    
    $nombre_usuario=str_replace("'", "`", $nombre_usuario1);
    $correo=str_replace("'", "`", $correo1);
    $contrasena=str_replace("'", "`", $contrasena1);
    $confirmar_contrasena=str_replace("'", "`", $confirmar_contrasena1);
//Confirmar contraseña
    if(strcmp($contrasena, $confirmar_contrasena) ==0){
        $query = "INSERT INTO USUARIOS(NOMBRE_U, CONTRASENIA_U, CORREO_U) 
        VALUES('$nombre_usuario','$contrasena', '$correo')"; 
        //verificar que el correo no se repita
        $query_correo="SELECT * FROM `USUARIOS` WHERE CORREO_U='$correo' ";
        $verificar_correo = mysqli_query($connection,$query_correo);
        $row_cont_C = $verificar_correo->num_rows;
        if($row_cont_C> 0){
            echo "<!DOCTYPE html>
                <html lang='es'>
                <head>
                  <title>La Voz de los mayores</title>
                  <meta charset='UTF-8'>
                  <meta name='viewport' content='width=device-widtg, initiak-scale=1.0'>
                
                  <link href='css/style-ventana2.css' rel='stylesheet'>
                  <link rel='shortcut icon' href='img/logo1.png'>
                </head>
                <body>
                    <header class='general'>
                            <div class='container-Msuperior'>
                                <a href='index.html'><img class='logo' src='img/logo1.png'></a>
                                <h1 class='title'>La Voz de los mayores</h1>
                            </div>
                            <div class='atras'>
                                <a href='index.html'><button class='Atras' type='submit' name='Atras'>Atrás</button></a>
                            </div>
                    </header>
                  <main class='main'>
                    <div class='container-medio'>
                      <div class='ventana'>
                          <h2 class='form-title'>Este correo  ya fue registrado, intente con otro correo</h2>
                          <div class='block'>
                          </div>
                        
                
                      <div class='botones'>
                          <a href='register.php'><button class='ok'>OK</button></a> 
                
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
        //verificar que el nombre no se repita
        $query_usuario="SELECT * FROM `USUARIOS` WHERE NOMBRE_U='$nombre_usuario' ";
        $verificar_usuario = mysqli_query($connection,$query_usuario);
        $row_cont_U = $verificar_usuario->num_rows;
        if($row_cont_U> 0){
            echo "<!DOCTYPE html>
            <html lang='es'>
            <head>
                <title>La Voz de los mayores</title>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-widtg, initiak-scale=1.0'>
            
                <link href='css/style-ventana2.css' rel='stylesheet'>
                <link rel='shortcut icon' href='img/logo1.png'>
            </head>
            <body>
                <header class='general'>
                    <div class='container-Msuperior'>
                        <a href='index.html'><img class='logo' src='img/logo1.png'></a>
                        <h1 class='title'>La Voz de los mayores</h1>
                    </div>
                    <div class='atras'>
                        <a href='index.html'><button class='Atras' type='submit' name='Atras'>Atrás</button></a>
                    </div>
                </header>
                <main class='main'>
                <div class='container-medio'>
                    <div class='ventana'>
                        <h2 class='form-title'>Este usuario ya fue registrado, intente con otro usuario</h2>
                        <div class='block'>
                        </div>
                    
            
                    <div class='botones'>
                        <a href='register.php'><button class='ok'>OK</button></a> 
            
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
            $ejecutar = mysqli_query($connection,$query);

            if($ejecutar){              
                $_SESSION['login']=TRUE;
                $_SESSION['NOMBRE_U']=$nombre_usuario;
               header("location:indexU.php") ;
            }else{
                echo "<!DOCTYPE html>
                <html lang='es'>
                <head>
                  <title>La Voz de los mayores</title>
                  <meta charset='UTF-8'>
                  <meta name='viewport' content='width=device-widtg, initiak-scale=1.0'>
                
                  <link href='css/style-ventana2.css' rel='stylesheet'>
                  <link rel='shortcut icon' href='img/logo1.png'>
                </head>
                <body>
                    <header class='general'>
                            <div class='container-Msuperior'>
                                <a href='index.html'><img class='logo' src='img/logo1.png'></a>
                                <h1 class='title'>La Voz de los mayores</h1>
                            </div>
                            <div class='atras'>
                                <a href='index.html'><button class='Atras' type='submit' name='Atras'>Atrás</button></a>
                            </div>
                    </header>
                  <main class='main'>
                    <div class='container-medio'>
                      <div class='ventana'>
                          <h2 class='form-title'>Intentelo de nuevo, usuario no creado</h2>
                          <div class='block'>
                          </div>
                        
                
                      <div class='botones'>
                          <a href='register.php'><button class='ok'>OK</button></a> 
                
                      </div>
                  </div>        
                </main>
           </body>
           
           <footer>
               <div class='container-inferior'>
           
               </div>
           
           </footer>
           
           </html>"; 
            }
       
    }else{
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
          <title>La Voz de los mayores</title>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-widtg, initiak-scale=1.0'>
        
          <link href='css/style-ventana2.css' rel='stylesheet'>
          <link rel='shortcut icon' href='img/logo1.png'>
        </head>
        <body>
            <header class='general'>
                    <div class='container-Msuperior'>
                        <a href='index.html'><img class='logo' src='img/logo1.png'></a>
                        <h1 class='title'>La Voz de los mayores</h1>
                    </div>
                    <div class='atras'>
                        <a href='index.html'><button class='Atras' type='submit' name='Atras'>Atrás</button></a>
                    </div>
            </header>
          <main class='main'>
            <div class='container-medio'>
              <div class='ventana'>
                  <h2 class='form-title'>Error en la confirmacion de contraseña, Intentelo de nuevo</h2>
                  <div class='block'>
                  </div>
                
        
              <div class='botones'>
                  <a href='register.php'><button class='ok'>OK</button></a> 
        
              </div>
          </div>        
        </main>
   </body>
   
   <footer>
       <div class='container-inferior'>
   
       </div>
   
   </footer>
   
   </html>"; 
    }
    msyqli_close($connection);      
?>