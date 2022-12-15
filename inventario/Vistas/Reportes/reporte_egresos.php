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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>Egresos</title>
</head>
<body style="max-width: 100%;">
  
<style>
    form{
        margin: 0%;
    }
#n{
        display: none;
    }
    @media (max-width: 800px){
        body{
            background: black;
        }
        #ssa{
            margin-left: 7%;
            margin-bottom: 5%;
        }
        #x{
            margin: 3%5%;
        }
    }
</style>
<br><br><br><br>
    <section style="background: rgba(255, 255, 255, 0.9); margin: 2%;border-radius: 15px; padding: 1%";>
               <h1 style="text-align: center;">Egresos de Productos</h1><br>
            <form method="POST" style="background:transparent;">
<div class="card">
<div class="card-body">
                <div class="row" >
               <div class="col-md-2" style="position: initial; width:50%px;">
        <p id="x" class="mx-3" style="color: #000; font-weight: bold;">Mostrar Ingresos por:</p>
    </div>          <?php if(isset($_POST['ingresos'])){$mostrar = $_POST['ingresos'];
                        if ($mostrar=="bodega" || $mostrar=="vale" ) {?>

                    <div class=" col-md-1" style="position: initial;">
                <a  href="" class="btn btn-primary">Inicio</a>
                    </div>
            <?php } } ?>
            
            <div class="col-md-3 " style="position: initial;">
            <select class="form-control" name="ingresos" id="ingresos" onchange="this.form.submit()">
                            <option>Seleccionar</option>
                            <option value="bodega">Solicitud a Bodega</option>
                            <option value="vale">Solicitud de Vale</option>
                        </select>
            </div>          
                </div>  
            </div>
        </div>
            </form> 
            <br>

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
$idusuario = $_SESSION['iduser'];

if(isset($_POST['ingresos'])){

    $mostrar = $_POST['ingresos'];
    
    if($mostrar == "bodega"){
?>
<style>
  #act {
    margin-top: 0.5%;
    margin-right: 3%;
    margin-left: 3%;
    padding: 1%;
    border-radius: 5px;
    background-color: white;
  }
  input{
    width: 100%;
  }
</style>
            <div class="row">
<div class="col-md-9 mb-4">
<div class="card">
<div class="card-body">
    <h3 style="text-align: center;">Egresos de Bodega</h3>

<table  class="table " id="example" style=" width: 100%">
            <thead>
              <tr id="tr">
                <th style="width: 10%;">O. de T. No.</th>
                <th style="width: 10%;">Codigo</th>
                <th style="width: 10%;">Departamento</th>
                <th style="width: 10%;">Encargado</th>
                <th style="width: 10%;">Descripción Completa</th>
                <th style="width: 10%;">U/M</th>
                <th style="width: 10%;">Cantidad solicitada</th>
                <th style="width: 10%;">Cantidad despachada</th>
                <th style="width: 10%;">Costo Unitario</th>
                <th style="width: 10%;">Fecha Registro</th>

              </tr>

              
     </thead>
            <tbody>
 <?php 
 if ($tipo_usuario==1) {
     
$sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,idusuario,codBodega,usuario departamento,usuario, fecha_registro FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega GROUP by codigo,descripcion,cantidad_despachada,precio,descripcion,unidad_medida";
 }
 if ($tipo_usuario==2) {
$sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,idusuario,usuario, codBodega, departamento, fecha_registro FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE db.idusuario='$idusuario'  GROUP by codigo,descripcion,cantidad_despachada,precio,descripcion,unidad_medida";
     
 }


    $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['SUM(stock)'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['SUM(cantidad_despachada)'] * $productos['precio'];
    }
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
   $codigo=$productos['codigo'];
     $descripcion=$productos['descripcion'];
     $um=$productos['unidad_medida'];


        $precio   =    $productos['precio'];
        $precio1  =    number_format($precio, 2,".",",");  
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
        $final9   =    number_format($final8, 2, ".",",");

         if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }?>

<style type="text/css">
    #td{
        display: none;
    }

   #div{
    display: block;
   }
   #n{
    display: block;
   }
</style>
    <tr id="tr">
        <td data-label="O. de T. No."><?php echo $productos['codBodega'] ?></td>
    <td data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
    <td data-label="Departamento" ><?php  echo $productos['departamento']; ?></td>
    <td data-label="Encargado" class="delete"><?php  echo $productos['usuario'],"<br> ","(",$u,")"; ?></td>
    <td style="width: 80%;min-width: 100%;" data-label="Descripción Completa" style="text-align: left;"><?php  echo $productos['descripcion']; ?></td>
    <td data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
    <td data-label="Cantidad"><?php  echo $stock ?></td>
    <td data-label="Cantidad"><?php  echo $cantidad_desp?></td>
    <td data-label="Costo Unitario"><?php  echo $precio1 ?></td>
    <!--<td data-label="Costo Unitario"><?php  //echo $productos['campo'];--> ?></td>-->
    <td data-label="No. Vale"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
      

    
    </tr>

<?php } ?> 

            </tbody>
        </table>
</div>
</div>
</div>
<div class="col-md-3">
<div class="card">
<div class="card-body">
    <?php if ($tipo_usuario==1) {?>
            <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
 <form  method="POST" action="../../Plugin/Imprimir/Egresos/reporte_egreso.php">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="bodega">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form>
            <form  method="POST" action="../../Plugin/PDF/Egresos/pdf_egresos.php" class="mx-1">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="bodega">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>
            <form   method="POST" action="../../Plugin/Excel/Egresos/Bodega/Excel.php" target="_blank">
                <button type="submit" class="btn btn-outline-primary" name="bodega" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>

</div>
<?php } if ($tipo_usuario==2) {?>
            <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form  method="POST" action="../../Plugin/Imprimir/Egresos/reporte_egreso.php">
              <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="bodega1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form>
            <form  method="POST" action="../../Plugin/PDF/Egresos/pdf_egresos.php" class="mx-1">
              <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="bodega1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>
                    <form id="form2"  method="POST" action="../../Plugin/Excel/Egresos/Bodega/Excel.php" target="_blank">
              <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                <button type="submit" class="btn btn-outline-primary" name="bodega1" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>

</div>
<?php } ?>
<hr>
               <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
                  <p align="right"><b style="float: left;">Cantidad Despachada: </b><?php echo $final5 ?></p>

                  <p align="right"><b style="float: left;">Cant. Soli. - Cant. Despa.: </b><?php echo $final7 ?></p>
                  <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
              </div>
          </div>
                   <br>
     <div class="card">
    <div class="card-body">

        <h6 class="mb-3">Stock Por Mes</h6>
<div id="div" >
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(stock),fecha_registro FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega  GROUP by Mes,fecha_registro";
        }if ($tipo_usuario==2) {
        $sql="SELECT Mes,SUM(stock),idusuario,fecha_registro FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE db.idusuario='$idusuario'  GROUP by Mes";
        }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $mes=$productos['Mes'];
        $cantidad=$productos['SUM(stock)'];
        $fecha=  date("d",strtotime($productos['fecha_registro']));
        $stock=number_format($cantidad, 2,".",",");
                            if ($mes==1)  { $mes="Enero";}
                            if ($mes==2)  { $mes="Febrero";}
                            if ($mes==3)  { $mes="Marzo";}
                            if ($mes==4)  { $mes="Abril";}
                            if ($mes==5)  { $mes="Mayo";}
                            if ($mes==6)  { $mes="Junio";}
                            if ($mes==7)  { $mes="Junio";}
                            if ($mes==8)  { $mes="Agosto";}
                            if ($mes==9)  { $mes="Septiembre";}
                            if ($mes==10) { $mes="Octubre";}
                            if ($mes==11) { $mes="Noviembre";}
                            if ($mes==12) { $mes="Diciembre";}
                            ?>
               <p align="right"><b style="float: left;"><?php echo $fecha ?> de <?php echo $mes ?>: </b><?php echo $stock ?></p>
   <?php  } ?>
                </div>
               
</div>
</div>
 <br>
     <div class="card">
    <div class="card-body">
   <h6 class="mb-3"> Stock Por Año</h6>
<div id="div">
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(stock) FROM `detalle_bodega` D JOIN `tb_bodega` V ON D.odt_bodega=V.codBodega GROUP by Año;";
     } if ($tipo_usuario==2) {
    $sql="SELECT Año,SUM(stock) FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE db.idusuario='$idusuario'  GROUP by Año";
}
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['Año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
</div>
</div>
</div>
        

</div>

</div>
<?php 
    }
    else if($mostrar == "vale"){
?>

<div class="row">
    <div class="col-md-9">
<div class="card">
<div class="card-body">
<h3 style="text-align: center; color: black;">Egresos Por Vale </h3>

<table class="table table-responsive " id="example" style=" width: 100%">
            <thead>
              <tr id="tr">
                <th style="width: 10%;">No. Vale</th>
                <th style="width: 10%;">Codigo</th>
                <th style="width: 10%;">Departamento</th>
                <th style="width: 10%;">Encargado</th>
                <th style="width: 10%;">Descripción Completa</th>
                <th style="width: 10%;">U/M</th>
                <th style="width: 10%;">Cantidad solicitada</th>
                <th style="width: 10%;">Cantidad despachada</th>
                <th style="width: 10%;">Costo Unitario</th>
                <th style="width: 10%;">Fecha Registro</th>
              </tr>

              
            </thead>
     </thead>
            <tbody>
 <?php
 if ($tipo_usuario==1) {
    $sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,V.idusuario, V.codVale, V.departamento,V.usuario, V.fecha_registro, D.numero_vale FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale GROUP by codigo,descripcion,cantidad_despachada,precio,descripcion,unidad_medida";
 }
 if ($tipo_usuario==2) {
$sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,V.idusuario, V.codVale, V.departamento,V.usuario, V.fecha_registro, D.numero_vale FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE V.idusuario='$idusuario' GROUP by codigo,descripcion,cantidad_despachada,precio,descripcion,unidad_medida";
 }
    $result = mysqli_query($conn, $sql);;
    while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['SUM(stock)'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['SUM(cantidad_despachada)'] * $productos['precio'];
    }
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
        $final9   =    number_format($final8, 2, ".",",");

         if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }if ($productos['idusuario']==0) {
            $u='Invitado';
        }
        ?>

       
        
    <tr id="tr">
    <td data-label="No. Vale"><?php  echo $productos['numero_vale']; ?></td> 
    <td data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
    <td data-label="Departamento" ><?php  echo $productos['departamento']; ?></td>
    <td data-label="Encargado" class="delete"><?php  echo $productos['usuario'],"<br> ","(",$u,")"; ?></td>
    <td style="width: 80%;min-width: 100%;" data-label="Descripción Completa" style="text-align: left;"><?php  echo $productos['descripcion']; ?></td>
    <td data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
    <td data-label="Cantidad"><?php  echo $stock ?></td>
    <td data-label="Cantidad"><?php  echo $cantidad_desp ?></td>
    <td data-label="Costo Unitario"><?php  echo $precio2 ?></td>
    <!--<td data-label="Costo Unitario"> <?php // echo $productos['campo']; ?></td>-->
    <td data-label="No. Vale"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
<?php } ?>      
 </tr>
            </tbody>
        </table>
    </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card">
        <div class="card-body">
            <?php if ($tipo_usuario==1) {?>
            <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form  method="POST" action="../../Plugin/Imprimir/Egresos/reporte_egreso.php">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="vale">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form>
            <form  method="POST" action="../../Plugin/PDF/Egresos/pdf_egresos.php" class="mx-1">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="vale">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>
                    <form   method="POST" action="../../Plugin/Excel/Egresos/Vale/Excel.php" target="_blank">
                <button type="submit" class="btn btn-outline-primary" name="vale" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>

</div>
<?php } if ($tipo_usuario==2) {?>
                <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form   method="POST" action="../../Plugin/Imprimir/Egresos/reporte_egreso.php">
              <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                <button type="submit" class="btn btn-outline-primary" name="vale1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form>
            <form   method="POST" action="../../Plugin/PDF/Egresos/pdf_egresos.php" class="mx-1">
              <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                <button type="submit" class="btn btn-outline-primary" name="vale1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>
                    <form id="form2"  method="POST" action="../../Plugin/Excel/Egresos/Vale/Excel.php" target="_blank">                 
                        <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                <button type="submit" class="btn btn-outline-primary" name="vale1" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
</div>
<hr>
<?php } ?>
               <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
                  <p align="right"><b style="float: left;">Cantidad Despachada: </b><?php echo $final5 ?></p>

                  <p align="right"><b style="float: left;">Cant. Soli. - Cant. Despa.: </b><?php echo $final7 ?></p>
                  <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
                  </div>
    </div>
                   <br>
     <div class="card">
    <div class="card-body">
        <h6 class="mb-3">Stock Por Mes</h6>
<div id="div">
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(stock) FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale GROUP by Mes;";
        }if ($tipo_usuario==2) {
        $sql="SELECT Mes,SUM(stock),idusuario FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE idusuario='$idusuario' GROUP by Mes;";
        }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $mes=$productos['Mes'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
                            if ($mes==1)  { $mes="Enero";}
                            if ($mes==2)  { $mes="Febrero";}
                            if ($mes==3)  { $mes="Marzo";}
                            if ($mes==4)  { $mes="Abril";}
                            if ($mes==5)  { $mes="Mayo";}
                            if ($mes==6)  { $mes="Junio";}
                            if ($mes==7)  { $mes="Junio";}
                            if ($mes==8)  { $mes="Agosto";}
                            if ($mes==9)  { $mes="Septiembre";}
                            if ($mes==10) { $mes="Octubre";}
                            if ($mes==11) { $mes="Noviembre";}
                            if ($mes==12) { $mes="Diciembre";}
                            ?>
               <p align="right"><b style="float: left;"><?php echo $mes ?>: </b><?php echo $stock ?></p>
   <?php  } ?>
</div>
</div>
</div>
 <br>
     <div class="card">
    <div class="card-body">
   <h6 class="mb-3"> Stock Por Año</h6>
<div id="div">
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(stock) FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale GROUP by Año;";
     } if ($tipo_usuario==2) {
     $sql="SELECT Año,SUM(stock),idusuario FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE idusuario='$idusuario' GROUP by Año;";
     }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['Año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
</div>
</div>
        

</div>
</div>

</div>
<?php } }?>




   <script>$(document).ready(function () {

       $('#example').DataTable({

            responsive: true,
            autoWidth:false,
            deferRender: true,
            scroller: true,
            scrollY: 400,
            dom: 'lrtip',
            lengthMenu: [[10, -1], [10,"Todos"]],
            "searching": false,
            scrollCollapse: true,
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