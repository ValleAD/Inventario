<?php 

include ('../Model/conexion.php');

 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Productos</title>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../styles/estilos_tablas.css">
 </head>
 <body>

   <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../styles/estilos_tablas.css">

<img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">
<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center" style="margin-top: 2%;">TODOS LOS PRODUCTOS</h5>

<style>
    <section>
     @media (max-width: 952px){
   h3, h4, h5{
    font-size: 1em;
    text-align: center;
   }
   section{
    margin: 2%;
   }
    }
  </style>
  <section>
    <table class="table table-responsive table-striped"  style=" width: 100%">

    <thead>
        <tr id="tr">
            <th style="font-size: 14px;width:5%">Código</th>
            <th style="font-size: 14px;width:10%">Cod. de Catálogo</th>
            <th style="font-size: 14px;width: 50%;">Descripción Completa</th>
            <th style="font-size: 14px;width:10%">U/M</th>
            <th style="font-size: 14px;width:10%">Cantidad</th>
            <th style="font-size: 14px;width:10%">Costo Unitario</th>
            <th style="font-size: 14px;width:10%">Fecha Registro</th>
            <th style="font-size: 14px;width:10%">Categoria</th>
                   <tr> <td align="center" id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td></tr>

        </tr>
    </thead>
    <tbody>
  <?php

   $sql = "SELECT * FROM `tb_productos` ";
        $result = mysqli_query($conn, $sql);
        



 while ($productos = mysqli_fetch_array($result)){
         $cat=$productos['categoria'];
                if ($cat=="") {
                    $cat="Sin categorias";
                
                }else{
                $cat=$productos['categoria'];
                };
    $cod= $productos['codProductos'];
    $catal= $productos['catalogo'];
    $des= $productos['descripcion'];
    $u_m= $productos['unidad_medida'];
    $precio=$productos['precio'];
    $precio1=number_format($precio, 2,".",",");
    $cantidad=$productos['stock'];
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
</section>
<script type="text/javascript">
print('');
</script>
 </body>
 </html>