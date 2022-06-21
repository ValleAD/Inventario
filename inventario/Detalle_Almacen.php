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
<?php include ('templates/menu.php');
      include ('Model/conexion.php') ?>
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
    <title>Solicitudes Almacén</title>
</head>
<body>
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
        width: 96%;
    }

    th{
        width: 25%;
    }
    #p{
        margin-top: 5%;
        margin-left: 7%;
    }#buscar{
        width: 100%;
        margin: auto;
    }#buscar1{
        width: 100%;
        margin: auto;
    }
    #lo-que-vamos-a-copiar{
        width: 120px;
    }
    #btn-agregar{
        width: 100%;
        margin-top: -7%;
        margin-left: 10%;
    }
  }
        </style>
        <br><br><br>
<?php
if(isset($_POST['submit'])){
$total = 0;
$final = 0;
$total2 = 0;
$final2 = 0;
    $a=$_POST['num_sol'];

   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_almacen WHERE codAlmacen='$a' ORDER BY fecha_solicitud DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos_sol = mysqli_fetch_array($result)){

 echo'   

    <section >
<form  method="POST" action="Controller/añadir_almacen_copy.php" >
         
      
        <div class="row">  

          <div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">N° de Solicitud:</label>
            <input readonly class="form-control"  type="text" value="' .$datos_sol['codAlmacen']. '" name="num_sol">
          </div>

          <div class="col-md-2" style="position: initial">
              <label style="font-weight: bold;">Depto. o Servicio:</label>
              <input readonly class="form-control"  type="text" value="' .$datos_sol['departamento']. '" name="depto">
          </div>

        
        <div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">Encargado:</label>
            <input readonly class="form-control" required  type="text" value="' .$datos_sol['encargado']. '" name="encargado">
        </div>

          
          <div class="col-md-2" style="position: initial">
            <label style="font-weight: bold;">Fecha:</label>
              <input readonly class="form-control"  type="text" value="' .date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])). '" name="fech">';?>
          </div>
          <div class="col-md-2" style="position: initial">
            <label style="font-weight: bold;">Estado:</label>
             <input readonly class="form-control"  type="hidden" value="<?php echo $datos_sol['codAlmacen']?>" name="id"> 
                <select  class="form-control"  type="text"  name="estado" required>
                <option disabled selected value="">Selecione</option>
                <option>Aprobado</option>
                <option>Rechazado</option>
                </select><br>
              
          </div>
      </div>
        <br><br>
       <table class="table " style=" width: 100%;">
            
        <thead>
              <tr id="tr">
                <th style="width: 10%;">#</th>
                <th style="width: 40%;">Código</th>
                <th style="width: 50%;">Descripción</th>
                <th style="width: 40%;">Unidad de Medida</th>
                <th style="width: 40%;">Cantidad Solicitada</th>
                <th style="width: 40%;">Cantidad Despachada</th>
                <th style="width: 40%;">Costo Unitario (estimado)Actual</th>
                <th style="width: 40%;">Nuevo Costo Unitario (estimado)</th>
                <th style="width: 40%;">Total</th>
              </tr>
                
           </thead>
            <tbody>
<?php 
$num_almacen = $datos_sol['codAlmacen'];
}
 $sql = "SELECT * FROM detalle_almacen WHERE tb_almacen = $num_almacen";
    $result = mysqli_query($conn, $sql);
    $n=0;
while ($productos = mysqli_fetch_array($result)){
      $n++;
        $r=$n+0;
        $total    =    $productos['cantidad_solicitada'] * $productos['precio'];
        $final    +=   $total;
        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");
        $total2   =    number_format($total, 2, ".",",");
        $final2   =    number_format($final, 2, ".",",");
        $cant_aprobada=$productos['cantidad_solicitada'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,",");
        

 ?>
    <style type="text/css">
     #td{
        display: none;
    }
    
   
</style> 
      <tr>
        <td data-label="#"><?php  echo $r ?></td>
        <td  data-label="Código"><?php echo $productos['codigo'] ?>
            <input type="hidden" name="cod[]" value="<?php echo $productos['codigo'] ?>">
            <input type="hidden" name="cod1[]" value="<?php echo $productos['codigoalmacen']?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida'] ?>">
            <input type="hidden" name="desc[]" value="<?php echo $productos['nombre'] ?>"></td>
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>"></td>

        <td  data-label="Nombre del Artículo"><?php echo $productos['nombre'] ?></td>
        <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td  data-label="Cantidad Solicitada"><?php echo $stock ?></td>

        <td  data-label="Cantidad Despachada"><input type="number" step="0.01" class="form-control" style="background:transparent; border: 1 solid #000;  width: 100%; text-align: center" name="cantidad_despachada[]" required ></td>

        <td  data-label="Costo Unitario">$<?php echo $precio2 ?></td>
        <td  data-label="Costo Unitario"><input type="number" step="0.01" class="form-control" style="background:transparent; border: 1 solid #000;  width: 100%; text-align: center" name="cost[]" required ></td>

        <td  data-label="total">$<?php echo $total2 ?></td>
      </tr>
        
  <?php }?>
            <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
        <td colspan="8"style="text-align: left;font-size: 12px; font-weight: bold;">Subtotal</td>
        <td style="color: red;font-size: 12px; font-weight: bold;"><?php echo $final2 ?></td>
    </tfoot>
        </tbody>
    </table>
</div>
    
  <button id="buscar1" name="detalle_almacen" type="submit" class="btn btn-lg my-3 btn-success">Guardar Estado
            <svg class="bi" width="20" height="20" fill="currentColor">
            <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#save"/>
            </svg>
    </button>
</form>
<?php
    }
if(isset($_POST['detalle'])){
$total = 0;
$final = 0;
$total1 = 0;
$final1 = 0;

$num_sol = $_POST['id'];

   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_almacen WHERE codAlmacen='$num_sol' ORDER BY fecha_solicitud DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos_sol = mysqli_fetch_array($result)){
$n_sol=$datos_sol['codAlmacen'];
 echo'   
 <section>
<form  method="POST" action="" >
         
      
        <div class="row">  

          <div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">N° de Solicitud:</label>
            <input readonly class="form-control"  type="text" value="' .$datos_sol['codAlmacen']. '" name="num_sol">
          </div>

          <div class="col-md-2" style="position: initial">
              <label style="font-weight: bold;">Depto. o Servicio:</label>
              <input readonly class="form-control"  type="text" value="' .$datos_sol['departamento']. '" name="depto">
          </div>

        
        <div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">Encargado:</label>
            <input readonly class="form-control"  type="text" value="' .$datos_sol['encargado']. '" name="encargado">
        </div>

          
          <div class="col-md-2" style="position: initial">
            <label style="font-weight: bold;">Fecha:</label>
              <input readonly class="form-control"  type="text" value="' .date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])). '" name="fech">
          </div>
          <div class="col-md-2" style="position: initial">
            <label style="font-weight: bold;">Estado:</label>
             <div style="position:initial;" class="input-group mb-3">';?>
                 <label class="input-group-text" for="inputGroupSelect01">
                    <?php  if($datos_sol['estado']=='Pendiente') { ?>
                            <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#question-octagon-fill"/>
                </svg>
                    <?php } elseif($datos_sol['estado']=='Aprobado') { ?>
                        <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#check-circle-fill"/>
                </svg>
                    <?php } elseif($datos_sol['estado']=='Rechazado') { ?>
                        <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#x-square-fill"/>
                </svg>
            <?php } ?>
                 </label>
             <input <?php
                if($datos_sol['estado']=='Pendiente') {
                    echo ' style="background-color:green ;position: initial;width:70%; border-radius:5px;text-align:center; color: white;"';
                }else if($datos_sol['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;position: initial;width:70%; border-radius:5px;text-align:center; color: white;"';
                }else if($datos_sol['estado']=='Rechazado') {
                     echo ' style="background-color:red ;style="position: initial;width:70%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" readonly value="<?php echo $datos_sol['estado'] ?>"><br>
            <?php if($tipo_usuario==1){ ?>
               <button id="buscar1" type="submit" name="submit" <?php
                if($datos_sol['estado']=='Aprobado') {
                     echo ' style="display:none"';
                }else if($datos_sol['estado']=='Rechazado') {
                     echo ' style="display:none"';
                }
            ?> style="float: right;" class="btn btn-danger my-3" name="estado" > Cambiar estado
            <svg class="bi" width="20" height="20" fill="currentColor">
            <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#upload"/>
            </svg>
            </button><?php } ?>
          </div>
            </div>
        </div>
          
      </form>
      <form method="POST" style="margin-top:-7%" action="Plugin/pdf_almacen.php" target="_blank">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $datos_sol['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $datos_sol['codAlmacen']?>" name="num_sol">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $datos_sol['encargado']?>" name="nombre">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo date("d-m-Y",strtotime($datos_sol['fecha_solicitud']))?>" name="fech">
          <?php 
if ($datos_sol['estado']=="Rechazado") {
                        echo ' <form style="margin: 0%;position: 0; background: transparent;" method="POST" action="Controller/añadir_vale.php">
<p class="text-center bg-danger" style="color:white;border-radius: 5px;font-size: 2.5em;padding: 3%;margin-top:5%">SOLICITUD RECHAZADA</p>';
                    }
               if ($datos_sol['estado']=="Aprobado") {?><br><br>
                    <div style="position: initial;" class="btn-group mb-3 mx-2 my-4" style="margin-top:4%" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/pdf_almacen.php">
                    

<button style="position: initial;" type="submit" class="btn btn-outline-primary" name="aprobado">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>

                </button>
            </form>
            <form method="POST" action="Plugin/almacen.php" target="_blank">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $datos_sol['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $datos_sol['codAlmacen']?>" name="num_sol">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $datos_sol['encargado']?>" name="nombre">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo date("d-m-Y",strtotime($datos_sol['fecha_solicitud']))?>" name="fech">
           
                <?php

                
                $sql = "SELECT * FROM detalle_almacen WHERE tb_almacen = $n_sol";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total = $productos['cantidad_despachada'] * $productos['precio'];
      $final += $total;
      $codigo=$productos['codigo'];
      $descripcion=$productos['nombre'];
      $um=$productos['unidad_medida'];
      $precio=$productos['precio'];
      $fecha=$productos['fecha_registro'];


       $precio1=number_format($precio, 2,".",",");
      $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");

      $cant_aprobada=$productos['cantidad_solicitada'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");
       ?>
       <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio1 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final1 ?>" >
        <?php } ?>
<button style="position: initial;" type="submit" class="btn btn-outline-primary" name="pdf">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>

            </form>

</div> 
<table class="table">
                    <thead>
                        <tr id="tr">
                  <th style="width: 10%;">Código</th>
                  <th style="width: 30%;">Descripción</th>
                  <th style="width: 10%;">Unidad de Medida</th>
                  <th style="width: 10%;">Cantidad Solicitada</th>
                  <th style="width: 10%;">Cantidad Depachada</th>
                  <th style="width: 10%;">Costo unitario</th>
                  <th style="width: 10%;">Total</th>
                </tr>
                <td id="td" colspan="6"><h4>No se encontraron resultados 😥</h4></td>
              </thead>
</table>
<div id="div" style = " max-height: 442px; overflow-y:scroll;"> 
<table class="table">
                <tbody>
                    <?php 
                     $total = 0;
  $final = 0;
 $sql = "SELECT * FROM detalle_almacen WHERE tb_almacen = $n_sol";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
        $total    =    $productos['cantidad_despachada'] * $productos['precio'];
        $final    +=   $total;
        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");
        $total2   =    number_format($total, 2, ".",",");
        $final2   =    number_format($final, 2, ".",",");  
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
       <td  data-label="Código"><?php echo $productos['codigo'] ?>
            <input type="hidden" name="cod[]" value="<?php echo $productos['codigo'] ?>">
            <input type="hidden" name="desc[]" value="<?php echo $productos['nombre'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida']?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total2 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final2 ?>" >
        </td>
        <td style="width: 30%;;min-width: 100%;"  data-label="Descripción"><?php echo $productos['nombre'] ?></td>
        <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td  data-label="Cantidad"><?php echo $stock ?></td>
        <td  data-label="Cantidad"><?php echo $cantidad_desp ?></td>
        <td  data-label="Costo unitario"><?php echo $precio2 ?></td>
        <td  data-label="total"><?php echo $total2 ?></td>
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
</table>
</form>
        <?php } if ($datos_sol['estado']=="Pendiente") {?><br>
            <div style="position: initial;" class="btn-group mb-3 mx-2 my-5" style="margin-top:15%" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/pdf_almacen.php">
            <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="aprobado">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>

                </button>
            </form>
            <form method="POST" action="Plugin/almacen.php" target="_blank">
                        <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $datos_sol['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $datos_sol['codAlmacen']?>" name="num_sol">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $datos_sol['encargado']?>" name="encargado">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo date("d-m-Y",strtotime($datos_sol['fecha_solicitud']))?>" name="fech">
          
                <?php

                
                $sql = "SELECT * FROM detalle_almacen WHERE tb_almacen = $n_sol";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total = $productos['cantidad_solicitada'] * $productos['precio'];
      $final += $total;
      $codigo=$productos['codigo'];
      $descripcion=$productos['nombre'];
      $um=$productos['unidad_medida'];
      $precio=$productos['precio'];
      $fecha=$productos['fecha_registro'];


       $precio1=number_format($precio, 2,".",",");
      $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");

      $cant_aprobada=$productos['cantidad_solicitada'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");
       ?>
       <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio1 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final1 ?>" >
        <?php } ?>

<button style="position: initial;" type="submit" class="btn btn-outline-primary" name="pdf">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>

            </form>

</div>

<table class="table">
                    <thead>
                        <tr id="tr">
                  <th style="width: 10%;">Código</th>
                  <th style="width: 30%;">Descripción</th>
                  <th style="width: 10%;">Unidad de Medida</th>
                  <th style="width: 10%;">Cantidad Solicitada</th>
                  <th style="width: 10%;">Cantidad Depachada</th>
                  <th style="width: 10%;">Costo unitario</th>
                  <th style="width: 10%;">Total</th>
                </tr>
                <td id="td" colspan="6"><h4>No se encontraron resultados 😥</h4></td>
              </thead>
</table>
<div id="div" style = " max-height: 442px; overflow-y:scroll;"> 
<table class="table">
                <tbody>
                    <?php 
                     $total = 0;
  $final = 0;
 $sql = "SELECT * FROM detalle_almacen WHERE tb_almacen = $n_sol";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
        $total    =    $productos['cantidad_despachada'] * $productos['precio'];
        $final    +=   $total;
        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");
        $total2   =    number_format($total, 2, ".",",");
        $final2   =    number_format($final, 2, ".",",");  
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
       <td  data-label="Código"><?php echo $productos['codigo'] ?>
            <input type="hidden" name="cod[]" value="<?php echo $productos['codigo'] ?>">
            <input type="hidden" name="desc[]" value="<?php echo $productos['nombre'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida']?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total2 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final2 ?>" >
        </td>
        <td style="width: 30%;min-width: 100%;"  data-label="Descripción"><?php echo $productos['nombre'] ?></td>
        <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td  data-label="Cantidad"><?php echo $stock ?></td>
        <td  data-label="Cantidad"><?php echo $cantidad_desp ?></td>
        <td  data-label="Costo unitario"><?php echo $precio2 ?></td>
        <td  data-label="total"><?php echo $total2 ?></td>
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
</table>
             <?php  }       
} }?>  
</section>        
  </body>
  </html>