<?php
session_start(); // Iniciar sesión siempre al principio del archivo

if (isset($_POST['envia_login'])) {
    $nom = $_POST['usua'];
    $pass = $_POST['pass'];
    
    include_once('includes/acceso.php');
    include_once('clases/empleado.php');
    $conexion = connect_db();
    $oempleado = new Empleado();
    $oempleado->conectar_db($conexion);
    
    $res = $oempleado->lee_datos($nom);
    
    if ($res && password_verify($pass, $res["password"])) {
        // Las credenciales son correctas
        $_SESSION['nombre'] = $res["nombre"];
        $_SESSION['idEmpleado'] = $res["idEmpleado"];
        $_SESSION['login_estado'] = 1;
        header("Location: index.php");
        exit; // Salir después de redireccionar para evitar que se siga ejecutando el código
    } else {
        // Las credenciales son incorrectas
        header("Location: login.php");
        exit;
    }
} else {
    // Si no se envió el formulario de inicio de sesión, redireccionar a la página de login
    header("Location: login.php");
    exit;
}
?>
