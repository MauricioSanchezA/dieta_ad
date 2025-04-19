<?php
// Iniciar la sesión solo si no está activa
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está activa
}

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id'])) {
    // Si no está logueado, redirige a la página de inicio de sesión
    header("Location: index.php?vista=login");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiETA</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Otros estilos -->
    <link rel="stylesheet" href="./css/estilos.css">
</head>
<!-- Menú de primer nivel para "opciones" -->
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <div class="navbar-image">
            <!-- La imagen ahora es un fondo -->
            <img src="./img/logo_4.png" alt="Logo" width="100" height="95">
        </div>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
    <div id="navbarMenu" class="navbar-menu">
        <div class="navbar-start">
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Administrador'): ?>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">Usuarios</a>
                    <div class="navbar-dropdown">
                        <a href="index.php?vista=user_new" class="navbar-item">Nuevo</a>
                        <a href="index.php?vista=user_list" class="navbar-item">Lista</a>
                        <a href="index.php?vista=user_search" class="navbar-item">Buscar</a>
                    </div>
                </div>
            <?php endif; ?>

            <div class="navbar-start ml-6">
            <?php if (isset($_SESSION['role']) && in_array ($_SESSION['role'], ['Administrador', 'Usuario'])): ?>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">Paciente</a>
                        <div class="navbar-dropdown">
                            <a href="index.php?vista=pacient_new" class="navbar-item">Nueva</a>
                            <a href="index.php?vista=pacient_list" class="navbar-item">Lista</a>
                            <a href="index.php?vista=pacient_search" class="navbar-item">Buscar</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="navbar-start ml-6">
            <?php if (isset($_SESSION['role']) && in_array ($_SESSION['role'], ['Administrador', 'Usuario', 'planta'])): ?>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">Reportes</a>
                    <div class="navbar-dropdown">
                        <a href="index.php?vista=report_excel" class="navbar-item">Exportar a Excel</a>
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Administrador'): ?>
                <div class="buttons">
                    <a href="index.php?vista=user_update&user_id_up=<?php echo $_SESSION['id']; ?>" class="button is-primary is-rounded">
                        Mi cuenta
                    </a>
            <?php endif; ?>

                    <a href="index.php?vista=logout" class="button is-link is-rounded">
                        Salir
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</nav>  
</html>
