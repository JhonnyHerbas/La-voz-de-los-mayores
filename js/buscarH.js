$(function(){
    console.log('jquery esta funcionando');

    $('#busqueda').keyup(function(){
        let buscar=$('#busqueda').val();
        console.log(buscar);
        $.ajax({
            url : 'lista_historia1.php',
            type : 'POST',
            data : { buscar: buscar},
            success : function(response){
                console.log(response);
                let template = '';
                let historias = JSON.parse(response);
                historias.forEach(historia => {
                    template +=`
                                <br><table class="container-musica" idMusica="${historia.ID_H}">
                                        <tr>
                                            <td class='id'>${historia.ID_H}</td>
                                            <td class='plays'>
                                                <button class="lista">
                                                    <img class="play" src="play.png">
                                                </button>
                                            </td>
                                            <td class='nombre'>${historia.TITULO_H}</td>
                                            <td class='descripcion'>${historia.DESCRIPCION_H}</td>
                                        </tr>
                                    </table><br>
                    `
                });
                $('#lista-musica').html(template);
            }
        })
    })
})