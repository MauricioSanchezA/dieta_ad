const formularios_ajax = document.querySelectorAll(".FormularioAjax");

function enviar_formulario_ajax(e) {
    e.preventDefault();

    let enviar = confirm("¿Quieres enviar el formulario?");

    if (enviar == true) {

        let data = new FormData(this);
        let method = this.getAttribute("method");
        let action = this.getAttribute("action");

        // Imprimir los datos del formulario en la consola
        for (let pair of data.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }

        let encabezados = new Headers();

        let config = {
            method: method,
            headers: encabezados,
            mode: 'cors',
            cache: 'no-cache',
            body: data
        };

        fetch(action,config)
        .then(respuesta => respuesta.text())
        .then(respuesta =>{ 
            let contenedor=document.querySelector(".form-rest");
            contenedor.innerHTML = respuesta;

            // Limpiar el formulario después de recibir la respuesta
            this.reset();  // limpia todos los campos del formulario

            // Limpiar el mensaje después de 3 segundos
            setTimeout(() => {
                contenedor.innerHTML = '';
            }, 10000);
            alert('Paciente actualizado correctamente');
            //location.reload(); // Recarga la página después de que se actualice
        });
    }
}

if (data.toLowerCase().includes("paciente registrado")) {
    setTimeout(() => {
        window.location.href = "index.php?vista=pacient_list";
    }, 15000);
}
formularios_ajax.forEach(formularios => {
    formularios.addEventListener("submit", enviar_formulario_ajax);
});
