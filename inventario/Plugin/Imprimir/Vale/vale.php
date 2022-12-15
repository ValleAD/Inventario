<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Imprimir vale</title>
       <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../../../styles/estilos_tablas.css">
      <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">  
  
</head>
<body style="font-family: sans-serif;">

    <img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
    <?php 
    include ('../../../Model/conexion.php');

    $vale = $_POST['vale'];
    if ($_POST['jus']=="") {
    $jus = "Sin observacion por el momento";
        
    }else{
    $jus = $_POST['jus'];
      }
?><section style="margin: 2%;">
<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center" style="margin-top: 2%;"> SOLICITUD DE MATERIALES</h5>

     <style>
     @media (max-width: 952px){
   h3, h4, h5{
    font-size: 1em;
    text-align: center;
   }

    }
  </style>
<br>
 <?php include ('../../../Model/conexion.php');
$total = 0;
$final = 0;
$final1 = 0;
$final2 = 0;
     $bodega = $_POST['vale'];

    $sql = "SELECT * FROM detalle_vale WHERE numero_vale='$bodega'";
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
    $sql = "SELECT * FROM tb_vale WHERE codVale='$bodega' limit 1";
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
        <td><p style="float: right;"><b>N° Vale:</b> <?php echo $bodega ?></p>
</td>
    </tr>
       <tr>
           <td style="text-align: left;"><b>Encargado:</b> <?php echo $encargado ?></td>
           <td><b>Estado:</b> <?php echo $estado ?></td>
        <td style="text-align: right;"><p><b>SubTotal:</b> <?php echo $final1; ?></p> </td>

       </tr>
   </table> 
<?php } ?>
        <br> <table class="table" style="width: 100%">
    <thead>     
        <tr id="tr">
            <th style="width: 25%;font-size: 14px;text-align: center;">Código</th>
            <th style="width: 70%;font-size: 14px;text-align: center;">Descripción Completa</th>
            <th style="width: 15%;font-size: 14px;text-align: center;">U/M</th>
            <th style="width: 15%;font-size: 14px;text-align: center;">Cantidad Solicitada</th>
            <th style="width: 30%;font-size: 14px;text-align: center;">Cantidad Despachada</th>
            <th style="width: 30%;font-size: 14px;text-align: center;">C/U</th>
            <th style="width: 15%;font-size: 14px;text-align: center;">Total</th>
        </tr>
    </thead> 

    <tbody>
<?php
    $total = 0;
    $final = 0;

    $sql = "SELECT * FROM detalle_vale WHERE numero_vale='$bodega'";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
        $codigo=$solicitudes['codigo'];
        $des=$solicitudes['descripcion'];
        $um=$solicitudes['unidad_medida'];
        $cantidad=$solicitudes['cantidad_despachada'];
        $stock=$solicitudes['stock'];
        $cost=$solicitudes['precio'];
        $tot=$_POST['tot'];    ?>
        <tr>
            <td data-label="Código"style=""><?php  echo $codigo?></td>
            <td data-label="Descripción"style=""><?php  echo $des?></td>
            <td data-label="Unidad De Medida"style=""><?php  echo $um?></td>
            <td data-label="Cantidad"style=""><?php echo $stock ?></td>
            <td data-label="Cantidad Despachada"style=""><?php echo $cantidad ?></td>
            <td data-label="Precio"style=""><?php echo $cost ?></td>
            <td data-label="total"style=""><?php  echo $tot ?></td>
        </tr>
     <?php } ?>
    </tbody>  

</table>
<br>
<table class="table" style="width: 100%;height: 10%; border: 1px solid #ccc;border-collapse: collapse;">
            <tbody>
            <div class="form-group" style="position: all;border: 1px solid #ccc;border-collapse: collapse;">
               <p style="padding-left: 1%;"> Observaciones (En qué se ocupará el bien entregado)</p>
               <hr style=" border: 1px solid #ccc;border-collapse: collapse;">
                <p style="padding-left: 1%;"><?php echo $jus ?></p>
</div>
</tbody>
</table>
 
    <br>
    <p style="float: right;"> Entrega: ________________</p>
    <p style="text-align:left;">Solicita: ________________ </p>
    <br>
    <p style="text-align: center;">Autoriza: ________________</p>
</section>

</body>
</html>
<script type="text/javascript">
window.print();
</script>