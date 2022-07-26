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
    <title>Solicitud Almacén</title>
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
        <br><br><br><br>
<?php

$total = 0;
$final = 0;

   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_almacen ORDER BY codAlmacen DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos_sol = mysqli_fetch_array($result)){

 echo'   
<section id="section" >
<form method="POST" action="Plugin/pdf_almacen.php" target="_blank">
         
      
        <div class="row">  

          <div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">N° de Solicitud:</label>
            <input readonly class="form-control"  type="hidden" value="' .$datos_sol['codAlmacen']. '" name="num_sol">
            <input readonly class="form-control"  type="hidden" value="' .$datos_sol['departamento']. '" name="depto">
            <input readonly class="form-control"  type="hidden" value="' .date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])). '" name="fech">
            <p>'.$datos_sol['codAlmacen'].'</p>
          </div>

          <div class="col-md-2" style="position: initial">
              <label style="font-weight: bold;">Depto. o Servicio:</label>
            <p>'.$datos_sol['codAlmacen'].'</p>
          </div>

        
        <div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">Encargado:</label>
            <p>'.$datos_sol['codAlmacen'].'</p>
        </div>

          
          <div class="col-md-2" style="position: initial">
            <label style="font-weight: bold;">Fecha:</label>
            <p>' .date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])). '</p>';?>
          </div> 
           <div class="col-md-2" style="position: initial">
            <label style="font-weight: bold;">Estado:</label>
              <input <?php 
                if($datos_sol['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" readonly value="<?php echo $datos_sol['estado'] ?>">
          </div>
        </div>
      
        <br>
        <table class="table">
            <div  style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/pdf_compra.php">
                <button style="position: initial;"  type="submit" class="btn btn-outline-primary" name="Fecha">
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                        </svg>
                </button>
            </form>
            <form method="POST" action="Plugin/almacen.php">
             <input readonly class="form-control"  type="hidden" value="<?php echo $datos_sol['codAlmacen']?>" name="num_sol">
              <input readonly class="form-control"  type="hidden" value="<?php echo $datos_sol['departamento']?>" name="depto">
              <input readonly class="form-control"  type="hidden" value="<?php echo date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])) ?>" name="fech">
<?php
$num_almacen = $datos_sol['codAlmacen'];
                 $sql = "SELECT * FROM detalle_almacen WHERE tb_almacen = $num_almacen";
    $result = mysqli_query($conn, $sql);
    $n=0;
while ($productos = mysqli_fetch_array($result)){
      $n++;
        $r=$n+0;
        $total    =    $productos['cantidad_solicitada'] * $productos['precio'];
        $final    +=   $total;
        $precio   =    $productos['precio'];
        $precio1  =    number_format($precio, 2,".",",");
        $total1   =    number_format($total, 2, ".",",");
        $final1   =    number_format($final, 2, ".",",");
        
        $cant_aprobada=$productos['cantidad_solicitada'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".");
        $cantidad_desp=number_format($cantidad_despachada, 2,".");
       
        ?>
        <input type="hidden" name="cod[]" value="<?php echo $productos['codigo'] ?>">
            <input type="hidden" name="nombre[]" value="<?php echo $productos['nombre'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida'] ?>">
            <input type="hidden" name="desc[]" value="<?php echo $productos['nombre'] ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio1 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final1 ?>" ></td>
        <?php } ?>
                <button style="position: initial;"  type="submit" class="btn btn-outline-primary" name="pdf">
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                        </svg>
                </button>
            </form>

</div>
</form>
            <thead>
              <tr id="tr">
                <th style="width: 25%;">Código</th>
                <th style="width: 95%;">Nombre del Artículo</th>
                <th style="width: 35%;">Unidad de Medida</th>
                <th style="width: 35%;">Cantidad Solicitada</th>
                <th style="width: 35%;">Cantidad Despachada</th>
                <th style="width: 35%;">Costo unitario</th>
                <th style="width: 35%;">Total</th>
              </tr>
                <td id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td>
           </thead>
       </table>
       <div id="div" style = "max-height: 442px; overflow-y:scroll;margin-bottom: 1%;">
       <table class="table">
            <tbody>
<?php 
$num_almacen = $datos_sol['codAlmacen'];
}
 $sql = "SELECT * FROM detalle_almacen WHERE tb_almacen = $num_almacen";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
        $final    +=   $total;
        $precio   =    $productos['precio'];
        $precio1  =    number_format($precio, 2,".",",");
        
       $cant_aprobada=$productos['cantidad_solicitada'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");
         
      
?>
    <style type="text/css">
     #td{
        display: none;
    } 
</style> 
      <tr>
        <td  data-label="Código"><?php echo $productos['codigo'] ?>
        <input type="hidden" name="cod[]" value="<?php echo $productos['codigo'] ?>">
            <input type="hidden" name="nombre[]" value="<?php echo $productos['nombre'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida'] ?>">
            <input type="hidden" name="desc[]" value="<?php echo $productos['nombre'] ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio1 ?>">
            <input type="hidden" name="tot[]" value="$ <?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$ <?php echo $final1 ?>" ></td>

        <td style=" width: 30%;min-width: 100%;"  data-label="Nombre del Artículo"><?php echo $productos['nombre'] ?></td>
        <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td  data-label="Cantidad Solicitada"><?php echo $stock ?></td>
        <td  data-label="Cantidad Solicitada"><?php echo $cantidad_desp ?></td>
        <td  data-label="Costo Unitario">$ <?php echo $precio1 ?></td>
        <td  data-label="total">$ <?php echo $total1 ?></td>
      </tr>

      <?php }?>
  </tbody>
</table>
</div>
<table class="table">
      <tfoot>
            <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
        <td colspan="6"style="text-align: left;font-size: 12px; font-weight: bold;">Subtotal</td>
        <td style="color: red;font-size: 12px; font-weight: bold;">$ <?php echo $final1 ?></td>
    </tfoot>
    </table>

</form>
</section>
      ';
?>            
  </body>
  </html>


