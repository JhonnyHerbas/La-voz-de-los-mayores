<?php

    include('conexion.php');

    $query = "select ID_H,TITULO_H,ID_U,DESCRIPCION_H from HISTORIA";
    $result =mysqli_query($connection, $query);

    if(!$result){
        die('Consulta Fallida'. mysqli_error($connection));
    }

    $json = array();
    while($row=mysqli_fetch_array($result)){
        $json[] = array(
            'ID_H' => $row['ID_H'],
            'TITULO_H' => $row['TITULO_H'],
            'ID_U' => $row['ID_U'],
            'DESCRIPCION_H' => $row['DESCRIPCION_H']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

?>