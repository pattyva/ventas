<?php include_once('header.php') ?>
<div class="container p-12">
<div class="row">
        <div class="col-md-8 mx-auto">
        <div class="card card-body" style="width: 800px;">
                    <form action="agrega_cliente.php" method="post">
                    
                        <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre Cliente">
                        </div>
                        <div class="form-group">
                        <input type="text" name="ruc" class="form-control" placeholder="Ruc">
                        </div>
                        <div class="form-group">
                        <input type="text" name="dircliente" class="form-control" placeholder="Direccion ">
                        </div>
                        <div class="form-group">
                        <input type="text" name="telcliente" class="form-control" placeholder="Telefono">
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

