$(function(){
    console.log('jquery esta funcionando');

    $('#busqueda').keyup(function(){
        let buscar=$('#busqueda').val();
        console.log(buscar);
        $.ajax({
            url : 'lista_musica1.php',
            type : 'POST',
            data : { buscar: buscar},
            success : function(response){
                console.log(response);
                let template = '';
                let musicas = JSON.parse(response);
                musicas.forEach(musica => {
                    template +=`
                                <br><table class="container-musica" idMusica="${musica.ID_M}">
                                        <tr>
                                            <td class='id'>${musica.ID_M}</td>
                                            <td class='plays'>
                                                <button class="lista">
                                                    <img class="play" src="play.png">
                                                </button>
                                            </td>
                                            <td class='nombre'>${musica.NOMBRE_M}</td>
                                            <td class='autor'>${musica.AUTOR_M}</td>
                                            <td class='genero'>${musica.CATEGORIA_M}</td>
                                        </tr>
                                    </table><br>
                    `
                });
                $('#lista-musica').html(template);
            }
        })
    })
})