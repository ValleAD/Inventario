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
    <form action="dt_form_vale.php" method="POST" style="height: 350px;">

      <section>
        <br>
        <h3 align="center">Solicitud de materiales</h3>

          
          <input style="width: 220px; margin-top: 30px;" type="number" name="cod" id="cod" placeholder="Código" required>
         
          <input style="width: 220px; margin-top: 30px; float: right;" type="text" name="um" id="um" placeholder="U/M" required>
         
          <input style="width: 220px; margin-top: 30px;" type="text" name="nombre" id="nombre" placeholder="Nombre del artículo" required>
         
          <input style="width: 220px; margin-top: 30px; float: right;" type="number" name="cantSol" id="cantSol" placeholder="cantidad Solicitada" required>
         
          <input style="width: 220px; margin-top: 30px;" type="number" name="cantDes" id="cantDes" placeholder="Cantidad Despachada" required>
         
          <input style="width: 220px; margin-top: 30px; float: right;" type="number" name="cu" id="cu" placeholder="Costo Unitario" required>
          <br>
          <div align="center">
            <input type="submit" value="ACEPTAR">
          </div>
      </section>
    </form> 
  </div>
       

<footer style="margin-top: 20%;">

  <div align="center">
  <img src="img/log_1.png" alt="" width="320px" height="150px">
  </div>

</footer>

</body>
</html>