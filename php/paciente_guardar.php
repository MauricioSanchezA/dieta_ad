<?php
require_once "./main.php";

/*== Almacenando datos ==*/
$cama = limpiar_cadena($_POST['cama']);
$tipodoc = str_replace(" ", "", limpiar_cadena($_POST['paciente_tipodoc']));
$numdoc = limpiar_cadena($_POST['paciente_numdoc']);
$nombre = limpiar_cadena($_POST['paciente_nombre']);
$apellido = limpiar_cadena($_POST['paciente_apellido']);
$servicio_grupo = limpiar_cadena($_POST['paciente_grupo']);
$servicio_subgrupo = limpiar_cadena($_POST['paciente_subgrupo']);
$comida = limpiar_cadena($_POST['paciente_comida']);
$observacion = limpiar_cadena($_POST['paciente_observacion']);
$id_solicitante = limpiar_cadena($_POST['paciente_idSolicitante']);
$nombre_solicitante = limpiar_cadena($_POST['paciente_nombreSolicitante']);
date_default_timezone_set('America/Bogota');
$dia_creacion = date('Y-m-d H:i:s');

/*== Validación de campos obligatorios ==*/
if (
    $cama == "" || $tipodoc == "" || $numdoc == "" || $nombre == "" || $apellido == "" ||
    $servicio_grupo == "" || $servicio_subgrupo == "" || $comida == "" ||
    $observacion == "" || $id_solicitante == "" || $nombre_solicitante == ""
) {
    echo '<div class="notification is-danger is-light"><strong>¡Ocurrió un error!</strong><br>Todos los campos son obligatorios.</div>';
    exit();
}

/*== Validación con expresiones regulares ==*/
if (verificar_datos("[a-zA-Z0-9\-]{1,10}", $cama)) {
    echo '<div class="notification is-danger is-light"><strong>Error:</strong> La CAMA tiene un formato inválido.</div>'; exit();
}
if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,40}", $nombre)) {
    echo '<div class="notification is-danger is-light"><strong>Error:</strong> El NOMBRE tiene un formato inválido.</div>'; exit();
}
if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,40}", $apellido)) {
    echo '<div class="notification is-danger is-light"><strong>Error:</strong> El APELLIDO tiene un formato inválido.</div>'; exit();
}
if (verificar_datos(".{3,100}", $servicio_grupo)) {
    echo '<div class="notification is-danger is-light"><strong>Error:</strong> Grupo inválido.</div>'; exit();
}
if (verificar_datos(".{3,100}", $servicio_subgrupo)) {
    echo '<div class="notification is-danger is-light"><strong>Error:</strong> Subgrupo inválido.</div>'; exit();
}
if (verificar_datos(".{3,40}", $comida)) {
    echo '<div class="notification is-danger is-light"><strong>Error:</strong> Comida inválida.</div>'; exit();
}
if (verificar_datos(".{3,500}", $observacion)) {
    echo '<div class="notification is-danger is-light"><strong>Error:</strong> Observación inválida.</div>'; exit();
}
if (verificar_datos("[a-zA-Z0-9]{3,15}", $id_solicitante)) {
    echo '<div class="notification is-danger is-light"><strong>Error:</strong> ID del solicitante inválido.</div>'; exit();
}
if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,50}", $nombre_solicitante)) {
    echo '<div class="notification is-danger is-light"><strong>Error:</strong> Nombre del solicitante inválido.</div>'; exit();
}

/*== Guardando en base de datos ==*/
$guardar_paciente = conexion()->prepare("INSERT INTO paciente(
    cama, paciente_tipodoc, paciente_numdoc, paciente_nombre, paciente_apellido, 
    paciente_grupo, paciente_subgrupo, paciente_comida, paciente_observacion, 
    paciente_idSolicitante, paciente_nombreSolicitante, dia_creacion
) VALUES (
    :cama, :tipodoc, :numdoc, :nombre, :apellido, 
    :grupo, :subgrupo, :comida, :observacion, 
    :id_solicitante, :nombre_solicitante, :dia_creacion
)");

$marcadores = [
    ":cama" => $cama,
    ":tipodoc" => $tipodoc,
    ":numdoc" => $numdoc,
    ":nombre" => $nombre,
    ":apellido" => $apellido,
    ":grupo" => $servicio_grupo,
    ":subgrupo" => $servicio_subgrupo,
    ":comida" => $comida,
    ":observacion" => $observacion,
    ":id_solicitante" => $id_solicitante,
    ":nombre_solicitante" => $nombre_solicitante,
    ":dia_creacion" => $dia_creacion
];

$guardar_paciente->execute($marcadores);

if ($guardar_paciente->rowCount() == 1) {
    echo '<div class="notification is-info is-light"><strong>¡Paciente registrado!</strong><br>El paciente fue guardado correctamente.</div>';
} else {
    echo '<div class="notification is-danger is-light"><strong>¡Error inesperado!</strong><br>No se pudo registrar el paciente, por favor intente nuevamente.</div>';
}

$guardar_paciente = null;
?>
