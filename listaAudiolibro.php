<?php

    include('conexion.php');

    $query = "select ID_AL,NOMBRE_AL,AUTOR_AL,CATEGORIA_AL from AUDIOLIBRO";
    $result =mysqli_query($connection, $query);

    if(!$result){
        die('Consulta Fallida'. mysqli_error($connection));
    }

    $json = array();
    while($row=mysqli_fetch_array($result)){
        $json[] = array(
            'ID_AL' => $row['ID_AL'],
            'NOMBRE_AL' => $row['NOMBRE_AL'],
            'AUTOR_AL' => $row['AUTOR_AL'],
            'CATEGORIA_AL' => $row['CATEGORIA_AL']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

?>