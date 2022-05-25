<?php 
    include('../include/conexion.php');

    $buscar= $_POST['buscar'];
    $json=array();

    if(empty($buscar)){

        $query = "select ID_AL,NOMBRE_AL,AUTOR_AL,NARRADOR_AL,CATEGORIA_AL from  AUDIOLIBRO ORDER BY ID_AL";
        $result=mysqli_query($connection, $query);
        if(!$result){
            die('Quey Error'.mysqli_error($connection));
        
        }      
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'ID_AL' => $row['ID_AL'],
                'NOMBRE_AL' => $row['NOMBRE_AL'],
                'AUTOR_AL' => $row['AUTOR_AL'],
                'NARRADOR_AL'=> $row['NARRADOR_AL'],
                'CATEGORIA_AL' => $row['CATEGORIA_AL']
            );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;        
    }else{
       
        $query = "select ID_AL,NOMBRE_AL,AUTOR_AL,NARRADOR_AL,CATEGORIA_AL  from AUDIOLIBRO where NOMBRE_AL like '%".$buscar."%' 
        OR AUTOR_AL like '%".$buscar."%' OR CATEGORIA_AL like '%".$buscar."%' OR NARRADOR_AL like '%".$buscar."%' ORDER BY ID_AL";
        $result=mysqli_query($connection, $query);
        if(!$result){
            die('Quey Error'.mysqli_error($connection));
        
        }      
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'ID_AL' => $row['ID_AL'],
                'NOMBRE_AL' => $row['NOMBRE_AL'],
                'AUTOR_AL' => $row['AUTOR_AL'],
                'NARRADOR_AL'=> $row['NARRADOR_AL'],
                'CATEGORIA_AL' => $row['CATEGORIA_AL']
            );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;
    }
?>