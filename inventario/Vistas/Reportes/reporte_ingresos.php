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
    <link rel="stylesheet" type="text/css" href="../../styles/style.css" > 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

     <style>
    table thead{
    background: linear-gradient(to right, #4A00E0, #8E2DE2); 
    color:white;
    }
    form{
        margin: 0%;
    }

    @media (max-width: 800px){
        #ssa{
            margin-left: 7%;
            margin-bottom: 5%;
        }
        #x{
            margin: 3%5%;
        }
    }
    </style>
<title>Ingresos</title>
</head>
<body style="max-width: 100%;">
    <br><br><br><br>
    <section style="background: rgba(255, 255, 255, 0.9); margin: 2%;border-radius: 15px; padding: 1%";>
               <h1 style=" text-align: center;">Ingreso de Productos</h1><br>
            <form method="GET" style="background:transparent;">
<div class="card">
<div class="card-body">
                <div class="row" >
               <div class="col-md-3" style="position: initial; width:50%px;">
        <p id="x" class="mx-3" style="color: #000; font-weight: bold;">Mostrar Ingresos por:</p>
    </div>          <?php if(isset($_GET['ingresos'])){$mostrar = $_GET['ingresos'];
                        if ($mostrar=="circulante" || $mostrar=="almacen" || $mostrar=="compra") {?>

                    <div class=" col-md-1" style="position: initial;">
                <a  href="reporte_ingresos.php" class="btn btn-primary">Inicio</a>
                    </div>
            <?php } } ?>
            
            <div class="col-md-3 " style="position: initial;">
            <select class="form-control" name="ingresos" id="ingresos" onchange="this.form.submit()">
                            <option>Seleccionar</option>
                            <option  value="circulante">Solicitud a Fondo Circulante</option>
                            <option value="almacen">Solicitud a Almacén</option>
                            <option value="compra">Solicitud de Compra</option>
                        </select>
            </div>          
                </div>  
            </div>
        </div>
            </form> 
            <br>

<?php
$total = "0.00";
$final = "0.00";
$final1 = "0.00";
$final2 = "0.00";
$final3 = "0.00";
$final4 = "0.00";
$final5 = "0.00";
$final6 = "0.00";
$final7 = "0.00";
$final8 = "0.00";
$final9 = "0.00";
$idusuario = $_SESSION['iduser'];


if(isset($_GET['ingresos'])){

    $mostrar = $_GET['ingresos'];
    
    if($mostrar == "circulante"){
?>
<div class="row">
    
<div class="col-md-9">
<div class="card">
<div class="card-body">
<br>
    <h3 style="text-align: center; color: black;">Ingresos de Solicitud Circulante</h3>




<table class="table " id="examp"  style=" width: 100%">
            <thead>
              <tr id="tr">
                <th title="Codigo del productos" style="width: 10%">Codigo</th>
                <th title="Descripción Completa" style="width: 50%">Descrip</th>
                <th title="Unidad de Medida" style="width: 10%">U/M</th>
                <th title="Cantidad (Stock)" style="width: 10%">Cantidad</th>
                <th title="Costo Unitario" style="width: 10%">Precio</th>
                <th title="Fecha del Registro" style="width: 10%">Fecha</th>
                <th title="Total" style="width: 10%">Total</th>
              </tr>
          </thead>

            <tbody>
          <?php

            
  if ($tipo_usuario==1) {
      
   $sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,idusuario,tb_circulante,fecha_solicitud FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante  ";
  }

if ($tipo_usuario==2) {
    
      $sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,idusuario,tb_circulante,fecha_solicitud FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante WHERE idusuario='$idusuario'  ";
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

        
        $final8 += $precio;
        $final9   =    number_format($final8, 2, ".",",");?>

<style type="text/css">
#td{
    display: none;
}
#div{
    display: block;
}

</style>
    <tr id="tr">
    
    <!-- <td data-label="Departamento"><?php  echo $productos['departamento']; ?></td>
      <td data-label="Encargado"><?php  echo $productos['usuario']; ?></td> -->
      <td data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
      <td data-label="Descripción"><?php  echo $productos['descripcion']; ?></td>
      <td data-label="Unidad De Medida" ><?php  echo $productos['unidad_medida']; ?></td>
      <td data-label="Cantidad" ><?php  echo $stock; ?></td>
      <td data-label="Costo Unitario"><?php  echo $precio1 ?></td>
      <td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_solicitud'])); ?></td>
      <td data-label="Total"><?php echo $final1 ?></td>

    
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
            <form  method="POST" action="../../Plugin/Imprimir/Ingresos/reporte_ingreso.php" target="_blank">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="circulante">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
            </svg>
                 </button>
            </form>
            <form  method="POST" action="../../Plugin/PDF/Ingresos/pdf_ingresos.php" class="mx-1" target="_blank">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="circulante">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
            </svg>
            </button>
            </form>
            <form  method="POST" action="../../Plugin/Excel/Ingresos/Circulante/Excel.php" >
                <button type="submit" class="btn btn-outline-primary" name="circulante" >
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>

</div>
            <?php } if ($tipo_usuario==2) {?>
            <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form  method="POST" action="../../Plugin/Imprimir/Ingresos/reporte_ingreso.php" target="_blank">
                    <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="circulante">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form>
            <form  method="POST" action="../../Plugin/PDF/Ingresos/pdf_ingresos.php" class="mx-1" target="_blank">
                    <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="circulante">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>
                    <form id="form2" method="POST" action="../../Plugin/Excel/Ingresos/Circulante/Excel.php" >
                    <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                <button type="submit" class="btn btn-outline-primary" name="circulante" >
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>

</div>   
<?php } ?>
            <hr>
               <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
                  <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
        </div>
    </div>
                  <br>
     <div class="card">
    <div class="card-body">
        <h6 class="mb-3">Stock Por Mes</h6>
<div class="div div3">
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(stock) FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante GROUP by Mes;";
        }if ($tipo_usuario==2) {
        $sql="SELECT Mes,SUM(stock),idusuario FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante WHERE idusuario='$idusuario' GROUP by Mes;";
        }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $mes=$productos['Mes'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final6 += $cantidad;
        $final7   =    number_format($final6, 2, ".",",");
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
      <hr>
    <p align="right"><b style="float: left;">Total </b><?php echo $final7 ?></p>
<p align="right" class="p">Mostrar todos
    <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
    </svg>
</p>
<p align="right" class="p1">Ocultar
    <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-up-fill"/>
    </svg>
</p>
</div>
</div>
 <br>
     <div class="card">
    <div class="card-body">
   <h6 class="mb-3"> Stock Por Año</h6>
<div class="div1 div4">
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(stock) FROM `detalle_circulante` D JOIN `tb_circulante` V ON D.tb_circulante=V.codCirculante GROUP by Año;";
     } if ($tipo_usuario==2) {
     $sql="SELECT Año,SUM(stock),idusuario FROM `detalle_circulante` D JOIN `tb_circulante` V ON D.tb_circulante=V.codCirculante WHERE idusuario='$idusuario' GROUP by Año;";
     }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['Año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final4 += $cantidad;
        $final5   =    number_format($final4, 2, ".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>

</div>
           <hr>
               <p align="right"><b style="float: left;">Total </b><?php echo $final5 ?></p>
<p align="right" class="p3">Mostrar todos
    <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
    </svg>
</p>
<p align="right" class="p4">Ocultar
    <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-up-fill"/>
    </svg>
</p>
</div>
        

</div>
</div>

</div>
<?php 
    }
    else if($mostrar == "almacen"){
?>
<div class="row">
    <div class="col-md-9">
<div class="card">
<div class="card-body">
<h3 style="text-align: center; color: black;">Ingresos de Almacén</h3>

<table class="table " id="example" style=" width: 100%">
     <thead>
       <tr>
         <th title="Departamentos" style="width: 20%">Depart</th>
         <th title="Encargado" style="width: 30%">Encar</th>
         <th title="Codigo del productos" style="width: 20%">Codigo</th>
         <th title="Descripción Completa" style="width: 30%">Descrip</th>
         <th title="Unidad de Medida" style="width: 20%">U/M</th>
         <th title="Cantidad (Stock)" style="width: 20%">Cant</th>
         <th title="Costo Unitario" style="width: 20%">Precio</th>
         <th title="Codigo del productos" style="width: 20%">Fecha </th>
         <th title="Total" style="width: 20%">Total</th>
         
       </tr>
       
     </thead>

     <tbody>
          
<?php
if ($tipo_usuario==1) {
$sql = "SELECT codigo,SUM(cantidad_solicitada),SUM(cantidad_despachada),precio,nombre,unidad_medida,idusuario,tb_almacen,departamento,encargado,fecha_solicitud FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen ";

}
if ($tipo_usuario==2) {

$sql = "SELECT codigo,SUM(cantidad_solicitada),SUM(cantidad_despachada),precio,nombre,unidad_medida,idusuario,tb_almacen,departamento,encargado,fecha_solicitud FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen WHERE idusuario='$idusuario' ";
}
         

$result = mysqli_query($conn, $sql);

while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['SUM(cantidad_solicitada)'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['SUM(cantidad_despachada)'] * $productos['precio'];
    }
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
   $codigo=$productos['codigo'];
     $um=$productos['unidad_medida'];

        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");  
        $cantidad_despachada=$productos['SUM(cantidad_despachada)'];
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");
        $cant_aprobada=$productos['SUM(cantidad_solicitada)'];
        $stock=number_format($cant_aprobada, 2,".",",");

        $final2 += $cant_aprobada;
        $final3   =    number_format($final2, 2, ".",",");

        
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
th{
width: 100%;
}
#div{
    display: block;
}
</style>
<tr id="tr">

<td data-label="Departamento"><?php  echo $productos['departamento']; ?></td>
<td data-label="Encargado" class="delete"><?php  echo $productos['encargado'],"<br> ","(",$u,")"; ?></td>
<td data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
<td data-label="Descripción"><?php  echo $productos['nombre']; ?></td>
<td data-label="Unidad De Medida" ><?php  echo $productos['unidad_medida']; ?></td>
<td data-label="Cantidad" ><?php  echo $cant_aprobada ?></td>
<td data-label="Costo Unitario"><?php  echo $precio2 ?></td>
<td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_solicitud'])); ?></td>
<td data-label="Total"><?php echo $final1 ?></td>



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
    <?php if ($tipo_usuario==1) { ?>
        <div  style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form  method="POST" action="../../Plugin/Imprimir/Ingresos/reporte_ingreso.php" target="_blank">
            <input readonly class="form-control"  type="hidden" value="<?php echo $productos['codAlmacen'] ?>" name="num_sol">

                <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="almacen">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
            </svg>
                </button>
            </form>
            <form  method="POST" action="../../Plugin/PDF/Ingresos/pdf_ingresos.php" class="mx-1" target="_blank">
            <input readonly class="form-control"  type="hidden" value="<?php echo $productos['codAlmacen'] ?>" name="num_sol">

                <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="almacen">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
            </svg>
                </button>
            </form>
            <form  method="POST" action="../../Plugin/Excel/Ingresos/Almacen/Excel.php" >
            <input readonly class="form-control"  type="hidden" value="<?php echo $productos['codAlmacen'] ?>" name="num_sol">

                <button type="submit" class="btn btn-outline-primary" name="almacen" >
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>

</div>
<?php } if ($tipo_usuario==2) { ?>
        <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form  method="POST" action="../../Plugin/Imprimir/Ingresos/reporte_ingreso.php" target="_blank">
                    <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="almacen1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form>
            <form  method="POST" action="../../Plugin/PDF/Ingresos/pdf_ingresos.php" class="mx-1" target="_blank">
                    <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="almacen1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>
                    <form id="form2" method="POST" action="../../Plugin/Excel/Ingresos/Almacen/Excel.php" >
                    <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                <button type="submit" class="btn btn-outline-primary" name="almacen1" >
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>

</div>

<?php } ?>
<hr>
               <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
                  <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
</div>
</div>
                  <br>
     <div class="card">
    <div class="card-body">
        <h6 class="mb-3">Stock Por Mes</h6>
<div class="div div3">
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(cantidad_solicitada) FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen  GROUP by Mes;";
        }if ($tipo_usuario==2) {
        $sql="SELECT Mes,SUM(cantidad_solicitada),idusuario FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen  WHERE idusuario='$idusuario' GROUP by Mes;";
        }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $mes=$productos['Mes'];
        $cantidad=$productos['SUM(cantidad_solicitada)'];
        $stock=number_format($cantidad, 2,".",",");
        $final6 += $cantidad;
        $final7   =    number_format($final6, 2, ".",",");

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
   <hr>
    <p align="right"><b style="float: left;">Total </b><?php echo $final7 ?></p>
<p align="right" class="p">Mostrar todos
    <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
    </svg>
</p>
<p align="right" class="p1">Ocultar
    <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-up-fill"/>
    </svg>
</p>
</div>
</div>
 <br>
     <div class="card">
    <div class="card-body">
   <h6 class="mb-3"> Stock Por Año</h6>
<div class="div1 div4">
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(cantidad_solicitada) FROM `detalle_almacen` D JOIN `tb_almacen` V ON D.tb_almacen=V.codAlmacen GROUP by Año;";
     } if ($tipo_usuario==2) {
     $sql="SELECT Año,SUM(cantidad_solicitada),idusuario FROM `detalle_almacen` D JOIN `tb_almacen` V ON D.tb_almacen=V.codAlmacen WHERE idusuario='$idusuario' GROUP by Año;";
     }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['Año'];
        $cantidad=$productos['SUM(cantidad_solicitada)'];
        $stock=number_format($cantidad, 2,".",",");
        $final4 += $cantidad;
        $final5   =    number_format($final4, 2, ".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
</div>
       <hr>
               <p align="right"><b style="float: left;">Total </b><?php echo $final5 ?></p>
<p align="right" class="p3">Mostrar todos
    <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
    </svg>
</p>
<p align="right" class="p4">Ocultar
    <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-up-fill"/>
    </svg>
</p>
</div>
        

</div>
</div>

</div>
<?php 
    }
    else if($mostrar == "compra"){

?>
<style>
  #act {
    margin-right: 3%;
    margin-left: 3%;
    padding: 0.5%;
    border-radius: 5px;
  }
    input{
    width: 100%;
  }
</style>
<div class="row">
    <div class="col-md-9">
<div class="card">
<div class="card-body">
<h3 style="text-align: center; color: black;">Ingresos de Compra</h3>


<table class="table " id="example" style=" width: 100%">
     <thead>
       <tr>
         
         <th title="Encargado" style="width:50%">Encar</th>
         <th title="Codigo del productos" style="width:50%">Cod</th>
         <th title="Plazo" style="width:50%">Plazo</th>
         <th title="Suministros" style="width:50%">Sumini</th>
         <th title="Descripción Completa" style="width:50%">Descri</th>
         <th title="Unidad de Técnica" style="width:50%">U/T</th>
         <th title="Cantidad (Stock)" style="width:50%">Cant</th>
         <th title="Costo Unitario" style="width:50%">Precio</th>
         <th title="Fecha de Registro" style="width:50%">Fecha</th>
         <th title="Total" style="width: 50%">Total</th>
            </tr>
     </thead>

     <tbody>
          
<?php if ($tipo_usuario==1) { 

$sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,descripcion_solicitud,unidad_medida,idusuario,solicitud_compra,dependencia,usuario,fecha_registro,plazo,Mes,Año,unidad_tecnica FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra ";
}
if ($tipo_usuario==2) { 

$sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,descripcion_solicitud,unidad_medida,idusuario,solicitud_compra,dependencia,usuario,fecha_registro,plazo,Mes,Año,unidad_tecnica FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra ";
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

        $precio   =    $productos['precio'];
        $precio3  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(stock)'];
        $cantidad_despachada=$productos['SUM(cantidad_despachada)'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");
                $mes=$productos['Mes'];
                            if ($mes==1)  { $mes="Ene.";}
                            if ($mes==2)  { $mes="Feb.";}
                            if ($mes==3)  { $mes="Mar.";}
                            if ($mes==4)  { $mes="Abr.";}
                            if ($mes==5)  { $mes="May.";}
                            if ($mes==6)  { $mes="Jun.";}
                            if ($mes==7)  { $mes="Jul.";}
                            if ($mes==8)  { $mes="Ago.";}
                            if ($mes==9)  { $mes="Sep.";}
                            if ($mes==10) { $mes="Oct.";}
                            if ($mes==11) { $mes="Nov.";}
                            if ($mes==12) { $mes="Dic.";}
        $año=$productos['Año'];
        $final2 += $cant_aprobada;
        $final3   =    number_format($final2, 2, ".",",");

        
        $final8 += $precio;
        $final9   =    number_format($final8, 2, ".",",");

         if ($productos['idusuario']==1) {
        $u='Admin';
        }
        else {
            $u='Cliente';
        }
        ?>
<style>
    #td{
        display: none;
    }
    #div{
        display: block;
    }
</style>
<tr>
<td data-label="Encargado" class="delete"><?php  echo $productos['usuario'],"<br> ","(",$u,")"; ?></td>
<td data-label="Código de Producto"><?php  echo $productos['codigo']; ?></td>
<td data-label="Código de Producto"><?php  echo $productos['plazo']; ?></td>
<td data-label="Suministros"><?php  echo $productos['descripcion_solicitud']; ?></td>
<td data-label="Descripción Completa"><?php  echo $productos['descripcion']; ?></td>
<td data-label="Unidad De Medida" ><?php  echo $productos['unidad_tecnica']; ?></td>
<td data-label="Cantidad" ><?php  echo $stock ?></td>
<td data-label="Costo Unitario"><?php  echo $precio3 ?></td>
<td data-label="Fecha Registro"><?php  echo date("d",strtotime($productos['fecha_registro'])); ?> <?php echo $mes ?> <?php echo $año ?></td>
<td data-label="Total"><?php echo $final1 ?></td>
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
    <?php if ($tipo_usuario==1) { ?>
        <div  style="position: initial;"class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form  method="POST" action="../../Plugin/Imprimir/Ingresos/reporte_ingreso.php" target="_blank">

                <button  style="position: initial;"type="submit" class="btn btn-outline-primary" name="compra">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
            </svg>
                </button>
            </form>
            <form  method="POST" action="../../Plugin/PDF/Ingresos/pdf_ingresos.php" class="mx-1" target="_blank">

                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="compra">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
            </svg>
                </button>
            </form>
            <form  method="POST" action="../../Plugin/Excel/Ingresos/Compra/Excel.php" >

                <button type="submit" class="btn btn-outline-primary" name="compra" >
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
  

</div>
    <?php } if ($tipo_usuario==2) { ?>
                    <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form  method="POST" action="../../Plugin/Imprimir/Ingresos/reporte_ingreso.php" target="_blank">
                    <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="compra1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form>
            <form  method="POST" action="../../Plugin/PDF/Ingresos/pdf_ingresos.php" class="mx-1" target="_blank">
                    <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="compra1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>
                    <form id="form2" method="POST" action="../../Plugin/Excel/Ingresos/Compra/Excel.php" >
                    <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                <button type="submit" class="btn btn-outline-primary" name="compra1" >
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
</div>
    <?php } ?>
    <hr>
               <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
                  <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
</div>
</div>
                  <br>
     <div class="card">
    <div class="card-body">
        <h6 class="mb-3">Stock Por Mes</h6>
<div class="div div3">
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(stock) FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra GROUP by Mes;";
        }if ($tipo_usuario==2) {
        $sql="SELECT Mes,SUM(stock),idusuario FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra WHERE idusuario='$idusuario' GROUP by Mes;";
        }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $mes=$productos['Mes'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final6 += $cantidad;
        $final7   =    number_format($final6, 2, ".",",");
                            if ($mes==1)  { $mes="Enero";}
                            if ($mes==2)  { $mes="Febrero";}
                            if ($mes==3)  { $mes="Marzo";}
                            if ($mes==4)  { $mes="Abril";}
                            if ($mes==5)  { $mes="Mayo";}
                            if ($mes==6)  { $mes="Junio";}
                            if ($mes==7)  { $mes="Julio";}
                            if ($mes==8)  { $mes="Agosto";}
                            if ($mes==9)  { $mes="Septiembre";}
                            if ($mes==10) { $mes="Octubre";}
                            if ($mes==11) { $mes="Noviembre";}
                            if ($mes==12) { $mes="Diciembre";}
                            ?>
               <p align="right"><b style="float: left;"><?php echo $mes ?>: </b><?php echo $stock ?></p>
   <?php  } ?>
</div>
      <hr>
    <p align="right"><b style="float: left;">Total </b><?php echo $final7 ?></p>
<p align="right" class="p">Mostrar todos
    <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
    </svg>
</p>
<p align="right" class="p1">Ocultar
    <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-up-fill"/>
    </svg>
</p>
</div>
</div>
 <br>
     <div class="card">
    <div class="card-body">
   <h6 class="mb-3"> Stock Por Año</h6>
<div class="div1 div4">
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(stock) FROM `detalle_compra` D JOIN `tb_compra` V ON D.solicitud_compra=V.nSolicitud GROUP by Año;";
     } if ($tipo_usuario==2) {
     $sql="SELECT Año,SUM(stock),idusuario FROM `detalle_compra` D JOIN `tb_compra` V ON D.solicitud_compra=V.nSolicitud WHERE idusuario='$idusuario' GROUP by Año;";
     }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['Año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
                $final4 += $cantidad;
        $final5   =    number_format($final4, 2, ".",",");?>
        
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
</div>
           <hr>
               <p align="right"><b style="float: left;">Total </b><?php echo $final5 ?></p>
<p align="right" class="p3">Mostrar todos
    <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
    </svg>
</p>
<p align="right" class="p4">Ocultar
    <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-up-fill"/>
    </svg>
</p>
</div>
        

</div>
</div>

</div>
<?php
    }
}

?>


   <script>$(document).ready(function () {

       $('#example').DataTable({

            responsive: true,
            autoWidth:false,
            deferRender: true,
            scroller: true,
            scrollY: 400,
            dom: 'lrtip',
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
}); $(document).ready(function () {

       $('#examp').DataTable({

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
     <script>
    $('.p1').hide();
    $('.p4').hide();
   $('.p').click(function(){
$(".div").removeClass("div");
$('.p').hide();
$('.p1').show();

    });
   $('.p1').click(function(){

$(".div3").addClass("div");
    $('.p1').hide();
$('.p').show();
    });




   $('.p3').click(function(){
$(".div1").removeClass("div1");
$('.p3').hide();
$('.p4').show();

    });
   $('.p4').click(function(){

$(".div4").addClass("div1");
    $('.p4').hide();
$('.p3').show();
    });


</script>
</body>
</html>