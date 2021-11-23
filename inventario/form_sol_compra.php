<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        alert("Por favor debes de iniciar sesión");
        window.location ="signin.php";
        session_destroy();  
                </script>
die();

    ';
}
    
?><?php 

session_start();

if (!isset($_SESSION['signin']) ) {
    header("Location: signin.php");
}

?>
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

    <div  class="container-fluid" id="head"> 
 <a href="home.php"><button>Volver</button></a>  
    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Unidad de adquisiciones y contrataciones institucional</h3>
    </div>
    <br>
  <div  class="container-fluid" style="position: all; width: 70%; height: 110%;margin-top: 1%" class="container">
  <form style="position: all; width: 70%; height: 110%;margin-top: 10%" action="dt_sol_compra.php" method="POST" style="height: 880px">

            <section>
            <br>
            <h3 align="center">Solicitud de compra</h3>
            
            <label for="depto">DEPENDENCIA SOLICITANTE</label><br>
            <input  class="form-control" type="text" name="depto" id="depto" required>
            <br>
            <label for="sum">SUMINISTRO SOLICITADO</label><br>
            <input  class="form-control" type="text" name="sum" id="sum" required>
            <br>
            <label for="cod">CÓDIGO</label><br>
            <input  class="form-control" type="number" name="cod" id="cod" required>
            <br>
            <label for="codna">CODIFICACIÓN DE CATALOGO DE NU</label><br>
            <input  class="form-control" type="number" name="cdona" id="cdona" required>
            <br> 
           <label>DESCRIPCION</label>
            <textarea class="form-control z-depth-1" id="exampleFormControlTextarea345" name="desc" rows="3" placeholder="Write your comment..."></textarea>
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
            <br>
            <label for="cant">CANTIDAD</label><br>
            <input  class="form-control" type="number" name="cant" required>
            <br>
            <label for="cu">COSTO UNITARIO ESTIMADO</label><br>
            <input  class="form-control" type="number" name="cu" id="cu" required>
            <br>
            <label for="total">MONTO TOTAL ESTIMADO</label><br>
            <input  class="form-control" type="number" name="total" id="total" required>
            <br>
             <div align="center">
            <input  style=" width:35%; margin: 5%; width: 30%; height: 10%;" type="submit" value="Aceptar">
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