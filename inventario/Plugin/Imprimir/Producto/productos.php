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
        <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.css">
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
                   <tr> <td align="center" id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td></tr>

        </tr>
    </thead>
    <tbody>
  <?php
  if (isset($_POST['consulta'])) {

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

              $usuario=$_POST['usuario'];

    $sql = "SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos  WHERE usuario='$usuario'";

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
<?php } ?>
 </body>
 </html>
<script type="text/javascript">
print('');
</script>