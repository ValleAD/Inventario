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
    <title>Solicitud Almacén</title>
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
  }
    </style>
<?php

$total = 0;
$final = 0;

   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_almacen ORDER BY fecha_solicitud DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos_sol = mysqli_fetch_array($result)){

 echo'   
<section id="section">
<form method="POST" action="Exportar_PDF/pdf_almacen.php" target="_blank">
         
      
        <div class="row">  

          <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">N° de Solicitud:</label>
            <input readonly class="form-control"  type="text" value="' .$datos_sol['cod_solicitud']. '" name="num_sol">
          </div>

          <div class="col-6 col-sm-3" style="position: initial">
              <label style="font-weight: bold;">Depto. o Servicio:</label>
              <input readonly class="form-control"  type="text" value="' .$datos_sol['departamento']. '" name="depto">
          </div>

        
        <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Encargado:</label>
            <input readonly class="form-control"  type="text" value="' .$datos_sol['encargado']. '" name="encargado">
        </div>

          
          <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Fecha:</label>
              <input readonly class="form-control"  type="text" value="' .date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])). '" name="fech">
          </div>
        </div>
      
        <br>
          
        <table class="table" style="margin-bottom:3%">
            
            <thead>
              <tr id="tr">
                <th>Código</th>
                <th style="width: 35%;">Nombre del Artículo</th>
                <th>Unidad de Medida</th>
                <th>Cantidad Solicitada</th>
                <th>Costo unitario</th>
                <th>Total</th>
              </tr>
                <td id="td" colspan="8"><h4>No se encontraron resultados 😥</h4></td>
           </thead>
            <tbody>';

$num_almacen = $datos_sol['cod_solicitud'];
}
 $sql = "SELECT * FROM detalle_almacen WHERE cod_solicitud = $num_almacen";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total = $productos['cantidad'] * $productos['costo_unitario'];
      $final += $total;
  echo' 
    <style type="text/css">
     #td{
        display: none;
    }
    
   
</style> 
      <tr>
        <td  data-label="Código"><input style="background:transparent; border: none; width: 100%;"  name="cod[]" readonly value="' .$productos['cod_producto']. '"></td>
        <td  data-label="Nombre del Artículo"><textarea style="background:transparent; border: none; width: 100%;"  name="nombre[]" readonly style="border: none">'.$productos['nombre']. '</textarea></td>
        <td  data-label="Unidada de Medida"><input  style="background:transparent; border: none; width: 100%;" name="um[]" readonly value="'.$productos['unidad_medida']. '"></td>
        <td  data-label="Cantidad Solicitada"><input style="background:transparent; border: none; width: 100%;"  name="cant[]" readonly value="'.$productos['cantidad']. '"></td>
        <td  data-label="Costo Unitario"><input style="background:transparent; border: none; width: 100%;"  name="cost[]" readonly value="$'.$productos['costo_unitario']. '"></td>
        <td  data-label="total"><input style="background:transparent; border: none; width: 100%;"  name="tot[]" readonly value="$'.$total. '"></td>
      </tr>';

}

      echo'
      <th colspan="5">SubTotal</th>
      <td data-label="Subtotal"><input style="background:transparent; border: none; width: 100%; color: red; font-weight: bold;"  name="tot_f" readonly value="$'.$final.'" ></td></tr>
  
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


