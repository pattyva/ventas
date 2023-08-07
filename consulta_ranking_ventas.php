<?php
session_start();
if (!isset($_SESSION['login_estado']) or $_SESSION['login_estado'] != 1) {
    header("location: login.php");
    exit;
}
include_once("includes/acceso.php");
include_once("clases/venta.php");
include_once("clases/cliente.php");
include_once("clases/producto.php");
include_once("clases/linea.php");
include_once("clases/empleado.php");

$conexion = connect_db(); // Establece la conexión a la base de datos

$oven = new Venta();
$oven->conectar_db($conexion);
$datos_ven = $oven->listaventa();

$conexion = connect_db();
$ocli = new Cliente();
$ocli->conectar_db($conexion);
$datos_cli = $ocli->listacli();

$oprodu = new Producto();
$oprodu->conectar_db($conexion);
$datos_produ = $oprodu->listaprodu();


$conexion = connect_db();
$oempleado = new Empleado();
$oempleado->conectar_db($conexion);
$datos_empleado = $oempleado->listaempl();

?>

<?php include_once('header.php') ?>
<br><br>
<div class="container p-12">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <h3>Ranking de ventas por importe</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Producto</th>
                            <th>Monto</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                       
                       
                        <tr>
                            
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer.php') ?>