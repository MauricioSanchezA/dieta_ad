<?php
// Definir registros por página (puedes ajustarlo según lo necesites)
$registros = 10; // Por ejemplo, 10 registros por página

// Validar el parámetro 'page' recibido desde la URL
$pagina = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$pagina = ($pagina > 0) ? $pagina : 1;

// Calcular el inicio para la consulta SQL
$inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;

// Inicializar la tabla
$tabla = "";

// Construir las consultas SQL
if (isset($busqueda) && $busqueda != "") {
    $consulta_datos = "SELECT * FROM paciente 
                       WHERE paciente_numdoc LIKE :busqueda 
                          OR paciente_nombre LIKE :busqueda 
                          OR paciente_apellido LIKE :busqueda
                          OR paciente_nombreSolicitante LIKE :busqueda 
                       ORDER BY paciente_nombre ASC 
                       LIMIT :inicio, :registros";

    $consulta_total = "SELECT COUNT(paciente_id) 
                       FROM paciente 
                       WHERE paciente_numdoc LIKE :busqueda 
                          OR paciente_nombre LIKE :busqueda 
                          OR paciente_apellido LIKE :busqueda
                          OR paciente_nombreSolicitante LIKE :busqueda";
} else {
    $consulta_datos = "SELECT * FROM paciente 
                       ORDER BY paciente_nombre ASC 
                       LIMIT :inicio, :registros";

    $consulta_total = "SELECT COUNT(paciente_id) 
                       FROM paciente";
}

// Conexión a la base de datos
$conexion = conexion();

// Preparar y ejecutar la consulta de datos
$stmt_datos = $conexion->prepare($consulta_datos);
if (isset($busqueda) && $busqueda != "") {
    $stmt_datos->bindValue(':busqueda', "%$busqueda%", PDO::PARAM_STR);
}
$stmt_datos->bindValue(':inicio', $inicio, PDO::PARAM_INT);
$stmt_datos->bindValue(':registros', $registros, PDO::PARAM_INT);
$stmt_datos->execute();
$datos = $stmt_datos->fetchAll();

// Preparar y ejecutar la consulta total
$stmt_total = $conexion->prepare($consulta_total);
if (isset($busqueda) && $busqueda != "") {
    $stmt_total->bindValue(':busqueda', "%$busqueda%", PDO::PARAM_STR);
}
$stmt_total->execute();
$total = (int)$stmt_total->fetchColumn();

// Calcular el número total de páginas
$Npaginas = ceil($total / $registros);

// Verificar el rol del usuario (asumimos que está en la sesión)
$rol_usuario = isset($_SESSION['role']) ? $_SESSION['role'] : '';

// Construir la tabla
$tabla .= '
<div class="table-container">
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr class="has-text-centered">
                <th>#</th>
                <th>Cama</th>
                <th>Tipo ID</th>
                <th>Identificacion</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Grupo</th>
                <th>Subgrupo</th>
                <th>Comida</th>
                <th>Observacion</th>
                <th>ID Solicitante</th>
                <th>Nombre Solicitante</th>
                <th>Fecha Creacion</th>
                <th colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
';

$contador = $inicio + 1; // Iniciar el contador de filas

// Agregar las filas a la tabla
foreach ($datos as $rows) {
    // Obtener la fecha actual del sistema en formato Y-m-d
    //$fecha_actual = date('Y-m-d H:i:s'); // Fecha con hora, minutos y segundos
    
    $tabla .= '
        <tr class="has-text-centered">
            <td>' . $contador . '</td>
            <td>' . $rows['cama'] . '</td>
            <td>' . $rows['paciente_tipodoc'] . '</td>
            <td>' . $rows['paciente_numdoc'] . '</td>
            <td>' . $rows['paciente_nombre'] . '</td>
            <td>' . $rows['paciente_apellido'] . '</td>
            <td>' . $rows['paciente_grupo'] . '</td>
            <td>' . $rows['paciente_subgrupo'] . '</td>
            <td>' . $rows['paciente_comida'] . '</td>
            <td>' . $rows['paciente_observacion'] . '</td>
            <td>' . $rows['paciente_idSolicitante'] . '</td>
            <td>' . $rows['paciente_nombreSolicitante'] . '</td>
            <td>' . $rows['dia_creacion'] . '</td> <!-- Fecha actual del sistema -->
            ';

    // Verificar si el rol es Administrador para mostrar las opciones
    if ($rol_usuario === 'Administrador') {
        $tabla .= '
            <td>
                <a href="index.php?vista=pacient_update&pacient_id_up=' . $rows['paciente_id'] . '" class="button is-success is-rounded is-small">Actualizar</a>
            </td>
            <td>
                <a href="' . $url . $pagina . '&pacient_id_del=' . $rows['paciente_id'] . '" class="button is-danger is-rounded is-small">Eliminar</a>
            </td>
        ';
    } else {
        $tabla .= '<td colspan="2">No tiene permiso para modificar</td>';
    }

    $tabla .= '</tr>';
    $contador++; // Incrementar el contador para la siguiente fila
}

$pag_final = $contador - 1;

if ($total >= 1) {
    $tabla .= '
        <tr class="has-text-centered">
            <td colspan="16">
                <a href="' . $url . '1" class="button is-link is-rounded is-small mt-4 mb-4">
                    Haga clic acá para recargar el listado
                </a>
            </td>
        </tr>
    ';
} else {
    $tabla .= '
        <tr class="has-text-centered">
            <td colspan="16">
                No hay registros en el sistema
            </td>
        </tr>
    ';
}

$tabla .= '</tbody></table></div>';

if ($total > 0 && $pagina <= $Npaginas) {
    $pag_inicio = $inicio + 1;  // Calcula el inicio de la página actual

$tabla .= '<p class="has-text-right">Mostrando Dieta de pacientes  <strong>' . $pag_inicio . '</strong> al <strong>' . $pag_final . '</strong> de un <strong>total de ' . $total . '</strong></p>';
}

$conexion = null;
echo $tabla;

if ($total >= 1 && $pagina <= $Npaginas) {
    echo paginador_tablas($pagina, $Npaginas, $url, 7);
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
