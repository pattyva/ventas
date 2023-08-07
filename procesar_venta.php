<?php
include_once("includes/acceso.php");
include_once('clases/empleado.php');
include_once("clases/cliente.php");
include_once("clases/documento.php");
include_once("clases/producto.php");
include_once("clases/venta.php");
// creacion objetos
$conexion = connect_db();
$oempleado = new Empleado();
$oempleado->conectar_db($conexion);
$datos_emp = $oempleado->listaempl();

$conexion = connect_db();
$ocli = new Cliente();
$ocli->conectar_db($conexion);
$datos_cli = $ocli->listacli();

$conexion = connect_db();
$oven = new Venta();
$oven->conectar_db($conexion);
$datos_ven = $oven->listaventa();

$conexion = connect_db();
$oempleado = new Empleado();
$oempleado->conectar_db($conexion);
$datos_empleado = $oempleado->listaempl();

$odoc = new Documento();
$odoc->conectar_db($conexion);
$datos_doc = $odoc->listadocu();

$oprodu = new Producto();
$oprodu->conectar_db($conexion);
$datos_produ = $oprodu->listaprodu();

if (isset($_POST['envia_datos'])){
          
    //OBTENEMOS LOS DATOS DE LA VENTA
    $fecha = $_POST['fecha'];
    $idCliente = $_POST["idCliente"];
    $idEmpleado = $_POST["idEmpleado"];
    $idDocumento = $_POST["idDocumento"];
    $Importe = $_POST["total"];
    $igv = $_POST["igv"];
    
    

    switch ($idDocumento) {
        case 1:
            // Insertar en la tabla factura_venta
            $query = "INSERT INTO factura_venta (indice) VALUES ('F-901')";
            $res = mysqli_query($this->conexion, $query);
            if ($res) {
                return true;
            } else {
                return false;
            }
        case 2:
            // Insertar en la tabla boleta_venta
            $query = "INSERT INTO boleta_venta (indice) VALUES ('B-901')";
            // Reemplaza 'campo_columna1' y 'campo_columna2' con los nombres reales de las columnas de la tabla boleta_venta, y los valores 'valor1' y 'valor2' con los datos que deseas insertar.
            break;
        case 3:
            // Insertar en la tabla comprobante_venta
            $query = "INSERT INTO comprobante_venta (indice) VALUES ('C-901')";
            break;
        default:
            // Acción por defecto si el valor de idDocumento no coincide con ningún caso anterior.
            break;
    }
    
    $resultado = $oven->agrega_venta($fecha, $idCliente, $idEmpleado, $idDocumento, $Importe, $igv);
   //VALIDAR EL REGISTRO
    if ($resultado) {
        $_SESSION["mensaje"] = "Venta agregada satisfactoriamente";
        $_SESSION["mensaje_tipo"] = "success";
    } else {
        $_SESSION["mensaje"] = "No se pudo agregar la venta en la base de datos.";
        $_SESSION["mensaje_tipo"] = "error";
    }
    header("location:registro_ventas.php");
    
}
include_once("header.php");
?>
 
    

   