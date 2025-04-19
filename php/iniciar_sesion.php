<?php
ob_start(); // Captura la salida en un buffer

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "main.php";

/*== Almacenando datos ==*/
$usuario = $_POST['login_usuario'] ?? '';
$clave   = $_POST['login_clave'] ?? '';

$usuario = limpiar_cadena($usuario);
$clave   = limpiar_cadena($clave);

/*== Verificando campos obligatorios ==*/
if($usuario == "" || $clave == ""){
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
        </div>
    ';
    return ob_get_clean();
}

/*== Verificando integridad de los datos ==*/
if(verificar_datos("[a-zA-Z0-9]{4,20}", $usuario)){
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            El USUARIO no coincide con el formato solicitado
        </div>
    ';
    return ob_get_clean();
}

if(verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $clave)){
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            La CLAVE no coincide con el formato solicitado
        </div>
    ';
    return ob_get_clean();
}

/*== Verificando usuario en la base de datos ==*/
$check_user = conexion();
$check_user = $check_user->query("SELECT * FROM usuario WHERE usuario_usuario = '$usuario'");

if($check_user->rowCount() == 1){
    $check_user = $check_user->fetch();

    if($check_user['usuario_usuario'] == $usuario && password_verify($clave, $check_user['usuario_clave'])){
        
        // Guardar datos en sesión
        $_SESSION['id']       = $check_user['usuario_id'];
        $_SESSION['nombre']   = $check_user['usuario_nombre'];
        $_SESSION['apellido'] = $check_user['usuario_apellido'];
        $_SESSION['usuario']  = $check_user['usuario_usuario'];
        $_SESSION['role']     = $check_user['role'];

        // Redirigir
        if(headers_sent()){
            echo "<script> window.location.href='index.php?vista=home'; </script>";
        } else {
            header("Location: index.php?vista=home");
        }
        exit();
        
    } else {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                Usuario o clave incorrectos
            </div>
        ';
    }
} else {
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrió un error inesperado!</strong><br>
            Usuario o clave incorrectos
        </div>
    ';
}

$check_user = null;

return ob_get_clean(); // Devuelve el contenido del buffer en vez de imprimir
