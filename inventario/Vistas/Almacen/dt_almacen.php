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
 $final2 = 0;
 $final3 = 0;
 $final4 = 0;
 $final5 = 0;
 $final6 = 0;
 $final7 = 0;
 $final8 = 0;
 $final9 = 0;

    $sql = "SELECT * FROM tb_almacen ORDER BY codAlmacen DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($productos1 = mysqli_fetch_array($result)){

 echo'   
<section id="section" >
<form method="POST" action="../../Plugin/PDF/Almacen/pdf_almacen.php" target="_blank">
         
      <div class="card">
            <div class="card-body">
        <div class="row">  

          <div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">N° de Solicitud:</label>
            <input readonly class="form-control"  type="hidden" value="' .$productos1['codAlmacen']. '" name="num_sol">
            <input readonly class="form-control"  type="hidden" value="' .$productos1['encargado']. '" name="encargado">
            <input readonly class="form-control"  type="hidden" value="' .$productos1['departamento']. '" name="depto">
            <input type="hidden" readonly class="form-control"  type="text" value="'.$productos1['estado'].'" name="estado">
            <input readonly class="form-control"  type="hidden" value="' .date("d-m-Y",strtotime($productos1['fecha_solicitud'])). '" name="fech">
            <p>'.$productos1['codAlmacen'].'</p>
          </div>

          <div class="col-md-2" style="position: initial">
              <label style="font-weight: bold;">Depto. o Servicio:</label>
            <p>'.$productos1['departamento'].'</p>
          </div>

        
        <div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">Encargado:</label>
            <p>'.$productos1['encargado'].'</p>
        </div>

          
          <div class="col-md-2" style="position: initial">
            <label style="font-weight: bold;">Fecha:</label>
            <p>' .date("d-m-Y",strtotime($productos1['fecha_solicitud'])). '</p>';?>
          </div> 
           <div class="col-md-2" style="position: initial">
            <label style="font-weight: bold;">Estado:</label>
              <input <?php 
                if($productos1['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" readonly value="<?php echo $productos1['estado'] ?>">
          </div>
        </div>
         </div>
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

$num_almacen = $productos1['codAlmacen'];

 $sql = "SELECT codigo,SUM(cantidad_solicitada),SUM(cantidad_despachada),precio,nombre,unidad_medida FROM detalle_almacen WHERE tb_almacen = $num_almacen GROUP by codigo,cantidad_solicitada,cantidad_despachada,precio,nombre,unidad_medida";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
    $total = $productos['SUM(cantidad_solicitada)'] * $productos['precio'];
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
   $codigo=$productos['codigo'];
     $descripcion=$productos['nombre'];
     $um=$productos['unidad_medida'];
      

        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(cantidad_solicitada)'];
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
        <td  data-label="Descripción"><?php echo $descripcion ?></td>
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

            <form  method="POST" action="../../Plugin/PDF/Circulante/pdf_circulante.php" target="_blank">
                
                
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['codAlmacen']?>" name="num_sol">
                

                   <input type="hidden" name="cod" value="<?php echo $codigo ?>">
           
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Fecha">

                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                        </svg>
                </button>
            </form>
            <form method="POST" action="../../Plugin/Imprimir/Almacen/almacen.php" target="_blank">
                
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['codAlmacen']?>" name="num_sol">
              
                       <input type="hidden" name="cod" value="<?php echo $codigo ?>">
           
                <button style="position: initial;" type="submit" class="btn btn-outline-primary mx-1" name="pdf">

                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                        </svg>
                </button>
            </form>
            <form method="POST" action="../../Plugin/Excel/Detalles_dt/Excel.php">

                
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['codAlmacen']?>" name="almacen1">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="dt_circulante">
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
                  <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
              
          <button class="btn btn-success as">Solicitides Almacen</button>
              </div>

          </div>

    </div>
   
        
    
</div>
<?php } ?>
<script>
       $(document).ready(function () {
    $('.as').click(function() {
            window.location.href="solicitudes_almacen.php";
        });
    $('#exam').DataTable({
dom: 'lrtip',
responsive: true,
autoWidth:false,

            deferRender: true,
            scroller: true,
            scrollY: 400,
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


