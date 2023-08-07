<?php
session_start();
if (!isset($_SESSION['login_estado']) or $_SESSION['login_estado'] != 1) {
    header("location: login.php");
    exit;
}

include_once("clases/venta.php");
include_once("includes/acceso.php");
include_once("footer.php");

$conexion = connect_db();
$oven = new Venta();
$oven->conectar_db($conexion);

if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];

    // Obtener los datos de la venta seleccionada
    $venta = $oven->obtener_venta_por_codigo($codigo);

    if ($venta) {
        // Obtener los datos necesarios para el documento PDF
        $idVenta = $venta['idVenta'];
        $fecha = $venta['fecha'];
        $idCliente = $venta['idCliente'];
        $nombre = $venta['nombre'];
        $idDocumento = $venta['idDocumento'];
        $Importe = $venta['Importe'];
        $IGV = $venta['igv'];

        // Generar el documento PDF con los datos de la venta
        require('fpdf/fpdf.php');

        class PDF extends FPDF
        {
            function Header()
            {
                // Encabezado del PDF
                // ...
            }

            function Footer()
            {
                // Pie de página del PDF
                // ...
            }
        }

        $pdf = new PDF();
        $pdf->AddPage();

        // Agregar los datos de la venta al PDF
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Datos de la venta:', 0, 1);
        $pdf->Cell(0, 10, 'ID de Venta: ' . $idVenta, 0, 1);
        $pdf->Cell(0, 10, 'Fecha: ' . $fecha, 0, 1);
        $pdf->Cell(0, 10, 'ID de Cliente: ' . $idCliente, 0, 1);
        $pdf->Cell(0, 10, 'Nombre de Cliente: ' . $nombre, 0, 1);
        // Agregar más datos según sea necesario...

        // Generar el contenido del PDF
        $pdfContent = $pdf->Output('S');

        // Configurar los headers para mostrar el PDF en el navegador
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="documento.pdf"');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Pragma: public');

        // Mostrar el contenido del PDF en el navegador
        echo $pdfContent;
    } else {
        echo "No se encontró la venta seleccionada.";
    }
} else {
    echo "No se ha especificado la venta a visualizar.";
}
?>
<?php include_once('footer.php') ?>
