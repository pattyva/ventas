
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/empleado.php');
$conexion = connect_db();
$oproducto = new Empleado();
$oproducto->conectar_db($conexion);
$res=$oproducto->borrar($codigo);
if ($res)
    header("Location: lista_empleado.php");
else
    echo "Error no se pudo eliminar..";

?>
 <?php include_once('header.php') ?>