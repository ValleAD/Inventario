<?php 

session_start();

if (!isset($_SESSION['signin'])) {
    header("Location: signin.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <link rel="stylesheet" type="text/css" href="styles/estilos_menu.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Inicio</title>
</head>
<body>
    <nav  class="container-fluid">
        <ul>
            <li><a href="reg_producto.php">Registro de productos</a></li>
            <li><a href="form_sol_almacen.php">Solicitud de materiales a almacen</a></li>
            <li><a href="form_sol_bodega.php">Solicitud de materiales a bodega</a></li>
            <li><a href="form_vale.php">Vale</a></li>
            <li><a href="form_sol_compra.php">Solicitud de compra</a></li>
            <li><a href="logout.php">Cerrar Sesion</a></li>
        </ul>
    </nav>
      <center> <h1 style="margin-top: 11%">Bienvenidos al Sistema de Inventario del <br> Hospital Nacional Santa Teresa de Zacatecoluca</h1></center>
<footer style="margin-top:  14%;">

  <div align="center">
  <img src="img/log_1.png" alt="" width="320px" height="150px">
  </div>

</footer>
          
</body>
</html>