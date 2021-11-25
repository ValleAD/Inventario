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
    
?><!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Solicitud de Bodega</title>
</head>
<body>

<div id="head"  style="position: absolute;
  height: 17% ;margin-top: -15">
   <div style="float: left; position: absolute;">
      <img src="img/log.png" height="110px">
    </div>
    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Departamento de mantenimiento</h3>
  </div>
  <br>
 

<?php
    
    if ( isset($_POST["desc"]) ) { 

      $sol = $_POST['sol'];

      $final = 0;

      echo 
      '
<form  style="position: all; width: 70%; height: 100%;margin-bottom: 5%;">
         
      <section>
        <div align="right">
            <label style="font-weight: bold; margin-right: 135px;">No. de Solicitud</label>
            <div class="col-md-2">
              <input class="form-control" type="number" value="'.$sol.'" style="margin-right: 10px;margin-bottom: -15%;margin-top: -25%;" required>
            </div>
        </div>
        <br>
        <br>
        <div class="table-responsive">
        <table class="table">
          <tr>
            <td><strong>Descripción de los materiales</strong></td>
            <td><strong>Unidad de Medida</strong></td>
            <td><strong>Cantidad Solicitada</strong></td>
            <td><strong>Costo Estimado</strong></td>
            <td><strong>Total</strong></td>
          </tr>';

      for($i = 0; $i < count($_POST['desc']); $i++)
    {
       
        $des = $_POST['desc'][$i];
        $um = $_POST['um'][$i];
        $cantidad = $_POST['cant'][$i];
        $cost = $_POST['cu'][$i];

        $total[$i] = $cost * $cantidad;
        $final = $final + $total[$i];
      
      
  echo'  
      <tr >
        <td>' .$des. '</td>
        <td>' .$um. '</td>
        <td>' .$cantidad. '</td>
        <td>$' .$cost. '</td>
        <td>$' .$total[$i]. '</td>
      </tr>'; 
}
      echo'
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td><strong>Costo estimado a realizar</strong></td>
          <td>$ '.$final.'</td>
        </tr>
      </table>   
    </section>
</form>
      ';
  }
?>            
    
</body>
</html>


