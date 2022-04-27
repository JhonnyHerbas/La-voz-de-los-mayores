<?php

    include('conexion.php');

    $nombre_usuario= $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $confirmar_contrasena = $_POST['contrasena2'];

    if(strcmp($contrasena, $confirmar_contrasena) ==0){
        $query = "INSERT INTO usuarios(NOMBRE_U, CONTRASENIA_U, CORREO_U) 
            VALUES('$nombre_usuario','$contrasena', '$correo')";
       

        //verificar que el correo no se repita
        $query_correo="SELECT * FROM `usuarios` WHERE CORREO_U='$correo' ";
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
        $query_usuario="SELECT * FROM `usuarios` WHERE NOMBRE_U='$nombre_usuario' ";
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
            echo '
                <script>
                    alert("Usuario creado exitosamente");
                    window.location = "index.html";
                </script>
            ';
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
            alert("Error en la confirmacion de contraseña, Intentelo de nuevo");
            window.location = "registro.html";
        </script>
    ';
    }
    msyqli_close($connection);
    
?>