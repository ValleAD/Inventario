<?php ob_start();
include '../../../Model/conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Almacen</title>
       <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">
    
</head>
<body style="font-family: sans-serif;">
    <img src="../../../img/hospital.png" style="width:20%;float: left;">
    <img src="../../../img/log_1.png" style="width:20%; float:right">

<h3 ><b>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</b></h3>
<h4 ><b>DEPARTAMENTO DE MANTENIMIENTO</b></h4>
<h5 ><b>SOLICITUD DE MATERIALES DE ALMACEN</b></h5>

      <style>

.table {width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed;}
.table tr {background-color: #f8f8f8;border: 1px solid #ddd;color: black;}
.table th, .table td {font-size: 16px;padding: 8px;text-align: center;}
.table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px}


.table tbody tr:nth-child(even) {background-color: #00BDFF; height: 5%}
.table tbody tr:nth-child(odd) {background-color: #00EAFF; height: 5%}
    }
       h3, h4, h5{
    font-size: 12px;
    text-align: center;
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
    <table class="table"  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

        <thead style="background-color: #46466b;color: white;">
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
                <th style=" width: 10%; text-align: center;font-size: 12px;">No. de Solicitud</th>
                <th style=" width: 30%; text-align: center;font-size: 12px;">Departamento Solicitante</th>
                <th style=" width: 20%; text-align: center;font-size: 12px;">Encargado</th>
                <th style=" width: 20%; text-align: center;font-size: 12px;">Fecha de solicitud</th>
        </tr>
        
       
    </thead> 

    <tbody>
<?php 
    $sql = "SELECT * FROM tb_almacen  Order by $columna $tipo";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
         $des=$solicitudes['departamento'];
                if ($des=="") {
                    $des="Departamentos No disponible";
                }else{

                   $des=$solicitudes['departamento']; 
                }
?>  
  
         <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="No. solicitud" class="delete"><?php  echo $solicitudes['codAlmacen']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Usuario" class="delete"><?php  echo $solicitudes['encargado']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
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
    <table class="table"  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

        <thead style="background-color: #46466b;color: white;">
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
                <th style=" width: 10%; text-align: center;font-size: 12px;">No. de Solicitud</th>
                <th style=" width: 30%; text-align: center;font-size: 12px;">Departamento Solicitante</th>
                <th style=" width: 20%; text-align: center;font-size: 12px;">Encargado</th>
                <th style=" width: 20%; text-align: center;font-size: 12px;">Fecha de solicitud</th>
        </tr>
        
       
    </thead> 

    <tbody>
<?php 
$idusuario=$_POST['idusuario'];
    $sql = "SELECT * FROM tb_almacen WHERE idusuario='$idusuario'  Order by $columna $tipo";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
         $des=$solicitudes['departamento'];
                if ($des=="") {
                    $des="Departamentos No disponible";
                }else{

                   $des=$solicitudes['departamento']; 
                }
?>  
  
         <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="No. solicitud" class="delete"><?php  echo $solicitudes['codAlmacen']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Usuario" class="delete"><?php  echo $solicitudes['encargado']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } ?>
<?php if (isset($_POST['id'])) {?>
    <table class="table"  style="width: 100%;">

        <thead style="background-color: #46466b;color: white;">
        <tr>
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
  
        <tr >
           <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="No. solicitud" class="delete"><?php  echo $solicitudes['codAlmacen']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Usuario" class="delete"><?php  echo $solicitudes['encargado']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
            </tr>

       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } if (isset($_POST['id1'])) {?>
    <table class="table"  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

        <thead style="background-color: #46466b;color: white;">
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
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
           <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="No. solicitud" class="delete"><?php  echo $solicitudes['codAlmacen']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Usuario" class="delete"><?php  echo $solicitudes['encargado']; ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
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