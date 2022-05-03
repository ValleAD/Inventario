<?php 

include ('../Model/conexion.php');
$f1 =$_POST['f1'];
$f2 =$_POST['f2'];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Filtro por Fechas</title>
 </head>
 <body>

   <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../styles/estilos_tablas.css">

<img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">
<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center" style="margin-top: 2%;">FILTRO DE FECHAS</h5>
<center>
 <div class="container" style="float:left;">
          <div class="row">
                    <div class="col-md-6" style="position: initial">
                        <label>Desde</label>
                   <p><?php echo $f1 ?></p>
                    </div><div class="col-md-6" style="position: initial">
                        <label>Hasta</label>
                    <p><?php echo $f2 ?></p>                
                    </div>
                    
                </div> 
</div> </center>
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
                   <tr> <td align="center" id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td></tr>

        </tr>
    </thead>
    <tbody>
  <?php 
   $sql = "SELECT * FROM `tb_productos` WHERE fecha_registro BETWEEN ' $f1' AND ' $f2'";
        $result = mysqli_query($conn, $sql);
 while ($productos = mysqli_fetch_array($result)){
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
    <style>
        td{
            font-size: 12px;
        }
    </style>
        <td style="font-size:12px"><?php echo $cod ?></td>
        <td style="font-size:12px"><?php echo $catal ?></td>
        <td style="font-size:12px"><?php echo $des ?></td>
        <td style="font-size:12px"><?php echo $u_m ?></td>
        <td style="font-size:12px"><?php echo $stock ?></td>
        <td style="font-size:12px"><?php echo $precio1 ?></td>
        <td style="font-size:12px"><?php echo $fech ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 

 </body>
 </html>
<script type="text/javascript">
print('');
</script>