<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/proveedor.php');
$conexion = connect_db();
$oproveedor = new Proveedor();
$oproveedor->conectar_db($conexion);
$datos=$oproveedor->consulta($codigo);

?>
<?php include_once('clases/linea.php'); 
 include_once('includes/acceso.php');
$conexion = connect_db();

    $linea = new Linea();
    $linea->conectar_db($conexion);
    $listaLinea = $linea->listaLinea();?> <br><br>
<div class="container p-12">
<div class="row">
<div class="col-md-8 mx-auto">
            <div class="card card-body" style="width: 600px;">
       
            <form action="modifica_proveedor.php" method="post">
        <div class="form-group">
        <div class="col-md-6">Id Proveedor:</div>
            <div class="col-md-6">
            <input type="text" name="idProveedor" class="form-control" value="<?php echo $datos['idProveedor'];?>" readonly>
        </div>
        <div class="col-md-4">Nombre:</div>
        <div class="col-md-6">
            <input type="text" name="nombre" class="form-control" value="<?php echo $datos['nombre'];?>">
            </div>
        <div class="col-md-4">Categoria:</div>
        <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="idl">
                        <?php 
                         while ($rli=mysqli_fetch_array($listaLinea)){
                            $id_cli = $rcli['idLinea'];
                            $nombre = $rcli['nombre'];
                            ?>
    <option value="<?php echo $rli['idLinea']; ?>"><?php echo $rli['nombre']; ?></option>
<?php } ?>

                        </select>
                    </div>
            
            <div class="col-md-4">
            <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
            </div>
        </form>

    </div>
  </div>
 </div>  
<?php include_once('footer.php') ?>