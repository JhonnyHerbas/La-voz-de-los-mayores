<?php

    include('conexion.php');

    $nombre_usuario= $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $confirmar_contrasena = $_POST['contrasena2'];

    if(strcmp($contrasena, $confirmar_contrasena) ==0){
        if(validar_clave($contrasena)){
                    
                $query = "INSERT INTO USUARIOS(NOMBRE_U, CONTRASENIA_U, CORREO_U) 
                VALUES('$nombre_usuario','$contrasena', '$correo')";
        

            //verificar que el correo no se repita
            $query_correo="SELECT * FROM `USUARIOS` WHERE CORREO_U='$correo' ";
            $verificar_correo = mysqli_query($connection,$query_correo);
            $row_cont = $verificar_correo->num_rows;
            if($row_cont> 0){
                echo '
                    <script>
                        alert("Este correo ya fue registrado, intente con otro correo");
                        window.location = "registro.html";
                    </script>
                ';
                exit();
            }
            //verificar que el nombre no se repita
            $query_usuario="SELECT * FROM `USUARIOS` WHERE NOMBRE_U='$nombre_usuario' ";
            $verificar_usuario = mysqli_query($connection,$query_usuario);
            $row_cont_U = $verificar_usuario->num_rows;
            if($row_cont_U> 0){
                echo '
                    <script>
                        alert("Este usuario ya fue registrado, intente con otro usuario");
                        window.location = "registro.html";
                    </script>
                ';
                exit();
            }
            
            $ejecutar = mysqli_query($connection,$query);

            if($ejecutar){
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
                  <h2 class='form-title'>Usuario registrado exitosamente</h2>
                  <div class='block'>
                  </div>
                
        
              <div class='botones'>
                  <a href='regMus.html'><button class='ok'>OK</button></a> 
        
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
            }else{
                echo '
                    <script>
                        alert("Intentelo de nuevo, usuario no creado");
                        window.location = "registro.html";
                    </script>
                ';
            }
        }else{
            echo '
            <script>
                alert("Contraseña insegura, La contraseña debe contener una mayuscula, minuscula y numero");
                window.location = "registro.html";
            </script>
        ';
        }
    }else{
        echo '
        <script>
            alert("Error en la confirmacion de contraseña, Intentelo de nuevo");
            window.location = "registro.html";
        </script>
    ';
    }
    msyqli_close($connection);

    function validar_clave($contrasena){
        $res=true;
        if(!preg_match('`[a-z]`',$contrasena)){
            echo 'Clave debe tener una miniscula';
            $res=false;
        }
        if(!preg_match('`[A-Z]`',$contrasena)){
            echo 'Clave debe tener una mayuscula';
            $res=false;
        }
        if(!preg_match('`[0-9]`',$contrasena)){
            echo 'Clave debe tener una numero';
            $res=false;
        }
        return $res;
    }
?>