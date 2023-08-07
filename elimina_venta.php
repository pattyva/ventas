<?php


$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/venta.php');
$conexion = connect_db();
$oventa = new Venta();
$oventa->conectar_db($conexion);
$res=$oventa->borrar($codigo);
if ($res){
    header("Location: regis_venta.php");
}
    else{
    echo "Error no se pudo eliminar..";

    }
    include_once('header.php');
    ?>

