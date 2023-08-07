
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/proveedor.php');
$conexion = connect_db();
$oproveedor = new Proveedor();
$oproveedor->conectar_db($conexion);
$res=$oproveedor->borrar($codigo);
if ($res)
    header("Location: lista_proveedor.php");
else
    echo "Error no se pudo eliminar..";

?>
 <?php include_once('header.php') ?>