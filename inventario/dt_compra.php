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
        <style>  
         #section{
          background: whitesmoke;
          border-radius: 15px;
            margin: 1%;
            padding: 1%;
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
$final2=0;
   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_compra ORDER BY nSolicitud DESC LIMIT 1 ";
    $result = mysqli_query($conn, $sql);
 while ($datos = mysqli_fetch_array($result)){
$solicitud=$datos["nSolicitud"];
  echo'   
<section id="section">
  <form method="POST"  action="Plugin/pdf_compra.php" target="_blank">
           
                <input readonly class="form-control"  type="hidden" value="'. $datos['nSolicitud'].'" name="sol_compra">
                <input readonly class="form-control"  type="hidden" value="'. $datos['dependencia'].'" name="dependencia">
                <input readonly class="form-control"  type="hidden" value="'. $datos['plazo'].'" name="plazo">
                <input readonly class="form-control"  type="hidden" value="'. $datos['unidad_tecnica'].'" name="unidad">
                <input readonly class="form-control"  type="hidden" value="'. $datos['descripcion_solicitud'].'" name="suministro">
                <input readonly class="form-control"  type="hidden" value="'. $datos['usuario'].'" name="usuario">
                <input type="hidden" readonly class="form-control"  type="text" value="'.$datos['estado'].'" name="estado">
                <input readonly class="form-control"  type="hidden" value="'. date("d-m-Y",strtotime($datos['fecha_registro'])) .'" name="fech">

          <div class="row">
        
            <div class="col-md-3 mb-3" style="position: initial">
        
                <label style="font-weight: bold;">Solicitud No.</label><br>
                 '. $datos['nSolicitud'].'
  
            </div>
  
            <div class="col-md-3 mb-3" style="position: initial">
              <label style="font-weight: bold;">Dependencia Solicitante</label><br>
                ' .$datos['dependencia']. '
            </div>
  
          <div class="col-md-3 mb-3" style="position: initial">
              <label style="font-weight: bold;">Plazo y No. de Entregas</label><br>
                ' .$datos['plazo']. '
          </div>
  
          <div class="col-md-3 mb-3" style="position: initial">
              <label style="font-weight: bold;">Unidad Técnica</label><br>
                ' .$datos['unidad_tecnica']. '
          </div>
  
          <div class="col-md-3 mb-3" style="position: initial">
              <label style="font-weight: bold;">Suministro Solicitado</label><br>
                ' .$datos['descripcion_solicitud']. '
          </div>

          <div class="col-md-3 mb-3" style="position: initial">
              <label style="font-weight: bold;">Encargado</label><br>
                ' .$datos['usuario']. '
          </div>
  
            <div class="col-md-3 mb-3" style="position: initial">
              <label style="font-weight: bold;">Fecha</label><br>
              '.date("d-m-Y",strtotime($datos['fecha_registro'])). '
                  ';?>
            </div>
            <div class="col-md-3" style="position: initial">
              <label style="font-weight: bold;">Estado</label><br>
              <br>
              
              <div style="position: initial;" class="input-group" style="position:initial;">
                 <label class="input-group-text" for="inputGroupSelect01">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#check-circle-fill"/>
                </svg>
                 </label>
              <input  id="inputGroupSelect01"  <?php
                if($datos['estado']=='Comprado') {
                     echo ' style="background-color:blueviolet ;width:50%; border-radius:5px;text-align:center;position: initial; color: white;"';
                }
            ?> class="form-control" type="text" name="" value="<?php echo $datos['estado'] ?>"><br>
              <input  readonly class="form-control" type="hidden" value="<?php echo $datos['nSolicitud'] ?>" name="sol_compra">
                </div>
            </div>
          </div>
        
          <br>
            <table class="table">
            <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/pdf_compra">
             

<button style="position: initial;" type="submit" class="btn btn-outline-primary" name="aprobado">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>

                </button>
            </form>
            <form method="POST" action="Plugin/compra.php" target="_blank">
 <input readonly class="form-control"  type="hidden" value="<?php echo $datos['nSolicitud']?>" name="sol_compra">
                <input readonly class="form-control"  type="hidden" value="<?php echo $datos['dependencia']?>" name="dependencia">
                <input readonly class="form-control"  type="hidden" value="<?php echo $datos['plazo']?>" name="plazo">
                <input readonly class="form-control"  type="hidden" value="<?php echo $datos['unidad_tecnica']?>" name="unidad">
                <input readonly class="form-control"  type="hidden" value="<?php echo $datos['descripcion_solicitud']?>" name="suministro">
                <input readonly class="form-control"  type="hidden" value="<?php echo $datos['usuario']?>" name="usuario">
                <input readonly class="form-control"  type="hidden" value="<?php echo $datos['estado']?>" name="estado">
                <input readonly class="form-control"  type="hidden" value="<?php echo date("d-m-Y",strtotime($datos['fecha_registro'])) ?>" name="fech">
                
                <?php

                $sql = "SELECT * FROM detalle_compra WHERE solicitud_compra = $solicitud";
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

        <input type="hidden" name="cod[]" value="<?php echo $productos['codigo'] ?>">
        <input type="hidden" name="cat[]" value="<?php echo $productos['catalogo'] ?>">
            <input type="hidden" name="desc[]" value="<?php echo $productos['descripcion'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida']?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio1 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final1 ?>" >
        <?php } ?>
           <?php  $sql = "SELECT * FROM tb_compra ORDER BY justificacion DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos = mysqli_fetch_array($result)){ ?>
    <textarea style="display: none;" name="jus" ><?php echo $datos['justificacion'] ?></textarea> <?php } ?>
<button style="position: initial;" type="submit" class="btn btn-outline-primary" name="pdf">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>

            </form>

</div>
            <thead>
              <tr id="tr">
                <th>Código</th>
                <th>Cátalogo</th>
                <th style="width: 35%;">Descripción</th>
                <th>Unidad de Medida</th>
                <th>Cantidad</th>

                <th>Costo unitario</th>
                <th>Total</th>
              </tr>
                <td id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td>
           </thead>
       </table>
<div id="div" style = " max-height: 442px; overflow-y:scroll;margin-top: -1.5%;">
           <table class="table">
            <tbody>
                <?php 

}
  $total = 0;
  $final = 0;
  $sql = "SELECT * FROM detalle_compra WHERE solicitud_compra = $solicitud";
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
        $stock=number_format($cant_aprobada, 2,",");
        $cantidad_desp=number_format($cantidad_despachada, 2,",");?>
    <style type="text/css">
     #td{
        display: none;
    }
    
   
</style> 
      <tr>
       <td  data-label="Código"><?php echo $productos['codigo'] ?>
            <input type="hidden" name="cod[]" value="<?php echo $productos['codigo'] ?>">
            <input type="hidden" name="cat[]" value="<?php echo $productos['catalogo'] ?>">
            <input type="hidden" name="desc[]" value="<?php echo $productos['descripcion'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida']?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total2 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final2 ?>" >
        </td>
        <td data-label="Descripción"><?php echo $productos['catalogo'] ?></td>

        <td style="width: 35%;" data-label="Descripción"><?php echo $productos['descripcion'] ?></td>
        <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td  data-label="Cantidad"><?php echo $stock ?></td>
        <td  data-label="Costo unitario"><?php echo $precio2 ?></td>
        <td  data-label="total"><?php echo $total2 ?></td>
      </tr>

      <?php } ?> 
  </tbody>
</table>
</div>
<table class="table">
     <tfoot>
        <th colspan="5"></th>
            <th >SubTotal</th>
            <td style=" color: red; font-weight: bold;" data-label="Subtotal"><?php echo $final2?></td>
        </tfoot>
    </table>
         <?php 

                       
        $sql = "SELECT * FROM tb_compra WHERE nSolicitud='$solicitud'  ORDER BY justificacion ASC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos = mysqli_fetch_array($result)){
 if ($datos['justificacion']=="") {
    $jus = 'Sin observacion por el momento';
        
    }else{
    $jus = $datos['justificacion'];
      }
  ?>
    <div class="form-group" style="position: all;border: 1px solid #ccc;border-collapse: collapse;">
                <p style="padding-left: 1%;">Observaciones (En qué se ocupará el bien entregado)</p>
                <hr style=" border: 1px solid #ccc;border-collapse: collapse;">
                <p style="padding-left: 1%;"><?php echo $jus ?></p>
    <textarea style="display: none;" name="jus" ><?php echo $datos['justificacion'] ?></textarea> 

            </div>
<?php } ?>

</form>
  </section>
  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>             
  </body>
  </html>


