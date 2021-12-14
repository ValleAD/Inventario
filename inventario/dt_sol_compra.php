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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Solicitud de Compra</title>
</head>
<body>


  <br>
 
<?php
    
    if ( isset($_POST["cod"]) ) { 

      $fecha = $_POST['fech'];
      $Depto = $_POST['depto'];
      $solicitud = $_POST['sol'];

      $final = 0;

      echo 
      '
<form style="position: all; width: 70%; height: 100%;margin-bottom: 5%;margin-top: 1%;background: #54C10F;">
         <div class="container-fluid" style="margin:1%" >
               <div class="row">

          <div class="col-4">
            <label style="font-weight: bold;">Departamento que solicita:</label>
            <input style="background:transparent;" class="form-control" type="text" value="' .$solicitud. '">
          </div>
      
          <div class="col-4">
              <label style="font-weight: bold;">Fecha:</label>
              <input style="background:transparent;" class="form-control" type="text" value="' .$fecha. '">
          </div>
         </div><br>

        <div class="table-responsive container-fluid">
      <table class="table table-bordered">
          <tr>
            <td class=" text-dark "><strong>Código</strong></td>
            <td class=" text-dark "><strong>Codificación de Catálogo</strong></td>
            <td class=" text-dark "><strong>Descripción Completa</strong></td>
            <td class=" text-dark "><strong>U/M</strong></td>
            <td class=" text-dark "><strong>Cantidad</strong></td>
            <td class=" text-dark "><strong>Costo unitario (Estimado)</strong></td>
            <td class=" text-dark "><strong>Total (Estimado)</strong></td>
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
      </tr>

    
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>Total</strong></td>
            <td>$ '.$final.'</td>
        </tr>
'; } ?>     
 </table>     
    
    <section>
    
          

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
      </section></div></div>
</form>
<?php
  }
?>            
<?php include ('footer.php');?>
  </body>
  </html>


