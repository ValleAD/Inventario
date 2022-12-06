<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../../../styles/estilos_tablas.css">

 </head>
 <body>

<img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">

<h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center">REPORTE DE SOLICITUD DE COMPRA</h5>
 
<style>
    .table td  { font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;}
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
</style>
<section>
<?php if (isset($_POST['Consultar'])) {
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
        <tr style="border: 1px solid #ddd;" >

                <th style="font-size: 14px;width: 10%;">No. Solicitud</th>
                <th style="font-size: 14px;width: 15%;">Dependencia</th>
                <th style="font-size: 14px;width: 10%;">Plazo y No. de Entregas</th>
                <th style="font-size: 14px;width: 10%;">Unidad Técnica</th>
                <th style="font-size: 14px;width: 10%;">Descripción Solicitud</th>
                <th style="font-size: 14px;width: 10%;">Encargado</th>
                <th style="font-size: 14px;width: 10%;">Fecha de Registro</th>
        </tr>
        
        <td id="td" colspan="3" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../../../../../../Model/conexion.php';
    $sql = "SELECT * FROM tb_compra  Order by $columna $tipo";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="font-size: 12px;text-align: center;" data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Unidad Técnica" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Descripción Solicitud" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>
             <td data-label="Encargado" style="font-size: 12px;text-align: center;"><?php  echo $solicitudes['usuario']?>
            <td style="font-size: 12px;text-align: center;" data-label="Fecha" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
           
            </tr>
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
    <table class="table" style="width: 100%;margin: 0;">
    <thead>     
        <tr style="border: 1px solid #ddd;" >

            <th style="font-size: 14px;width: 10%;">No. Solicitud</th>
                <th style="font-size: 14px;width: 15%;">Dependencia</th>
                <th style="font-size: 14px;width: 10%;">Plazo y No. de Entregas</th>
                <th style="font-size: 14px;width: 10%;">Unidad Técnica</th>
                <th style="font-size: 14px;width: 10%;">Descripción Solicitud</th>
                <th style="font-size: 14px;width: 10%;">Encargado</th>
                <th style="font-size: 14px;width: 10%;">Fecha de Registro</th>
        </tr>
        
        <td id="td" colspan="3" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../../../Model/conexion.php';
$idusuario=$_POST['idusuario'];
    $sql = "SELECT * FROM tb_compra WHERE idusuario='$idusuario'  Order by $columna $tipo";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="font-size: 12px;text-align: center;" data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Unidad Técnica" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Descripción Solicitud" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>
             <td data-label="Encargado" style="font-size: 12px;text-align: center;"><?php  echo $solicitudes['usuario']?>
            <td style="font-size: 12px;text-align: center;" data-label="Fecha" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } ?>
<?php if (isset($_POST['id'])) {?>
<table class="table" style="width: 100%;margin: 0;">
    <thead>     
        <tr style="border: 1px solid #ddd;" >
          <th style="font-size: 14px;width: 10%;">No. Solicitud</th>
                <th style="font-size: 14px;width: 15%;">Dependencia</th>
                <th style="font-size: 14px;width: 10%;">Plazo y No. de Entregas</th>
                <th style="font-size: 14px;width: 10%;">Unidad Técnica</th>
                <th style="font-size: 14px;width: 10%;">Descripción Solicitud</th>
                <th style="font-size: 14px;width: 10%;">Encargado</th>
                <th style="font-size: 14px;width: 10%;">Fecha de Registro</th>
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../../../Model/conexion.php';
   $sql = "SELECT * FROM tb_compra ORDER BY nSolicitud DESC ";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
   <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="font-size: 12px;text-align: center;" data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>
             <td data-label="Encargado" style="font-size: 12px;text-align: center;"><?php  echo $solicitudes['usuario']?>
            <td style="font-size: 12px;text-align: center;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } if (isset($_POST['id1'])) {?>
<table class="table" style="width: 100%;margin: 0;">
    <thead>     
        <tr style="border: 1px solid #ddd;" >
          <th style="font-size: 14px;width: 10%;">No. Solicitud</th>
                <th style="font-size: 14px;width: 15%;">Dependencia</th>
                <th style="font-size: 14px;width: 10%;">Plazo y No. de Entregas</th>
                <th style="font-size: 14px;width: 10%;">Unidad Técnica</th>
                <th style="font-size: 14px;width: 10%;">Descripción Solicitud</th>
                <th style="font-size: 14px;width: 10%;">Encargado</th>
                <th style="font-size: 14px;width: 10%;">Fecha de Registro</th>
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../../../Model/conexion.php';
    $idusuario=$_POST['idusuario'];
   $sql = "SELECT * FROM tb_compra WHERE idusuario='$idusuario' Order by nSolicitud DESC";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
   <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="font-size: 12px;text-align: center;" data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td style="font-size: 12px;text-align: center;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>
             <td data-label="Encargado" style="font-size: 12px;text-align: center;"><?php  echo $solicitudes['usuario']?>
            <td style="font-size: 12px;text-align: center;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } ?>
<br>

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
