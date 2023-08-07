<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/empleado.php');
include_once('footer.php');
$conexion = connect_db();
$oempleado = new Empleado();
$oempleado->conectar_db($conexion);
$datos_emp = $oempleado->listaempl();
if ($datos_emp){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
            <h4>Lista de usarios</h4>
            </div>  
            <div> 
            <link rel="stylesheet" href="Portada/botones.css">
        <a href="agrega_emp.php" class="glow-on-hover">Nuevo</a>
        </div> 
        <br>
        <br>
        <div class="card card-body">

    
<!-- para mensajes -->
<?php if(isset($_SESSION['mensaje'])) {?>


  <?php echo $_SESSION['mensaje']; ?>
  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
    
  </button>
</div>
<?php session_unset(); } ?>

</div>
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>usuario</th>
                    
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos_emp)){
        $id=$row['idEmpleado'];
        $nom=$row['nombre'];
        $dir=$row['direccion'];
        $tel=$row['telefono'];
        $usu=$row['usuario'];
        
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nom; ?></td>
                    <td><?php echo $dir; ?></td>
                    <td><?php echo $tel; ?></td>
                    <td><?php echo $usu; ?></td>
                    
                    <td>
                    <a href="modifica_emp.php?codigo=<?php echo $id; ?>" class="glow-on-hover">Modificar</a>   
                    <a href="elimina_emp.php?codigo=<?php echo $id; ?>" class="glow-on-hover">Eliminar</a>    
                    </td>
                </tr>
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