<?php


if (isset($_POST['envia_datos'])){
    $nom = strtoupper($_POST['nombre']);
    $ruc = $_POST['ruc'];
    $dir = $_POST['dircliente'];
    $tel = $_POST['telcliente'];
    
    include_once('includes/acceso.php');
    include_once('clases/cliente.php');
    $conexion = connect_db();
    $ocliente = new Cliente();
    $ocliente->conectar_db($conexion);
    
    $response = $ocliente->agrega_cliente($nom,$ruc,$dir,$tel);

    if($response) {
        $_SESSION["mensaje"]="Cliente agregado satisfactoriamente";
        $_SESSION["mensaje_tipo"]="success";
        
        header("location: lista_cliente.php");
    } else
    echo "No se pudo agregar al cliente";
    
}
include('header.php'); 
?>