<?php


if (isset($_POST['envia_datos'])){

    $nom =strtoupper($_POST['nom']);
    $idl = $_POST['idl'];
   
    
    include_once('includes/acceso.php');
    include_once('clases/proveedor.php');
    $conexion = connect_db();
    $oproveedor = new Proveedor();
    $oproveedor->conectar_db($conexion);
    
    $res = $oproveedor->agrega_proveedor($nom,$idl);

    if($res) {
        $_SESSION['mensaje'] = 'Empleado agregado satisfactoriamente';
        $_SESSION['mensaje_tipo']='success';
        
        header("location: lista_proveedor.php");
    } else
    echo "No se pudo agregar el proveedor";
    
}
include('header.php'); 
?>
