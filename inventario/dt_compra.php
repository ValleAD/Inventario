<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
         window.location ="../log/signin.php";
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
    <title>Solicitud Compra</title>
</head>
<body>
<style type="text/css">
        form{
          margin: auto;
      }
              @media (max-width: 952px){
   #section{
        margin-top: 5%;
        margin-left: 15%;
        width: 75%;
        padding: 2%;
    }
    
    </style>
<?php

$total = 0;
$final = 0;

   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_compra ORDER BY fecha_registro DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos = mysqli_fetch_array($result)){

 echo'   
<section>
<form id="section" method="POST" action="Exportar_PDF/pdf_compra.php" target="_blank">
         
      <section id="section">
        <div class="row">
      
          <div class="col-6.5 col-sm-4" style="position: initial; margin-top: 5%;">
              <label style="font-weight: bold;">Solicitud No.</label>
              <input readonly class="form-control"  type="text" value="' .$datos['nSolicitud']. '" name="depto">
          </div>

          <div class="col-6.5 col-sm-4" style="position: initial; margin-top: 5%;">
            <label style="font-weight: bold;">Dependecia Solicitante.</label>
            <input readonly class="form-control"  type="text" value="' .$datos['dependencia']. '" name="odt">
          </div>

          <div class="col-6.5 col-sm-4" style="position: initial; margin-top: 5%;">
            <label style="font-weight: bold;">Plazo y N° entregas:</label>
            <input readonly class="form-control"  type="text" value="Plazo y N° entregas" name="odt">
          </div>

          <div class="col-6.5 col-sm-4" style="position: initial; margin-top: 5%;">
            <label style="font-weight: bold;">Unidad Técnica:</label>
              <input readonly class="form-control"  type="text" value="' .$datos['unidad_tecnica']. '" name="fech">
          </div>

          <div class="col-6.5 col-sm-4" style="position: initial; margin-top: 2%;">
            <label style="font-weight: bold;">Monto presupuestado:</label>
            <input readonly class="form-control"  type="text" value="total" name="odt">
          </div>

          <div class="col-6.5 col-sm-4" style="position: initial; margin-top: 2%;">
            <label style="font-weight: bold;">Fecha:</label>
              <input readonly class="form-control"  type="text" value="' .$datos['fecha_registro']. '" name="fech">
          </div>

          <div class="col-6.5 col-sm-4" style="position: initial; margin-top: 2%;">
          <label style="font-weight: bold;">Suministro Solicitado:</label>
          <input readonly class="form-control"  type="text" value="Suministro" name="odt">
        </div>

        </div>
      
        <br>
        <br>
       
        <table class="table" style="margin-bottom:3%">
         <thead>
              <tr id="tr">
          
            <th style=""><strong>Código</strong></th>
            <th style=""><strong>Cod. Catálogo</strong></th>
            <th><strong>Descripción</strong></th>
            <th><strong>U/M</strong></th>
            <th><strong>Cantidad</strong></th>
            <th style=""><strong>Precio Unitario (estimado)</strong></th>
            <th style=""><strong>Monto Total (estimado)</strong></th>
          </tr>
          </thead>
          <tbody>';


$solicitud_n = $datos['nSolicitud'];
}
    $sql = "SELECT * FROM detalle_compra WHERE solicitud_compra = $solicitud_n";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total = $productos['stock'] * $productos['precio'];
      $final += $total;
  echo'  
      <tr >
        <td data-label="Código"><input  name="cod[]" readonly value="' .$productos['codigo']. '" style="width: 60px; border: none"></td>
        <td data-label="Catálogo"><input  name="cat[]" readonly value="'.$productos['catalogo']. '" style="width: 60px;border: none"></td>
        <td data-label="Descripción"><input size="5px"  name="desc[]" readonly value="'.$productos['descripcion']. '" style="width: 120px; border: none"></td>
        <td data-label="Unidad De Medida"><input  name="um[]" readonly value="'.$productos['unidad_medida']. '" style="width: 40px; border: none"></td>
        <td data-label="Cantidad"><input  name="cant[]" readonly value="$'.$productos['stock']. '" style="width: 60px; border: none"></td>
        <td data-label="Precio Unitario (estimado)"><input  name="cost[]" readonly value="$'.$productos['precio']. '" style="width: 60px; border: none"></td>
        <td data-label="Monto Total (estimado)"><input  name="tot[]" readonly value="$'.$total. '" style="width: 90px; border: none"></td>
      </tr>';

}

      echo'
        <tr>
          <td colspan="6"><strong>SubTotal</strong></td> 
          <td><input  name="tot_f" readonly value="$'.$final.'"  style="width: 90px; border: none; color: rgb(168, 8, 8); font-weight: bold;"></td>
        </tr>
        </tbody>
      </table>    </section>
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


