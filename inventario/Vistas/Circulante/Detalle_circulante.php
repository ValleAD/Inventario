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
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Fondo Circulante</title>
</head>
<body>
                <style>  
         section{
            margin: 1%;
            padding: 1%;
            background: whitesmoke;
            border-radius: 15px;
            }
            form{
                background: transparent;
                margin: 0%;
            }
            #wew{
                margin:1%;
            }
            #buscar{
            margin-bottom: 5%;
            margin-left: 2.5%;
            margin-top: 0.5%; 
            background: rgb(5, 65, 114); 
            color: #fff; margin-bottom: 2%; 
            border: rgb(5, 65, 114);
            }
            #buscar:hover{
            background: rgb(9, 100, 175);
            } 
            #buscar:active{
            transform: translateY(5px);
            } 
            .a{
                width: 25%;
            }
            @media (max-width: 952px){
   section{
        margin: -15%6%6%2%;
        width: 97%;
    }
    #inp1{
        margin-top: 5%;
    }#buscar{
        width: 100%;
        margin: auto;
    }#buscar1{
        width: 100%;
        margin: auto;
    }
    #lo-que-vamos-a-copiar{
        width: 100%;
    }
    #Registro{
        width: 100%;
        margin: 0%;
    }
    #btn-agregar{
        width: 100%;
        margin-top: -7%;
        margin-left: 10%;
    }
    #wew{
        margin: 4%;
    }
  }
        </style>
        <br><br><br>
    <?php

$total = 0;
$total1 = 0;
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



$id=$_POST['id'];
    $sql = "SELECT * FROM tb_circulante  WHERE codCirculante='$id' ORDER BY fecha_solicitud DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos_sol = mysqli_fetch_array($result)){

 echo'   
<section >
         <div class="card">
            <div class="card-body">        
      
        <div class="row">  

          <div class="col-md-4" style="position: initial">
            <label style="font-weight: bold;">N° de Solicitud:</label>
            <input readonly class="form-control"  type="text" value="' .$datos_sol['codCirculante']. '" name="num_sol">
          </div>

          <div class="col-md-4" style="position: initial">
            <label style="font-weight: bold;">Fecha:</label>
              <input readonly class="form-control"  type="text" value="' .($datos_sol['fecha_solicitud']). '" name="fech">
          </div>';?>
           <!-- <div class="col-8 col-sm-4" style="position: initial">
            <label style="font-weight: bold;">Estado:</label>
              <input <?php
                if($datos_sol['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($datos_sol['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($datos_sol['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="estado" readonly value="<?php echo $datos_sol['estado'] ?>"><br>
            <?php if($tipo_usuario==1){ ?>
               <button type="submit" name="submit" <?php
                if($datos_sol['estado']=='Aprobado') {
                     echo ' style="display:none"';
                }else if($datos_sol['estado']=='Rechazado') {
                     echo ' style="display:none"';
                }
            ?> style="float: right;" class="btn btn-danger" name="estado" href="dt_compra_copy.php"> Cambiar estado</button><?php } ?>
          </div> -->
        </div>
      </div>
  </div>

        <br>
<div class="row">

    <div class="col-md-9 mb-3">
        <div class="card">
            <div class="card-body">
       <table class="table " id="exam" style=" width: 100%;">
            
        <thead>
              <tr id="tr">
                <th style="width: 10%;">#</th>
                <th style="width: 40%;">Código</th>
                <th style="width: 50%;">Descripción</th>
                <th style="width: 40%;">U/M</th>
                <th style="width: 40%;">Cantidad Soli.</th>
                <th style="width: 40%;">Cantidad Despa.</th>
                <th style="width: 40%;">Precio</th>
                <th style="width: 40%;">Total</th>
              </tr>
                
           </thead>
            <tbody>
<?php 
$num_circulante = $datos_sol['codCirculante'];

 $sql = "SELECT * FROM detalle_circulante WHERE tb_circulante = $num_circulante ";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
    $total = $productos['stock'] * $productos['precio'];
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
   $codigo=$productos['codigo'];
     $descripcion=$productos['descripcion'];
     $um=$productos['unidad_medida'];
     $codigoc=$productos['codigodetallecirculante'];
      

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
      <td data-label="#"> <?php echo$codigoc ?></td>
       <td  data-label="Código"><?php echo $codigo ?>
           <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
       </td>
        <td style="width: 35%;min-width: 100%;"  data-label="Descripción del Artículo"><?php echo $descripcion ?></td>

        <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td  data-label="Cantidad Solicitada"><?php echo $stock ?></td>
        <td  data-label="Cantidad"><?php echo $cantidad_desp ?></td>
         <td data-label="Costo unitario"><?php echo $precio2 ?></td>
        <td  data-label="Total"><?php echo $total1 ?></td>
      </tr>
        
  <?php }?>

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

            <form  method="POST" action="../../Plugin/Imprimir/Circulante/Circulante.php" target="_blank">
                
            <input type="hidden" readonly class="form-control" value="<?php echo $datos_sol['codCirculante']?>" name="num_sol">
            <input type="hidden" readonly class="form-control" value="<?php echo $datos_sol['fecha_solicitud']?>" name="fech">

            <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="<?php echo $final1 ?>" >
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" >

                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                        </svg>
                </button>
            </form>
            <form method="POST" action="../../Plugin/PDF/Circulante/pdf_circulante.php" target="_blank" class="mx-1">
            <input type="hidden" readonly class="form-control" value="<?php echo $datos_sol['codCirculante']?>" name="num_sol">
            <input type="hidden" readonly class="form-control" value="<?php echo $datos_sol['fecha_solicitud']?>" name="fech">

            <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="<?php echo $final1 ?>" >
                <button style="position: initial;" type="submit" class="btn btn-outline-primary">

                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                        </svg>
                </button>
            </form>
            <form method="POST" action="../../Plugin/Excel/Detalles_dt/Excel.php">

            <input type="hidden" readonly class="form-control" value="<?php echo $datos_sol['codCirculante']?>" name="circulante">

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
                  <p align="right"><b style="float: left;">Costo Unitario </b><?php echo $final9 ?></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
              <button class="btn btn-success as">Solicitudes Circulante</button>

                </div>
        
              </div>

          </div>

    </div>
   
        
    
</div>
<?php
}}
?>   
<script>
           $(document).ready(function () {
        $('.as').click(function() {
            window.location.href="solicitudes_circulante.php";
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


