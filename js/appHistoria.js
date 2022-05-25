$(function () {
    console.log('jQuery esta funcionando');
    let idactual;
    let totalhistorias = 0
    actualizar();

    $('#busqueda').keyup(function(){
        let buscar=$('#busqueda').val();
        console.log(buscar);
        $.ajax({
            url : '../php/lista_historia1.php',
            type : 'POST',
            data : { buscar: buscar},
            success : function(response){
                console.log(response);
                let template = '';
                let historias = JSON.parse(response);
                totalhistorias = historias.length;
                let aux = historias.length;
                if(aux == 0){
                        template += 
                        `
                         <h2 class='alerta'>No se ha encontrado ningún resultado</h2>    
                        `;
            }else{
                historias.forEach(historia => {
                    template += 
                    `
                        <br><table class="container-musica" idMusica="${historia.ID_H}">
                            <tr>
                                <td class='id'>${historia.ID_H}</td>
                                <td class='plays'>
                                    <button class="lista">
                                        <img class="play" src="../img/play.png">
                                    </button>
                                </td>
                                <td class='nombre'>${historia.TITULO_H}</td>
                                <td class='autor'>${historia.NOMBRE_U}</td>
                                <td class='genero'>${historia.DESCRIPCION_H}</td>
                            </tr>
                        </table><br>
                `
                });
            }
                $('#lista-musica').html(template);
            }
        })
    })



    function actualizar() {
        $.ajax({
            url: '../php/lista_historia.php',
            type: 'GET',
            success: function (response) {
                let historias = JSON.parse(response);
                totalhistorias = historias.length;
                let template = '';
                historias.forEach(historia => {
                    template += `
                        <br><table class="container-musica" idMusica="${historia.ID_H}">
                            <tr>
                                <td class='id'>${historia.ID_H}</td>
                                <td class='plays'>
                                    <button class="lista">
                                        <img class="play" src="../img/play.png">
                                    </button>
                                </td>
                                <td class='nombre'>${historia.TITULO_H}</td>
                                <td class='autor'>${historia.NOMBRE_U}</td>
                                <td class='genero'>${historia.DESCRIPCION_H}</td>
                            </tr>
                        </table><br>
                    `
                });
                $('#lista-musica').html(template);
            }
        })
    }

    $(document).on('click', '.lista', function () {
        let element = $(this)[0].parentElement.parentElement.parentElement.parentElement;
        let id = $(element).attr('idMusica')
        idactual = Number(id);
        play(id)
    })
    function siguiente() {
        console.log("holamundo")
        if (idactual === totalhistorias) {
            alert('ya no hay mas historias para reproducir')
        }
        else {
            idactual = idactual + 1;
            play(idactual.toString())
        }

    }
    function anterior() {
        if (idactual === 1) {
            alert('no puede ir atras porque es la primera historia')
        }
        else {
            idactual = idactual - 1;
            play(idactual.toString())
        }


    }
    $(document).on('click', '.boton-siguiente', siguiente);
    $(document).on('click', '.boton-anterior', anterior);
    const aud = document.getElementById('audio-player')
    aud.addEventListener('ended', siguiente);
    const sourceAudio = document.getElementById("music-source")
    function play(id) {
        $.ajax({

            url: '../php/historiaid.php',
            type: 'POST',
            data: { id },
            success: function (response) {
                let enlace = JSON.parse(response);
                const player = document.getElementById('audio-player')
                let template1 = '';
                let template2 = '';
                let template3 = '';
                enlace.forEach(link => {
                    sourceAudio.setAttribute('src', `http://docs.google.com/uc?export=open&id=${link.ENLACE_H}`)

                    template2 += `<h1 id="nombreM">${link.TITULO_H}</h1>`
                    template3 += `<h3 id="nombreM">${link.NOMBRE_U}</h3>`
                }
                );

                $('#nombreM').html(template2);
                $('#nombreA').html(template3);
                player.load()

            }
        })
    }
})