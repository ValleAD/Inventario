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
  
<div id="head" >
   
    <a href="home.php"><button>Volver</button></a>  
    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Departamento de mantenimiento</h3>
  </div>
  </div>
    <br>
  <div style="position: all; width: 70%; height: 110%;margin-top: 1%" class="container">
  <form style="position: all; width: 70%; height: 110%;margin-top: 10%"  action="dt_form_vale.php" method="POST">

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
          <input  class="form-control" type="date" name="fech" id="fech" required><br>
          <label for="depto">DEPTO. O SERVICIO:</label><br>
          <input  class="form-control" type="text" name="depto" id="depto" required>
          <br>
          <label for="cod">CÓDIGO</label><br>
          <input  class="form-control" type="number" name="cod" id="cod" required>
          <br>
           <br> 
            <label>DESCRIPCION</label>
            <textarea class="form-control z-depth-1" id="exampleFormControlTextarea345" name="desc" rows="3" placeholder="Write your comment..."></textarea>
          
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
  
<footer style="margin-top: 3%;">

  <div align="center">
  <img src="img/log_1.png" alt="" width="320px" height="150px">
  </div>

</footer>
          
</body>
</html>