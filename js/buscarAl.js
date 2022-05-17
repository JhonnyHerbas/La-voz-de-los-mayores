$(function(){
    console.log('jquery esta funcionando');

    $('#busqueda').keyup(function(){
        let buscar=$('#busqueda').val();
        console.log(buscar);
        $.ajax({
            url : 'listaAudiolibro1.php',
            type : 'POST',
            data : { buscar: buscar},
            success : function(response){
                console.log(response);
                let template = '';
                let libros = JSON.parse(response);
                libros.forEach(libro => {
                    template +=`
                                <br><table class="container-musica" idMusica="${libro.ID_AL}">
                                        <tr>
                                            <td class='id'>${libro.ID_AL}</td>
                                            <td class='plays'>
                                                <button class="lista">
                                                    <img class="play" src="play.png">
                                                </button>
                                            </td>
                                            <td class='nombre'>${libro.NOMBRE_AL}</td>
                                            <td class='autor'>${libro.AUTOR_AL}</td>
                                            <td class='genero'>${libro.CATEGORIA_AL}</td>
                                        </tr>
                                    </table><br>
                    `
                });
                $('#lista-musica').html(template);
            }
        })
    })
})