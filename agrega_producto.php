<?php
session_start();
if (isset($_POST['envia_datos'])) {
    $nom = strtoupper($_POST['nom']);
    $und = strtoupper($_POST['und']);
    $can = $_POST['can'];
    $pre = $_POST['pre'];
    $cos = $_POST['cos'];
    $idl = $_POST['idl'];

    // Sanitize $can, $pre, and $cos if needed

    include_once('includes/acceso.php');
    include_once('clases/producto.php');
    $conexion = connect_db();
    $oproducto = new Producto();
    $oproducto->conectar_db($conexion);
    $response = false;
    if ($nom != '' && $und != '' && $can != '' && $pre != '' && $cos != '' && $idl != '') {
        // Resto del código
    
        $response = $oproducto->agrega_producto($nom, $und, $can, $pre, $cos, $idl);
    
        // Resto del código
    } else {
      echo "Falta información requerida para agregar el producto";
    }
    if($response) {
        $_SESSION["mensaje"]="Producto agregado satisfactoriamente";
        $_SESSION["mensaje_tipo"]="success";
        
        header("location: lista_producto.php");
        exit();
    } else {
        
        echo "No se pudo agregar el producto";
    }
}

include_once('header.php');
?>

