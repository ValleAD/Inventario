<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" type="text/css" href="../../../styles/estilos_tablas.css">
    <title>Imprimir Bodega</title>
</head>
<body style="font-family: sans-serif;">
    <img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">


<h3 align="center">HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>

<h4 align="center">DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center">SOLICITUD DE MATERIALES</h5>
 
 <?php include ('../../../Model/conexion.php');
$total = 0;
$final = 0;
$final1 = 0;
$final2 = 0;
     $bodega = $_POST['bodega'];

    $sql = "SELECT * FROM detalle_bodega WHERE odt_bodega='$bodega'";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $solicitudes['stock'] * $solicitudes['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $solicitudes['cantidad_despachada'] * $solicitudes['precio'];
    }
     $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",","); 
  }
    $sql = "SELECT * FROM tb_bodega WHERE codBodega='$bodega' limit 1";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

$depto=$solicitudes['departamento'];
$estado=$solicitudes['estado'];
$fech=date("d - m - Y",strtotime($solicitudes['fecha_registro']));
$encargado=$solicitudes['usuario'];

      ?>
   <table style="width: 100%;margin: 0;">
    <tr style="height: -15%;">
        <td><p><b>Depto. o Servicio:</b> <?php echo $depto ?></p> </td>
           <td><b>Fecha:</b> <?php echo $fech ?><br></td>
        <td><p style="float: right;"><b>O. de T.:</b> <?php echo $bodega ?></p>
</td>
    </tr>
       <tr>
           <td style="text-align: left;;width:50%;"><b>Encargado:</b> <?php echo $encargado ?></td>
           <td><b>Estado:</b> <?php echo $estado ?></td>
        <td style="text-align: right;"><p><b>SubTotal:</b> <?php echo $final1; ?></p> </td>

       </tr>
   </table> 
<?php } ?>
        <br> 
<table class="table" style="width: 100%">
    <thead>     
        <tr id="tr">
            <th style="width: 20%;">Código</th>
            <th style="width: 50%;">Descripción Completa</th>
            <th style="width: 20%;">U/M</th>
            <th style="width: 20%;">Cantidad Solicitada</th>
            <th style="width: 20%;">Cantidad Despachada</th>
            <th style="width: 20%;">C/U</th>
            <th style="width: 20%;">Total</th>
        </tr>
    </thead> 

    <tbody>
<?php


    $sql = "SELECT * FROM detalle_bodega WHERE odt_bodega='$bodega'";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

        $codigo=$solicitudes['codigo'];
        $des=$solicitudes['descripcion'];
        $um=$solicitudes['unidad_medida'];
        $cantidad=$solicitudes['cantidad_despachada'];
        $stock=$solicitudes['stock'];
        $cost=$solicitudes['precio'];
        if ($estado="Pendiente") {  
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado="Rechazado") {
        
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
     $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",","); 

    ?>
        <tr>
            <td data-label="Código"><?php  echo $codigo?></td>
            <td data-label="Descripción"><?php  echo $des?></td>
            <td data-label="Unidad De Medida"><?php  echo $um?></td>
            <td data-label="Cantidad"><?php echo $stock ?></td>
            <td data-label="Cantidad Despachada"><?php echo $cantidad ?></td>
            <td data-label="Precio"><?php echo $cost ?></td>
            <td data-label="total"><?php  echo $total1 ?></td>
        </tr>
     <?php } ?>
    </tbody>  

</table>
<br>

    <p style="float: right;"> Entrega: ________________</p>
    <p style="text-align:left;">Solicita: ________________  </p>
    <br>
    <p style="text-align: center;">Autoriza: ________________</p>
</section>

</body>
</html>
<script type="text/javascript">
window.print();
</script>