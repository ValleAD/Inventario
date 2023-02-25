<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
         window.location ="../../log/signin.php";
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
    <title>Compra</title>
</head>
<body>
        <style>  
        #div{margin: 0%}
        #section{background: whitesmoke;border-radius: 15px;margin: 1%;padding: 1%;}
        form{background: transparent;padding: 1%;}
        @media (max-width: 800px){

        .col-md-3{
            margin-top: 2%;
        }
        #section{margin: -5%0%5%4%;width: 93%;}
        form{padding: 1%;}
        label{
        margin-top: 3%;}}
        </style>
        <br><br><br>
<?php

$total = 0;
$final = 0;
 $final2 = 0;
 $final3 = 0;
 $final4 = 0;
 $final5 = 0;
 $final6 = 0;
 $final7 = 0;
 $final8 = 0;
 $final9 = 0;

    $sql = "SELECT * FROM tb_compra ORDER BY nSolicitud DESC LIMIT 1 ";
    $result = mysqli_query($conn, $sql);
 while ($productos1 = mysqli_fetch_array($result)){
 if ($productos1['justificacion']=="") {
    $jus = 'Sin observacion por el momento';
        
    }else{
    $jus = $productos1['justificacion'];
      }
 echo'   
<section id="section">

         
      <div class="card">
            <div class="card-body">
        <div class="row">
      
           <div class="col-md-3 mb-3" style="position: initial">
        
                <label style="font-weight: bold;">Solicitud No.</label><br>
                 '. $productos1['nSolicitud'].'
  
            </div>
  
            <div class="col-md-3 mb-3" style="position: initial">
              <label style="font-weight: bold;">Dependencia Solicitante</label><br>
                ' .$productos1['dependencia']. '
            </div>
  
          <div class="col-md-3 mb-3" style="position: initial">
              <label style="font-weight: bold;">Plazo y No. de Entregas</label><br>
                ' .$productos1['plazo']. '
          </div>
  
          <div class="col-md-3 mb-3" style="position: initial">
              <label style="font-weight: bold;">Unidad Técnica</label><br>
                ' .$productos1['unidad_tecnica']. '
          </div>
  
          <div class="col-md-3 mb-3" style="position: initial">
              <label style="font-weight: bold;">Suministro Solicitado</label><br>
                ' .$productos1['descripcion_solicitud']. '
          </div>

          <div class="col-md-3 mb-3" style="position: initial">
              <label style="font-weight: bold;">Encargado</label><br>
                ' .$productos1['usuario']. '
          </div>
  
            <div class="col-md-3 mb-3" style="position: initial">
              <label style="font-weight: bold;">Fecha</label><br>
              '.date("d-m-Y",strtotime($productos1['fecha_registro'])). '
                  ';?>
            </div>
            <div class="col-md-3" style="position: initial">
              <label style="font-weight: bold;">Estado</label><br>
              <br>
              
              <div style="position: initial;" class="input-group" style="position:initial;">
                 <label class="input-group-text" for="inputGroupSelect01">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#check-circle-fill"/>
                </svg>
                 </label>
              <input  id="inputGroupSelect01"  <?php
                if($productos1['estado']=='Comprado') {
                     echo ' style="background-color:blueviolet ;width:50%; border-radius:5px;text-align:center;position: initial; color: white;"';
                }
            ?> class="form-control" type="text" name="" value="<?php echo $productos1['estado'] ?>"><br>
              <input  readonly class="form-control" type="hidden" value="<?php echo $productos1['nSolicitud'] ?>" name="sol_compra">
                </div>
            </div>
          </div></div>
          </div>

        
        <br>
        
<div class="row">

    <div class="col-md-9 mb-3">
        <div class="card">
            <div class="card-body">

                
        <table class="table " id="exam">
            <thead>
              <tr id="tr">
                <th>Código</th>
                <th>Descripción Completa</th>
                <th>Unidad de Medida</th>
                <th>Cantidad solicitada</th>
                <th >Cantidad Depachada</th>

                <th>Costo unitario</th>
                <th>Total</th>
              </tr>
           </thead>
            <tbody>
                <?php 

$solicitud = $productos1['nSolicitud'];

  $sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida FROM detalle_compra WHERE solicitud_compra = $solicitud Group by codigo";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
    $total = $productos['SUM(stock)'] * $productos['precio'];
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
   $codigo=$productos['codigo'];
     $descripcion=$productos['descripcion'];
     $um=$productos['unidad_medida'];
      

        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(stock)'];
        $cantidad_despachada=$productos['SUM(cantidad_despachada)'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

        $final2 += $cant_aprobada;
        $final3   =    number_format($final2, 2, ".",",");

        $final4 += $cantidad_despachada;
        $final5   =    number_format($final4, 2, ".",",");
        
        $final6 += ($cant_aprobada-$cantidad_despachada);
        $final7   =    number_format($final6, 2, ".",",");
        
        $final8 += $precio;
        $final9   =    number_format($final8, 2, ".",",");?>
    <style type="text/css">
     #td{
        display: none;
    }
    
   
</style> 
      <tr>
       <td  data-label="Código"><?php echo $productos['codigo'] ?></td>
        <td  data-label="Descripción"><?php echo $productos['descripcion'] ?></td>
        <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td  data-label="Cantidad"><?php echo $stock ?></td>
        <td  data-label="Cantidad"><?php echo $cantidad_desp ?></td>
        <td  data-label="Costo unitario"><?php echo $precio2 ?></td>
        <td  data-label="total"><?php echo $total1 ?></td>
      </tr>

      <?php }
   ?> 
  </tbody>
           
</table>
 </div>
</div>
</div>
    <div class="col-md-3  mb-3 " >

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                            <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
<form method="POST" action="../../Plugin/Imprimir/Compra/compra.php" target="_blank">
 <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['nSolicitud']?>" name="sol_compra">
          <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['dependencia']?>" name="dependencia">
            <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['plazo']?>" name="plazo">
            <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['unidad_tecnica']?>" name="unidad">
            <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['descripcion_solicitud']?>" name="suministro">
            <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['usuario']?>" name="usuario">
                <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['estado']?>" name="estado">
                <input readonly class="form-control"  type="hidden" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_registro'])) ?>" name="fech">

        <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="<?php echo $final1 ?>" >

  <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>

<button style="position: initial;" type="submit" class="btn btn-outline-primary" name="aprobado">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>

                </button>
            </form>
<form method="POST" action="../../Plugin/PDF/Compra/pdf_compra.php" target="_blank">
 <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['nSolicitud']?>" name="sol_compra">
          <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['dependencia']?>" name="dependencia">
            <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['plazo']?>" name="plazo">
            <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['unidad_tecnica']?>" name="unidad">
            <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['descripcion_solicitud']?>" name="suministro">
            <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['usuario']?>" name="usuario">
                <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['estado']?>" name="estado">
                <input readonly class="form-control"  type="hidden" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_registro'])) ?>" name="fech">
        <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="<?php echo $final1 ?>" >

  <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>

<button style="position: initial;" type="submit" class="btn btn-outline-primary" name="aprobado">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>

                </button>
            </form>
            <form method="POST" action="../../Plugin/Excel/Detalles_dt/Excel.php" >
 <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['nSolicitud']?>" name="compra1">
                <button type="submit" class="btn btn-outline-primary" name="dt_compra" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>

                    </div>
                    <hr>
              <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
                  <p align="right"><b style="float: left;">Cantidad Despachada: </b><?php echo $final5 ?></p>

                  <p align="right"><b style="float: left;">Cant. Soli. - Cant. Despa.: </b><?php echo $final7 ?></p>
                  <p align="right"><b style="float: left;">Total del Precio: </b><?php echo $final9 ?></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p> 
                </div>
        
              </div>

          </div>

    </div>
    <div class="card mt-3">
                  <div class="card-body">
                      <div class="form-group" style="position: all;border: 1px solid #ccc;border-collapse: collapse;">
                <p style="padding-left: 1%;">Observaciones (En qué se ocupará el bien entregado)</p>
                <hr style=" border: 1px solid #ccc;border-collapse: collapse;">
                <p style="padding-left: 1%;"><?php echo $jus ?></p>
            </div>
                        <button class="btn btn-success as">Solicitudes Compra</button>

                  </div>
              </div>
        </div>
        
    
</div>
</section>    
<?php } ?>


<script>
       $(document).ready(function () {
     $('.as').click(function() {
            window.location.href="solicitudes_compra.php";
        });
    $('#exam').DataTable({
dom: 'lrtip',
responsive: true,
autoWidth:false,

            scrollCollapse: true,
                lengthMenu: [[10, -1], [10,"Todos"]],
                    language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            },

    });
});
</script>  
</body>
  </html>


