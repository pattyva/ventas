<?php include_once('header.php') ?>
<br><br>
<div class="container p-12">
<div class="row">
<div class="col-md-8 mx-auto">
            <div class="card card-body" style="width: 500px;">
                    <form action="agrega_linea.php" method="post">
                        <div class="form-group">
                        <input type="text" name="nom" class="form-control" placeholder="Nombre de la nueva categoria" autofocus>
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