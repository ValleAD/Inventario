<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
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
    <link rel="stylesheet" href="Plugin/bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Solicitud de materiales a almacén</title>
</head>
<body>


 
<?php
    
    if ( isset($_POST["cod"]) ) { 

      $fecha=$_POST['fech'];
      $Depto=$_POST['depto'];

      $final = 0;

      echo 
      '
<form  style="position: all; width: 70%; height: 100%;margin-bottom: 5%;margin-top: -40%;">
         
      <section>
        <div class="table-responsive">
        <table class="table" style="margin-top: 20px;">
          <tr>
            <td><strong>Código</strong></td>
            <td><strong>Descripción</strong></td>
            <td><strong>U/M</strong></td>
            <td><strong>Cantidad Solicitada</strong></td>
            <td><strong>Cantidad Despachada</strong></td>
            <td><strong>Costo unitario</strong></td>
            <td><strong>Total</strong></td>
          </tr>';

      for($i = 0; $i < count($_POST['cod']); $i++)
    {
       
        $codigo = $_POST['cod'][$i];
        $nom = $_POST['nom'][$i];
        $um = $_POST['um'][$i];
        $cant_sol = $_POST['cant_sol'][$i];
        $cant_des = $_POST['cant_des'][$i];
        $cost = $_POST['cu'][$i];

    $total[$i] = $cost * $cant_des;
    $final = $final + $total[$i];
      
      
  echo'  
      <tr>
        <td>' .$codigo. '</td>
        <td>' .$um. '</td>
        <td>' .$nom. '</td>
        <td>' .$cant_sol. '</td>
        <td>' .$cant_des. '</td>
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
            <input class="form-control" type="text" value="' .$Depto. '">
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
<?php include ('footer.php');?>
  </body>
  </html>


