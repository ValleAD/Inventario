<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vale</title>
</head>
<body>

    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Departamento de mantenimiento</h3>
 
    <div class="container">
    <form action="dt_form_vale.php" method="POST">

   <section>
     <br>
   <h3 align="center">Solicitud de materiales</h3>

    <div align="right">
      <label name="orden" style="margin-right: 100px;">VALE No.</label>
      <br>
      <input type="number" style="margin-right: 10px;" required>
    </div>
          
      <label for="fech">FECHA:</label><br>
      <input type="datetime" name="fech" id="fech" required><br>
      <label for="depto">DEPTO. O SERVICIO:</label><br>
      <input type="text" name="depto" id="depto" required>
      <br>
        <label for="cod">CÓDIGO</label><br>
        <input type="number" name="cod" id="cod" required>
        <br>
        <label for="um">U/M</label><br>
        <input type="text" name="um" required>
        <br>
        <label for="cu">COSTO UNITARIO</label><br>
        <input type="text" name="cu" required>
        <br>
        <label for="desc">DESCRIPCIÓN</label><br>
        <input type="text" name="desc" required>
        <br>
        <label for="cant">CANTIDAD</label><br>
        <input type="number" name="cant" required><br>
        <div align="center"><input type="submit" value="ACEPTAR">
      </div>
    </div> 
   </section>
  </form>        
  
  <footer>

      <div id=log>
        <img src="img/log.png" alt="">
      </div>   

    <div align="center" id="text">
      <p>Derechos reservados 
      <br>Hospital Nacional Santa Teresa de Zacatecoluca
      </p>
    </div>
  </footer>
          
</body>
</html>