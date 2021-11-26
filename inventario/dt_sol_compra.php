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
    
?>
<?php include ('menu.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Solicitud de Compra</title>
</head>
<body>

<div id="head"  style="position: absolute;
  height: 17% ;margin-top: -15">
   <div style="float: left; position: absolute;">
      <img src="img/log.png" height="110px">
    </div>
    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Solicitud de Compra</h3>
   
  </div>
  <br>
 
<?php
    
    if ( isset($_POST["cod"]) ) { 

      $fecha = $_POST['fech'];
      $Depto = $_POST['depto'];
      $solicitud = $_POST['sol'];

      $final = 0;

      echo 
      '
<form style="position: all; width: 70%; height: 100%;margin-bottom: 5%;margin-top: -40%;">
         
      <section>
        <div class="table-responsive">
        <table class="table" style="margin-top: 20px;">
          <tr>
            <td><strong>Código</strong></td>
            <td><strong>Codificación de Catálogo</strong></td>
            <td><strong>Descripción Completa</strong></td>
            <td><strong>U/M</strong></td>
            <td><strong>Cantidad</strong></td>
            <td><strong>Costo unitario (Estimado)</strong></td>
            <td><strong>Total (Estimado)</strong></td>
          </tr>';

      for($i = 0; $i < count($_POST['cod']); $i++)
    {
       
        $codigo = $_POST['cod'][$i];
        $catalogo = $_POST['cat'][$i];
        $desc = $_POST['desc'][$i];
        $um = $_POST['um'][$i];
        $cant = $_POST['cant'][$i];
        $cost = $_POST['cu'][$i];

        $total[$i] = $cost * $cant;
        $final = $final + $total[$i];
      
      
  echo'  
      <tr>
        <td>' .$codigo. '</td>
        <td>' .$catalogo. '</td>
        <td>' .$desc. '</td>
        <td>' .$um. '</td>
        <td>' .$cant. '</td>
        <td>$' .$cost. '</td>
        <td>$' .$total[$i]. '</td>
      </tr>'; 
}
      echo'
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>Total</strong></td>
            <td>$ '.$final.'</td>
        </tr>
      </table>     
    </section>

    <section>
        <div class="row">

          <div class="col-4">
            <label style="font-weight: bold;">Departamento que solicita:</label>
            <input class="form-control" type="text" value="' .$solicitud. '">
          </div>
      
          <div class="col-4">
              <label style="font-weight: bold;">Fecha:</label>
              <input class="form-control" type="text" value="' .$fecha. '">
          </div>
          

          <div class="row">
            <div class="col-6">
              <br>
              <label style="font-weight: bold;">FIRMA</label>
            </div>

            <div class="col-6">
            <br>
            <label style="font-weight: bold;">SELLO</label>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
            <br>  
            <label style="font-weight: bold;">AUTORIZA:</label>
            </div>
          </div> 
        </div> 
        <br>
      </section>
</form>
      ';
  }
?>            
    
</body>
</html>


