<?php 
    include('../include/conexion.php');

    $buscar= $_POST['buscar'];
    $json=array();
    

    if(empty($buscar)){

        $query = "select H.ID_H,H.TITULO_H,U.NOMBRE_U,H.DESCRIPCION_H from HISTORIA AS H, USUARIOS AS U 
        WHERE  H.ID_U=U.ID_U";       
        $result=mysqli_query($connection, $query);
        if(!$result){
            die('Quey Error'.mysqli_error($connection));
        
        }      
        while($row = mysqli_fetch_array($result)){
            $json[]=array(
                'ID_H' => $row['ID_H'],
                'TITULO_H' => $row['TITULO_H'],
                'NOMBRE_U' => $row['NOMBRE_U'],
                'DESCRIPCION_H' => $row['DESCRIPCION_H']
            );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;
    }else{
        $query = "select H.ID_H,H.TITULO_H,U.NOMBRE_U,H.DESCRIPCION_H
                         from HISTORIA AS H, USUARIOS AS U 
                         where  H.ID_U=U.ID_U AND  (H.TITULO_H like '%".$buscar."%' OR U.NOMBRE_U like '%".$buscar."%'
                        OR H.DESCRIPCION_H like '%".$buscar."%' )";
        $result=mysqli_query($connection, $query);
        if(!$result){
            die('Quey Error'.mysqli_error($connection));       
        }      
        while($row = mysqli_fetch_array($result)){
            $json[]=array(
                'ID_H' => $row['ID_H'],
                'TITULO_H' => $row['TITULO_H'],
                'NOMBRE_U' => $row['NOMBRE_U'],
                'DESCRIPCION_H' => $row['DESCRIPCION_H']
            );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;
    }
?>