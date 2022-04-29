<?php 
    include('conexion.php');

    $usuario= $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $query = "SELECT * FROM usuarios WHERE NOMBRE_U='$usuario' and CONTRASENIA_U='$contrasena' ";
    $validar_inicio = mysqli_query($connection , $query);

    $row_cont = $validar_inicio->num_rows;

    if($row_cont >0){
       header("location: index.html");
        exit();
    }else{
        echo '
        <script>
            alert("Por favor verifique los datos introducidos");
            window.location = "IniciarSesion.html";
        </script>
    ';
    exit();
    }
?>
