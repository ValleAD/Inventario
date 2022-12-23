<?php ob_start();
include '../../../Model/conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../styles/estilos_tablas.css">
    <title>PDF Compra</title>
       <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">
    
</head>
<body style="font-family: sans-serif;">
    <img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">

<h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center">REPORTE DE SOLICITUD DE COMPRA</h5>
          <style>

.table {width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed;}
.table tr {background-color: #f8f8f8;border: 1px solid #ddd;color: black;}
.table th, .table td {font-size: 16px;padding: 8px;text-align: center;}
.table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px}


.table tbody tr:nth-child(even) {background-color: #00BDFF; height: 5%}
.table tbody tr:nth-child(odd) {background-color: #00EAFF; height: 5%}
    }
  </style>
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
    <table class="table "  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

        <thead style="background-color: #46466b;color: white;">
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">

                <th style="font-size: 12px;width: 10%;">No. Solicitud</th>
                <th style="font-size: 12px;width: 15%;">Dependencia</th>
                <th style="font-size: 12px;width: 10%;">Plazo y No. de Entregas</th>
                <th style="font-size: 12px;width: 10%;">Unidad Técnica</th>
                <th style="font-size: 12px;width: 10%;">Descripción Solicitud</th>
                <th style="font-size: 12px;width: 10%;">Encargado</th>
                <th style="font-size: 12px;width: 10%;">Fecha de Registro</th>
        </tr>
        
        <td id="td" colspan="3" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  
    $sql = "SELECT * FROM tb_compra  Order by $columna $tipo";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Unidad Técnica" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Descripción Solicitud" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>
             <td data-label="Encargado" style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php  echo $solicitudes['usuario']?>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Fecha" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
           
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
    <table class="table "  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

        <thead style="background-color: #46466b;color: white;">
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">

            <th style="font-size: 12px;width: 10%;">No. Solicitud</th>
                <th style="font-size: 12px;width: 15%;">Dependencia</th>
                <th style="font-size: 12px;width: 10%;">Plazo y No. de Entregas</th>
                <th style="font-size: 12px;width: 10%;">Unidad Técnica</th>
                <th style="font-size: 12px;width: 10%;">Descripción Solicitud</th>
                <th style="font-size: 12px;width: 10%;">Encargado</th>
                <th style="font-size: 12px;width: 10%;">Fecha de Registro</th>
        </tr>
        
        <td id="td" colspan="3" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  
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
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Unidad Técnica" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Descripción Solicitud" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>
             <td data-label="Encargado" style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php  echo $solicitudes['usuario']?>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Fecha" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } ?>
<?php if (isset($_POST['id'])) {?>
    <table class="table "  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

        <thead style="background-color: #46466b;color: white;">
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
          <th style="font-size: 12px;width: 10%;">No. Solicitud</th>
                <th style="font-size: 12px;width: 15%;">Dependencia</th>
                <th style="font-size: 12px;width: 10%;">Plazo y No. de Entregas</th>
                <th style="font-size: 12px;width: 10%;">Unidad Técnica</th>
                <th style="font-size: 12px;width: 10%;">Descripción Solicitud</th>
                <th style="font-size: 12px;width: 10%;">Encargado</th>
                <th style="font-size: 12px;width: 10%;">Fecha de Registro</th>
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  
   $sql = "SELECT * FROM tb_compra ORDER BY nSolicitud DESC ";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
   <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>
             <td data-label="Encargado" style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php  echo $solicitudes['usuario']?>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } if (isset($_POST['id1'])) {?>
    <table class="table "  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

        <thead style="background-color: #46466b;color: white;">
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
          <th style="font-size: 12px;width: 10%;">No. Solicitud</th>
                <th style="font-size: 12px;width: 15%;">Dependencia</th>
                <th style="font-size: 12px;width: 10%;">Plazo y No. de Entregas</th>
                <th style="font-size: 12px;width: 10%;">Unidad Técnica</th>
                <th style="font-size: 12px;width: 10%;">Descripción Solicitud</th>
                <th style="font-size: 12px;width: 10%;">Encargado</th>
                <th style="font-size: 12px;width: 10%;">Fecha de Registro</th>
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  
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
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>
             <td data-label="Encargado" style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php  echo $solicitudes['usuario']?>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
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
            <?php $html=ob_get_clean();
                 // echo $html 
require_once '../../dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->setIsHtml5ParserEnabled(true);
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Reporte de solicitud vale.pdf",array("Attachment"=>0));
        ?>