function habilitar(){
    text_1 = document.getElementById("name").value;
    text_2 = document.getElementById("artista").value;
    text_3 = document.getElementById("genero").value;
    text_4 = document.getElementById("archivo").value;
    val = 0;
    const archivos = this.files;
    if(archivos){
        for(let i=0; i<archivos.length; i++){
            const archivo = archivos.item(i)
            if(!archivo.name.match(/.mp3$/i)||archivo.type != 'audio/mpeg'){
                alert('Formato incorrecto, seleccione un archivo mp3')
            }
        }
    }
    if(text_1 == ""){
        val++;
    }
    if(text_2 == ""){
        val++;
    }
    if(text_3 == ""){
        val++;
    }
    if(text_4 == ""){
        val++;
    }
    if(val == 0){
        document.getElementById("btn").disabled = false;
        document.getElementById("btn").style = "background-color:#555855;cursor:pointer;";
    }else{
        document.getElementById("btn").disabled = true;
        document.getElementById("btn").style = "background-color:#efb364;cursor:default;";
    }

}
document.getElementById("name").addEventListener("keyup", habilitar);
document.getElementById("artista").addEventListener("keyup", habilitar);
document.getElementById("genero").addEventListener("change", habilitar);
document.getElementById("archivo").addEventListener("change", habilitar);

function desactivar(){
    document.getElementById("btn").disabled = true;
    document.getElementById("btn").style = "background-color:#efb364;cursor:default;";
}