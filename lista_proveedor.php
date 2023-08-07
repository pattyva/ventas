<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/proveedor.php');
include_once('footer.php');
$conexion = connect_db();
$oproveedor = new Proveedor();
$oproveedor->conectar_db($conexion);
$datos_proveedor = $oproveedor->listaproveedores();
if ($datos_proveedor){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
        <h4>Listado de Proveedores</h4>
        </div>  
            <div> 
        <link rel="stylesheet" href="Portada/botones.css">
        <a href="agrega_proov.php" class="glow-on-hover">Nuevo</a>
        </div>  
        <br>
        <br>
        <br>
        <div class="card card-body">
        
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos_proveedor)){
        $id=$row['idProveedor'];
        $nom=$row['nombre'];
        $idLinea=$row['idLinea'];
        
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nom; ?></td>
                    <td><?php echo $idLinea; ?></td>
                    
                    <td class="cuerpo">
                    <a href="modifica_prov.php?codigo=<?php echo $id; ?>" class="glow-on-hover">Modificar</a>   
                    <a href="elimina_prov.php?codigo=<?php echo $id; ?>" class="glow-on-hover">Eliminar</a>    
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