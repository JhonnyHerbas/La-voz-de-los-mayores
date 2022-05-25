<?php
    session_start();
    error_reporting(0);
    include('include/conexion.php'); 
    if(isset($_POST['entrar'])){
        $usuario= $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

         $usuario1 = str_replace("'", "’", $usuario);
        $contrasena1 = str_replace("'", "’", $contrasena);

         $query = "SELECT * FROM USUARIOS WHERE NOMBRE_U='$usuario1' and CONTRASENIA_U='$contrasena1' ";
         $validar_inicio = mysqli_query($connection , $query);
        $row_cont = $validar_inicio->num_rows;

         if($row_cont >0){
             $_SESSION['login']=TRUE;
             $_SESSION['NOMBRE_U']=$usuario1;
            header("location:indexU.php") ;
         }else{
            $mensaje.="<div class='message'><img src='img/error.png'>
                                <h4>Verifique sus datos. ¡Gracias!</h4></div>";      
         }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesión - La voz de los mayores</title>
    <link rel="stylesheet" href="css/estilos_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="shortcut icon" href="img/logo1.png">
</head>
<body>
    <div class="general">
        <div class="container-superior">
            <a href="index.html"><img class="logo" src="img/logo1.png"></a>
            <h1 class="title">La Voz de los mayores</h1>
            <div class="registro-inicio">
                <a href="index.html" class="atras">Atrás</a>
            </div>
        </div>                               
        <div class="container_medio">                       
                <div class="form">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <div class="titulo">
                            <h2 class="iniciar_sesion">Iniciar Sesión</h2>
                        </div><br>
                        <!--USUARIO-->
                        <div class="block">
                            <label for="usuario" class="name">Usuario</label><br>
                            <input type="text" id="usuario" class="lol" name="usuario" maxlength="50"
                             minlength="4" autocomplete="off" 
                              required onkeyup="this.value=this.value.replace(/^\s+/,'');">
                        </div>
                        <!--CONTRASEÑA-->
                        <div class="block">
                            <label for="contraseña">Contraseña</label><br>
                            <input type="password" name="contrasena" id="contraseña"  class="lol" maxlength="20" 
                            minlength="8" required onkeyup="this.value=this.value.replace(/^\s+/,'');">   
                        </div>
                        <div class="register">
                            <h3 class="salto">¿Aún no tienes una cuenta?</h3>
                            <a href="register.php" class="registers">Regístrate</a>
                        </div>
                        <!--BOTONES CONFIRMAR Y ACEPTAR-->                 
                        <div class="botones">
                            <button class="entrar" type="submit" id="entrar" name="entrar">Entrar</button>
                        </div>
                        <?php echo $mensaje?>
                    </form>
                </div>
        </div>
    </div>
 
    <footer>
        <div class="container-inferior">
    
        </div>    
    </footer>
</body>
</html>