<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/producto.php');
include_once('footer.php');
$conexion = connect_db();
$oproducto = new Producto();
$oproducto->conectar_db($conexion);
$datos_produ = $oproducto->listaprodu();
if ($datos_produ){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
        <h4>Listado de Productos...</h4>
        </div>  
            <div> 
        <link rel="stylesheet" href="Portada/botones.css">
        <a href="agrega_prod.php" class="glow-on-hover">Nuevo</a>
        </div>  
        <br>
        <br>
        <div class="card card-body">
        
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Unidad</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Costo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos_produ)){
        $id=$row['idProducto'];
        $nom=$row['nomproducto'];
        $und=$row['unimed'];
        $can=$row['stock'];
        $pre=$row['preuni'];
        $cos=$row['cosuni'];
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nom; ?></td>
                    <td><?php echo $und; ?></td>
                    <td><?php echo $can; ?></td>
                    <td><?php echo $pre; ?></td>
                    <td><?php echo $cos; ?></td>
                    <td class ="cuerpo">
                    <a href="modifica_prod.php?codigo=<?php echo $id; ?>" class="glow-on-hover">Modificar</a>   
                    <a href="elimina_prod.php?codigo=<?php echo $id; ?>" class="glow-on-hover">Eliminar</a>    
                    </div>   
                      
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