<?php include_once('header.php') ?>
<br><br>
<div class="container p-12">
    <div class="row">
        <div class="col-md-6 mx-auto">
        <div class="card card-body" style="width: 500px;">
                <h3>Obtener listados de ventas</h3>
                <form action="lista_ventas.php" method="post">
                    <div class="form-group">
                        <label for="fecha">Fecha específica:</label>
                        <input type="date" name="fecha" id="fecha" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio">Fecha de inicio (rango de fechas):</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin">Fecha de fin (rango de fechas):</label>
                        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control">
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
