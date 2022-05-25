<?php 
    include('../include/conexion.php');

    $buscar= $_POST['buscar'];
    $json=array();
    

    if(empty($buscar)){

        $query = "select ID_M,NOMBRE_M,AUTOR_M,CATEGORIA_M from MUSICA ORDER BY ID_M";
        $result=mysqli_query($connection, $query);
        if(!$result){
            die('Quey Error'.mysqli_error($connection));
        
        }      
        while($row = mysqli_fetch_array($result)){
            $json[]=array(
                'ID_M' => $row['ID_M'],
                 'NOMBRE_M' => $row['NOMBRE_M'],
                'AUTOR_M' => $row['AUTOR_M'],
                'CATEGORIA_M' => $row['CATEGORIA_M']
            );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;


        
    }else{
       
        $query = "select ID_M,NOMBRE_M,AUTOR_M,CATEGORIA_M from MUSICA where NOMBRE_M like '%".$buscar."%' 
        OR AUTOR_M like '%".$buscar."%' OR CATEGORIA_M like '%".$buscar."%' ORDER BY ID_M";
        $result=mysqli_query($connection, $query);
        if(!$result){
            die('Quey Error'.mysqli_error($connection));
        
        }      
        while($row = mysqli_fetch_array($result)){
            $json[]=array(
                'ID_M' => $row['ID_M'],
                 'NOMBRE_M' => $row['NOMBRE_M'],
                'AUTOR_M' => $row['AUTOR_M'],
                'CATEGORIA_M' => $row['CATEGORIA_M']
            );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;

    }
    
?>