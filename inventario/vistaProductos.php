<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        alert("Por favor debes de iniciar sesión");
        window.location ="signin.php";
        session_destroy();  
                </script>
die();

    ';
}
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
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Productos</title>
</head>
<body>
    <div class=" container table-responsive ">
        <h2 class="text-center mg-t" style="color: #fff; margin-top: 2%;">Inventario de productos</h2>
        <table class="table table-dark table-hover table-bordered " style="vertical-align: bottom;">
            <tr>
                <a href="regi_producto.php" class="text btn btn-info "><i class="bi bi-file-earmark-plus-fill"></i> <span>Nuevo Producto</span> </a><br>
                <td class="table-info"><strong>Código</strong></td>
                <td class="table-info"><strong>Codificación de catálogo</strong></td>
                <td class="table-info"><strong>Nombre</strong></td>
                <td class="table-info"><strong>Descripción Completa</strong></td>
                <td class="table-info"><strong>U/M</strong></td>
                <td class="table-info"><strong>Cantidad</strong></td>
                <td class="table-info"><strong>Costo unitario</strong></td>
                <td class="table-info"><strong>Accion</strong></td>
                
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
              
            
               <td> <a style="margin-right: 15%" href="" class="text-primary"><i class="bi bi-pencil-square"></i></a> 
                <a href="" class="text-danger"> <i class="fas fa-trash"></i> </a></td>
            </tr>
              <script src="popper/popper.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>