<?php include_once('header.php') ?>
<br><br>
<div class="container p-12">
    <div class="row">
        <div class="col-md-8 mx-auto">
        <div class="card card-body" style="width: 500px;">
                <h3>Buscar ventas por cliente</h3>
                <form action="buscar_ventas.php" method="post">
                    <div class="form-group">
                        <label for="cliente">Nombre del cliente:</label>
                        <input type="text" name="cliente" id="cliente" class="form-control" placeholder="Ingrese el nombre del cliente">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="buscar_ventas" value="Buscar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  
<?php include_once('footer.php') ?>
