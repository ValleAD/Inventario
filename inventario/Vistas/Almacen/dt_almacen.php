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

$num_almacen = $productos1['codAlmacen'];

 $sql = "SELECT * FROM detalle_almacen WHERE tb_almacen = $num_almacen";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
    $total = $productos['cantidad_solicitada'] * $productos['precio'];
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
   $codigo=$productos['codigo'];
     $descripcion=$productos['nombre'];
     $um=$productos['unidad_medida'];
      

        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['cantidad_solicitada'];
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
                
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['codAlmacen']?>" name="num_sol">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['encargado']?>" name="encargado">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['estado']?>" name="estado">
                <input type="hidden" readonly class="form-control" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_solicitud']))?>" name="fech">

    <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final1 ?>" >
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Fecha">

                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                        </svg>
                </button>
            </form>
            <form method="POST" action="../../Plugin/Imprimir/Circulante/Circulante.php" target="_blank">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['codAlmacen']?>" name="num_sol">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['encargado']?>" name="encargado">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['estado']?>" name="estado">
                <input type="hidden" readonly class="form-control" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_solicitud']))?>" name="fech">  
                       <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final1 ?>" >
                <button style="position: initial;" type="submit" class="btn btn-outline-primary mx-1" name="pdf">

                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                        </svg>
                </button>
            </form>
            <form method="POST" action="../../Plugin/Excel/Detalles_dt/Excel.php">

                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['codAlmacen']?>" name="num_sol">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['encargado']?>" name="encargado">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['estado']?>" name="estado">
                <input type="hidden" readonly class="form-control" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_solicitud']))?>" name="fech">
                       <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final1 ?>" >
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="dt_circulante">
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
   
        
    
</div>
<?php } ?>
<script>
       $(document).ready(function () {
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


