<?php
    //variable de sesion
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

require_once '../vendor/autoload.php';
require '../include/conexion.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=lavozdelosmayores-a1ece657111a.json');

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->SetScopes('https://www.googleapis.com/auth/drive.file');

try{

    $name = $_POST['name'];
    $artista = $_POST['artista'];
    $genero = $_POST['genero'];

    $name1 = str_replace("'", "’", $name);
    $artista1 = str_replace("'", "’", $artista);

//verificar que el nombre no se repita

    $query_nombre="SELECT * FROM `MUSICA` WHERE NOMBRE_M='$name1' and AUTOR_M='$artista1' ";
    $verificar_nombre = mysqli_query($connection,$query_nombre);
    $row_cont = $verificar_nombre->num_rows;
     if($row_cont> 0){
         echo "<!DOCTYPE html>
         <html lang='es'>
         <head>
           <title>Registrar Musica - La voz de los mayores</title>
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
                           <li><a class='pagprinc' href='../html/muscicaU.php'>Atrás</a></li>
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
                   <a href='register_musica.php'><button class='ok'>OK</button></a> 
         
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
          <title>Registrar Musica - La voz de los mayores</title>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-widtg, initiak-scale=1.0'>
        
          <link href='../css/style-ventana.css' rel='stylesheet'>
          <link rel='shortcut icon' href='../img/logo1.png'>
        </head>
        <body>
          <header class='header'>
              <div class='container-superior'>
                  <div>
                      <a href='indexU.html'><img class='logo' src='../img/logo1.png'> </a> 
                      <h1 class='title'>  La voz de los mayores</h1>   
                  </div>
                  <nav class='navigation'>
                      <ul>
                          <li><a class='pagprinc' href='../html/musicaU.php'>Atrás</a></li>
                      </ul>
                  </nav>
                  
              </div>
          </header>
          <main class='main'>
            <div class='container-medio'>
              <div class='ventana'>
                  <h2 class='form-title'>La canción no esta en formato mp3, intente con otra</h2>
                  <div class='block'>
                  </div>
                
        
              <div class='botones'>
                  <a href='register_musica.html'><button class='ok'>OK</button></a> 
        
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
         
    $sql = "INSERT INTO MUSICA(NOMBRE_M,AUTOR_M,ENLACE_M,CATEGORIA_M) VALUES ('$name1','$artista1','$ruta','$genero');";
    $mysqli->query($sql);
            
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
      <title>Registrar Musica - La voz de los mayores</title>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-widtg, initiak-scale=1.0'>
    
      <link href='../css/style-ventana.css' rel='stylesheet'>
      <link rel='shortcut icon' href='../img/logo1.png'>
    </head>
    <body>
      <header class='header'>
          <div class='container-superior'>
              <div>
                  <a href='indexU.html'><img class='logo' src='../img/logo1.png'> </a> 
                  <h1 class='title'>  La voz de los mayores</h1>   
              </div>
              <nav class='navigation'>
                  <ul>
                      <li><a class='pagprinc' href='../html/musicaU.php'>Atrás</a></li>
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
              <a href='../html/musicaU.php'><button class='ok'>OK</button></a> 
    
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