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

    <title>Solicitud Compra</title>
</head>
<body>
<style type="text/css">
      #section{
        margin-left: 2%;
        margin-right: 2%;
        background: white;
        padding: 1%;
        border-radius: 15px;
      }
        form{
          margin:0;
      }
      
              @media (max-width: 952px){
   #section{
        margin-top: 5%;
        margin-left: 15%;
        width: 75%;
        padding: 2%;
    }
  }
    
    </style>
<?php

$total = 0;
$final = 0;
$final2=0;
   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_compra ORDER BY fecha_registro LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos = mysqli_fetch_array($result)){

  echo'   
<section id="section" style="margin:2%">
  <form method="POST"  action="Plugin/pdf_compra.php" target="_blank">
           
        
          <div class="row">
        
            <div class="col-3" style="position: initial">
        
                <label style="font-weight: bold;">Solicitud No.</label>
                <input readonly class="form-control"  type="text" value="' .$datos['nSolicitud']. '" name="sol_compra">
  
            </div>
  
            <div class="col-3" style="position: initial">
              <label style="font-weight: bold;">Dependencia Solicitante</label>
              <input readonly class="form-control"  type="text" value="' .$datos['dependencia']. '" name="dependencia">
            </div>
  
          <div class="col-3" style="position: initial">
              <label style="font-weight: bold;">Plazo y No. de Entregas</label>
              <input readonly class="form-control"  type="text" value="' .$datos['plazo']. '" name="plazo">
          </div>
  
          <div class="col-3" style="position: initial">
              <label style="font-weight: bold;">Unidad Técnica</label>
              <input readonly class="form-control"  type="text" value="' .$datos['unidad_tecnica']. '" name="unidad">
          </div>
  
          <div class="col-3" style="position: initial">
              <label style="font-weight: bold;">Suministro Solicitado</label>
              <input readonly class="form-control"  type="text" value="' .$datos['descripcion_solicitud']. '" name="suministro">
          </div>

          <div class="col-3" style="position: initial">
              <label style="font-weight: bold;">Encargado</label>
              <input readonly class="form-control"  type="text" value="' .$datos['usuario']. '" name="usuario">
          </div>
  
            <div class="col-3" style="position: initial">
              <label style="font-weight: bold;">Fecha</label>
                  <input readonly class="form-control"  type="text" value="'.date("d-m-Y",strtotime($datos['fecha_registro'])). '" name="fech">';?>
            </div>
            <div class="col-3" style="position: initial">
              <label style="font-weight: bold;">Estado</label>
              <input <?php
                 if($datos['estado']=='Comprado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> readonly class="form-control"  type="text" value="<?= $datos['estado'] ?>" name="id"> 
            </div>
          </div>
        
          <br>
            
          <table class="table" style="margin-bottom:3%">
              <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/compra.php">
                <button type="submit" class="btn btn-outline-primary" name="Fecha">                        
                    <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                        </svg></button>
            </form>
            <form method="POST" action="Plugin/compra.php">
                <input readonly class="form-control"  type="hidden" value="<?php echo $datos['nSolicitud'] ?>" name="sol_compra">
            <input readonly class="form-control"  type="hidden" value="<?php echo $datos['dependencia'] ?>" name="dependencia">
            <input readonly class="form-control"  type="hidden" value="<?php echo $datos['plazo'] ?>" name="plazo">
            <input readonly class="form-control"  type="hidden" value="<?php echo $datos['unidad_tecnica'] ?>" name="unidad">
            <input readonly class="form-control"  type="hidden" value="<?php echo $datos['descripcion_solicitud'] ?>" name="suministro">
            <input readonly class="form-control"  type="hidden" value="<?php echo $datos['usuario'] ?>" name="usuario">
            <input readonly class="form-control"  type="hidden" value="<?php echo date("d-m-Y",strtotime($datos['fecha_registro'])) ?>" name="fech">
            <?php  $cod_compra = $datos['nSolicitud']; 
            $sql = "SELECT * FROM detalle_compra WHERE solicitud_compra = $cod_compra";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total = $productos['stock'] * $productos['precio'];
      $final += $total;
      $precio=$productos['precio'];
      $precio1=number_format($precio, 2,".",",");
      $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
      $cant_aprobada=$productos['stock'];
      $cantidad_despachada=$productos['cantidad_despachada'];
      $stock=number_format($cant_aprobada, 2,".",",");
      $cantidad_desp=number_format($cantidad_despachada, 2,".",",");
    
            ?>
        <input type="hidden" name="categoria[]" value="<?php echo $productos['categoria']?>">
        <input type="hidden" name="cod[]" value="<?php echo $productos['codigo']?>">
        <input type="hidden" name="catalogo[]" value="<?php echo $productos['catalogo']?>">
        <input type="hidden" name="desc[]" style="border: none" value="<?php echo $productos['descripcion']?>">
        <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida']?>">
        <input type="hidden" name="cant[]" value="<?php echo $stock?>">
        <input type="hidden" name="cantidad_despachada[]" value="<?php echo $cantidad_desp ?>">
        <input type="hidden" name="cost[]" value="$<?php echo $precio1?>">
        <input type="hidden" name="tot[]" value="$<?php echo $total1?>">
        <input type="hidden" name="tot_f" value="$<?php echo $final1?>" >
    <?php } ?>
           <?php  $sql = "SELECT * FROM tb_compra ORDER BY justificacion ASC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos1 = mysqli_fetch_array($result)){  ?>
    <textarea style="display: none;" name="jus" ><?php echo $datos1['justificacion'] ?></textarea> <?php } ?>
                <button type="submit" class="btn btn-outline-primary" name="pdf">                        
                    <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                        </svg></button>
            </form>

</div>
              <thead>
                <tr id="tr">
                  <th style="width:15%;">Código</th>
                  <th style="width:15%;">Cod. Catálogo</th>
                  <th style="width:70%;">Descripción Completa</th>
                  <th style="width:15%;">U/M</th>
                  <th style="width:15%;">Cantidad</th>
                  <th style="width:15%;">Costo Unitario (estimado)</th>
                  <th style="width:30%;">Monto Total (estimado)</th>
                </tr>
                  <td id="td" colspan="8"><h4>No se encontraron resultados 😥</h4></td>
             </thead>
              <tbody>
  <?php 
    $cod_compra = $datos['nSolicitud'];
  }

   $sql = "SELECT * FROM detalle_compra WHERE solicitud_compra = $cod_compra ORDER BY fecha_registro DESC ";
      $result = mysqli_query($conn, $sql);
  while ($productos = mysqli_fetch_array($result)){

        $total    =    $productos['stock'] * $productos['precio'];
        $final    +=   $total;
        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");
        $total2   =    number_format($total, 2, ".",",");
        $final2   =    number_format($final, 2, ".",",");
        $cant_aprobada=$productos['stock'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cant_desp=number_format($cantidad_despachada, 2,".",",");?>
      <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
        <tr>
        <td  data-label="Categoría"><?php echo $productos['codigo'] ?>
            <input type="hidden" name="cod[]" value="<?php echo $productos['codigo'] ?>">
            <input type="hidden" name="catalogo[]" value="<?php echo $productos['catalogo'] ?>">
            <input type="hidden" name="desc[]" value="<?php echo $productos['descripcion'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida'] ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total2 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final2 ?>" >
        </td>
        <td  data-label="Código"><p style="padding:5%"><?php echo $productos['catalogo'] ?></p></td>
        <td  data-label="Descripción"><?php echo $productos['descripcion'] ?></td>
        <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td  data-label="Cantidad"><?php echo $stock ?></td>
        <td  data-label="Costo unitario"><?php echo $precio2 ?></td>
        <td  data-label="total"><?php echo $total2 ?></td>
      </tr>

      <?php } ?> 
     <tfoot>
        
            <th >SubTotal</th>
            <th colspan="5"></th>
            <td style=" color: red; font-weight: bold;" data-label="Subtotal"><?php echo $final2?></td>
        </tfoot>
        </tbody>
    </table>
    <?php  $sql = "SELECT * FROM tb_compra ORDER BY fecha_registro DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos = mysqli_fetch_array($result)){ ?>
    <div class="form-group" style="position: all;border: 1px solid #ccc;border-collapse: collapse;">
                <p style="padding-left: 1%;">Justificación por el OBS solicitado</p>
                <hr style=" border: 1px solid #ccc;border-collapse: collapse;">
                <p style="padding-left: 1%;"><?php echo $datos['justificacion'] ?></p>
                <textarea style="display: none;" name="jus" ><?php echo $datos['justificacion'] ?></textarea>
            </div>
<?php } ?>
  </form>
  </section>';
  ?> 
  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>             
  </body>
  </html>


