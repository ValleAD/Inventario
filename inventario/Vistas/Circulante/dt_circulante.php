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
<?php include ('../../templates/menu1.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../styles/estilo.css" > 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fondo Circulante</title>
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

   
    $sql = "SELECT * FROM tb_circulante ORDER BY codCirculante DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos_sol = mysqli_fetch_array($result)){

 echo'   
<section id="section" >
<form method="POST" action="../../Plugin/PDF/Circulante/pdf_circulante.php" target="_blank">
         
      
        <div class="row">  

          <div class="col-md-4" style="position: initial">
            <label style="font-weight: bold;">N° de Solicitud:</label>
            <input readonly class="form-control"  type="text" value="' .$datos_sol['codCirculante']. '" name="num_sol">
          </div>

          <div class="col-md-4" style="position: initial">
            <label style="font-weight: bold;">Fecha:</label>
              <input readonly class="form-control"  type="text" value="' .date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])). '" name="fech">
          </div>'?>
           <div class="col-md-4" style="position: initial">
              <label style="font-weight: bold;">Estado</label>
              <input <?php
                if($datos_sol['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%;position: initial; border-radius:5px;text-align:center; color: white;"';
                }
            ?> readonly class="form-control"  type="text" value="<?= $datos_sol['estado'] ?>" name="id"> 
            </div>
        </div>
      
        <br>
          
<table class="table">
             <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">

            <form method="POST" action="../../Plugin/PDF/Circulante/pdf_circulante.php">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Fecha">

                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                        </svg>
                </button>
            </form>
            <form method="POST" action="../../Plugin/Imprimir/Circulante/Circulante.php">
                <input type="hidden" name="num_sol" value="<?php echo $datos_sol['codCirculante'] ?>">
                <input type="hidden" name="fech" value="<?php echo date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])) ?>">
                               <?php 
$num_circulante = $datos_sol['codCirculante'];

 $sql = "SELECT * FROM detalle_circulante WHERE tb_circulante = $num_circulante";
    $result = mysqli_query($conn, $sql);
    $n=0;
while ($productos = mysqli_fetch_array($result)){
      $n++;
        $r=$n+0;
        $total    =    $productos['stock'] * $productos['precio'];
        $final    +=   $total;
        $precio   =    $productos['precio'];
        $codigo   =    $productos['codigo'];
        $precio2  =    number_format($precio, 2,".",",");
        $total2   =    number_format($total, 2, ".",",");
        $final2   =    number_format($final, 2, ".",",");
        $cant_aprobada=$productos['stock'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");?>
        <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $productos['descripcion'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida']?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total2 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final2 ?>" >
            <?php } ?>
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="pdf">

                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                        </svg>
                </button>
            </form>

</div>
            <thead>
              <tr id="tr">
                <th>Codigo</th>
                <th >Descripción del Artículo</th>
                <th>Unidad de Medida</th>
                <th>Cantidad Solicitada</th>
                <th >Cantidad depachada</th>
                <th>Costo unitario</th>
                <th>Total</th>
              </tr>
           </thead>
       </table>
       <div id="div" style = "max-height: 442px; overflow-y:scroll;">
        <table class="table">
            <tbody>
                <td id="td" colspan="8"><h4>No se encontraron resultados 😥</h4></td>
<?php 
$num_circulante = $datos_sol['codCirculante'];
}
 $sql = "SELECT * FROM detalle_circulante WHERE tb_circulante = $num_circulante";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
        $total    =    $productos['stock'] * $productos['precio'];
        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");
        $total2   =    number_format($total, 2, ".",",");
        
        $cant_aprobada=$productos['stock'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");?>

    <style type="text/css">
     #td{
        display: none;
    }
    
   
</style> 
      <tr>
       <td  data-label="Código"><?php echo $productos['codigo'] ?>
           <input type="hidden" name="cod[]" value="<?php echo $productos['codigo'] ?>">
            <input type="hidden" name="desc[]" value="<?php echo $productos['descripcion'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida']?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total2 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final2 ?>" >
       </td>
        <td  data-label="Descripción del Artículo"><?php echo $productos['descripcion'] ?></td>

        <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td  data-label="Cantidad Solicitada"><?php echo $stock ?></td>
        <td  data-label="Cantidad"><?php echo $cantidad_desp ?></td>
         <td data-label="Costo unitario"><?php echo $precio2 ?></td>
        <td  data-label="Total"><?php echo $total2 ?></td>
      </tr>
<?php } ?>
</tbody>
</table>
</div>
  <table class="table">
            <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
        <td colspan="6"style="text-align: left;font-size: 12px; font-weight: bold;">Subtotal</td>
        <td style="color: red;font-size: 12px; font-weight: bold;"><?php echo $final2 ?></td>
    </tfoot>
        </tbody>
    </table>
</form>
</section>
      ';
?>            
  </body>
  </html>


