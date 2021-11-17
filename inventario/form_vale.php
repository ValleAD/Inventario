<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Vale</title>
</head>
<body>
  
  <div id="head">

    <a href="home.php"><button style="border-radius: 5px; margin-top: 33px;">Volver</button></a>  
   
    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Departamento de mantenimiento</h3>
    </div>
    <br>
 
    <div class="container">
      <form action="dt_form_vale.php" method="POST">

        <section>
          <br>
        <h3 align="center">Solicitud de materiales</h3>

        <div align="right">
          <label name="orden" style="margin-right: 135px;">VALE No.</label>
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
          <label for="desc">DESCRIPCIÓN</label><br>
          <input type="text" name="desc" required>
          <br>
          <label for="cu">COSTO UNITARIO</label><br>
          <input type="text" name="cu" required>
          <br>
          <label for="um">U/M</label><br>
          <input type="text" name="um" required>
          <br>
          <label for="cant">CANTIDAD</label><br>
          <input type="number" name="cant" required><br>

          <div align="center">
            <input type="submit" value="ACEPTAR">
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