<?php


if (isset($_POST['envia_datos'])){
    $nom =strtoupper($_POST['nom']);
    $dir = strtoupper($_POST['dir']);
    $tel = $_POST['tel'];
    $usu = strtolower($_POST['usu']);
    $pass = $_POST['pass'];
    
    include_once('includes/acceso.php');
    include_once('clases/empleado.php');
    $conexion = connect_db();
    $oempleado = new Empleado();
    $oempleado->conectar_db($conexion);
    
    $res = $oempleado->agrega_empleado($nom,$tel,$dir,$usu,$pass);

    if($res) {
        $_SESSION['mensaje'] = 'Empleado agregado satisfactoriamente';
        $_SESSION['mensaje_tipo']='success';
        
        header("location: lista_empleado.php");
    } else
    echo "No se pudo agregar el empleado";
    
}
include('header.php'); 
?>
