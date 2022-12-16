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
    <title>Vale</title>
</head>
<body>
        <style>  
        #div{margin: 0%}
        section{background: whitesmoke;border-radius: 15px;margin: 1%;padding: 1%;}
        form{background: transparent;padding: 1%;}
        @media (max-width: 800px){

        .col-md-3{
            margin-top: 2%;
        }
        section{margin: -15%0%5%4%;width: 93%;}
        form{padding: 1%;}
        label{
        margin-top: 3%;}}
        </style>
        <br><br><br>
<section>
<?php

$total = 0;
$final = 0;
$final1 = 0;
 $final2 = 0;
 $final3 = 0;
 $final4 = 0;
 $final5 = 0;
 $final6 = 0;
 $final7 = 0;
 $final8 = 0;
 $final9 = 0;
if(isset($_POST['detalle'])){
    
$cod_compra = $_POST['id'];
    $sql = "SELECT * FROM tb_vale WHERE codVale = '$cod_compra'";
    $result = mysqli_query($conn, $sql);
 while ($productos1 = mysqli_fetch_array($result)){
    $estado=$productos1['estado'];
 if ($productos1['observaciones']=="") {
    $jus = 'Sin observacion por el momento';
        
    }else{
    $jus = $productos1['observaciones'];
      }
 echo'   

         
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
            <label style="font-weight: bold;">Estado:</label>
             <div style="position:initial;" class="input-group">
                 <label class="input-group-text" for="inputGroupSelect01">
                    <?php  if($productos1['estado']=='Pendiente') { ?>
                            <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#question-octagon-fill"/>
                </svg>
                    <?php } elseif($productos1['estado']=='Aprobado') { ?>
                        <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#check-circle-fill"/>
                </svg>
                    <?php } elseif($productos1['estado']=='Rechazado') { ?>
                        <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#x-square-fill"/>
                </svg>
            <?php } ?>
                 </label>
             <input <?php
                if($productos1['estado']=='Pendiente') {
                    echo ' style="background-color:green ;position: initial;width:70%; border-radius:5px;text-align:center; color: white;"';
                }else if($productos1['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;position: initial;width:70%; border-radius:5px;text-align:center; color: white;"';
                }else if($productos1['estado']=='Rechazado') {
                     echo ' style="background-color:red ;style="position: initial;width:70%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="estado" readonly value="<?php echo $productos1['estado'] ?>"><br>
            
          </div>
        </div>
            </div>
        </div>  </div>
        </div>
        
        <br>
        
<div class="row">

    <div class="col-md-9">
        <div class="card">
            <div class="card-body">

                
        <table class="table " id="exam">
            <thead>
              <tr id="tr">
                <th>Código</th>
                <th>Descripción Completa</th>
                <th>Unidad de Medida</th>
                <th>Cantidad solicitada</th>
                <th>Cantidad Depachada</th>

                <th>Costo unitario</th>
                <th>Total</th>
              </tr>
           </thead>
            <tbody>
                <?php 

$num_vale = $productos1['codVale'];

 $sql = "SELECT * FROM detalle_vale WHERE numero_vale = $num_vale ";
    $result1 = mysqli_query($conn, $sql);
    if (!$result1) {?>
        <style>div{
            display: none;
        }</style>
    <?php 
        }else{
while ($productos = mysqli_fetch_array($result1)){
        if ($estado="Pendiente") {  
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado="Rechazado") {
        
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
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
  }
   ?> 
  </tbody>
           
</table>
 </div>
</div>
</div>
    <div class="col-md-3  " >
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                            <div style="position: initial;" class="btn-group my-3 mx-2" role="group" aria-label="Basic outlined example">

<form method="POST" action="../../Plugin/Imprimir/Vale/vale.php" target="_blank">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codVale']?>" name="vale">

        <input type="hidden" name="cod" value="<?php echo $codigo ?>">
            <input type="hidden" name="tot" value="<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="<?php echo $final1 ?>" >

  <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>

<button style="position: initial;" type="submit" class="btn btn-outline-primary" name="aprobado">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>

                </button>
            </form>
<form method="POST" action="../../Plugin/PDF/Vale/pdf_vale.php" target="_blank" class="mx-1">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codVale']?>" name="vale">
        <input type="hidden" name="cod" value="<?php echo $codigo ?>">
            <input type="hidden" name="tot" value="<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="<?php echo $final1 ?>" >

  <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>

<button style="position: initial;" type="submit" class="btn btn-outline-primary" name="aprobado">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>

                </button>
            </form>
            <form method="POST" action="../../Plugin/Excel/Detalles_dt/Excel.php" >
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codVale']?>" name="vale">

       <input type="hidden" name="cod" value="<?php echo $codigo ?>">
            <input type="hidden" name="tot" value="<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="<?php echo $final1 ?>" >
   <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>
                <button type="submit" class="btn btn-outline-primary" name="DT" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
<?php if($tipo_usuario==1){ ?>
    <form method="POST" action="">
                 <button  type="submit" name="submit" <?php
                if($productos1['estado']=='Aprobado') {
                     echo ' style="display:none"';
                }else if($productos1['estado']=='Rechazado') {
                     echo ' style="display:none"';
                }
            ?> class="btn btn-danger" name="estado" title=" Cambiar Estado">
            <svg class="bi" width="20" height="20" fill="currentColor">
            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#upload"/>
            </svg>
            </button>
            <input type="hidden" readonly class="form-control"  value="<?php echo $productos1['codVale']?>" name="vale">
        </form><?php } ?>
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
            <button class="btn btn-success as">Solicitudes Vale</button>

                  </div>
              </div>
        </div>
        </div>



<?php } }
if(isset($_POST['submit'])){


    $cod_vale = $_POST['vale'];
    
        $sql = "SELECT * FROM tb_vale WHERE codVale = $cod_vale";
        $result = mysqli_query($conn, $sql);
     while ($productos1 = mysqli_fetch_array($result)){
     if ($productos1['observaciones']=="") {
    $jus = 'Sin observación por el momento';
        
    }else{
    $jus = $productos1['observaciones'];
      }
     echo'   
 


                    <form method="POST" action="../../Controller/Vale/añadir_vale_copy.php">
          <div class="card">
                  <div class="card-body">
            <div class="row">
          
            <div class="col-md-3" style="position: initial">
          
                  <label style="font-weight: bold;">Depto. o Servicio:</label>
                  <input readonly class="form-control"  type="hidden" value="' .$productos1['departamento']. '" name="codVale">
                  <p>' .$productos1['departamento']. '</p>
              </div>
    
              <div class="col-md-3" style="position: initial">
                <label style="font-weight: bold;">N° de O.D.T.</label>
                <input readonly class="form-control"  type="hidden" value="' .$productos1['codVale']. '" name="vale">
                <p>' .$productos1['codVale']. '</p>
              </div>
    
            <div class="col-md-3" style="position: initial">
                <label style="font-weight: bold;">Encargado:</label>
                <input readonly class="form-control"  type="hidden" value="' .$productos1['usuario']. '" name="usuario">
                <p>' .$productos1['usuario']. '</p>
            </div>     
              <div class="col-md-3" style="position: initial">
                <label style="font-weight: bold;">Fecha:</label>
                  <input readonly class="form-control"  type="hidden" value="'.$productos1['fecha_registro']. '" name="fech">
                  <p>' .date("d-m-Y",strtotime($productos1['fecha_registro'])).  '</p>
              </div>';?>
            
            </div>
        </div>
    </div>


     <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codVale']?>" name="vale">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['usuario']?>" name="usuario">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['fecha_registro']?>">
</div>
</div>
</div>

<br>
            <div class="row">

    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
            <table class="table" id="example">
                
              <thead>
                <tr id="tr">
                  <th>Código</th>
                  <th style="width:25%">Descripción</th>
                  <th>Unidad de Medida</th>
                  <th>Cantidad Solicitada</th>
                  <th>Cantidad Depachada</th>
                <th>Costo Unitario</th>
               <!-- <th>Nuevo Costo Unitario (estimado)</th>-->
                  <th>Total</th>
               </tr>
              </thead>
                <tbody>
         <?php            
    
    $num_vale = $productos1['codVale'];

     $sql = "SELECT * FROM detalle_vale WHERE numero_vale = $num_vale ";
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
      $cantidad=$productos['stock'];
      $stock=number_format($cantidad, 2, ".",",");
      
        $final2 += $stock;
        $final3   =    number_format($final2, 2, ".",",");

        $final8 += $precio;
        $final9   =    number_format($final8, 2, ".",",");
      ?>
       <style type="text/css"> #td{display: none;} </style> 

       <tr>
        <td  data-label="Código"><?php echo $codigo ?>
        <input type="hidden" name="cod_vale[]" readonly value="<?php echo $productos['codigodetallevale'] ?>">
            <input type="hidden"  name="cod[]" readonly value="<?php echo $codigo ?>">
            <input type="hidden" style="width: 100%; background:transparent; border: none; text-align: left; height: 100%;"  name="desc[]" readonly value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" readonly value="<?php echo $um ?>">
            <input type="hidden" type="decimal" step="0.01"  name="cant[]" readonly value="<?php echo $stock ?>">
            <input type="hidden"  name="cost[]" step="0.01"  readonly value="<?php echo $precio1 ?>">
            <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">

    </td>
    <td  data-label="Descripción"><?php echo $descripcion ?></td>
        <td  data-label="Unidada de Medida"><?php echo $um ?></td>
        <td  data-label="Cantidad"><?php echo $stock ?></td>
        <td  data-label="Cantidad"><input style="background:transparent; border: 1px solid #000;  width: 100%; text-align: center" class="form-control"  required type="number" step="0.01" min="0.00" max="<?php echo $stock ?>"  name="cantidad_despachada[]"  value=""></td>
        <td  data-label="Costo unitario"><?php echo $precio1 ?></td>
        <td  data-label="total"><?php echo $total1 ?></td>
      </tr>

      <?php } ?> 

        </tbody>
    </table>
</div>
</div>
</div>
    <div class="col-md-3 " >
        <div class="card">
            <div class="card-body">
               
                    
  <label style="font-weight: bold;">Estado:</label><br>* Requerido para este Formulario.
            <input  id="input" type="radio" name="estado" value="Aprobado" required> <label class="btn btn-outline-primary" id="label1" for="input" > Aprobar Producto</label><br>No Requerido para este Formulario.
               <a class="btn btn-outline-primary mb-3" type="hidden" onclick="return confirmaion2()" href="../../Controller/Vale/añadir_vale_copy.php?vale=<?php echo $productos1['codVale']?>&estado=Rechazado">Rechazar Producto</a> 
               
                <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
                <p align="right"><b style="float: left;">Total del Precio: </b><?php echo $final9 ?></p>
                <p align="right" class="my-4"><b style="float: left;">SubTotal: </b><?php echo $final1?></p>
                    </div>
                </div>
                
                    <br>
                <div class="card">
            <div class="card-body">
                      <label>Observaciones (En qué se ocupará el bien entregado)</label>
                    <textarea rows="7"  class="form-control" name="jus"  required><?php echo $jus ?> </textarea><br>


    <button id="buscar1" type="submit" class="btn btn-lg btn-success" name="detalle_vale">Guardar Estado
        <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#save"/>
        </svg>
    </button><br><br>
</div>
        </div> 
    </div>
</div>
</div>
 
</form>
        <?php }}?>
</section>


   

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
});       $(document).ready(function () {
    $('#example').DataTable({
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


