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
    <title>Bodega</title></title>
</head>
<body>
    <style type="text/css">
              @media (max-width: 952px){
   #section{
        margin-top: 5%;
        margin-left: 15%;
        width: 75%;
    }
    th{
        width: 25%;
    }
  }
    </style>
<?php

if(isset($_POST['detalle'])){

    $total = 0;
    $final = 0;
    $total1 = 0;
    $final1 = 0;
    $cod_bodega = $_POST['id'];
    
       include 'Model/conexion.php';
        $sql = "SELECT * FROM tb_bodega WHERE codBodega = $cod_bodega";
        $result = mysqli_query($conn, $sql);
     while ($productos1 = mysqli_fetch_array($result)){
    $odt = $productos1['codBodega'];
     echo'   
    <section id="section" style="margin:2%; background: rgba(555, 555, 555, .7);border-radius:15px;">
    <form method="POST" action="" >
             
          
            <div class="row">
          
              <div class="col-6 col-sm-3" style="position: initial">
          
                  <label style="font-weight: bold;">Depto. o Servicio:</label>
                  <input readonly class="form-control"  type="text" value="' .$productos1['departamento']. '" name="depto">
    
              </div>
    
              <div class="col-6 col-sm-2" style="position: initial">
                <label style="font-weight: bold;">N° de O.D.T.</label>
                <input readonly class="form-control"  type="text" value="' .$productos1['codBodega']. '" name="bodega">
              </div>
    
            <div class="col-6 col-sm-2" style="position: initial">
                <label style="font-weight: bold;">Encargado:</label>
                <input readonly class="form-control"  type="text" value="' .$productos1['usuario']. '" name="usuario">
            </div>
    
              
              <div class="col-6 col-sm-2" style="position: initial">
                <label style="font-weight: bold;">Fecha:</label>
                  <input readonly class="form-control"  type="text" value="'.date("d-m-Y",strtotime($productos1['fecha_registro'])). '" name="fech">
              </div>
              <div class="col-8 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Estado:</label>
             <div class="input-group mb-3">';?>
                 <label class="input-group-text" for="inputGroupSelect01">
                    <?php  if($productos1['estado']=='Pendiente') { ?>
                            <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#question-octagon-fill"/>
                </svg>
                    <?php } elseif($productos1['estado']=='Aprobado') { ?>
                        <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#check-circle-fill"/>
                </svg>
                    <?php } elseif($productos1['estado']=='Rechazado') { ?>
                        <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#x-square-fill"/>
                </svg>
            <?php } ?>
                 </label>
              <input <?php
                if($productos1['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:70%; border-radius:5px;text-align:center; color: white;"';
                }else if($productos1['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:70%; border-radius:5px;text-align:center; color: white;"';
                }else if($productos1['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:70%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" readonly value="<?php echo $productos1['estado'] ?>"><br>
            <?php if($tipo_usuario==1){ ?>
               <button type="submit" name="submit" <?php
                if($productos1['estado']=='Aprobado') {
                     echo ' style="display:none"';
                }else if($productos1['estado']=='Rechazado') {
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
          
            <br>
          </form>

              <form method="POST" style="margin-top:-7%" action="Plugin/pdf_bodega.php" target="_blank">

                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codBodega']?>" name="bodega">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['usuario']?>" name="usuario">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_registro']))?>" name="fech">
              </div>
              <?php 
if ($productos1['estado']=="Rechazado") {
                        echo ' <form style="margin: 0%;position: 0; background: transparent;" method="POST" action="Controller/añadir_vale.php">
<p class="text-center bg-danger" style="color:white;border-radius: 5px;font-size: 2.5em;padding: 3%;style="margin-top:5%">SOLICITUD RECHAZADA</p>';
                    }
               if ($productos1['estado']=="Aprobado") {?>
                <table class="table table-responsive" style=" width: 100%">
                    <div class="btn-group mb-3 mx-2" style="margin-top:4%" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/pdf_bodega.php">
                    

<button type="submit" class="btn btn-outline-primary" name="aprobado">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>

                </button>
            </form>
            <form style="" method="POST" action="Plugin/bodega.php" target="_blank">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codBodega']?>" name="bodega">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['usuario']?>" name="usuario">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_registro']))?>" name="fech">
           
                <?php

                
                $sql = "SELECT * FROM detalle_bodega WHERE odt_bodega = $odt";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total = $productos['cantidad_despachada'] * $productos['precio'];
      $final += $total;
      $codigo=$productos['codigo'];
      $descripcion=$productos['descripcion'];
      $um=$productos['unidad_medida'];
      $precio=$productos['precio'];
      $fecha=$productos['fecha_registro'];


       $precio1=number_format($precio, 2,".",",");
      $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");

      $cant_aprobada=$productos['stock'];
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
<button type="submit" class="btn btn-outline-primary" name="pdf">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>

            </form>

</div>
                    <thead>
                        <tr id="tr">
                  <th style="width: 10%;">Código</th>
                  <th style="width: 50%;">Descripción</th>
                  <th style="width: 10%;">Unidad de Medida</th>
                  <th style="width: 10%;">Cantidad Solicitada</th>
                  <th style="width: 10%;">Cantidad Depachada</th>
                  <th style="width: 10%;">Costo unitario</th>
                  <th style="width: 10%;">Total</th>
                </tr>
                <td id="td" colspan="6"><h4>No se encontraron resultados 😥</h4></td>
              </thead>
                <tbody>
                    <?php 
                     $total = 0;
  $final = 0;
 $sql = "SELECT * FROM detalle_bodega WHERE odt_bodega = $odt";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
        $total    =    $productos['cantidad_despachada'] * $productos['precio'];
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
            <input type="hidden" name="desc[]" value="<?php echo $productos['descripcion'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida']?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total2 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final2 ?>" >
        </td>
        <td  data-label="Descripción"><?php echo $productos['descripcion'] ?></td>
        <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td  data-label="Cantidad"><?php echo $stock ?></td>
        <td  data-label="Cantidad"><?php echo $cantidad_desp ?></td>
        <td  data-label="Costo unitario"><?php echo $precio2 ?></td>
        <td  data-label="total"><?php echo $total2 ?></td>
      </tr>

      <?php } ?> 
     <tfoot>
        <th colspan="5"></th>
            <th >SubTotal</th>
            <td style=" color: red; font-weight: bold;" data-label="Subtotal"><?php echo $final2?></td>
        </tfoot>
        </tbody>
    </table>
</form>
        <?php } if ($productos1['estado']=="Pendiente") {?>
<table class="table table-responsive" style="margin-bottom:3%">
            <div class="btn-group  my-5 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/pdf_bodega.php">
            <button type="submit" class="btn btn-outline-primary" name="aprobado">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>

                </button>
            </form>
            <form method="POST" action="Plugin/bodega.php" target="_blank">
                        <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codBodega']?>" name="bodega">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['usuario']?>" name="usuario">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_registro']))?>" name="fech">
          
                <?php

                
                $sql = "SELECT * FROM detalle_bodega WHERE odt_bodega = $odt";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total = $productos['stock'] * $productos['precio'];
      $final += $total;
      $codigo=$productos['codigo'];
      $descripcion=$productos['descripcion'];
      $um=$productos['unidad_medida'];
      $precio=$productos['precio'];
      $fecha=$productos['fecha_registro'];


       $precio1=number_format($precio, 2,".",",");
      $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");

      $cant_aprobada=$productos['stock'];
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

<button type="submit" class="btn btn-outline-primary" name="pdf">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>

            </form>

</div>
            <thead>
              <tr id="tr">
                <th style="width: 10%;">Código</th>
                <th style="width: 50%;">Descripción</th>
                <th style="width: 10%;">Unidad de Medida</th>
                <th style="width: 10%;">Cantidad Solicitada</th>
                <th style="width: 10%;">Cantidad Depachada</th>
                <th style="width: 10%;">Costo unitario</th>
                <th style="width: 10%;">Total</th>
                </tr>
                <td id="td" colspan="6"><h4>No se encontraron resultados 😥</h4></td>
              </thead>
                <tbody>
                <?php 


  $total = 0;
  $final = 0;
 $sql = "SELECT * FROM detalle_bodega WHERE odt_bodega = $odt";
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
            <input type="hidden" name="desc[]" value="<?php echo $productos['descripcion'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida']?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total2 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final2 ?>" >
        </td>
        <td  data-label="Descripción"><?php echo $productos['descripcion'] ?></td>
        <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td  data-label="Cantidad"><?php echo $stock ?></td>
        <td  data-label="Cantidad"><?php echo $cantidad_desp ?></td>
        <td  data-label="Costo unitario"><?php echo $precio2 ?></td>
        <td  data-label="total"><?php echo $total2 ?></td>
      </tr>

      <?php } ?> 
     <tfoot>
        <th colspan="5"></th>
            <th >SubTotal</th>
            <td style=" color: red; font-weight: bold;" data-label="Subtotal"><?php echo $final2?></td>
        </tfoot>
        </tbody>
    </table>

</form>
             <?php  }       
} }
if(isset($_POST['submit'])){

    $total = 0;
    $final = 0;
    $total1 = 0;
    $final1 = 0;
    $cod_bodega = $_POST['bodega'];
    
       include 'Model/conexion.php';
        $sql = "SELECT * FROM tb_bodega WHERE codBodega = $cod_bodega";
        $result = mysqli_query($conn, $sql);
     while ($productos1 = mysqli_fetch_array($result)){
        $odt = $productos1['codBodega'];
    
     echo'   
    <section id="section" style="margin:2%">
    <form method="POST" action="Controller/añadir_bodega_copy.php">
             
          
            <div class="row">
          
              <div class="col-6 col-sm-3" style="position: initial">
          
                  <label style="font-weight: bold;">Depto. o Servicio:</label>
                  <input readonly class="form-control"  type="text" value="' .$productos1['departamento']. '" name="depto">
    
              </div>
    
              <div class="col-6 col-sm-2" style="position: initial">
                <label style="font-weight: bold;">O.D.T.</label>
                <input readonly class="form-control"  type="text" value="' .$productos1['codBodega']. '" name="bodega">
              </div>
    
            <div class="col-6 col-sm-2" style="position: initial">
                <label style="font-weight: bold;">Encargado:</label>
                <input readonly class="form-control"  type="text" value="' .$productos1['usuario']. '" name="usuario">
            </div>
    
              
              <div class="col-6 col-sm-2" style="position: initial">
                <label style="font-weight: bold;">Fecha:</label>
                  <input readonly class="form-control"  type="text" value="'.date("d-m-Y",strtotime($productos1['fecha_registro'])). '" name="fech">
              </div>
              <div class="col-8 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Estado:</label>';?>
           <select  class="form-control"  type="text" name="estado" required>
                <option disabled selected value="">Selecione</option>
                <option>Aprobado</option>
                <option>Rechazado</option>
                </select><br>
              
          </div>
            </div>
          
            <br>
            <table class="table" style="margin-bottom:3%">
                
              <thead>
                <tr id="tr">
                  <th style="width: 45%;">Código</th>
                  <th style="width: 125%;text-align: left;">Descripción</th>
                  <th style="width: 10%;">Unidad de Medida</th>
                  <th style="width: 30%;">Cantidad Solicitada</th>
                  <th style="width: 30%;">Cantidad Depachada</th>
                <th style="width: 30%;">Costo Unitario (estimado)Actual</th>
               <!-- <th style="width: 30%;">Nuevo Costo Unitario (estimado)</th>-->
                  <th style="width: 30%;">Total</th>
                </tr>
                <td id="td" colspan="6"><h4>No se encontraron resultados 😥</h4></td>
              </thead>
                <tbody>
         <?php            
    
    }
     $sql = "SELECT * FROM detalle_bodega WHERE odt_bodega = $odt";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total = $productos['stock'] * $productos['precio'];
      $final += $total;
      $codigo=$productos['codigo'];
      $descripcion=$productos['descripcion'];
      $um=$productos['unidad_medida'];
      $precio=$productos['precio'];
      $fecha=$productos['fecha_registro'];
      $precio1=number_format($precio, 2,".",",");
      $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
      $cantidad=$productos['stock'];
      $stock=number_format($cantidad, 2,".",",");

      ?>
       <style type="text/css"> #td{display: none;} </style> 

       <tr>
       <td  data-label="Código"><?php echo $codigo ?>

            <input type="hidden"  name="cod[]" readonly value="<?php echo $codigo ?>">
            <input type="hidden"  name="cod_bodega[]" readonly value="<?php echo $productos['codigodetallebodega'] ?>">

            <input type="hidden" style="width: 100%; background:transparent; border: none; text-align: left; height: 100%;"  name="desc[]" readonly value="<?php echo $descripcion ?>">

            <input type="hidden" name="um[]" readonly value="<?php echo $um ?>">

            <input type="hidden" type="decimal" step="0.01"  name="cant[]" readonly value="<?php echo $stock ?>">

            <input type="hidden"  name="cost[]" step="0.01"  readonly value="$<?php echo $precio1 ?>">

            <input type="hidden" style="width: 100%; background:transparent; border: none; text-align: center"  name="tot[]" readonly step="0.01" value="$<?php echo $total1 ?>">

            <input type="hidden"  step="0.01"   name="tot_f" readonly value="$<?php echo $final1 ?>" >
    </td>
    <td  data-label="Descripción"><?php echo $descripcion ?></td>
        <td  data-label="Unidada de Medida"><?php echo $um ?></td>
        <td  data-label="Cantidad"><?php echo $stock ?></td>
        <td  data-label="Cantidad"><input style="background:transparent; border: 1 solid #000;  width: 100%; text-align: center" class="form-control" type="decimal" required  name="cantidad_despachada[]" required value=""></td>
        <td  data-label="Costo unitario"><?php echo $precio1 ?></td>
        <td  data-label="total"><?php echo $total1 ?></td>
      </tr>

      <?php } ?> 
    
        <tfoot>
        <th colspan="5"></th>
            <th >SubTotal</th>
            <td style=" color: red; font-weight: bold;" data-label="Subtotal"><?php echo $final1?></td>
        </tfoot>
    </tbody>
</table>
        <button id="pdf" type="submit" class="btn btn-lg my-1 btn-success"  name="detalle_bodega">Guardar Estado
            <svg class="bi" width="20" height="20" fill="currentColor">
            <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#save"/>
            </svg>
        </button>
        <?php } ?>
      <style>
</section>
      
       
  </body>
  </html