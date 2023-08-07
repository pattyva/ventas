<?php
if (isset($_POST['envia_datos'])){

    $nom =strtoupper($_POST['nom']);
    
    include_once('includes/acceso.php');
    include_once('clases/linea.php');
    $conexion = connect_db();
    $olinea = new Linea();
    $olinea->conectar_db($conexion);
    
    $res = $olinea->agrega_Linea($nom);
    if($res) {
        $_SESSION['mensaje'] = 'categoria agregado satisfactoriamente';
        $_SESSION['mensaje_tipo']='success';
        
        header("location: lista_linea.php");
    } else
    echo "No se pudo agregar el proveedor";
    
}
include('header.php'); 
?>
