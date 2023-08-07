<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/producto.php');
$conexion = connect_db();
$oproducto = new Producto();
$oproducto->conectar_db($conexion);
$datos=$oproducto->consulta($codigo);

?>
<?php include_once('clases/linea.php'); 
 include_once('includes/acceso.php');
$conexion = connect_db();

    $linea = new Linea();
    $linea->conectar_db($conexion);
    $listaLinea = $linea->listaLinea();?>
    <br><br>
<div class="container p-12">
<div class="row">
<div class="col-md-8 mx-auto">
            <div class="card card-body" style="width: 400px;">
        <form action="modifica_producto.php" method="post">
        <div class="form-group">
        <div class="col-md-6">Codigo:</div>
        <div class="col-md-4">
            <input type="text" name="idproducto" class="form-control" value="<?php echo $codigo;?>" readonly>
            </div>
            <div class="col-md-4">Descripcion:</div>
            <div class="col-md-6">
            <input type="text" name="nom" class="form-control" value="<?php echo $datos['nomproducto'];?>" >
        </div>
        <div class="col-md-4">Unidad medida:</div>
        <div class="col-md-6">
            <input type="text" name="und" class="form-control" value="<?php echo $datos['unimed'];?>">
            </div>
            <div class="col-md-4">Stock:</div>
            <div class="col-md-6">
            <input type="text" name="can" class="form-control" value="<?php echo $datos['stock'];?>">
            </div>
            <div class="col-md-4">Precio Unitario:</div>
            <div class="col-md-6">
            <input type="text" name="pre" class="form-control" value="<?php echo $datos['preuni'];?>">
            </div>
            <div class="col-md-4">Costo Unitario:</div>
            <div class="col-md-6">
            <input type="text" name="cos" class="form-control" value="<?php echo $datos['cosuni'];?>">
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
            <div class="col-md-4">
            <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
            </div>
        </form>

    </div>
  </div>
 </div>  
<?php include_once('footer.php') ?>