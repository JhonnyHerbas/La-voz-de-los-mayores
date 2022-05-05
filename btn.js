function habilitar(){
    text_1 = document.getElementById("name").value;
    text_2 = document.getElementById("artista").value;
    text_3 = document.getElementById("genero").value;
    text_4 = document.getElementById("archivo").value;
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
    if(val == 0){
        document.getElementById("btn").disabled = false;
    }else{
        document.getElementById("btn").disabled = true;
    }

}
document.getElementById("name").addEventListener("keyup", habilitar);
document.getElementById("artista").addEventListener("keyup", habilitar);
document.getElementById("genero").addEventListener("change", habilitar);
document.getElementById("archivo").addEventListener("change", habilitar);
