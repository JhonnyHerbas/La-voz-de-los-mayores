<?php

    include('conexion.php');

    $id=$_POST['id'];

    $query = "select ID_H,TITULO_H,ID_U,ENLACE_H from HISTORIA where ID_H =$id";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Consulta Fallida'. mysqli_error($connection));
    }
    $json = array();
    while($row=mysqli_fetch_array($result)){
        $json[]=array(
            'ID_H' => $row['ID_H'],
            'TITULO_H' => $row['TITULO_H'],
            'ID_U' => $row['ID_U'],
            'ENLACE_H' => $row['ENLACE_H']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>