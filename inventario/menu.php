<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/estilo_menu.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="home.php" class="enlace">
            <img src="img/log.png" alt="" class="logo">
        </a>
        <ul>
        <li><a href="reg_producto.php">Registro de productos</a></li>
            <li><a href="form_sol_bodega.php">Solicitud de materiales a bodega</a></li>
            <li><a href="form_vale.php">Vale</a></li>
            <li><a href="form_sol_almacen.php">Solicitud de materiales a almacen</a></li>
            <li><a href="form_sol_compra.php">Solicitud de compra</a></li>
            <li><a href="form_sol_circulante.php">Solicitud de fondo circulante</a></li>
            <li><a href="logout.php">Cerrar Sesion</a>
        </li>
        </ul>
    </nav>
    <section></section>
</body>
</html>