<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
         window.location ="log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}
    
?>
<?php include ('templates/menu.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Solicitud de Bodega</title>
</head>
<body>
    <style type="text/css">
              @media (max-width: 952px){
   #section{
        margin-top: 5%;
        margin-left: 15%;
        width: 75%;
        padding: 2%;
    }
    
    </style>
<?php
    
    if ( isset($_POST["desc"]) ) { 

      $sol = $_POST['sol'];

      $final = 0;

      echo 
      '
<form id="section"  style="position: all; width: 70%; height: 100%;margin-bottom: 5%;margin-top: 1%;background: #54C10F;">
    <div class="container-fluid" style="margin:1%" >
        <div align="right">
            <label style="font-weight: bold; margin-right: 20px;">No. de Solicitud</label>
            <div class="col-md-2">
            <input style="background:transparent;"  class="form-control" type="number" value="'.$sol.'" style="margin-right: 10px;margin-bottom: -25%;margin-top: -25%;" required>
            </div>
        </div>
        <br>
        <br>
        <div class="table-responsive container-fluid">
      <table class="table table-bordered">
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
   </div></div>
</form>
      ';
  }
?>
  </body>
  </html>


