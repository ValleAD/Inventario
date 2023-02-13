<?php
session_start();
if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
    window.location ="../../../log/signin.php";
    session_destroy();  
    </script>
    die();

    ';
    
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Solicitud Almacen</title>
   <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">
</head>
<body style="font-family: sans-serif;">
    <img src="../../../img/hospital.png" style="width:20%;float: left;">
    <img src="../../../img/log_1.png" style="width:20%; float:right">

<h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5>SOLICITUD DE ALMACEN</h5>
 

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
<table class="table" style="width: 100%; ">
    <thead>     
        <tr>
                <th style=" width: 10%; text-align: center;font-size: 12px;">No. de Solicitud</th>
                <th style=" width: 10%; text-align: center;font-size: 12px;">Departamento Solicitante</th>
                <th style=" width: 20%; text-align: center;font-size: 12px;">Encargado</th>
                <th style=" width: 20%; text-align: center;font-size: 12px;">Fecha de solicitud</th>
        </tr>
        
        
    </thead> 

    <tbody>
<?php  
   $sql = "SELECT * FROM tb_almacen ORDER BY codAlmacen DESC";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

?> 
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
           <td data-label="No. solicitud" class="delete"><?php  echo $solicitudes['codAlmacen']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            <td data-label="Usuario" class="delete"><?php  echo $solicitudes['encargado']; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } if (isset($_POST['id1'])) {?>
<table class="table" style="width: 100%; ">
    <thead>     
        <tr>
                <th style=" width: 10%; text-align: center;font-size: 12px;">No. de Solicitud</th>
                <th style=" width: 10%; text-align: center;font-size: 12px;">Departamento Solicitante</th>
                <th style=" width: 20%; text-align: center;font-size: 12px;">Encargado</th>
                <th style=" width: 20%; text-align: center;font-size: 12px;">Fecha de solicitud</th>
        </tr>
        
        
    </thead> 

    <tbody>
<?php  
$id=$_POST['idusuario'];
   $sql = "SELECT * FROM tb_almacen WHERE idusuario='$id' Order by codAlmacen DESC";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

?> 
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
           <td data-label="No. solicitud" class="delete"><?php  echo $solicitudes['codAlmacen']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            <td data-label="Usuario" class="delete"><?php  echo $solicitudes['encargado']; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php }?>
    <br>
    <p style="float: right;"> Entrega: ________________</p>
    <p style="text-align:left;">Solicita: ________________ </p>
    <br>
    <p style="text-align: center;">Autoriza: ________________</p>
<script type="text/javascript">
window.print();
</script>
</body>
</html>