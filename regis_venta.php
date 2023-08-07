<?php
session_start();
if (!isset($_SESSION['login_estado']) or $_SESSION['login_estado'] != 1) {
    header("location: login.php");
    exit;
}

include_once("footer.php");
include_once('clases/empleado.php');
include_once("clases/cliente.php");
include_once("clases/documento.php");
include_once("clases/producto.php");
include_once("includes/acceso.php");
include_once("clases/venta.php");
include_once("procesar_venta.php");
$conexion = connect_db();
$oempleado = new Empleado();
$oempleado->conectar_db($conexion);
$datos_emp = $oempleado->listaempl();

$conexion = connect_db();
$ocli = new Cliente();
$ocli->conectar_db($conexion);
$datos_cli = $ocli->listacli();

$oven = new Venta();
$oven->conectar_db($conexion);
$datos_ven = $oven->listaventa();

$odoc = new Documento();
$odoc->conectar_db($conexion);
$datos_doc = $odoc->listadocu();

$oprodu = new Producto();
$oprodu->conectar_db($conexion);
$datos_produ = $oprodu->listaprodu();

if ($datos_ven) {
?>
  <div class="container p-12">
 
    <div class="row">
        <div class="container p-4">
            <h4>Ventas</h4>
            </div>
            <br>  <br>
            <div> 
        <link rel="stylesheet" href="Portada/botones.css">
            <a href="registro_ventas.php" class="glow-on-hover">Nuevo</a>
        </div>
        <br>
        <br> 
        <div class="card card-body">
       

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>IdVenta</th>
                        <th>Fecha</th>
                        <th>idCliente</th>
                        <th>Vendedor</th>
                        <th>idDocumento</th>
                        <th>Importe</th>
                        <th>IGV</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
while ($row = mysqli_fetch_array($datos_ven)) {
    $id = $row['idVenta'];
    $fecha = $row['fecha'];
    $idCliente = $row['idCliente'];
    $idEmpleado = $row['idEmpleado'];
    $idDocumento = $row['idDocumento'];
    $Importe = $row['Importe'];
    $IGV = $row['igv'];
?>
    <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $fecha; ?></td>
        <td><?php echo $idCliente; ?></td>
        <td><?php echo $idEmpleado; ?></td>
        <td><?php echo $idDocumento; ?></td>
        <td><?php echo $Importe; ?></td>
        <td><?php echo $IGV; ?></td>
        <td>        <a href="elimina_venta.php?codigo=<?php echo $id; ?>" class="glow-on-hover" style="color:red;">Eliminar</a>
            <a href="ver_doc.php?codigo=<?php echo $id; ?>" class="glow-on-hover">Ver</a></td>      
    </tr>
<?php
}
?>
</div>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
} else {
echo "No hay datos de ventas disponibles.";
}

?>
<?php include_once('footer.php') ?>

<style>
.sidebarr {
position: fixed;
top: 0;
right: 0;
bottom: 0;
left: 0;
z-index: 100;
overflow-y: scroll;
background-color: #fff;
}
</style>