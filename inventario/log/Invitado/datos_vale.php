<!DOCTYPE html>
<?php include ("menu.php");
require '../../Model/conexion.php'; ?>
<html lang="es">
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vale</title>
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
    $sql = "SELECT * FROM tb_vale ORDER BY codVale DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($productos1 = mysqli_fetch_array($result)){
 if ($productos1['observaciones']=="") {
    $jus = 'Sin observacion por el momento';
        
    }else{
    $jus = $productos1['observaciones'];
      }
 echo'   
<section id="section">

         
      <div class="card">
            <div class="card-body">
        <div class="row">
      
              <div class="col-md-3" style="position: initial">
          
                
                  <label style="font-weight: bold;">Depto. o Servicio:</label>
                  <p>' .$productos1['departamento']. '</p>
    
              </div>
    
              <div class="col-md-2" style="position: initial">
                <label style="font-weight: bold;">N° de Vale:</label>
               <p>' .$productos1['codVale']. '</p>
              </div>
    
            <div class="col-md-3" style="position: initial">
                <label style="font-weight: bold;">Encargado:</label>
               <p>' .$productos1['usuario']. '</p>
            </div>
    
              
              <div class="col-md-2" style="position: initial">
                <label style="font-weight: bold;">Fecha:</label>
                 <p>' .date("d-m-Y",strtotime($productos1['fecha_registro'])).  '</p>
              </div>';?>
           <div class="col-md-2" style="position: initial">
              <label style="font-weight: bold;">Estado</label>
              <input <?php
                if($productos1['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> readonly class="form-control"  type="text" value="<?= $productos1['estado'] ?>" name="id"> 
            </div>
        </div>
            </div>
        </div>
        
        <br>
        
<div class="row">

    <div class="col-md-9 mb-3">
        <div class="card">
            <div class="card-body">

                
        <table class="table table-striped" id="exam">
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

$num_vale = $productos1['codVale'];

 $sql = "SELECT * FROM detalle_vale WHERE numero_vale = $num_vale";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
    $total = $productos['stock'] * $productos['precio'];
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
   $codigo=$productos['codigo'];
     $descripcion=$productos['descripcion'];
     $um=$productos['unidad_medida'];
      

        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");  
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
<form method="POST" action="../../Plugin/Imprimir/Vale/vale.php" target="_blank">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codVale']?>" name="vale">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['usuario']?>" name="usuario">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['estado']?>" name="estado">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_registro']))?>" name="fech">

        <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final1 ?>" >

  <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>

<button style="position: initial;" type="submit" class="btn btn-outline-primary" name="aprobado">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>

                </button>
            </form>
<form method="POST" action="../../Plugin/PDF/Vale/pdf_vale.php" target="_blank">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codVale']?>" name="vale">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['usuario']?>" name="usuario">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['estado']?>" name="estado">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_registro']))?>" name="fech">
        <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final1 ?>" >

  <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>

<button style="position: initial;" type="submit" class="btn btn-outline-primary" name="aprobado">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>

                </button>
            </form>
            <form method="POST" action="../../Plugin/Excel/Detalles_dt/Excel.php" >
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codVale']?>" name="vale">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['usuario']?>" name="usuario">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['estado']?>" name="estado">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_registro']))?>" name="fech">

       <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final1 ?>" >
   <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>
                <button type="submit" class="btn btn-outline-primary" name="DT" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>

                    </div>
                    <div class="col-md-12"><label style="font-weight: bold;">Sub Total:</label>
                  <p style="float: right;"><?php echo $final1?></p>
              </div>
              
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
            <button class="btn btn-success as">Solicitudes Vale</button>
                  </div>
              </div>
        </div>
        
    
</div>
</section>    
<?php } ?>


<script>
       $(document).ready(function () {
        $('.as').click(function() {
            window.location.href="solicitudes_vale.php";
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


