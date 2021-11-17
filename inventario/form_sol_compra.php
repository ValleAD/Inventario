<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Solicitud de compra</title>
</head>
<body>

    <div id="head">

    <a href="home.php"><button>Volver</button></a>  

    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Unidad de adquisiciones y contrataciones institucional</h3>
    </div>
    <br>

    <div class="container">
        <form action="dt_form_vale.php" method="POST" style="height: 880px">

            <section>
            <br>
            <h3 align="center">Solicitud de compra</h3>
            
            <label for="depto">DEPENDENCIA SOLICITANTE</label><br>
            <input type="text" name="depto" id="depto" required>
            <br>
            <label for="sum">SUMINISTRO SOLICITADO</label><br>
            <input type="text" name="sum" id="sum" required>
            <br>
            <label for="cod">CÓDIGO</label><br>
            <input type="number" name="cod" id="cod" required>
            <br>
            <label for="codna">CODIFICACIÓN DE CATALOGO DE NU</label><br>
            <input type="number" name="cdona" id="cdona" required>
            <br>
            <label for="desc">DESCRIPCIÓN</label><br>
            <input type="text" name="desc" required>
            <br>
            <label for="um">U/M</label><br>
            <input type="text" name="um" id="um" required>
            <br>
            <label for="cant">CANTIDAD</label><br>
            <input type="number" name="cant" required>
            <br>
            <label for="cu">COSTO UNITARIO ESTIMADO</label><br>
            <input type="number" name="cu" id="cu" required>
            <br>
            <label for="total">MONTO TOTAL ESTIMADO</label><br>
            <input type="number" name="total" id="total" required>
            <br>
            <div align="center"><input type="submit" value="ACEPTAR">
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