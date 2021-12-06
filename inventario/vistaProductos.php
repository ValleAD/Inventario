<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Productos</title>
</head>
<body>
    <div class=" container table-responsive ">
        <h2 class="text-center mg-t">Resultados de productos</h2>
        <table class="table table-dark table-hover table-bordered " style="vertical-align: bottom;">
            <tr>
                <td class="table-info"><strong>Código</strong></td>
                <td class="table-info"><strong>Codificación de catálogo</strong></td>
                <td class="table-info"><strong>Nombre</strong></td>
                <td class="table-info"><strong>Descripción Completa</strong></td>
                <td class="table-info"><strong>U/M</strong></td>
                <td class="table-info"><strong>Cantidad</strong></td>
                <td class="table-info"><strong>Costo unitario</strong></td>
                
            </tr>
<?php
    include 'conexion.php';
    $sql = "SELECT * FROM tb_productos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result))
{
?>
            <tr >
               <td><?php  echo $productos['codProductos']; ?></td>
               <td><?php  echo $productos['catalogo']; ?></td>
               <td><?php  echo $productos['nombre']; ?></td>
               <td><?php  echo $productos['Descripcion']; ?></td>
               <td><?php  echo $productos['unidad_medida']; ?></td>
               <td><?php  echo $productos['stock']; ?></td>
               <td>$<?php  echo $productos['precio']; ?></td>
               <td> <input type="submit" name="Submit" value="Modificar"/></td>
       <td><input type="submit" name="Submit" value="Eliminar"/></td>
            </tr>
</body>
</html>
<?php } ?>