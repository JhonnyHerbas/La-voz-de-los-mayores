<?php 
    include('conexion.php');

    $buscar= $_POST['buscar'];
    if(!empty($buscar)){
        $query = "select ID_AL,NOMBRE_AL,AUTOR_AL,CATEGORIA_AL from AUDIOLIBRO where NOMBRE_AL like '%".$buscar."%' OR AUTOR_AL like '%" .$buscar."%' OR CATEGORIA_AL like '%".$buscar."%'";
        $result=mysqli_query($connection, $query);
        if(!$result){
            die('Quey Error'.mysqli_error($connection));
        
        }
        $json=array();
        while($row = mysqli_fetch_array($result)){
            $json[]=array(
                'ID_AL' => $row['ID_AL'],
                'NOMBRE_AL' => $row['NOMBRE_AL'],
                'AUTOR_AL' => $row['AUTOR_AL'],
                'CATEGORIA_AL' => $row['CATEGORIA_AL']
            );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;
    }
?>