<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/cliente.php');
include_once('footer.php');
$conexion = connect_db();
$ocliente = new Cliente();
$ocliente->conectar_db($conexion);
$datos_cli = $ocliente->listacli();
if ($datos_cli){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
            <h4>Listado de Clientes</h4>
            </div>  
            <div> 
            <link rel="stylesheet" href="Portada/botones.css">
            <a href="agrega_clie.php" class="glow-on-hover">Nuevo</a>
        </div> 
        <br>
        <br>
        <div class="card card-body">

            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre del Cliente</th>
                    <th>RUC</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos_cli)){ 
        $id=$row["idCliente"];
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['ruc']; ?></td>
                    <td><?php echo $row['dircliente']; ?></td>
                    <td><?php echo $row['telcliente']; ?></td>
                    
                    <td class="cuerpo">
                    <a href="modifica_clie.php?codigo=<?php echo $id; ?>" class="glow-on-hover">Modificar</a>   
                    <a href="elimina_clie.php?codigo=<?php echo $id; ?>" class="glow-on-hover">Eliminar</a>    
                    </td>
             <?php
    }    
    ?>
    </tbody>
   </table>

            </div>

        </div>

    </div>
    
<?php
}

?>