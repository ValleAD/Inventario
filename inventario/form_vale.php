<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <!-- <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vale</title>
</head>
<body>

  <form action="dt_form_vale.php" method="POST">
   <section>
    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Departamento de mantenimiento</h3>
    
    <div align="right">
      <label name="orden" style="margin-right: 100px;">Vale No.</label>
      <br>
      <input type="number" style="margin-right: 10px" required>
    </div>
          
      <h3 align="center">Solicitud de materiales</h3>

      <label for="fech">Fecha:</label>
      <input type="datetime" name="fech" id="fech" required>
      <label for="depto" style="margin-left: 125px;">Depto. o Servicio:</label>
      <input type="text" name="depto" id="depto" required>
      <br>
      <br>
      <div id="grup1">
        <label for="cod">CÓDIGO</label><br>
        <input type="number" name="cod" id="cod" required>
        <br>
        <label for="um">U/M</label><br>
        <input type="text" name="um" required>
        <br>
        <label for="cu">COSTO UNITARIO</label><br>
        <input type="text" name="cu" required>
      </div>

      <div id="grup2">
        <label for="desc">DESCRIPCIÓN</label><br>
        <input type="text" name="desc" required>
        <br>
        <label for="cant">CANTIDAD</label><br>
        <input type="number" name="cant" required>
      </div>
        <input type="submit" value="Aceptar">
   </section>
  </form>         
          
</body>
</html>