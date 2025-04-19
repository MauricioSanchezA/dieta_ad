<?php
require_once 'main.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Limpia los datos recibidos
    $id = limpiar_cadena($_POST['pacient_id_up']);
    $cama = limpiar_cadena($_POST['cama']);
    $tipodoc = limpiar_cadena($_POST['paciente_tipodoc']);
    $numdoc = limpiar_cadena($_POST['paciente_numdoc']);
    $nombre = limpiar_cadena($_POST['paciente_nombre']);
    $apellido = limpiar_cadena($_POST['paciente_apellido']);
    $grupo = limpiar_cadena($_POST['paciente_grupo']);
    $subgrupo = limpiar_cadena($_POST['paciente_subgrupo']);
    $comida = limpiar_cadena($_POST['paciente_comida']);
    $observacion = limpiar_cadena($_POST['paciente_observacion']);
    $idSolicitante = limpiar_cadena($_POST['paciente_idSolicitante']);
    $nombreSolicitante = limpiar_cadena($_POST['paciente_nombreSolicitante']);
    
    // Verificar que todos los campos están completos
    if (empty($id) || empty($cama) || empty($tipodoc) || empty($numdoc) || empty($nombre) || empty($apellido)) {
        echo '<div class="notification is-danger is-light">Todos los campos son obligatorios.</div>';
        exit();
    }

    // Preparar la consulta SQL para actualizar el paciente
    $update_paciente = conexion()->prepare("UPDATE paciente SET
        cama = :cama,
        paciente_tipodoc = :tipodoc,
        paciente_numdoc = :numdoc,
        paciente_nombre = :nombre,
        paciente_apellido = :apellido,
        paciente_grupo = :grupo,
        paciente_subgrupo = :subgrupo,
        paciente_comida = :comida,
        paciente_observacion = :observacion,
        paciente_idSolicitante = :id_solicitante,
        paciente_nombreSolicitante = :nombre_solicitante
        WHERE paciente_id = :id");

    $update_paciente->bindParam(':cama', $cama);
    $update_paciente->bindParam(':tipodoc', $tipodoc);
    $update_paciente->bindParam(':numdoc', $numdoc);
    $update_paciente->bindParam(':nombre', $nombre);
    $update_paciente->bindParam(':apellido', $apellido);
    $update_paciente->bindParam(':grupo', $grupo);
    $update_paciente->bindParam(':subgrupo', $subgrupo);
    $update_paciente->bindParam(':comida', $comida);
    $update_paciente->bindParam(':observacion', $observacion);
    $update_paciente->bindParam(':id_solicitante', $idSolicitante);
    $update_paciente->bindParam(':nombre_solicitante', $nombreSolicitante);
    $update_paciente->bindParam(':id', $id);

    if ($update_paciente->execute()) {
        echo '<div class="notification is-info is-light">Paciente actualizado correctamente.</div>';
    } else {
        echo '<div class="notification is-danger is-light">No se pudo actualizar el paciente.</div>';
    }

    $update_paciente = null;
}
?>
<script>
    // Redirigir a la lista de pacientes después de actualizar
    window.location.href = "index.php?vista=pacient_list&page=<?php echo $pagina; ?>";
</script>