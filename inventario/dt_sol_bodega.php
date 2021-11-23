<?php
session_start();
 if (!isset($_SESSION['username'])>0) {
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
    
    if ( isset($_POST["cod"]) ) { 

      $fecha=$_POST['fech'];
      $Depto=$_POST['depto'];
      $odt=$_POST['odt'];

      echo 
      '
<form  style="position: all; width: 70%; height: 100%;margin-bottom: 5%;">
         
      <section>
        <div class="row">
          <div class="col-6">
        
              <label style="font-weight: bold;">Fecha:</label>
              <input class="form-control"  type="text" value="' .$fecha. '">
      
          </div>
          <div class="col">
        
              <label style="font-weight: bold;">Depto. o Servicio:</label>
              <input class="form-control"  type="text" value="' .$Depto. '">
    
          </div>
        </div>
      </section> 
  
      <section>
        <div align="right">
            <label style="font-weight: bold; margin-right: 135px;">O. DE T. No.</label>
            <div class="col-md-2">
              <input class="form-control" type="number" value="'.$odt.'" style="margin-right: 10px;margin-bottom: -15%;margin-top: -25%;" required>
            </div>
        </div>
        <br>
        <br>
        <div class="table-responsive">
        <table class="table">
          <tr>
            <td><strong>Código</strong></td>
            <td><strong>Descripción</strong></td>
            <td><strong>U/M</strong></td>
            <td><strong>Cantidad</strong></td>
            <td><strong>Costo unitario</strong></td>
            <td><strong>Total</strong></td>
          </tr>';

      for($i = 0; $i < count($_POST['cod']); $i++)
    {
       
        $codigo = $_POST['cod'][$i];
        $des = $_POST['desc'][$i];
        $um = $_POST['um'][$i];
        $cantidad = $_POST['cant'][$i];
        $cost = $_POST['cu'][$i];

    $total = $cost * $cantidad;
      
      
  echo'  
      <tr >
        <td>' .$codigo. '</td>
        <td>' .$des. '</td>
        <td>' .$um. '</td>
        <td>' .$cantidad. '</td>
        <td>$' .$cost. '</td>
        <td>$' .$total. '</td>
      </tr>'; 
}
      echo'
      </table>
      <div class="container">
        <div class="row">
          <div class="col">
            <p style="font-weight: bold;">  SOLICITA:  </p>
          </div>
          <div class="col-6">
            <p style="margin-left: 80px; font-weight: bold;">  ENTREGA:</p>
          </div>
        </div>
          <div class="col">
        <br>
            <p style="font-weight: bold;">  AUTORIZA:  </p>
        </div>
      </div>       
    </section>
</form>
      ';
  }
?>            
    
</body>
</html>


