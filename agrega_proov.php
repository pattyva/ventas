<?php include_once('header.php') ?>
<?php include_once('clases/linea.php'); 
 include_once('includes/acceso.php');
$conexion = connect_db();

    $linea = new Linea();
    $linea->conectar_db($conexion);
    $listaLinea = $linea->listaLinea();?>
<div class="container p-12">
<div class="row">
<div class="col-md-8 mx-auto">
            <div class="card card-body" style="width: 500px;">
                    <form action="agrega_proveedor.php" method="post">
                        <div class="form-group">
                        <input type="text" name="nom" class="form-control" placeholder="Nombre proveedor" autofocus>
                        </div>
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
                        <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                        </div>
                    </form>

                </div>

            </div>
            </div>
            </div>  
<?php include_once('footer.php') ?>