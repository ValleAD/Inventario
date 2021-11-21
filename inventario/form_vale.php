<!DOCTYPE html>
<html lang="es">
<?php
 Require("menu.php");
?>
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
  
<div id="head"  style="margin-top: 4.1%">
   
    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Departamento de mantenimiento</h3>
  </div>
  </div>
    <br>
 
    <div class="container" style="position: all; width: 70%; height: 100%;margin-top: 15%" >
      <form style="position: all; width: 70%; height: 100%;margin-top: 15%"  action="dt_form_vale.php" method="POST">

        <section>
          <br>
        <h3 align="center">Solicitud de materiales</h3>

        <div align="right">
          <label style="margin-right: 135px;">VALE No.</label>
          
          <div class="col-md-3">
          <input name="orden" class="form-control" type="number" style="margin-right: 10px;margin-bottom: -15%;margin-top: -25%;" required>
        </div>
        </div>
          
          <label for="fech">FECHA:</label><br>
          <input  class="form-control" type="datetime" name="fech" id="fech" required><br>
          <label for="depto">DEPTO. O SERVICIO:</label><br>
          <input  class="form-control" type="text" name="depto" id="depto" required>
          <br>
          <label for="cod">CÓDIGO</label><br>
          <input  class="form-control" type="number" name="cod" id="cod" required>
          <br>
          <label for="desc">DESCRIPCIÓN</label><br>
          <input  class="form-control" type="text" name="desc" id="desc" required>
          <br>
          <label for="cu">COSTO UNITARIO</label><br>
          <input  class="form-control" type="number" name="cu" id="cu" required>
          <br>
          <div class="col-md-12">
                <label for="um" class="form-label">U/M</label>
                <select class="form-select" name="um" id="um" required>
                  <option selected disabled value="">Selecione Opcion</option>
                  <option value="U">U</option>
                  <option value="M">M</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid state.
                </div>
              </div>
          <label for="cant">CANTIDAD</label><br>
          <input  class="form-control" type="number" name="cant" id="cant" required><br>

          <div align="center">
            <input  style=" margin: 5%; width: 30%; height: 10%;" type="submit" value="Aceptar">
          </div>
      
        </section>
      </form>
    </div>         
  
<?php include("footer.php")?>
          
</body>
</html>