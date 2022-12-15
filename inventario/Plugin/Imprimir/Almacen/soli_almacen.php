<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PDF Almacen</title>
      <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../../../styles/estilos_tablas.css">
</head>
<body style="font-family: sans-serif;">
    <img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">

<h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center">SOLICITUD DE ALMACEN</h5>
 

<style>
     td  { font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;}
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
<?php include '../../../Model/conexion.php';

 if (isset($_POST['id'])) {?>
<table class="table" style="width: 100%; ">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
                <th style=" width: 10%; text-align: center;font-size: 12px;">No. de Solicitud</th>
                <th style=" width: 30%; text-align: center;font-size: 12px;">Departamento Solicitante</th>
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
           <td style="font-size: 12px;text-align: center;" data-label="No. solicitud" class="delete"><?php  echo $solicitudes['codAlmacen']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Usuario" class="delete"><?php  echo $solicitudes['encargado']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } if (isset($_POST['id1'])) {?>
<table class="table" style="width: 100%; ">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
                <th style=" width: 10%; text-align: center;font-size: 12px;">No. de Solicitud</th>
                <th style=" width: 30%; text-align: center;font-size: 12px;">Departamento Solicitante</th>
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
           <td style="font-size: 12px;text-align: center;" data-label="No. solicitud" class="delete"><?php  echo $solicitudes['codAlmacen']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Usuario" class="delete"><?php  echo $solicitudes['encargado']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
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