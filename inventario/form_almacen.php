<!DOCTYPE html>
<html lang="es">
<?php
 Require("menu.php");?>
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Solicitud de Materiales a Almacen</title>
</head>
<body>
  
    <div id="head"  style="margin-top: 4.1%">
    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Almacén de medicamentos, insumos médicos, papelería y otros artículos</h3>
    </div>
    <br>

  <div style="position: all; width: 70%; height: 110%;margin-top: 5%" class="container">
  <form style="position: all; width: 70%; height: 110%;margin-top: 15%"   action="dt_sol_almacen.php" method="POST" style="height: 50px;">

      <section>
        <br>
        <h3 align="center">Solicitud de materiales</h3>
          <br>

        <div class="container">

           <div class="row">
               <div class="col">
            <div class="col-md-11">
                <select class="form-select" name="um" id="um" required>
                  <option selected disabled value="">U/M</option>
                  <option value="U">U</option>
                  <option value="M">M</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid state.
                </div>
              </div>
    </div>
   
    <div class="col-6">
       <div align="rigth">
      <div class="col-md-11">
       <input  class="form-control"  type="number" name="cod" id="cod" placeholder="Código" required>
      </div>
  </div>
</div>
 </div>


  <div class="row">
    <div class="col-6">
      <div class="col-md-12">
       <input  class="form-control" style="width: 220px; margin-top: 30px;" type="text" name="nombre" id="nombre" placeholder="Nombre del artículo" required>
     </div>
    </div>
    <div class="col">
      <div class="col-md-12">
     <input  class="form-control" style="width: 220px; margin-top: 30px;" type="number" name="cantSol" id="cantSol" placeholder="cantidad Solicitada" required>
   </div>
    </div>
  </div>


  <div class="row">
    <div class="col">
          <input  class="form-control" style="width: 220px; margin-top: 30px;" type="number" name="cantDes" id="cantDes" placeholder="Cantidad Despachada" required>
    </div>
  
    <div class="col">
      <input  class="form-control" style="width: 220px; margin-top: 30px; " type="number" name="cu" id="cu" placeholder="Costo Unitario" required>
    </div>
     <div class="col">
    <div class="col-md-12">
      <input  class="form-control" style="width: 220px; margin-top: 30px; " type="text" name="depto" id="depto" placeholder="Departamento" required>
    </div>
  </div>
  </div>
</div> 
 
    
          <br>
           <div align="center">
            <input  style=" width:35%; margin: 5%; width: 30%; height: 10%;" type="submit" value="Aceptar">
          </div>
      </section>
    </form> 
  </div>
       
<?php include("footer.php")?>

</body>
</html>