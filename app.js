$(function () {
    console.log('jQuery esta funcionando');
    actualizar();
    function actualizar(){
        $.ajax({
            url: 'listamusica.php',
            type: 'GET',
            success: function (response) {
                let musicas = JSON.parse(response);
                let template = '';
                musicas.forEach(musica => {
                    template += `
                        <br><table class="container-musica" idMusica="${musica.ID_M}">
                            <tr>
                                <td class='id'>${musica.ID_M}</td>
                                <td class='nombre'>${musica.NOMBRE_M}</td>
                                <td class='autor'>${musica.AUTOR_M}</td>
                                <td class='genero'>${musica.CATEGORIA_M}</td>
                                <td class='fechaPublicacion'>${musica.FECHAPUBLICACION_M}</td>
                                <td class='tiempo'>${musica.TIEMPO_M}</td>
                                <td>
                                    <button class="lista">
                                        play
                                    </button>
                                </td>
                            </tr>
                        </table><br>
                    `
                });
                $('#lista-musica').html(template);
            }
        })
    }
    
    $(document).on('click', '.lista', function(){
        let element = $(this)[0].parentElement.parentElement.parentElement.parentElement;
        let id = $(element).attr('idMusica')
        $.ajax({
            url: 'musicaid.php',
            type: 'POST',
            data: {id},
            success: function(response){
                console.log(response);
                let enlace = JSON.parse(response);
                let template1 ='';
                let template2 ='';
                let template3 ='';
                enlace.forEach(link =>{
                    template1 += `<audio controls class="audio-class" id="audio" autoplay>
                        <source src="https://drive.google.com/uc?export=download&amp;id=${link.ENLACE_M}" type="audio/mp3">
                    </audio>
                    `
                    template2 += `<h1 id="nombreM">${link.NOMBRE_M}</h1>`
                    template3 += `<h3 id="nombreM">${link.AUTOR_M}</h3>`
                }
                );
                $('#audio').html(template1);
                $('#nombreM').html(template2);
                $('#nombreA').html(template3);
            }
        })
    })

})
