<?php
    include 'conexion.php';
    $sql = "SELECT * FROM tb_productos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result))
{
?>
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
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td><strong>Código</strong></td>
                <td><strong>Codificación de catálogo</strong></td>
                <td><strong>Nombre</strong></td>
                <td><strong>Descripción Completa</strong></td>
                <td><strong>U/M</strong></td>
                <td><strong>Cantidad</strong></td>
                <td><strong>Costo unitario</strong></td>
                
            </tr>
            <tr >
               <td><?php  echo $productos['codProductos']; ?></td>
               <td><?php  echo $productos['catalogo']; ?></td>
               <td><?php  echo $productos['nombre']; ?></td>
               <td><?php  echo $productos['Descripcion']; ?></td>
               <td><?php  echo $productos['unidad_medida']; ?></td>
               <td><?php  echo $productos['stock']; ?></td>
               <td>$<?php  echo $productos['precio']; ?></td>
            </tr>
</body>
</html>
<?php } ?>