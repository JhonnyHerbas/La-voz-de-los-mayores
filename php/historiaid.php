<?php

    include('../include/conexion.php');

    $id=$_POST['id'];

    $query = "select H.ID_H,H.TITULO_H,U.NOMBRE_U,H.ENLACE_H from HISTORIA AS H, USUARIOS AS U  where H.ID_U=U.ID_U AND H.ID_H=$id";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Consulta Fallida'. mysqli_error($connection));
    }
    $json = array();
    while($row=mysqli_fetch_array($result)){
        $json[]=array(
            'ID_H' => $row['ID_H'],
            'TITULO_H' => $row['TITULO_H'],
            'NOMBRE_U' => $row['NOMBRE_U'],
            'ENLACE_H' => $row['ENLACE_H']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>