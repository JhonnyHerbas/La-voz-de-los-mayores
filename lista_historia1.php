<?php 
    include('conexion.php');

    $buscar= $_POST['buscar'];
    if(!empty($buscar)){
        $query = "select ID_H,TITULO_H, DESCRIPCION_H from HISTORIA where TITULO_H like '%".$buscar."%' ";
        $result=mysqli_query($connection, $query);
        if(!$result){
            die('Quey Error'.mysqli_error($connection));

        }
        $json=array();
        while($row = mysqli_fetch_array($result)){
            $json[]=array(
                'ID_H' => $row['ID_H'],
                'TITULO_H' => $row['TITULO_H'],
                'DESCRIPCION_H' => $row['DESCRIPCION_H']
            );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;
    }
?> 