<?php

include 'api-google/vendor/autoload.php';
require 'conexion.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=lavozdelosmayores-a1ece657111a.json');

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->SetScopes('https://www.googleapis.com/auth/drive.file');

try{

    $name = $_POST['name'];
    $artista = $_POST['artista'];
    $genero = $_POST['genero'];

    $service = new Google_Service_Drive($client);
    $file_path = $_FILES['archivo']['tmp_name'];

    $file = new Google_Service_Drive_DriveFile();
    $file->setName($_FILES['archivo']['name']);

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $file_path);

    if(strcmp(strval($mime_type), "audio/mpeg")){
        echo "El archivo no es un audio";
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

    $sql = "INSERT INTO musica(NOMBRE_M,AUTOR_M,ENLACE_M,CATEGORIA_M,FECHAPUBLICACION_M,TIEMPO_M) VALUES ('$name','$artista','$ruta','$genero',NULL,NULL);";
    $mysqli->query($sql);

    echo "<!DOCTYPE html>
    <html lang='en'>
    
    <head>
        <title>La Voz de los mayores</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    
        <link href='css/style-regMus.css' rel='stylesheet' >
        <link rel='shortcut icon' href='logo1.png'>
    
    </head>
    
    <body>
        <header class='header'>
            <div class='container-superior'>
                <div>
                    <a href='index.html'><img class='logo' src='logo1.png'> </a>
                    <h1 class='title'> La Voz de los mayores</h1>
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
                <label>Musica Registrada</label>
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