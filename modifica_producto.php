<?php


if (isset($_POST['envia_datos'])){
    $id=$_POST['idproducto'];
    $nom =strtoupper($_POST['nom']);
    $und = strtoupper($_POST['und']);
    $can = $_POST['can'];
    $pre = $_POST['pre'];
    $cos = $_POST['cos'];
    $idl = $_POST['idl'];
    
    include_once('includes/acceso.php');
    include_once('clases/producto.php');
    $conexion = connect_db();
    $oproducto = new Producto();
    $oproducto->conectar_db($conexion);
    
    $response = $oproducto->modifica_producto($id,$nom,$und,$can,$pre,$cos,$idl);

    if($response) {
        header("location: lista_producto.php");
    } else
    echo "No se pudo modificar el producto";
    
}
include('header.php'); 

?>
