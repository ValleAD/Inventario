<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Registro de Productos</title>
</head>
<body>

    <div id="head">

    <a href="home.php"><button>Volver</button></a>   

        <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>

    </div>
    <br>

<div class="container">
    <form action="dt_form_vale.php" method="POST" style="height: 740px">

      <section>
        <br>
        <h3 align="center">Registro de productos</h3>

          <label for="cod">CÓDIGO DEL PRODUCTO</label><br>
          <input type="number" name="cod" id="cod" required>
          <br>
          <label for="catal">CODIFICACIÓN DE CATALOGO <br>DE NACIONES UNIDAS</label><br>
          <input type="number" name="catal" id="catal" required>
          <br>
          <label for="nombre">NOMBRE DEL ARTICULO</label><br>
          <input type="text" name="nombre" id="nombre">
          <br>
          <label for="descr">DESCRIPCIÓN COMPLETA</label><br>
          <input type="text" name="descr" id="descr" required>
          <br>
          <label for="um">U/M</label><br>
          <input type="text" name="um" id="um" required>
          <br>
          <label for="cant">CANTIDAD</label><br>
          <input type="number" name="cant" id="cant" required>
          <br>
          <label for="cu">COSTO UNITARIO</label><br>
          <input type="number" name="cu" id="cu" required>
          <br>
          <div align="center">
            <input type="submit" value="REGISTRAR">
          </div>
      </section>
    </form> 
  </div>

    <footer>

    <aside style="position: absolute;">
    <img src="img/log_1.png" alt="" width="260px" height="100px">
    </aside>

    <center><br>
    <p>Copyright© 2021<br>
        <br>Hospital Nacional Santa Teresa de Zacatecoluca</b>
    </p>   
    </center>

</footer>
    
</body>
</html>