<?php

require_once 'vendor/autoload.php';
require 'conexion.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=lavozdelosmayores-a1ece657111a.json');

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->SetScopes('https://www.googleapis.com/auth/drive.file');

try{

    $name = $_POST['name'];
    $artista = $_POST['artista'];
    $genero = $_POST['genero'];

//verificar que el nombre no se repita

    $query_nombre="SELECT * FROM `MUSICA` WHERE NOMBRE_M='$name' and AUTOR_M='$artista' ";
    $verificar_nombre = mysqli_query($connection,$query_nombre);
    $row_cont = $verificar_nombre->num_rows;
     if($row_cont> 0){
         echo "<!DOCTYPE html>
         <html lang='en'>
         <head>
           <title>La Voz de los mayores</title>
           <meta charset='UTF-8'>
           <meta name='viewport' content='width=device-widtg, initiak-scale=1.0'>
         
           <link href='css/style-ventana.css' rel='stylesheet'>
           <link rel='shortcut icon' href='logo1.png'>
         </head>
         <body>
           <header class='header'>
               <div class='container-superior'>
                   <div>
                       <a href='index.html'><img class='logo' src='logo1.png'> </a> 
                       <h1 class='title'>  La Voz de los mayores</h1>   
                   </div>
                   <nav class='navigation'>
                       <ul>
                           <li><a class='pagprinc' href='index.html'>Atrás</a></li>
                       </ul>
                   </nav>
                   
               </div>
           </header>
           <main class='main'>
             <div class='container-medio'>
               <div class='ventana'>
                   <h2 class='form-title'>La canción ya se encuentra registrada, intente con otra</h2>
                   <div class='block'>
                   </div>
                 
         
               <div class='botones'>
                   <a href='regMus.html'><button class='ok'>OK</button></a> 
         
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
    var_dump($_FILES);

    $file = new Google_Service_Drive_DriveFile();
    $file->setName($_FILES['archivo']['name']);

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = "audio/mpeg";

    $file->setParents(array("10fy5pjOMADjXY71BzPfcSUEJtAMrJ4Pr"));
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
         
    $sql = "INSERT INTO MUSICA(NOMBRE_M,AUTOR_M,ENLACE_M,CATEGORIA_M) VALUES ('$name','$artista','$ruta','$genero');";
    $mysqli->query($sql);
            
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
      <title>La Voz de los mayores</title>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-widtg, initiak-scale=1.0'>
    
      <link href='css/style-ventana.css' rel='stylesheet'>
      <link rel='shortcut icon' href='logo1.png'>
    </head>
    <body>
      <header class='header'>
          <div class='container-superior'>
              <div>
                  <a href='index.html'><img class='logo' src='logo1.png'> </a> 
                  <h1 class='title'>  La Voz de los mayores</h1>   
              </div>
              <nav class='navigation'>
                  <ul>
                      <li><a class='pagprinc' href='index.html'>Atrás</a></li>
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
              <a href='musica.html'><button class='ok'>OK</button></a> 
    
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