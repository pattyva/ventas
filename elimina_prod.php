<?php


$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/producto.php');
$conexion = connect_db();
$oproducto = new Producto();
$oproducto->conectar_db($conexion);
$res=$oproducto->borrar($codigo);
if ($res){
    header("Location: lista_producto.php");
}
    else{
    echo "Error no se pudo eliminar..";

    }
    include_once('header.php');
    ?>

