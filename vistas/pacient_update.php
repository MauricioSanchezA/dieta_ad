<div class="container is-fluid mb-6">
    <h1 class="title">Pacientes</h1>
    <h2 class="subtitle">Actualizar DIETA DE PACIENTES</h2>
</div>

<div class="container pb-6 pt-6">
    <?php
    include "./inc/btn_back.php";

    require_once "./php/main.php";

    // Obtener el ID del paciente
    $id = isset($_GET['pacient_id_up']) ? limpiar_cadena($_GET['pacient_id_up']) : 0;

    /*== Verificando paciente ==*/
    $check_paciente = conexion();
    $check_paciente = $check_paciente->prepare("SELECT * FROM paciente WHERE paciente_id = :id");
    $check_paciente->bindParam(':id', $id, PDO::PARAM_INT);
    $check_paciente->execute();

    if ($check_paciente->rowCount() > 0) {
        $datos = $check_paciente->fetch();
    ?>

    <div class="form-rest mb-6 mt-6"></div>

    <!-- Formulario de actualización -->
    <form action="./php/paciente_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off">

        <!-- Campo oculto para el ID del paciente -->
        <input type="hidden" name="pacient_id_up" value="<?php echo $datos['paciente_id']; ?>" required>

        <div class="columns">
            <div class="column">
                <div class="control">
                    <label for="cama">Cama</label>
                    <input class="input" type="text" name="cama" id="cama" placeholder="Ingrese el nombre de la cama" required value="<?php echo $datos['cama']; ?>" maxlength="50">
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <div class="control">
                    <label for="paciente_tipodoc">Tipo de Documento</label>
                    <input class="input" type="text" name="paciente_tipodoc" id="paciente_tipodoc" placeholder="Ingrese el tipo de documento" required value="<?php echo $datos['paciente_tipodoc']; ?>" maxlength="50">
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label for="paciente_numdoc">Número de Documento</label>
                    <input class="input" type="text" name="paciente_numdoc" id="paciente_numdoc" placeholder="Ingrese el número de documento" required value="<?php echo $datos['paciente_numdoc']; ?>" maxlength="50">
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <div class="control">
                    <label for="paciente_nombre">Nombre</label>
                    <input class="input" type="text" name="paciente_nombre" id="paciente_nombre" placeholder="Ingrese el nombre del paciente" required value="<?php echo $datos['paciente_nombre']; ?>" maxlength="50">
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label for="paciente_apellido">Apellido</label>
                    <input class="input" type="text" name="paciente_apellido" id="paciente_apellido" placeholder="Ingrese el apellido del paciente" required value="<?php echo $datos['paciente_apellido']; ?>" maxlength="50">
                </div>
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
                        <?php
                        // Opciones de Grupo
                        $grupos = [
                            "HOSP MEDICINA INTERNA",
                            "HOSP CIRUGIA",
                            "HOSP NEUROCIRUGIA",
                            "HOSP GINECOOBSTETRICA",
                            "HOSP PEDIATRIA SALAS",
                            "HOSP SERVICIO ESPECIAL",
                            "HOSP CIRUGIA PEDIATRICA",
                            "URGENCIAS ADULTOS",
                            "HOSP URGENCIAS PEDIATRIA",
                            "HOSP ONCOLOGIA PEDIATRICA",
                            "HOSP BRAQUITERAPIA",
                            "HOSP UCI ADULTOS",
                            "HOSP NEONATOS",
                            "HOSP UCI PEDIATRIA",
                            "UNID INTERMEDIOS ADULTOS",
                            "UNID INTERMEDIOS PEDIATRIA",
                            "HOSP RN BASICOS",
                            "HOSP RECIEN NACIDOS PUERP",
                            "HOSP QUEMADOS PEDIATRIA",
                            "HOSP QUEMADOS ADULTOS",
                            "SALA DE PARTOS",
                            "HOSPITALIZACION ADULTOS",
                            "UNIDAD CRITICA OBSTETRICA",
                            "INTERMEDIOS OBSTETRICIA"
                        ];

                        // Mostrar las opciones en el select
                        foreach ($grupos as $grupo) {
                            $selected = ($grupo == $datos['paciente_grupo']) ? 'selected' : '';  // Marca la opción si el valor coincide
                            echo "<option value='$grupo' $selected>$grupo</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Subgrupo -->
            <div class="column">
                <label class="label">Subgrupo</label>
                <div class="select is-fullwidth">
                    <select name="paciente_subgrupo" id="paciente_subgrup" required>
                        <option value="">Seleccione un subgrupo</option>
                        <?php
                        // Opciones de Subgrupo
                        $subgrupos = [
                            "BRAQUITERAPIA",
                            "GINECOLOGIA ESTACION 1",
                            "INTERMEDIOS ADULTOS ESTACION 1",
                            "INTERMEDIOS NEONATOLOGIA",
                            "INTERMEDIOS PEDIATRIA",
                            "HOSPITALIZACION EXPANSION 2 PISO",
                            "NEUROCIRUGIA",
                            "NEONATOS INFECTOLOGIA",
                            "NEONATOLOGIA BASICO",
                            "PEDIATRIA CIRUGIA",
                            "PEDIATRIA INFECTO",
                            "PEDIATRIA LACTANTES",
                            "PEDIATRIA MEDICINA INTERNA",
                            "PEDIATRICA ONCOLOGIA",
                            "PEDIATRIA ORTOPEDIA",
                            "PEDIATRIA QUEMADOS",
                            "QUEMADOS ADULTOS",
                            "QUIRURGICAS ESTACION ENFERMERIA 1",
                            "SERVICIO ESPECIAL ESTACION ENFERMERIA 1",
                            "ESTACION UCI ADULTOS 1",
                            "UCI NEONATOLOGIA",
                            "UCI PEDIATRIA",
                            "URGENCIAS HOMBRES",
                            "URGENCIAS PEDIATRIA",
                            "URGENCIAS SERVICIO ESPECIAL",
                            "RECUPERACION (CIRUGIA)",
                            "SALA DE PARTOS",
                            "ESTACION PEDIATRIA SALAS 1",
                            "HOSPITALIZACION EXPANSION 3 PISO (ONCOLOGIA ADULT)",
                            "UNIDAD CRITICA OBSTETRICA",
                            "URGENCIAS MUJERES",
                            "URGENCIAS EXPANSION",
                            "URGENCIAS PASILLO",
                            "NOUSAR",
                            "HOSPITALIZACION 4 PISO ESTACION ENFERMERIA 1",
                            "INTERMEDIOS OBSTETRICIA",
                            "SERVICIO ESPECIAL ESTACION ENFERMERIA 2",
                            "SERVICIO ESPECIAL ESTACION ENFERMERIA 3",
                            "HOSPITALIZACION 4 PISO ESTACION ENFERMERIA 2",
                            "HOSPITALIZACION 4 PISO ESTACION ENFERMERIA 3",
                            "QUIRURGICAS ESTACION ENFERMERIA 2",
                            "QUIRURGICAS ESTACION ENFERMERIA 3",
                            "GINECOLOGIA ESTACION 2",
                            "GINECOLOGIA ESTACION 3",
                            "ESTACION PEDIATRIA SALAS 2",
                            "ESTACION UCI ADULTOS 2",
                            "INTERMEDIOS ADULTOS ESTACION 2",
                            "TRANSICION"
                        ];

                        // Mostrar las opciones en el select
                        foreach ($subgrupos as $subgrupo) {
                            $selected = ($subgrupo == $datos['paciente_subgrupo']) ? 'selected' : '';  // Marca la opción si el valor coincide
                            echo "<option value='$subgrupo' $selected>$subgrupo</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Comida -->
            <div class="column">
                <label class="label">Comida</label>
                <div class="select is-fullwidth">
                    <select name="paciente_comida" id="paciente_comida" required>
                        <option value="">Seleccione una comida</option>
                        <?php
                        // Opciones de Comida
                        $comidas = [
                            "DESAYUNO",
                            "MEDIA MAÑANA",
                            "ALMUERZO",
                            "MEDIA TARDE",
                            "CENA",
                            "REFRIGERIO NOCTURNO",
                            "SUPLEMENTO",
                            "MERIENDA"
                        ];

                        // Mostrar las opciones en el select
                        foreach ($comidas as $comida) {
                            $selected = ($comida == $datos['paciente_comida']) ? 'selected' : '';  // Marca la opción si el valor coincide
                            echo "<option value='$comida' $selected>$comida</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <div class="control">
                    <label for="paciente_observacion">Observación</label>
                    <textarea class="textarea" name="paciente_observacion" id="paciente_observacion" placeholder="Ingrese las observaciones" required><?php echo $datos['paciente_observacion']; ?></textarea>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <div class="control">
                    <label for="paciente_idSolicitante">ID Solicitante</label>
                    <input class="input" type="text" name="paciente_idSolicitante" id="paciente_idSolicitante" placeholder="Ingrese el ID del solicitante" required value="<?php echo $datos['paciente_idSolicitante']; ?>" maxlength="50">
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label for="paciente_nombreSolicitante">Nombre Solicitante</label>
                    <input class="input" type="text" name="paciente_nombreSolicitante" id="paciente_nombreSolicitante" placeholder="Ingrese el nombre del solicitante" required value="<?php echo $datos['paciente_nombreSolicitante']; ?>" maxlength="50">
                </div>
            </div>
        </div>

        <p class="has-text-centered">
            <button type="submit" class="button is-success is-rounded">Actualizar Paciente</button>
        </p>

    </form>
    <?php
    } else {
        include "./inc/error_alert.php";
    }
    $check_paciente = null;
    ?>
</div>
