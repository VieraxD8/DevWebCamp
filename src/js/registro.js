import Swal from 'sweetalert2'

(function(){

    let eventos = [];
    const resumen = document.querySelector('#registro__resumen');

    if(resumen) {
        const eventosBotones = document.querySelectorAll('.evento__agregar');
        eventosBotones.forEach(boton => boton.addEventListener('click', seleccionarEvento));

        const formularioRegistro = document.querySelector('#registro');
        formularioRegistro.addEventListener('submit', submitFormulario);

        mostrarEventos();

        function seleccionarEvento({target}){

            if(eventos.length < 5) {
                target.disabled = true;
                eventos = [...eventos, {
                    id: target.dataset.id,
                    titulo: target.parentElement.querySelector('.evento__nombre').textContent.trim()
                }];
            
                mostrarEventos();
            }else {
                Swal.fire({
                    title: 'Error',
                    text: 'Maximo 5 eventos por registros',
                    icon: 'error',
                    confirmButtonText: 'ok'

                });
            }

        
        }

        function mostrarEventos() {

            limpiarEventos();
            if(eventos.length > 0){
                eventos.forEach(evento => {
                    const eventosDom = document.createElement('DIV');
                    eventosDom.classList.add('registro__evento');
                    
                    const titulo = document.createElement('H3');
                    titulo.classList.add('registro__nombre');
                    titulo.textContent = evento.titulo;

                    const botonEliminar = document.createElement('BUTTON');
                    botonEliminar.classList.add('registro__eliminar');
                    botonEliminar.innerHTML = `<i class="fa-solid fa-trash"> </i>`;
                    botonEliminar.onclick = function(){
                        eliminarEventos(evento.id);
                    }


                    // renderizar en el html
                    eventosDom.appendChild(titulo);
                    eventosDom.appendChild(botonEliminar);
                    resumen.appendChild(eventosDom);


                });
            }else {
                const noREgistro = document.createElement('P');
                noREgistro.textContent = 'No hay eventos, añade 5 del lado izquierdo';
                noREgistro.classList.add('registro__texto');
                resumen.appendChild(noREgistro);


            }
        }

        function eliminarEventos(id) {
            eventos = eventos.filter( evento => evento.id !== id);
            const botonAgregar = document.querySelector(`[data-id="${id}"]`);
            botonAgregar.disabled = false;
            mostrarEventos();
        }

        function limpiarEventos(){
            while(resumen.firstChild){
                resumen.removeChild(resumen.firstChild);
            }
        }    

        async function submitFormulario(e) {
           
            e.preventDefault();
            // Obtener el regalo

            const regaloId = document.querySelector('#regalo').value;

            const eventosId = eventos.map(evento => evento.id);


            if(eventosId.length === 0 || regaloId === ''){

                Swal.fire({
                    title: 'Error',
                    text: 'Elige al menos un Evento y un Regalo',
                    icon: 'error',
                    confirmButtonText: 'ok'

                });

                return;

            }

            //Objeto de formdata

            const datos = new FormData();

            datos.append('eventos', eventosId);
            datos.append('regalo_id',regaloId);



            const url = '/finalizar-registro/conferencias';
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos 
            });
            const resultado = await respuesta.json();

            if(resultado.resultado){
                Swal.fire(
                    'Registro Exitoso',
                    'Tu conferencias se han almacenado y tu registro fue exitoso, te esperamos en DevWebCamp',
                    'success'
                ).then( () => location.href = `/boleto?id=${resultado.token}`);
            }else {
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un error',
                    icon: 'error',
                    confirmButtonText: 'ok'

                }).then( () => location.reload())
            }


        }
    }

})();