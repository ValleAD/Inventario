<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud Vale</title>
       <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">
 </head>
 <body>

<img src="../../../img/hospital.png" style="width:20%;float: left;">
    <img src="../../../img/log_1.png" style="width:20%; float:right">

<h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5>REPORTE DE SOLICITUD DE VALE</h5>
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
  </style>
<section>

    <?php include '../../../Model/conexion.php';
     if (isset($_POST['id'])) {?>
<table class="table" style="width: 100%;margin: 0;">
    <thead>     
        <tr >

            <th  style="width: 10%;font-size: 14px;">Codigo</th>
            <th  style="width: 50%;font-size: 14px;">Departamento Solicitante </th>
            <th  style="width: 50%;font-size: 14px;">Encargado </th>
            <th  style="width: 15%;font-size: 14px;">Fecha</th>
        </tr>
        
    </thead> 

    <tbody>
<?php
   $sql = "SELECT * FROM tb_vale";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
$des=$solicitudes['departamento'];
                if ($des=="") {
                    $des="Departamentos No disponible";
                }else{

                   $des=$solicitudes['departamento']; 
                }
?>   
  
        <tr>
            <td data-label="Código" style="font-size: 12px;"><?php  echo $solicitudes['codVale']?></td>
            <td data-label="Departamento" style="font-size: 12px;"><?php  echo $des?></td>
             <td data-label="Encargado" style="font-size: 12px;"><?php  echo $solicitudes['usuario']?>
            <td data-label="Fecha" style="font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
</table>
<?php } if (isset($_POST['id1'])) { ?>
    <table class="table" style="width: 100%;margin: 0;">
    <thead>     
        <tr >
            <th  style="width: 10%;font-size: 14px;">Código</th>
            <th  style="width: 50%;font-size: 14px;">Departamento Solicitante</th>
            <th  style="width: 50%;font-size: 14px;">Encargado</th>
            <th  style="width: 15%;font-size: 14px;">Fecha</th>
        </tr>
    </thead> 

    <tbody>
<?php 
$idusuario=$_POST['idusuario'];
   $sql = "SELECT * FROM tb_vale WHERE idusuario='$idusuario'  ";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
$des=$solicitudes['departamento'];
                if ($des=="") {
                    $des="Departamentos No disponible";
                }else{

                   $des=$solicitudes['departamento']; 
                }
?>   
  
        <tr>
            <td data-label="Código" style="font-size: 12px;"><?php  echo $solicitudes['codVale']?></td>
            <td data-label="Departamento" style="font-size: 12px;"><?php  echo $des?></td>
             <td data-label="Encargado" style="font-size: 12px;"><?php  echo $solicitudes['usuario']?>
            <td data-label="Fecha" style="font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } ?>


    <br>
    <p style="float: right;"> Entrega: ________________</p>
    <p style="text-align:left;">Solicita: ________________ </p>
    <br>
    <p style="text-align: center;">Autoriza: ________________</p>
</section>
<script type="text/javascript">
window.print();
</script>
</body>
</html>