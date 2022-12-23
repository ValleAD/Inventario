<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Solicitudes Circulante</title>
       <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">
 </head>
 <body>

<img src="../../../img/hospital.png" style="width:20%; float: left;">
    <img src="../../../img/log_1.png" style="width:20%; float:right">

<h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5>SOLICITUD DE MATERIALES DE FONDO FIRCULANTE</h5>
<style>
.table {width: 100%;border-collapse: collapse;margin: 0;table-layout: fixed;}
.table tbody tr {background-color: #f8f8f8;border: 1px solid #ddd;}
.table th, .table td {font-size: 14px;text-align: center;padding: 8px}
.table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px;}


.table tbody tr:nth-child(even) {background-color: #00BDFF; }
.table tbody tr:nth-child(odd) {background-color: #00EAFF; }
   h3, h4, h5{
    font-size: 12px;
    text-align: center;
    }
#b{
    margin-top: 2%;
    width: 100%;
    float: right;
}
  </style>

<section style="font-size: 14px;">
<div id="b">
<p>Encargado del Fondo Circulante de Monto Fijo Recursos Propios</p>
<p>Hospital Nacional "Santa Teresa" de Zacatecoluca</p>

<p>Atentamente solicito a usted la compra <b>Urgente</b> de los materiales y/o servicios que se detallan a continuación, a través del Fondo Circulante de Monto Fijo.</p>
</div>
</section>
 <?php include '../../../Model/conexion.php';
  if (isset($_POST['Consultar'])) {
    $columna=$_POST['columna'];
    $tipo=$_POST['tipo'];
        $tipo=$_POST['tipo'];
     if ($tipo=="desc"){
       $tipo1='Descendente'; 
    }
    if ($tipo=="asc") {
        $tipo1='Ascendente';
     } ?>
    <p style="float: right;">Ordenado: <?php echo $tipo1 ?></p><br><br>
    <table class="table" style="width: 100%;margin: 0;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 10%;font-size: 14px;text-align: center;">No. de Solicitud </th>
            <th style="width: 15%;font-size: 14px;text-align: center;">Fecha de Solicitud</th>
                
        </tr>
        
       
    </thead> 

    <tbody>
<?php  
    $sql = "SELECT * FROM tb_circulante  Order by $columna $tipo";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

?> 
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td data-label="No. solicitud" class="delete"><?php  echo $solicitudes['codCirculante']; ?></td>
            <td data-label="Fecha de solicitud" style="font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
       <?php }  ?> 
    </tbody>  
</table>
<?php } ?>
 <?php if (isset($_POST['Consultar1'])) {
    $columna=$_POST['columna'];
    $tipo=$_POST['tipo'];
        $tipo=$_POST['tipo'];
     if ($tipo=="desc"){
       $tipo1='Descendente'; 
    }
    if ($tipo=="asc") {
        $tipo1='Ascendente';
     } ?>
    <p style="float: right;">Ordenado: <?php echo $tipo1 ?></p><br><br>
    <table class="table" class="table" style="width: 100%;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 10%;font-size: 14px;text-align: center;">No. de Solicitud </th>
            <th style="width: 15%;font-size: 14px;text-align: center;">Fecha de Solicitud</th>
            
        </tr>
        
        <td id="td" colspan="3" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php
$idusuario=$_POST['idusuario'];
    $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario'  Order by $columna $tipo";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

?> 
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
             <td data-label="No. solicitud" class="delete"><?php  echo $solicitudes['codCirculante']; ?></td>
            <td data-label="Fecha de solicitud" style="font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
            
       <?php }  ?> 
    </tbody>  
</table>
<?php } ?>
<?php if (isset($_POST['id'])) { ?>
<table class="table" style="width: 100%;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 10%;font-size: 14px;text-align: center;">No. de Solicitud </th>
            <th style="width: 15%;font-size: 14px;text-align: center;">Fecha de Solicitud</th>
        </tr>
    </thead> 

    <tbody>
<?php     $sql = "SELECT * FROM tb_circulante Order by codCirculante DESC";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($solicitudes = mysqli_fetch_array($result)){
        $n++;
        $r=$n+0;
?>   
  
         <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="font-size: 12px;text-align: center;"><?php  echo $solicitudes['codCirculante']?></td>
            <td style="text-align:center; font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
            </tr>
     
     <?php }  ?> 
    </tbody>  
   
</table>
     <?php }?>

     <?php if (isset($_POST['id1'])) { ?>
<table class="table" style="width: 100%;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 10%;font-size: 14px;text-align: center;">No. de Solicitud </th>
            <th style="width: 15%;font-size: 14px;text-align: center;">Fecha de Solicitud</th>
        </tr>
    </thead> 

    <tbody>
<?php  
$idusuario=$_POST['idusuario'];
   $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario' Order by codCirculante DESC";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($solicitudes = mysqli_fetch_array($result)){
        $n++;
        $r=$n+0;
?>
  
         <tr style="border: 1px solid #ccc;border-collapse: collapse;">
             <td data-label="No. solicitud" class="delete"><?php  echo $solicitudes['codCirculante']; ?></td>
            <td data-label="Fecha de solicitud" style="font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
            </tr>
     
     <?php }  ?> 
    </tbody>  
</table>
     <?php }?>
<p>Todo lo anteriormente detallado, es indispensable para desarrollar nuestras funciones.</p>  
<p>Sin más particular</p>

<div align="right">
<p style="float: right;"> Dá fe de no haber existencia: <br><br>F. ________________ <br>Sra. Isabel Romero <br>Guardalmacén</p>
</div>

<div align="">
    <p style="text-align:left;">Solicita: <br><br>F. ________________ <br>Ing. Ernesto González Choto <br>Jefe de Mantenimiento</p>
</div>

<div align="">
    <p style="text-align: center;">Autoriza: <br><br>F. ________________ <br>Dr. William Antonio Fernández Rodríguez <br>Director del Hospital Nacional “ Santa Teresa”</p>
</div>


<script type="text/javascript">
window.print();
</script>
</body>
</html>