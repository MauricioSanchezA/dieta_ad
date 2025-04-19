<div class="container is-fluid mb-6">
    <h1 class="title">PACIENTES</h1>
    <h2 class="subtitle">Ingresar DIETA DE PACIENTES</h2>
</div>

<!-- jQuery (primero) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery UI (después de jQuery) -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<!-- jQuery UI CSS (opcional, para estilos del autocomplete) -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

<div class="container pb-6 pt-6">
    <div class="form-rest mb-6 mt-6"></div>

    <form action="./php/paciente_guardar.php" method="POST" class="FormularioAjax box" autocomplete="off">

        <!-- Información de Documento -->
        <div class="columns">
            <div class="column">
                <label class="label">Número de Documento</label>
                <input class="input" type="number" placeholder="Ingrese numero de identificacion sin puntos" name="paciente_numdoc" maxlength="15" required>
            </div>
            <div class="column is-one-third">
                <label class="label">Tipo de Documento</label>
                <div class="select is-fullwidth">
                    <select name="paciente_tipodoc" required>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="CC">Cédula de ciudadanía</option>
                        <option value="TI">Tarjeta de Identidad</option>
                        <option value="CE">Cédula de Extranjería</option>
                        <option value="CN">Cédula de Nacionalización</option>
                        <option value="ME">Menor de edad</option>
                        <option value="PE">Permiso Especial Permanencia</option>
                        <option value="PT">Permiso Temporal</option>
                        <option value="PP">Pasaporte</option>
                        <option value="NU">Número Único Identificación</option>
                        <option value="RC">Registro Civil</option>
                        <option value="CD">Carnet Diplomático</option>
                        <option value="SC">Salvoconducto</option>
                        <option value="AS">Adulto sin identificación</option>
                        <option value="OT">Otro</option>
                    </select>
                </div>
            </div>
            <div class="column">
                <label class="label">Número de Cama</label>
                <input class="input" type="text" placeholder="Ingrese la cama" name="cama" pattern="[a-zA-Z0-9\-]{1,10}" maxlength="10" required>
            </div>
        </div>

        <!-- Nombre y Apellido -->
        <div class="columns">
            <div class="column">
                <label class="label">Nombres</label>
                <input class="input" type="text" placeholder="Ingrese nombre Completo" name="paciente_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s.,\-()!?]{3,40}" maxlength="40" required>
            </div>
            <div class="column">
                <label class="label">Apellidos</label>
                <input class="input" type="text" placeholder="Ingrese Apellidos Completos" name="paciente_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s.,\-()!?]{3,40}" maxlength="40" required>
            </div>
        </div>

        <!-- Grupo, Subgrupo, Comida -->
        <div class="columns">
            <!-- Grupo -->
            <div class="column">
                <label class="label">Grupo</label>
                <div class="select is-fullwidth">
                    <select name="paciente_grupo" id="paciente_grup" required>
                        <option value="">Seleccione un grupo</option>
                        <option value="HOSP MEDICINA INTERNA">HOSP MEDICINA INTERNA</option>
                        <option value="HOSP CIRUGIA">HOSP CIRUGIA</option>
                        <option value="HOSP NEUROCIRUGIA">HOSP NEUROCIRUGIA</option>
                        <option value="HOSP GINECOOBSTETRICA">HOSP GINECOOBSTETRICA</option>
                        <option value="HOSP PEDIATRIA SALAS">HOSP PEDIATRIA SALAS</option>
                        <option value="HOSP SERVICIO ESPECIAL">HOSP SERVICIO ESPECIAL</option>
                        <option value="HOSP CIRUGIA PEDIATRICA">HOSP CIRUGIA PEDIATRICA</option>
                        <option value="URGENCIAS ADULTOS">URGENCIAS ADULTOS</option>
                        <option value="HOSP URGENCIAS PEDIATRIA">HOSP URGENCIAS PEDIATRIA</option>
                        <option value="HOSP ONCOLOGIA PEDIATRICA">HOSP ONCOLOGIA PEDIATRICA</option>
                        <option value="HOSP BRAQUITERAPIA">HOSP BRAQUITERAPIA</option>
                        <option value="HOSP UCI ADULTOS">HOSP UCI ADULTOS</option>
                        <option value="HOSP NEONATOS">HOSP NEONATOS</option>
                        <option value="HOSP UCI PEDIATRIA">HOSP UCI PEDIATRIA</option>
                        <option value="UNID INTERMEDIOS ADULTOS">UNID INTERMEDIOS ADULTOS</option>
                        <option value="UNID INTERMEDIOS PEDIATRIA">UNID INTERMEDIOS PEDIATRIA</option>
                        <option value="HOSP RN BASICOS">HOSP RN BASICOS</option>
                        <option value="HOSP RECIEN NACIDOS PUERP">HOSP RECIEN NACIDOS PUERP</option>
                        <option value="HOSP QUEMADOS PEDIATRIA">HOSP QUEMADOS PEDIATRIA</option>
                        <option value="HOSP QUEMADOS ADULTOS">HOSP QUEMADOS ADULTOS</option>
                        <option value="SALA DE PARTOS">SALA DE PARTOS</option>
                        <option value="HOSPITALIZACION ADULTOS">HOSPITALIZACION ADULTOS</option>
                        <option value="UNIDAD CRITICA OBSTETRICA">UNIDAD CRITICA OBSTETRICA</option>
                        <option value="INTERMEDIOS OBSTETRICIA">INTERMEDIOS OBSTETRICIA</option>
                    </select>
                </div>
            </div>

            <!-- Subgrupo -->
            <div class="column">
                <label class="label">Subgrupo</label>
                <div class="select is-fullwidth">
                    <select name="paciente_subgrupo" id="paciente_subgrup" required>
                        <option value="">Seleccione un subgrupo</option>
                        <option value="BRAQUITERAPIA">BRAQUITERAPIA</option>
                        <option value="GINECOLOGIA ESTACION 1">GINECOLOGIA ESTACION 1</option>
                        <option value="INTERMEDIOS ADULTOS ESTACION 1">INTERMEDIOS ADULTOS ESTACION 1</option>
                        <option value="INTERMEDIOS NEONATOLOGIA">INTERMEDIOS NEONATOLOGIA</option>
                        <option value="INTERMEDIOS PEDIATRIA">INTERMEDIOS PEDIATRIA</option>
                        <option value="HOSPITALIZACION EXPANSION 2 PISO">HOSPITALIZACION EXPANSION 2 PISO</option>
                        <option value="NEUROCIRUGIA">NEUROCIRUGIA</option>
                        <option value="NEONATOS INFECTOLOGIA">NEONATOS INFECTOLOGIA</option>
                        <option value="NEONATOLOGIA BASICO">NEONATOLOGIA BASICO</option>
                        <option value="PEDIATRIA CIRUGIA">PEDIATRIA CIRUGIA</option>
                        <option value="PEDIATRIA INFECTO">PEDIATRIA INFECTO</option>
                        <option value="PEDIATRIA LACTANTES">PEDIATRIA LACTANTES</option>
                        <option value="PEDIATRIA MEDICINA INTERNA">PEDIATRIA MEDICINA INTERNA</option>
                        <option value="PEDIATRICA ONCOLOGIA">PEDIATRICA ONCOLOGIA</option>
                        <option value="PEDIATRIA ORTOPEDIA">PEDIATRIA ORTOPEDIA</option>
                        <option value="PEDIATRIA QUEMADOS">PEDIATRIA QUEMADOS</option>
                        <option value="QUEMADOS ADULTOS">QUEMADOS ADULTOS</option>
                        <option value="QUIRURGICAS ESTACION ENFERMERIA 1">QUIRURGICAS ESTACION ENFERMERIA 1</option>
                        <option value="SERVICIO ESPECIAL ESTACION ENFERMERIA 1">SERVICIO ESPECIAL ESTACION ENFERMERIA 1</option>
                        <option value="ESTACION UCI ADULTOS 1">ESTACION UCI ADULTOS 1</option>
                        <option value="UCI NEONATOLOGIA">UCI NEONATOLOGIA</option>
                        <option value="UCI PEDIATRIA">UCI PEDIATRIA</option>
                        <option value="URGENCIAS HOMBRES">URGENCIAS HOMBRES</option>
                        <option value="URGENCIAS PEDIATRIA">URGENCIAS PEDIATRIA</option>
                        <option value="URGENCIAS SERVICIO ESPECIAL">URGENCIAS SERVICIO ESPECIAL</option>
                        <option value="RECUPERACION (CIRUGIA)">RECUPERACION (CIRUGIA)</option>
                        <option value="SALA DE PARTOS">SALA DE PARTOS</option>
                        <option value="ESTACION PEDIATRIA SALAS 1">ESTACION PEDIATRIA SALAS 1</option>
                        <option value="HOSPITALIZACION EXPANSION 3 PISO (ONCOLOGIA ADULT)">HOSPITALIZACION EXPANSION 3 PISO (ONCOLOGIA ADULT)</option>
                        <option value="UNIDAD CRITICA OBSTETRICA">UNIDAD CRITICA OBSTETRICA</option>
                        <option value="URGENCIAS MUJERES">URGENCIAS MUJERES</option>
                        <option value="URGENCIAS EXPANSION">URGENCIAS EXPANSION</option>
                        <option value="URGENCIAS PASILLO">URGENCIAS PASILLO</option>
                        <option value="NOUSAR">NOUSAR</option>
                        <option value="HOSPITALIZACION 4 PISO ESTACION ENFERMERIA 1">HOSPITALIZACION 4 PISO ESTACION ENFERMERIA 1</option>
                        <option value="INTERMEDIOS OBSTETRICIA">INTERMEDIOS OBSTETRICIA</option>
                        <option value="SERVICIO ESPECIAL ESTACION ENFERMERIA 2">SERVICIO ESPECIAL ESTACION ENFERMERIA 2</option>
                        <option value="SERVICIO ESPECIAL ESTACION ENFERMERIA 3">SERVICIO ESPECIAL ESTACION ENFERMERIA 3</option>
                        <option value="HOSPITALIZACION 4 PISO ESTACION ENFERMERIA 2">HOSPITALIZACION 4 PISO ESTACION ENFERMERIA 2</option>
                        <option value="HOSPITALIZACION 4 PISO ESTACION ENFERMERIA 3">HOSPITALIZACION 4 PISO ESTACION ENFERMERIA 3</option>
                        <option value="QUIRURGICAS ESTACION ENFERMERIA 2">QUIRURGICAS ESTACION ENFERMERIA 2</option>
                        <option value="QUIRURGICAS ESTACION ENFERMERIA 3">QUIRURGICAS ESTACION ENFERMERIA 3</option>
                        <option value="GINECOLOGIA ESTACION 2">GINECOLOGIA ESTACION 2</option>
                        <option value="GINECOLOGIA ESTACION 3">GINECOLOGIA ESTACION 3</option>
                        <option value="ESTACION PEDIATRIA SALAS 2">ESTACION PEDIATRIA SALAS 2</option>
                        <option value="ESTACION UCI ADULTOS 2">ESTACION UCI ADULTOS 2</option>
                        <option value="INTERMEDIOS ADULTOS ESTACION 2">INTERMEDIOS ADULTOS ESTACION 2</option>
                        <option value="TRANSICION">TRANSICION</option>
                    </select>
                </div>
            </div>

            <!-- Comida -->
            <div class="column">
                <label class="label">Comida</label>
                <div class="select is-fullwidth">
                    <select name="paciente_comida" id="paciente_comida" required>
                        <option value="">Seleccione una comida</option>
                        <option value="DESAYUNO">DESAYUNO</option>
                        <option value="MEDIA MAÑANA">MEDIA MAÑANA</option>
                        <option value="ALMUERZO">ALMUERZO</option>
                        <option value="MEDIA TARDE">MEDIA TARDE</option>
                        <option value="CENA">CENA</option>
                        <option value="REFRIGERIO NOCTURNO">REFRIGERIO NOCTURNO</option>
                        <option value="SUPLEMENTO">SUPLEMENTO</option>
                        <option value="MERIENDA">MERIENDA</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Observación -->
        <div class="field">
            <label class="label">Observación</label>
            <div class="control">
                <textarea class="textarea" placeholder="Ingrese las novedades sobre la dieta del paciente" name="paciente_observacion" pattern="[a-zA-Z0-9\s.,\-()!?]{3,500}" maxlength="500" required></textarea>
            </div>
        </div>

        <!-- Solicitante -->
        <div class="columns">
            <div class="column">
                <label class="label">ID Solicitante</label>
                <input class="input" type="text" placeholder="Ingrese ID del profesional" name="paciente_idSolicitante" pattern="[a-zA-Z0-9\s.,\-()!?]{3,15}" maxlength="15" required>
            </div>
            <div class="column">
                <label class="label">Nombre del Solicitante</label>
                <input class="input" type="text" placeholder="Ingre nombre del Profesional" name="paciente_nombreSolicitante" pattern="[a-zA-Z0-9\s.,\-()!?]{3,50}" maxlength="50" required>
            </div>
            <div class="column" style="visibility:hidden;">
                <label class="label">Fecha de Creación</label>
                <input class="input" type="datetime-local" name="dia_creacion" id="dia_creacion" readonly>
            </div>
        </div>

        <!-- IDs ocultos para relaciones -->
        <input type="hidden" id="categoria_id" name="categoria_id">
        <input type="hidden" id="producto_id" name="producto_id">
        <input type="hidden" id="contrato_id" name="contrato_id">

        <div class="has-text-centered mt-5">
            <button type="submit" class="button is-info is-rounded is-medium">
                <strong>Guardar</strong>
            </button>
        </div>
    </form>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const formulario = document.querySelector(".FormularioAjax");

    formulario.addEventListener("submit", function (event) {
        event.preventDefault();

        const formData = new FormData(this);
        const formRest = document.querySelector(".form-rest");

        fetch('./php/paciente_guardar.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log("Respuesta del servidor:", data);

            // Mostrar respuesta del servidor en el contenedor
            formRest.innerHTML = data;
            console.log("Respuesta del servidor:", data);

            // Si el servidor responde con éxito, buscar una palabra clave
            if (data.toLowerCase().includes("exito") || data.toLowerCase().includes("correctamente")) {
                // Limpiar formulario
                formulario.reset();

                // Recargar después de 15 segundos (más tiempo)
                setTimeout(() => {
                    formRest.innerHTML = '';
                    location.reload();
                }, 15000);
            } else {
                // Si hay errores, mostrarlos por más tiempo
                setTimeout(() => {
                    formRest.innerHTML = '';
                }, 15000);
            }console.log("Respuesta del servidor:", data);
        })
        .catch(error => {
            console.error("Error al enviar el formulario:", error);
            formRest.innerHTML = `<p class="has-text-danger">Ocurrió un error al enviar los datos. Intenta nuevamente.</p>`;

            setTimeout(() => {
                formRest.innerHTML = '';
            }, 15000);
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
        // Crear un objeto Date para obtener la fecha y hora actuales del sistema
        var fecha = new Date();

        // Convertir la fecha a la zona horaria de Bogotá, Lima o Caracas (UTC -5)
        var opciones = { timeZone: 'America/Bogota' }; // Zona horaria UTC -5
        var fechaHoraLocal = new Intl.DateTimeFormat('en-GB', opciones).format(fecha);

        // Crear un objeto Date con la fecha ajustada
        var localDate = new Date(fechaHoraLocal);

        // Obtener el año, mes, día, hora y minutos en formato adecuado (YYYY-MM-DDTHH:MM:SS)
        var year = localDate.getFullYear();
        var month = String(localDate.getMonth() + 1).padStart(2, '0'); // Mes con dos dígitos
        var day = String(localDate.getDate()).padStart(2, '0'); // Día con dos dígitos
        var hours = String(localDate.getHours()).padStart(2, '0'); // Hora con dos dígitos
        var minutes = String(localDate.getMinutes()).padStart(2, '0'); // Minutos con dos dígitos
        var seconds = String(localDate.getSeconds()).padStart(2, '0'); // Segundos con dos dígitos

        // Formatear la fecha y hora en el formato necesario (YYYY-MM-DDTHH:MM:SS)
        var fechaHoraCompleta = `${year}-${month}-${day}T${hours}:${minutes}:${seconds}`;

        // Establecer el valor del campo con la fecha y hora completa
        document.getElementById("dia_creacion").value = fechaHoraCompleta;

        // Para mostrar la hora correcta al usuario
        var inputElement = document.getElementById("dia_creacion");

        // Cuando el campo recibe foco, mostramos la fecha y la hora actual
        inputElement.addEventListener("focus", function() {
            // Establecer la fecha y hora actual en el campo cuando el usuario hace clic
            inputElement.value = fechaHoraCompleta;
        });

        // Cuando el usuario termine de interactuar con el campo (pierde el foco)
        inputElement.addEventListener("blur", function() {
            // Restaurar la fecha y hora completa, incluyendo los minutos y segundos
            inputElement.value = fechaHoraCompleta;
        });
    });

</script>