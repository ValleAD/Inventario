<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Solicitud de Materiales a Almacen</title>
</head>
<body>
  
    <div id="head">

    <a href="home.php"><button>Volver</button></a> 

    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Almacén de medicamentos, insumos médicos, papelería y otros artículos</h3>
    </div>
    <br>

  <div class="container">
    <form action="dt_form_vale.php" method="POST">

      <section>
        <br>
        <h3 align="center">Solicitud de materiales</h3>

          <label for="cod">CÓDIGO</label><br>
          <input type="number" name="cod" id="cod" required>
          <br>
          <label for="um">U/M</label><br>
          <input type="text" name="um" id="um" required>
          <br>
          <label for="nombre">NOMBRE DEL ARTICULO</label><br>
          <input type="text" name="nombre" id="nombre">
          <br>
          <label for="cantSol">CANTIDAD SOLICITADA</label><br>
          <input type="number" name="cantSol" id="cantSol" required>
          <br>
          <label for="cantDes">CANTIDAD DESPACHADA</label><br>
          <input type="number" name="cantDes" id="cantDes" required>
          <br>
          <label for="cu">COSTO UNITARIO</label><br>
          <input type="number" name="cu" id="cu" required>
          <br>
          <div align="center">
            <input type="submit" value="ACEPTAR">
          </div>
      </section>
    </form> 
  </div>
       

<footer>

  <div align="center">
  <img src="img/log_1.png" alt="" width="320px" height="150px">
  </div>

</footer>

</body>
</html>