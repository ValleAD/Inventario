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
  }
    </style>
<?php

if(isset($_POST['detalle'])){

    $total = 0;
    $final = 0;

    $cod_vale = $_POST['id'];
    
       include 'Model/conexion.php';
        $sql = "SELECT * FROM tb_vale WHERE codVale = $cod_vale";
        $result = mysqli_query($conn, $sql);
     while ($productos1 = mysqli_fetch_array($result)){
    
     echo'   
    <section id="section">
    <form method="POST" action="Plugin/pdf_vale.php" target="_blank">
             
          
            <div class="row">
          
              <div class="col-6 col-sm-3" style="position: initial">
          
                  <label style="font-weight: bold;">Depto. o Servicio:</label>
                  <input readonly class="form-control"  type="text" value="' .$productos1['departamento']. '" name="depto">
    
              </div>
    
              <div class="col-6 col-sm-3" style="position: initial">
                <label style="font-weight: bold;">N° de Vale:</label>
                <input readonly class="form-control"  type="text" value="' .$productos1['codVale']. '" name="vale">
              </div>
    
            <div class="col-6 col-sm-3" style="position: initial">
                <label style="font-weight: bold;">Encargado:</label>
                <input readonly class="form-control"  type="text" value="' .$productos1['usuario']. '" name="usuario">
            </div>
    
              
              <div class="col-6 col-sm-3" style="position: initial">
                <label style="font-weight: bold;">Fecha:</label>
                  <input readonly class="form-control"  type="text" value="'.date("d-m-Y",strtotime($productos1['fecha_registro'])). '" name="fech">
              </div>
            </div>
          
            <br>
              
            <table class="table" style="margin-bottom:3%">
                
              <thead>
                <tr id="tr">
                  <th style="width: 45%;">Código</th>
                  <th style="width: 175%;">Descripción</th>
                  <th style="width: 45%;">Unidad de Medida</th>
                  <th style="width: 25%;">Cantidad</th>
                  <th style="width: 30%;">Costo unitario</th>
                  <th style="width: 30%;">Total</th>
                </tr>
                <td id="td" colspan="6"><h4>No se encontraron resultados 😥</h4></td>
              </thead>
                <tbody>';
                    
    
    $num_vale = $productos1['codVale'];
    }
     $sql = "SELECT * FROM detalle_vale WHERE numero_vale = $num_vale";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total = $productos['stock'] * $productos['precio'];
      $final += $total;
      $codigo=$productos['codigo'];
      $descripcion=$productos['descripcion'];
      $um=$productos['unidad_medida'];
      $stock=$productos['stock'];
      $precio=$productos['precio'];
      $estado=$productos['estado'];
      $fecha=$productos['fecha_registro'];
      ?>
       <style type="text/css"> #td{display: none;} </style> 

       <tr>
        <td  data-label="Código"><input style="width: 100%; background:transparent; border: none; text-align: center"  name="cod[]" readonly value="<?php echo $codigo ?>"></td>
        <td  data-label="Descripción"><textarea style="width: 100%; background:transparent; border: none; text-align: left; height: 75px;"  name="desc[]" readonly><?php echo $descripcion ?></textarea></td>
        <td  data-label="Unidada de Medida"><input  style="width: 100%; background:transparent; border: none; text-align: center" name="um[]" readonly value="<?php echo $um ?>"></td>
        <td  data-label="Cantidad"><input style="width: 100%; background:transparent; border: none; text-align: center"  name="cant[]" readonly value="<?php echo $stock ?>"></td>
        <td  data-label="Costo unitario"><input style="width: 100%; background:transparent; border: none; text-align: center"  name="cost[]" readonly value="$<?php echo $precio ?>"></td>
        <td  data-label="total"><input style="width: 100%; background:transparent; border: none; text-align: center"  name="tot[]" readonly value="$<?php echo $total ?>"></td>
      </tr>

      <?php } }?> 
    <tr>
      
    <th colspan="4"></th>
      <th colspan="1">SubTotal</th>
      <td data-label="Subtotal"><input style="background:transparent; border: none; width: 100%; color: red; font-weight: bold; text-align: center"  name="tot_f" readonly value="$<?php echo $final ?>" ></td> 
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
</form>
</section>
      
       
  </body>
  </html>