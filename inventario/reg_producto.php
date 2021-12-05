
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/styles.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Registro de Productos</title>
</head>
<body>
<?php include ('menu.php')?>
  <div style="position: all; width: 70%; height: 110%;margin-top: 1%" class="container-fluid">
  <form style="margin-top: -63%;"  action="dt_producto.php" method="POST">

      <section>
        <br>
        <h3 align="center">Registro de productos</h3>

          <label for="cod">CÓDIGO DEL PRODUCTO</label><br>
          <input  class="form-control"type="number" name="cod" id="cod" required>
          <br>
          <label for="catal">CODIFICACIÓN DE CATALOGO <br>DE NACIONES UNIDAS</label><br>
          <input  class="form-control" type="number" name="catal" id="catal" required>
          <br>
          <label for="nombre">NOMBRE DEL ARTICULO</label><br>
          <input  class="form-control" type="text" name="nombre" id="nombre">
          <br>
          <label for="descr">DESCRIPCIÓN COMPLETA</label><br>
          <input  class="form-control" type="text" name="descr" id="descr" required>
          <br>
         <div class="col-md-12">
                <label for="um" class="form-label">U/M</label>
                <select class="form-select" name="um" id="um" required>
                  <option selected disabled value="">Selecione Opción</option>
                  <option value="U">U</option>
                  <option value="M">M</option>
                </select>
                <div class="invalid-feedback">
                  Selecciona una opción por favor
                </div>
              </div>
          <br>
          <label for="cant">CANTIDAD</label><br>
          <input  class="form-control" type="number" name="cant" id="cant" required>
          <br>
          <label for="cu">COSTO UNITARIO</label><br>
          <input  class="form-control" type="decimal" name="cu" id="cu" required>
          <br>
           <div align="center">
            <input  style=" width:35%; margin: 5%; width: 30%; height: 10%;" type="submit" value="Aceptar">
          </div>
      </section>
    </form> 
  </div>
  <?php include ('footer.php');?>
          
</body>
</html><a href="vistaProductos.php"><input type="button" value="ver Productos"></a>