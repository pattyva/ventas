<?php


if (isset($_POST['envia_datos'])){
    $id =$_POST['idProveedor'];
    $nom = strtoupper($_POST['nombre']);
    $idl = $_POST['idl'];

    include_once('includes/acceso.php');
    include_once('clases/proveedor.php');
    $conexion = connect_db();
    $oproveedor = new Proveedor();
    $oproveedor->conectar_db($conexion);
    
    $response = $oproveedor->modifica_proveedor($id,$nom,$idl);

    if($response) {
        header("location: lista_proveedor.php");
    } else
    echo "No se pudo modificar el producto";
    
}
include('header.php'); 
?>