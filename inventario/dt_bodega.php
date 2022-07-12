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
    <title>Solicitud Bodega</title>
</head>
<body>
        <style>  
         #section{
          background: whitesmoke;
          border-radius: 15px;
            margin: 1%;
            padding: 1%;
            }
            form{
                background: transparent;
            }
            @media (max-width: 800px){
   #section{
        margin: -5%0%5%4%;
        width: 93%;
    }
    form{
      padding: 1%;
    }
    label{
        margin-top: 3%;
    }
  
  }
        </style>
        <br><br><br>
<?php

$total = 0;
$final = 0;

   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_Bodega ORDER BY fecha_registro DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($productos1 = mysqli_fetch_array($result)){

 echo'   
<section id="section" style="margin:2%">
<form method="POST" action="Plugin/pdf_bodega.php" target="_blank">
         
      
        <div class="row">
      
          <div class="col-md-3" style="position: initial">
      
              <label style="font-weight: bold;">Depto. o Servicio:</label>
              <input readonly class="form-control"  type="text" value="' .$productos1['departamento']. '" name="depto">

          </div>

          <div class="col-md-2" style="position: initial">
            <label style="font-weight: bold;">O. de T. No.</label>
            <input readonly class="form-control"  type="text" value="' .$productos1['codBodega']. '" name="bodega">
          </div>

        <div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">Encargado:</label>
            <input readonly class="form-control"  type="text" value="' .$productos1['usuario']. '" name="usuario">
        </div>

          
          <div class="col-md-2" style="position: initial">
            <label style="font-weight: bold;">Fecha:</label>
              <input readonly class="form-control"  type="text" value="' .date("d-m-Y",strtotime($productos1['fecha_registro'])). '" name="fech">
          </div>
          <div class="col-md-2" style="position: initial">
            <label style="font-weight: bold;">Estado:</label>
              <input ';
                if($productos1['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" readonly value="<?php echo $productos1['estado'] ?>">
          </div>
        </div>
      
        <br>
          <table class="table">
           <div  style="position: initial;"class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
              <form method="POST" action="Plugin/pdf_vale.php">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Fecha">                        
                    <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                        </svg></button>
            </form>
            <form method="POST" action="Plugin/bodega.php" target="_blank">
           <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codBodega']?>" name="bodega">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['usuario']?>" name="usuario">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_registro']))?>" name="fech">
                <?php

                $odt = $productos1['codBodega'];
                $sql = "SELECT * FROM detalle_bodega WHERE odt_bodega = $odt";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total = $productos['stock'] * $productos['precio'];
      $final += $total;
      $codigo=$productos['codigo'];
      $descripcion=$productos['descripcion'];
      $um=$productos['unidad_medida'];
      $precio=$productos['precio'];


       $precio1=number_format($precio, 2,".",",");
      $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");

      $cant_aprobada=$productos['stock'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");
       ?>
       <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio1 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final1 ?>" >
        <?php } ?>
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="pdf">
                                               <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                        </svg>
            </button>
            </form>

</div> 
        <thead>
                <tr id="tr">
                  <th >Código</th>
                  <th >Descripción</th>
                  <th >Unidad de Medida</th>
                  <th >Cantidad Solicitada</th>
                  <th >Cantidad depachada</th>
                  <th >Costo unitario</th>
                  <th >Total</th>
                </tr>
              </thead>
          </table>
          <div id="div" style = "max-height: 442px; overflow-y:scroll;">
          <table class="table">
            <tbody>
                <td id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td>
<?php 
$odt = $productos1['codBodega'];
}
 $sql = "SELECT * FROM detalle_bodega WHERE odt_bodega = $odt";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total        =  $productos['stock'] * $productos['precio'];
      $final        += $total;
      $codigo       =  $productos['codigo'];
      $descripcion  =  $productos['descripcion'];
      $um           =  $productos['unidad_medida'];
      $precio       =  $productos['precio'];
      $precio2      =  number_format($precio, 2,".",",");
      $total2       =  number_format($total, 2, ".",",");
      $final2       =  number_format($final, 2, ".",",");
      $cant_aprobada=$productos['stock'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");
      
      ?>
       <style type="text/css"> #td{display: none;} </style> 

      <tr>
      <td   data-label="Código"><?php echo $codigo ?>
            <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $productos['descripcion'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida'] ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total2 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final2 ?>" >
        </td>
        <td   data-label="Descripción"><?php echo $productos['descripcion'] ?></td>
        <td   data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td   data-label="Cantidad"><?php echo $stock ?></td>
        <td   data-label="Cantidad"><?php echo $cantidad_desp ?></td>
        <td   data-label="Costo unitario"><?php echo $precio2 ?></td>
        <td   data-label="total"><?php echo $total2 ?></td>
      </tr>

      <?php } ?> </tbody>
    </table>
</div>
<table class="table">
           <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
        <td colspan="6"style="text-align: left;font-size: 12px; font-weight: bold;">Subtotal</td>
        <td style="color: red;font-size: 12px; font-weight: bold;"><?php echo $final2 ?></td>
    </tfoot>
     </table>   
</form>
</section>
      
            
  </body>
  </html>


