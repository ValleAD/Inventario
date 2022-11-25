<?php 

include ('../../../Model/conexion.php');

 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
<?php   if (isset($_POST['consulta'])) {?>
     <title>Productos</title>
<?php }  if (isset($_POST['Historial'])) { ?>
     <title>Historial de Productos</title>
<?php } ?>
        <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../../../styles/estilos_tablas.css">
 </head>
 <body>

<img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">DEPARTAMENTO DE MANTENIMIENTO</h4>
<?php   if (isset($_POST['consulta'])) {?>
<h5 align="center" style="margin-top: 2%;">TODOS LOS PRODUCTOS</h5>
<?php }  if (isset($_POST['Historial'])) { ?>
<h5 align="center" style="margin-top: 2%;">HISTORIAL DE PRODUCTOS</h5>
<?php } ?>
  <?php
  if (isset($_POST['consulta'])) {?>

    <table class="table table-responsive table-striped"  style=" width: 100%">

    <thead>
        <tr id="tr">
            <th style="width:5%;font-size: 14px;">Código</th>
            <th style="width:10%;font-size: 14px;">Cod. de Catálogo</th>
            <th style="width:50%;font-size: 14px;">Descripción Completa</th>
            <th style="width:10%;font-size: 14px;">U/M</th>
            <th style="width:10%;font-size: 14px;">Cantidad</th>
            <th style="width:10%;font-size: 14px;">Costo Unitario</th>
            <th style="width:10%;font-size: 14px;">Fecha Registro</th>
            <th style="width:10%;font-size: 14px;">Categoria</th>
            
        </tr>
    </thead>
    <tbody>
    <?php 

              $cod=$_POST['consulta'];

   $sql = "SELECT * FROM `tb_productos` WHERE codProductos LIKE '%".$cod."%' or descripcion LIKE '%".$cod."%' ";

        $result = mysqli_query($conn, $sql);
        
 while ($productos = mysqli_fetch_array($result)){
         $cat=$productos['categoria'];
                if ($cat=="") {
                    $cat="Sin categorias";
                
                }else{
                $cat=$productos['categoria'];
                }
    $cod= $productos['codProductos'];
    $catal= $productos['catalogo'];
    $des= $productos['descripcion'];
    $u_m= $productos['unidad_medida'];
    $precio=$productos['precio'];
    $precio1=number_format($precio, 2,".",",");
    $cantidad=$productos['SUM(stock)'];
    $stock=number_format($cantidad,  2,".",",");
    $fech= $productos['fecha_registro'];
    ?>
     <style type="text/css">
     #td{
    text-align:center;
        display: none;
    }
</style>
 <tr style="border: 1px solid #ccc;border-collapse: collapse;">
        <td data-label="Código" style="font-size: 12px;"><?php echo $cod ?></td>
        <td data-label="Catalogo" style="font-size: 12px;"><?php echo $catal ?></td>
        <td data-label="Descripción" style="font-size: 12px;"><?php echo $des ?></td>
        <td data-label="Unidad De Medida" style="font-size: 12px;"><?php echo $u_m ?></td>
        <td data-label="Cantidad" style="font-size: 12px;"><?php echo $stock ?></td>
        <td data-label="Precio" style="font-size: 12px;"><?php echo $precio1 ?></td>
        <td data-label="Fecha" style="font-size: 12px;"><?php echo $fech ?></td>
        <td data-label="Categoría" style="font-size: 12px;"><?php echo $cat ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
<?php } 
  if (isset($_POST['Historial'])) { 
$fecha=$_POST['fecha'];
$fecha1=$_POST['fecha1'];
$descripcion=$_POST['descripcion'];
$cod=$_POST['cod'];
$um=$_POST['um'];
    ?>
    <br>
    <div class="container">
    <p><b>PERIODO DE MOVIMIENTO</b></p> 
    <div class="row">
    <div class="col-md-6">
<p><b>DE:</b> <?php echo $fecha ?></p>     
    </div>
    <div class="col-md-6">
<p style="float: right;"><b>AL:</b> <?php echo $fecha1; ?></p>
    </div>    
<div class="col-md-6">
<p><b>Codigo del Producto:</b></p>     
    </div>
 <div class="col-md-6">
<p style="float: right;"><?php echo $cod ?></p>
    </div>
    <div class="col-md-6">
<p><b>Descripción</b></p>     
    </div>
 <div class="col-md-6">
<p style="float: right;"><?php echo $descripcion ?></p>
    </div>    
<div class="col-md-6">
<p><b>Unidad de Medida</b></p>     
    </div>
 <div class="col-md-6">
<p style="float: right;"><?php echo $um ?></p>
    </div>
</div>
</div>
        <table class="table table-responsive table-striped"  style=" width: 100%">

    <thead>
        <tr id="tr">
                     <th style="width:7%"  id="th">Fecha</th>
                     <th style="width:7%"  id="th">Concepto</th>
                     <th style="width: 27%;" id="th">No. Comprobante</th>
                     <th style="width:8%"  id="th">Entradas</th>
                     <th style="width:8%"  id="th">Salidas</th>
                     <th style="width:10%"  id="th">Saldo</th>
            
        </tr>
    </thead>
    <tbody>
<?php

    $sql = "SELECT No_Comprovante,fecha_registro,Entradas, SUM(Entradas), SUM(Salidas),Saldo FROM historial  WHERE  No_Comprovante = '$cod' GROUP BY Concepto";
$result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
        $fecha=date("d-m-Y",strtotime($productos['fecha_registro']));
        $Comprovante= $productos['No_Comprovante'];
        $Entradas=$productos['SUM(Entradas)'];
        $Salida=$productos['SUM(Salidas)'];
        $Saldo=$productos['Saldo'];
?>
</style>
            <td style="width: 10%;min-width: 100%;" id="th" data-label="Fecha"><?php echo $fecha ?></td>
            <td style="width: 10%;min-width: 100%;" id="th" data-label="Concepto">Inventario en Fisico</td>
            <td style="width: 47%;min-width: 100%;" id="th" data-label="No. Comprovante"><?php echo $Comprovante ?></td>
            <td style="width: 10%;min-width: 100%;" id="th" data-label="Entradas"><?php echo $Entradas ?></td>
            <td style="width: 10%;min-width: 100%;" id="th" data-label="Salidas"><?php echo $Salida ?></td>
            <td style="width: 10%;min-width: 100%;" id="th" data-label="Saldo"><?php echo $Saldo ?></td>

       <?php } ?>
    </tr>
    </tbody>
</table> 
<?php } ?>
 </body>
 </html>
<script type="text/javascript">
print('');
</script>