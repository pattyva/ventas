<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/cliente.php');
$conexion = connect_db();
$ocliente = new Cliente();
$ocliente->conectar_db($conexion);
$datos = $ocliente->consulta($codigo);
?>
<br><br>
<div class="container p-12">
    <div class="row">
    <div class="col-md-8 mx-auto">
            <div class="card card-body" style="width: 600px;">
            <form action="modifica_cliente.php" method="post">
                <div class="row">
                    
                        <div class="form-group">
                            <label for="id">Id Cliente:</label>
                            <input type="text" name="idCliente" class="form-control" value="<?php echo $datos["idCliente"]; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nom">Nombre cliente:</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $datos['nombre']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="ruc">Direccion:</label>
                            <input type="text" name="ruc" class="form-control" value="<?php echo $datos['ruc']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dir">Ruc:</label>
                            <input type="text" name="dircliente" class="form-control" value="<?php echo $datos['dircliente']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tel">Telefono:</label>
                            <input type="text" name="telcliente" class="form-control" value="<?php echo $datos['telcliente']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once('footer.php') ?>
