
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/cliente.php');
$conexion = connect_db();
$ocliente = new Cliente();
$ocliente->conectar_db($conexion);
$res=$ocliente->borrar($codigo);
if ($res)
    header("Location: lista_cliente.php");
else
    echo "Error no se pudo eliminar..";

?>
<?php include_once('header.php') ?>
 