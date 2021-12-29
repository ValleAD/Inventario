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
<?php include ('menu.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/estilo.css" > 
    <link rel="stylesheet" href="Plugin/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="Plugin/assets/css/bootstrap-theme.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Vale</title>
</head>
<body>

<?php

$final = 0;

   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_vale";
    $result = mysqli_query($conn, $sql);
 while ($productos1 = mysqli_fetch_array($result)){

 echo'   
<section>
<form method="POST" action="Exportar_PDF/pdf_vale.php" target="_blank">
         
      <section>
        <div class="row">
      
          <div class="col-6 col-sm-3" style="position: initial">
      
              <label style="font-weight: bold;">Depto. o Servicio:</label>
              <input readonly class="form-control"  type="text" value="' .$productos1['departamento']. '" name="depto">
    
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
          </tr>';}
 $sql = "SELECT * FROM detalle_vale";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $final += $productos['total'];
  echo'  
      <tr >
        <td><input  name="cod[]" readonly value="' .$productos['codigo']. '" style="width: 120px; border: none"></td>
        <td><input  name="desc[]" readonly value="'.$productos['descripcion']. '" style="border: none"></td>
        <td><input  name="um[]" readonly value="'.$productos['unidad_medida']. '" style="width: 60px; border: none"></td>
        <td><input  name="cant[]" readonly value="'.$productos['stock']. '" style="width: 60px; border: none"></td>
        <td><input  name="cost[]" readonly value="$'.$productos['precio']. '" style="width: 60px; border: none"></td>
        <td><input  name="tot[]" readonly value="$'.$productos['total']. '" style="width: 90px; border: none"></td>
      </tr>';

}

      echo'
        <tr>
          <td></td>
          <td></td> 
          <td></td>
          <td></td>
          <td><strong>Total</strong></td> 
          <td><input  name="tot_f" readonly value="$'.$final.'"  style="width: 90px; border: none; color: rgb(168, 8, 8); font-weight: bold;"></td>
        </tr>
      </table>   
    <input id="pdf" type="submit" class="btn btn-lg" value="Exportar a PDF" name="pdf">
      <style>
        #pdf{
        margin-left: 38%; 
        background: rgb(175, 0, 0); 
        color: #fff; margin-bottom: 2%; 
        border: rgb(0, 0, 0);
        }
        #pdf:hover{
        background: rgb(128, 4, 4);
        } 
        #pdf:active{
        transform: translateY(5px);
        } 
      </style>
    </section>
</form>
</section>
      ';
?>            
<?php include ('footer.php');?>
  </body>
  </html>


