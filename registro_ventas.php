<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include_once("header.php");
include_once("clases/empleado.php");
include_once("clases/cliente.php");
include_once("clases/documento.php");
include_once("clases/producto.php");
include_once("includes/acceso.php");
include_once("clases/venta.php");
include_once("footer.php");

// Conexión a la base de datos
$conexion = connect_db();

$oempleado = new Empleado();
$oempleado->conectar_db($conexion);
$datos_emp = $oempleado->listaempl();

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
?>
<br><br>
<div class="container p-12">
        <div class="row">
        <div class="container p-4">
            <h4>Registro de Ventas</h4>
            </div>  
   
<br><br>

<div class="container-fluid">
<form class="row g-3">
<div class="container">
  
    <div class="col-md-2">
    <label for="inputPassword" class="col-sm-2 col-form-label">Vendedor</label>
    </div>
    <div class="col">
    <input class="form-control" type="text" value="<?php echo $_SESSION['nombre']; ?>" aria-label="readonly input example" readonly>
    <input type="hidden" name="idEmpleado" value="<?php echo $_SESSION['idEmpleado']; ?>">  
  </div>
    <div></div>
    <div class="col-md-2">
    <label for="inputPassword" class="col-sm-2 col-form-label">Documento</label>
    </div>
    <div class="col">
    <select class="form-select" aria-label="Default select example" name="idDocumento" onchange="seleccionarTipoDocumento()">
    <option selected>Seleccione Documento</option>
    <?php
        while ($rdoc=mysqli_fetch_array($datos_doc)){
            $id_doc = $rdoc['idDocumento'];
            $nombre = $rdoc['nombre'];
            ?>
    <option value="<?php echo $id_doc; ?>"><?php echo $nombre; ?></option>
    <?php } ?>
  </select>
    </div>
    <script>
function seleccionarTipoDocumento() {
    var selected_doc = document.getElementsByName('idDocumento')[0].value;
    var campo = document.getElementsByName('nrodocu')[0];

    if (selected_doc == 1) {
        // Insertar en la tabla factura_venta
        var nrodocu = $("#tablaproductos tbody tr").length + 1;
    } else if (selected_doc == 2) {
        // Insertar en la tabla boleta_venta
        var nrodocu = $("#tablaproductos tbody tr").length + 1;
    } else if (selected_doc == 3) {
        // Insertar en la tabla comprobante_venta
        var nrodocu = $("#tablaproductos tbody tr").length + 1;
    } else {
        alert("Tipo de documento no válido.");
        campo.value = "";
        return;
    }

    campo.value = nrodocu;
}

// Llamar a la función seleccionarTipoDocumento() después de seleccionar el tipo de documento
document.getElementsByName('idDocumento')[0].addEventListener('change', seleccionarTipoDocumento);
</script>


    <div class="col">
    <label for="inputPassword" class="col-sm-2 col-form-label">Nro. Documento</label>
    </div>
    <div class="col">
    <input class="form-control" type="text" value="" aria-label="readonly input example" name="nrodocu" readonly>
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label for="inputPassword" class="col-sm-2 col-form-label">Cliente</label>
    </div>
    <div class="col">
    <select class="form-select" aria-label="Default select example" name=" $idCliente">
  ><?php
        while ($rcli=mysqli_fetch_array($datos_cli)){
            $id_cli = $rcli['idCliente'];
            $nombre = $rcli['nombre'];
            ?>
    <option value="<?php echo $id_cli; ?>"><?php echo $nombre; ?></option>
    <?php } ?>
  </select>
    </div>
        
    <div class="col">
    <label for="inputPassword" class="col-sm-2 col-form-label">Tipo Venta</label>
    </div>
    <div class="col">
    <select class="form-select" aria-label="Default select example" name="sel_tipoven">
  <option selected>Seleccione Tipo</option>
  <option value="CON">Venta Contado</option>
  <option value="CRE">Venta Credito</option>
  
  </select>
    </div>
    <div class="col">
    <label for="inputPassword" class="col-sm-2 col-form-label">Fecha</label>
    </div>
    <div class="col">
    <input class="form-control" type="text" aria-label="readonly input example" name="fecha" value="<?php echo date('d-m-Y'); ?>" readonly>
    </div>
  </div>
  </div>
  <table>
<div class="container">
</form>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Agregar Productos
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregando detalle venta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">
    <div class="col">
    <label for="inputPassword" class="col-sm-2 col-form-label">Producto</label>
    </div>
    <div class="col">
  <select class="form-select form-select-lg" aria-label="Default select example" name="idProducto" onchange="obtenerPrecioProducto()">
    <?php
      while ($rpro=mysqli_fetch_array($datos_produ)){
        $id_pro = $rpro['idProducto'];
        $nomprodu = $rpro['nomproducto'];
        $precio = $rpro['cosuni'];
        $unidad = $rpro['unimed'];
    ?>
    <option value="<?php echo $id_pro; ?>" data-precio="<?php echo $precio; ?>" data-unidad="<?php echo $unidad; ?>"><?php echo $nomprodu; ?></option>
    <?php } ?>
  </select>
</div>

<div class="col">
  <label for="inputPassword" class="col-sm-2 col-form-label">Precio</label>
</div>
<script>
function obtenerPrecioProducto() {
  var selectElement = document.getElementsByName("idProducto")[0];
  var selectedOption = selectElement.options[selectElement.selectedIndex];
  var precio_seleccionado = selectedOption.getAttribute("data-precio");
  var inputPrecioElement = document.getElementsByName("preuni")[0];

  // Mostrar el precio en el campo de entrada
  if (precio_seleccionado !== null) {
    inputPrecioElement.value = precio_seleccionado;
  } else {
    inputPrecioElement.value = "";
    alert('El producto seleccionado no tiene precio registrado.');
  }
}
</script>
<div class="col">
  <input class="form-control" type="text" name="preuni" value="" readonly>
</div>     
<div class="col">
  <label for="inputPassword" class="col-sm-2 col-form-label">Cant</label>
</div>
<div class="col">
  <input class="form-control" type="text" name="cant">
</div> 


      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        
        <script>
           var contadorProductos = 0;
           var subtotal = 0; // Variable para almacenar el subtotal
          var impuestoPorcentaje  = 0.18; // Variable para almacenar el impuesto (si aplica)
          var total = 0; // Variable para almacenar el total
  function agregarProducto() {
    // Obtener los valores seleccionados del formulario
    var codigo = $('select[name="idProducto"]').val();
    var producto = $('select[name="idProducto"] option:selected').text();
    var unidad = $('select[name="idProducto"] option:selected').data('unidad');
    var precio = $('input[name="preuni"]').val();
    var cantidad = $('input[name="cant"]').val();

    if (isNaN(cantidad) || cantidad <= 0) {
      alert('Ingrese una cantidad válida.');
      return;
    }

    // Calcular el importe
    var importe = parseFloat(precio) * parseFloat(cantidad);
   //Generar el incrementador
   contadorProductos++;
    // Crear una nueva fila en la tabla con los valores capturados
    var newRow = $("<tr>");
    var cols = "";
    //Agregamos el contador a la columnaNúmero"
    cols += '<td>' + contadorProductos + '</td>';
    cols += '<td>' + codigo + '</td>';
    cols += '<td>' + producto + '</td>';
    cols += '<td>' + unidad + '</td>';
    cols += '<td>' + cantidad + '</td>';
    cols += '<td>' + precio + '</td>';
    cols += '<td>' + importe + '</td>';

    //agregamos botones:
    cols += '<td><button class="btn btn-primary" onclick="editarCantidad(' + contadorProductos + ')">Editar</button>&nbsp;<button class="btn btn-danger" onclick="eliminarProducto(' + contadorProductos + ')">Eliminar</button></td>';
       newRow.append(cols);

    // Agregar la nueva fila a la tabla
    $("#tablaproductos tbody").append(newRow);
    // Actualizar subtotal y total
    subtotal += importe;
    var impuesto = subtotal * impuestoPorcentaje;
    total = subtotal + impuesto;
    $('input[name="subtotal"]').val(subtotal.toFixed(2));
    $('input[name="igv"]').val(impuesto.toFixed(2));
    $('input[name="total"]').val(total.toFixed(2));

    // Cerrar el modal
    $('#exampleModal').modal('hide');
  }

  
</script>
        <button type="button" class="btn btn-primary" onclick="agregarProducto()">Agregar</button>
        
          
      </div>
    </div>
  </div>
</div>

</div>

<div class="container">
<table id="tablaproductos" class="table table-hover">
<thead>
    <th>Nro</th>
    <th>Codigo</th>
    <th>Descripcion</th>
    <th>Unidad</th>
    <th>Cant.</th>
    <th>P.Unit</th>
    <th>Importe</th>
    <th>Acciones</th>
</thead>
<tbody>
    
</tbody>
</table>


<script>
  // Variable para almacenar la cantidad original antes de editar
  var cantidadOriginal;

  // Función para editar la cantidad de un producto
  function editarCantidad(numeroFila) {
  console.log("Editando cantidad para fila: " + numeroFila);
  // Obtener la fila correspondiente al número de fila recibido
  var fila = $("#tablaproductos tbody tr:nth-child(" + numeroFila + ")");

  // Obtener la cantidad actual
  var cantidadActual = fila.find("td:eq(4)").text();

  // Guardar la cantidad original antes de editar
  cantidadOriginal = cantidadActual;

  // Crear un campo de entrada para editar la cantidad
  var campoCantidad = $("<input type='text' class='form-control' value='" + cantidadActual + "'>");

  // Asignar un ID único al campo de entrada de cantidad
  campoCantidad.attr("id", "cantidad-" + numeroFila);

  // Reemplazar el contenido de la columna de cantidad con el campo de entrada
  fila.find("td:eq(4)").html(campoCantidad);

  // Crear un nuevo botón "Guardar"
  var botonGuardar = $("<button class='btn btn-success'>Guardar</button>");

  // Asignar una función al botón "Guardar" y pasarle el número de fila como argumento
  botonGuardar.click(function() {
    guardarCantidad(numeroFila);
  });

  // Reemplazar el botón "Editar" por el botón "Guardar"
  fila.find("td:eq(7)").html(botonGuardar);
 
  // Habilitar nuevamente la función de edición del botón "Editar"
  fila.find("td:eq(7) button").prop("onclick", function() {
    editarCantidad(numeroFila);
  });
}
  // Función para eliminar un producto de la tabla
  function eliminarProducto(rowIndex) {
    $("#tablaproductos tbody tr:nth-child(" + rowIndex + ")").remove();
    recalcularTotal();
  }

  function guardarCantidad(numeroFila) {
  console.log("Guardando cantidad para fila: " + numeroFila);
  var fila = $("#tablaproductos tbody tr:nth-child(" + numeroFila + ")");
  var nuevaCantidad = fila.find("td:eq(4) input").val();

  if (isNaN(nuevaCantidad) || nuevaCantidad <= 0) {
    alert('Ingrese una cantidad válida.');
    return;
  }

  fila.find("td:eq(4)").text(nuevaCantidad);
  
  // Restaurar el botón "Editar"
  fila.find("td:eq(7)").html('<button class="btn btn-primary" onclick="editarCantidad(' + numeroFila + ')">Editar</button>&nbsp;<button class="btn btn-danger" onclick="eliminarProducto(' + contadorProductos + ')">Eliminar</button></td>');
  
  // Recalcular el importe y actualizar la columna correspondiente
  var precio = fila.find("td:eq(5)").text();
  var importe = parseFloat(precio) * parseFloat(nuevaCantidad);
  fila.find("td:eq(6)").text(importe.toFixed(2));

  recalcularTotal();
}
function recalcularTotal() {
  // Lógica para calcular el total de la venta
  var subtotal = 0;
  var igv = 0;
  var total = 0;

  // Calcular el subtotal, igv y total basado en los importes de cada fila de la tabla
  $("#tablaproductos tbody tr").each(function() {
    var importe = parseFloat($(this).find("td:eq(6)").text());
    subtotal += importe;
  });

  igv = subtotal * 0.18;
  total = subtotal + igv;

  // Actualizar los valores de los campos de texto correspondientes
  $("input[name='subtotal']").val(subtotal.toFixed(2));
  $("input[name='igv']").val(igv.toFixed(2));
  $("input[name='total']").val(total.toFixed(2));
}


</script>



<table class="table table-striped">
    <thead>
<th >Subtotal</th>
<th >
<input type="text" style="width:100; align-text:right;" name="subtotal" readonly>
</th>
    </thead>
    <thead>
<th >IGV</th>
<th >
<input type="text" style="width:100; align-text:right;" name="igv" readonly>
</th>
    </thead>
    <thead>
<th >Total Venta</th>
<th >
<input type="text" style="width:100; align-text:right;" name="total" readonly>
</th>
    </thead>
</table>
<hr>
<script>
  // Función para limpiar los campos del formulario
  function limpiarCampos() {
    $('select[name="idProducto"]').val("");
    $('input[name="preuni"]').val("");
    $('input[name="cant"]').val("");
    $('input[name="subtotal"]').val("");
    $('input[name="igv"]').val("");
    $('input[name="total"]').val("");
  }
</script>
<form action="procesar_venta.php" method="post">
    <button type="submit" name="envia_datos" class="btn btn-success">Registrar Venta</button>
    <button type="reset" class="btn btn-success">Limpiar</button>
    

    <input type="hidden" name="fecha" value="<?php echo $fecha; ?>">
    <input type="hidden" name="idCliente" value="<?php echo $id_cli; ?>">
    <input type="hidden" name="idEmpleado" value="<?php echo $idEmpleado; ?>">
    <input type="hidden" name="idDocumento" value="<?php echo $idDocumento; ?>">
    <input type="hidden" name="total" value="<?php echo $total; ?>">
    <input type="hidden" name="igv" value="<?php echo $impuesto; ?>">

  </form><br><br>

  <a href="index.php" class="btn btn-success">Salir</a>
</div>
</div>
</body>
</html>
