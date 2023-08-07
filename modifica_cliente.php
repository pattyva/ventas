<?php

if (isset($_POST['envia_datos'])) {
    $id = $_POST['idCliente'];
    $nombre = strtoupper($_POST['nombre']);
    $ruc = $_POST['ruc'];
    $dircliente = strtoupper($_POST['dircliente']);
    $telcliente = $_POST['telcliente'];
    
    include_once('includes/acceso.php');
    include_once('clases/cliente.php');
    $conexion = connect_db();
    $ocliente = new Cliente();
    $ocliente->conectar_db($conexion);
    
    $response = $ocliente->modifica_cliente($id, $nombre, $ruc, $dircliente, $telcliente);

    if ($response) {
        header("location: lista_cliente.php");
    } else {
        echo "No se pudo modificar el cliente";
    }
}
include('header.php'); 

include('footer.php');
?>
