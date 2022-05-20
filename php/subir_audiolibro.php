<?php

 session_start();
 include '../include/conexion.php';
 //variable de sesion
 $usuario = $_SESSION['NOMBRE_U'];
 if(!isset($usuario)){
     header("location: ../index.html");
 }
 $query = "SELECT * FROM USUARIOS WHERE NOMBRE_U = '$usuario'";
 $ejecuta= $connection->query($query);
 $row = $ejecuta ->fetch_assoc();

$id_U =  $row['ID_U'];

require_once '../vendor/autoload.php';
require '../include/conexion.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=lavozdelosmayores-a1ece657111a.json');

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->SetScopes('https://www.googleapis.com/auth/drive.file');

try{

    $name = $_POST['name'];
    $autor = $_POST['autor'];
    $narrador = $_POST['narrador'];
    $categoria = $_POST['categoria'];

    $name1 = str_replace("'", "’", $name);
    $autor1 = str_replace("'", "’", $autor);
    $narrador1 = str_replace("'", "’", $narrador);
    if(empty($narrador1)){
        $narrador1="Anonimo";
    }
    $query_nombre="SELECT * FROM `AUDIOLIBRO` WHERE NOMBRE_AL='$name1' and AUTOR_AL='$autor1' and NARRADOR_AL='$narrador1'";
    $verificar_nombre = mysqli_query($connection,$query_nombre);
    $row_cont = $verificar_nombre->num_rows;
     if($row_cont> 0){
         echo "<!DOCTYPE html>
         <html lang='es'>
         <head>
           <title>Registrar Audiolibro - La voz de los mayores</title>
           <meta charset='UTF-8'>
           <meta name='viewport' content='width=device-widtg, initiak-scale=1.0'>
         
           <link href='../css/style-ventana.css' rel='stylesheet'>
           <link rel='shortcut icon' href='../img/logo1.png'>
         </head>
         <body>
           <header class='header'>
               <div class='container-superior'>
                   <div>
                       <a href='../indexU.php'><img class='logo' src='../img/logo1.png'> </a> 
                       <h1 class='title'>  La voz de los mayores</h1>   
                   </div>
                   <nav class='navigation'>
                       <ul>
                           <li><a class='pagprinc' href='../html/audiolibroU.phpl'>Atrás</a></li>
                       </ul>
                   </nav>
                   
               </div>
           </header>
           <main class='main'>
             <div class='container-medio'>
               <div class='ventana'>
                   <h2 class='form-title'>El audiolibro ya se encuentra registrado, intente con otro</h2>
                   <div class='block'>
                   </div>
                 
         
               <div class='botones'>
                   <a href='register_audiolibro.php'><button class='ok'>OK</button></a> 
         
               </div>
           </div>        
         </main>
    </body>
    
    <footer>
        <div class='container-inferior'>
    
        </div>
    
    </footer>
    
    </html>";
                exit();
            }

    $service = new Google_Service_Drive($client);
    $file_path = $_FILES['archivo']['tmp_name'];

    $file = new Google_Service_Drive_DriveFile();
    $file->setName($_FILES['archivo']['name']);

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $file_path);
    if(strcmp(strval($mime_type), "audio/mpeg")){
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
          <title>Registrar Audiolibro - La voz de los mayores</title>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-widtg, initiak-scale=1.0'>
        
          <link href='../css/style-ventana.css' rel='stylesheet'>
          <link rel='shortcut icon' href='../img/logo1.png'>
        </head>
        <body>
          <header class='header'>
              <div class='container-superior'>
                  <div>
                      <a href='../indexU.php'><img class='logo' src='../img/logo1.png'> </a> 
                      <h1 class='title'>  La voz de los mayores</h1>   
                  </div>
                  <nav class='navigation'>
                      <ul>
                          <li><a class='pagprinc' href='../html/audiolibroU.php'>Atrás</a></li>
                      </ul>
                  </nav>
                  
              </div>
          </header>
          <main class='main'>
            <div class='container-medio'>
              <div class='ventana'>
                  <h2 class='form-title'>El audio libro no esta en formato mp3, intente con otro</h2>
                  <div class='block'>
                  </div>
                
        
              <div class='botones'>
                  <a href='register_audiolibro.php'><button class='ok'>OK</button></a> 
        
              </div>
          </div>        
        </main>
   </body>
   
   <footer>
       <div class='container-inferior'>
   
       </div>
   
   </footer>
   
   </html>"; 
               exit();
            }

    $file->setParents(array("1mu7BR32cohgAH-SHqlz1tkOYIaZfH5_t"));
    $file->setDescription("Archivo cargado desde PHP");
    $file->setMimeType($mime_type);

    $result = $service->files->create(
        $file,
        array(
            'data' => file_get_contents($file_path),
            'mimeType' => $mime_type,
            'uploadType' => 'media'
        )
    );

    $ruta = $result->id;

    $sql = "INSERT INTO AUDIOLIBRO(ID_U,NOMBRE_AL,AUTOR_AL,NARRADOR_AL,CATEGORIA_AL,FECHAPUBLICACION_AL,ENLACE_AL) VALUES ('$id_U','$name1','$autor1','$narrador1','$categoria',NOW(),'$ruta');";
    $mysqli->query($sql);

    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
      <title>Registrar Audiolibro - La voz de los mayores</title>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-widtg, initiak-scale=1.0'>
    
      <link href='../css/style-ventana.css' rel='stylesheet'>
      <link rel='shortcut icon' href='../img/logo1.png'>
    </head>
    <body>
      <header class='header'>
          <div class='container-superior'>
              <div>
                  <a href='../indexU.php'><img class='logo' src='../img/logo1.png'> </a> 
                  <h1 class='title'>  La Voz de los mayores</h1>   
              </div>
              <nav class='navigation'>
                  <ul>
                      <li><a class='pagprinc' href='../html/audiolibroU.php'>Atrás</a></li>
                  </ul>
              </nav>
              
          </div>
      </header>
      <main class='main'>
        <div class='container-medio'>
          <div class='ventana'>
              <h2 class='form-title'>Se registro correctamente</h2>
              <div class='block'>
              </div>
            
    
          <div class='botones'>
              <a href='../html/audiolibroU.php'><button class='ok'>OK</button></a> 
    
          </div>
    
    
      </div>
      
                
        
    </main>
      
    
    </body>
    
    <footer>
      <div class='container-inferior'>
    
      </div>
      
    </footer>
    
    </html>";

}catch(Google_Service_Exception $gs){
    $mensaje = json_decode($gs->getMessage());
    echo $mensaje->error->message();
}catch(Exception $e){
    echo $e->getMessage();
}


?>