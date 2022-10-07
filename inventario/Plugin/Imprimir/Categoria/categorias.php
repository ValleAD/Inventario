<?php 

include ('../../../Model/conexion.php');
?>

 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Filtro por Categoria</title>
 </head>
 <body>

   <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../../../styles/estilos_tablas.css">

<img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
    <h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
    
<h4>DEPARTAMENTO DE MANTENIMIENTO</h4><br><br>

<h4>Filtro por Categoria</h4>
    <table class="table table-responsive table-striped"  style=" width: 100%">

    <thead>
        <tr id="tr">
            <th style="font-size: 14px;width:5%">Categoria</th>
            <th style="font-size: 14px;width:5%">Código</th>
            <th style="font-size: 14px;width:10%">Cod. de Catálogo</th>
            <th style="font-size: 14px;width: 50%; padding-left:3%">Descripción Completa</th>
            <th style="font-size: 14px;width:10%">U/M</th>
            <th style="font-size: 14px;width:10%">Cantidad</th>
            <th style="font-size: 14px;width:10%">Costo Unitario</th>
            <th style="font-size: 14px;width:10%">Fecha Registro</th>
                   <tr> <td align="center" id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td></tr>

        </tr>
    </thead>
    <tbody>
  <?php 

$categoria2 =$_POST['categoria']; 

   $sql = "SELECT * FROM `tb_productos` WHERE categoria='$categoria2'";
        $result = mysqli_query($conn, $sql);
 while ($productos = mysqli_fetch_array($result)){
       $categoria1=$productos['categoria'];
                if ($categoria1=="") {
                    $categoria1="Sin categorias";
                
                }else{
                $categoria1=$productos['categoria'];
                }
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
        <td data-label="Categoría" style="font-size: 12px;"><?php echo $categoria1 ?></td>
        <td data-label="Código" style="font-size: 12px;"><?php echo $cod ?></td>
        <td data-label="Catalogo" style="font-size: 12px;"><?php echo $catal ?></td>
        <td data-label="Descripción" style="font-size: 12px;"><?php echo $des ?></td>
        <td data-label="Unidad De Medida" style="font-size: 12px;"><?php echo $u_m ?></td>
        <td data-label="Cantidad" style="font-size: 12px;"><?php echo $stock ?></td>
        <td data-label="Precio" style="font-size: 12px;"><?php echo $precio1 ?></td>
        <td data-label="Fecha" style="font-size: 12px;"><?php echo $fech ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 

 </body>
 </html>
<script type="text/javascript">
print('');
</script>