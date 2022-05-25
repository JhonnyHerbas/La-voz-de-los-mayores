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
        <title>Legal-  La voz de los mayores</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../img/logo1.png">
        <link href="../css/legal.css" rel="stylesheet">

    </head>
    <body>
        <header class="header">
            <div class="container logo-nav-container">
                <h2><img src="../img/logo1.png" alt=""> LEGAL</h2>
                <nav class="navigation">
                    <ul>
                        <li><a class="pagprinc" href="../indexU.php"">Atrás</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main class="main">
            <div class="container">
                <h1>Condiciones de uso del sitio</h1>
                <p>El sitio web de La voz de los mayores está gestionado por LVM S.A. (en adelante, "LA VOZ DE 
                    LOS MAYORES"), una empresa boliviana inscrita en el Registro Mercantil con el número 511 
                    716 573, y cuya oficina de registro está en Cochabamba, BOLIVIA.</p>

                <p>El Sitio de La voz de los mayores ofrece un lugar para foros, intercambio de información y 
                    asesoría entre usuarios y moderadores de los servicios de La voz de los mayores, o para el 
                    servicio de atención al cliente.</p>

                <p>Estas condiciones de uso (en adelante, las "Condiciones") regirán el acceso y el uso del 
                    Sitio de La voz de los mayores</p>

            </div>
        </main>

    </body>
</html>