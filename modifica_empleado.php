<?php


if (isset($_POST['envia_datos'])){
    $id=$_POST['idEmpleado'];
    $nom =strtoupper($_POST['nom']);
    $tel = strtoupper($_POST['tel']);
    $dir = $_POST['dir'];
    $usu = $_POST['usu'];
    

    /*	$sql = "update empleados set
			nombre='$nom',
			telefono='$tel',
			direccion=$dir, 
			usuario=$usu,
			password=$usu_pass_hash 
			where idEmpleado='$id'";*/
    
    include_once('includes/acceso.php');
    include_once('clases/empleado.php');
    $conexion = connect_db();
    $oempleado = new Empleado();
    $oempleado->conectar_db($conexion);
    
    $response = $oempleado->modifica_empleado($id,$nom,$tel,$dir,$usu);

    if($response) {
        header("location: lista_empleado.php");
    } else
    echo "No se pudo modificar el empleado";
    
}
include('header.php'); 
?>
