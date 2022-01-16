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
    <link rel="stylesheet" type="text/css" href="styles/estilo.css" > 
    <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css"> 
    <link rel="stylesheet" href="Plugin/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="Plugin/assets/css/bootstrap-theme.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Vale</title>
</head>
<body>
    <style type="text/css">
              @media (max-width: 952px){
   #section{
        margin-top: 5%;
        margin-left: 15%;
        width: 75%;
    }
    th{
        width: 25%;
    }
    
    </style>
<?php

$total = 0;
$final = 0;

   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_vale ORDER BY fecha_registro DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($productos1 = mysqli_fetch_array($result)){

 echo'   
<section id="section">
<form method="POST" action="Exportar_PDF/pdf_vale.php" target="_blank">
         
      
        <div class="row">
      
          <div class="col-6.5 col-sm-4" style="position: initial">
      
              <label style="font-weight: bold;">Depto. o Servicio:</label>
              <input readonly class="form-control"  type="text" value="' .$productos1['departamento']. '" name="depto">

          </div>

          <div class="col-6.5 col-sm-4" style="position: initial">
            <label style="font-weight: bold;">N° de Vale:</label>
            <input readonly class="form-control"  type="text" value="' .$productos1['codVale']. '" name="vale">
          </div>

          
          <div class="col-6.5 col-sm-4" style="position: initial">
            <label style="font-weight: bold;">Fecha:</label>
              <input readonly class="form-control"  type="text" value="' .$productos1['fecha_registro']. '" name="fech">
          </div>
        </div>
      
        <br>
          
        <table class="table" >
            
            <thead>
              <tr id="tr">
            <th>Código</th>
            <th style="width: 35%;">Descripción</th>
            <th>Unidad de Medida</th>
            <th>Cantidad</th>
            <th>Costo unitario</th>
            <th>Total</th>
            <th>SubTotal</th>
          </tr>
           <td id="td" colspan="8"><h4>No se encontraron ningun  resultados 😥</h4></td>
           </thead>
            <tbody>';

$num_vale = $productos1['codVale'];
}
 $sql = "SELECT * FROM detalle_vale WHERE numero_vale = $num_vale";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total = $productos['stock'] * $productos['precio'];
      $final += $total;
  echo' 
    <style type="text/css">
     #td{
        display: none;
    }
    
   
</style> 
      <tr >
        <td  data-label="Código"><input  name="cod[]" readonly value="' .$productos['codigo']. '" style="width: 120px; border: none"></td>
        <td  data-label="Descripción"><textarea  name="desc[]" readonly style="border: none">'.$productos['descripcion']. '</textarea></td>
        <td  data-label="Unidada de Medida"><input  name="um[]" readonly value="'.$productos['unidad_medida']. '" style="width: 60px; border: none"></td>
        <td  data-label="Cantidad"><input  name="cant[]" readonly value="'.$productos['stock']. '" style="width: 60px; border: none"></td>
        <td  data-label="Costo unitario"><input  name="cost[]" readonly value="$'.$productos['precio']. '" style="width: 60px; border: none"></td>
        <td  data-label="total"><input  name="tot[]" readonly value="$'.$total. '" style="width: 90px; border: none"></td>
          <td data-label="Subtotal"><input  name="tot_f" readonly value="$'.$final.'"  style="width: 90px; border: none; color: rgb(168, 8, 8); font-weight: bold;"></td>
      </tr>';

}

      echo'

         </tbody>
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
</form>
</section>
      ';
?>            
  </body>
  </html>


