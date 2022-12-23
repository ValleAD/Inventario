<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">

 </head>
 <body>

<img src="../../../img/hospital.png" style="width:20%;float: left;">
    <img src="../../../img/log_1.png" style="width:20%; float:right">

<h3 align="center">HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<h4 align="center">DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center">SOLICITUD DE MATERIALES DE COMPRA</h5>
 
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

<?php if (isset($_POST['id'])) {?>
<table class="table" style="width: 100%;margin: 0;">
    <thead>     
        <tr style="border: 1px solid #ddd;" >
          <th style="font-size: 14px;width: 10%;">No. Solicitud</th>
                <th style="font-size: 14px;width: 15%;">Dependencia</th>
                <th style="font-size: 14px;width: 10%;">Plazo y No. de Entregas</th>
                <th style="font-size: 14px;width: 10%;">Unidad Técnica</th>
                <th style="font-size: 14px;width: 10%;">Suministros</th>
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
            <td data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>
             <td data-label="Encargado"><?php  echo $solicitudes['usuario']?>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
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
                <th style="font-size: 14px;width: 10%;">Suministros</th>
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
            <td data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>
             <td data-label="Encargado"><?php  echo $solicitudes['usuario']?>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
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
