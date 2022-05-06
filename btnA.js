function habilitar1(){
    text_1 = document.getElementById("name").value;
    text_2 = document.getElementById("autor").value;
    text_3 = document.getElementById("narrador").value;
    text_4 = document.getElementById("categoria").value;
    text_5 = document.getElementById("archivo").value;
    const archivos = this.files;
    if(archivos){
        for(let i=0; i<archivos.length; i++){
            const archivo = archivos.item(i)
            if(!archivo.name.match(/.mp3$/i)||archivo.type != 'audio/mpeg'){
                alert('Formato incorrecto, seleccione un archivo mp3')
            }
        }
    }
    val = 0;

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
    if(text_5 == ""){
        val++;
    }
    if(val == 0){
        document.getElementById("registrar").disabled = false;
    }else{
        document.getElementById("registrar").disabled = true;
    }

}
document.getElementById("name").addEventListener("keyup", habilitar1);
document.getElementById("autor").addEventListener("keyup", habilitar1);
document.getElementById("narrador").addEventListener("keyup", habilitar1);
document.getElementById("categoria").addEventListener("change", habilitar1);
document.getElementById("archivo").addEventListener("change", habilitar1);