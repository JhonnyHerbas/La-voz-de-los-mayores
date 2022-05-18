<?php 
    include('conexion.php');

    $buscar= $_POST['buscar'];
    $json=array();


    if(empty($buscar)){

        $query = "select ID_H,TITULO_H,DESCRIPCION_H from HISTORIA";
        $result=mysqli_query($connection, $query);
        if(!$result){
            die('Quey Error'.mysqli_error($connection));

        }      
        while($row = mysqli_fetch_array($result)){
            $json[]=array(
                'ID_H' => $row['ID_H'],
                'TITULO_H' => $row['TITULO_H'],
                'DESCRIPCION_H' => $row['DESCRIPCION_H']
            );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;



    }else{

        $query = "select ID_H,TITULO_H,DESCRIPCION_H from HISTORIA where TITULO_H like '%".$buscar."%' 
        OR DESCRIPCION_H like '%".$buscar."%'";
        $result=mysqli_query($connection, $query);
        if(!$result){
            die('Quey Error'.mysqli_error($connection));

        }      
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