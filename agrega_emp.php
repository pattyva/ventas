<?php include_once('header.php') ?>
<div class="container p-4">
<div class="row">
<div class="col-md-8 mx-auto">
            <div class="card card-body" style="width: 600px;">
                    <form class="col-12" action="agrega_empleado.php" method="post">
                        <div class="form-group">
                        <input type="text" name="nom" class="form-control" placeholder="Nombre Empleado" autofocus require>
                        </div>
                        <div class="form-group">
                        <input type="text" name="dir" class="form-control" placeholder="Direccion"  require>
                        </div>
                        <div class="form-group">
                        <input type="text" name="tel" class="form-control" placeholder="Telefono">
                        </div>
                        <div class="form-group">
                        <input type="text" name="usu" class="form-control" placeholder="Nombre usuario">
                        </div>
                        <div class="form-group">
                        <input type="password" name="pass" class="form-control" placeholder="Password">
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