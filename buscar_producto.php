<?php
// consultar_ventas_producto.php

// Verificar si se ha enviado el formulario
if (isset($_POST['buscar_ventas'])) {
    // Obtener el nombre del producto ingresado en el formulario
    $producto = $_POST['producto'];

    // Realizar la consulta en la base de datos para obtener las ventas del producto
    // Aquí deberías utilizar tu conexión a la base de datos y realizar la consulta apropiada

    // Ejemplo de consulta usando MySQLi
    // $query = "SELECT * FROM ventas WHERE producto LIKE '%$producto%'";
    // $result = $conexion->query($query);

    // Ejemplo de consulta usando PDO
    // $query = "SELECT * FROM ventas WHERE producto LIKE :producto";
    // $stmt = $conexion->prepare($query);
    // $stmt->bindValue(':producto', "%$producto%", PDO::PARAM_STR);
    // $stmt->execute();
    // $result = $stmt->fetchAll();

    // Mostrar los resultados de la consulta
    // Aquí deberías iterar sobre los resultados y mostrarlos en una tabla o de la manera que prefieras

    // Ejemplo de mostrar resultados en una tabla
    ?>
    <?php include_once('header.php') ?>
    <br><br>
    <div class="container p-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <h3>Listado de ventas para el producto: <?php echo $producto; ?></h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí deberías iterar sobre los resultados y mostrar cada fila de la tabla -->
                            <!-- Ejemplo:
                            <?php foreach ($result as $venta): ?>
                                <tr>
                                    <td><?php echo $venta['id']; ?></td>
                                    <td><?php echo $venta['cliente']; ?></td>
                                    <td><?php echo $venta['monto']; ?></td>
                                    <td><?php echo $venta['fecha']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
    <?php include_once('footer.php') ?>
    <?php
}
?>
