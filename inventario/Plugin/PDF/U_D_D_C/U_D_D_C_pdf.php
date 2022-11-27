<?php ob_start();
include '../../../Model/conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($_POST['unidad'])) {?>
        <title>Unidad de Medida</title>
   <?php  } if (isset($_POST['dependencia'])) {?>
        <title>Dependencia</title>
   <?php  } if (isset($_POST['categorias'])) {?>
        <title>Categoria</title>
   <?php  } if (isset($_POST['departamento'])) {?>
        <title>Departamentos</title>
   <?php  } ?>
</head>
<body style="font-family: sans-serif;">
    <img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">

<h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
 
<?php if (isset($_POST['unidad'])) {?>
    
    <h5 align="center">UNIDAD DE MEDIDA</h5><br>
   <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
        <thead style="background-color: #46466b;color: white;">   
        <tr style="border: 1px solid #ddd;" >
          <th style="width:10%;font-size: 12px;height: 3%; text-align: center;">#</th>
                <th  style="width:70%;font-size: 12px;height: 3%;text-align: left;">UNIDAD DE MEDIDA</th>
        <th style="font-size: 12px;">HABILITADO</th>       
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php 
   $sql = "SELECT * FROM selects_unidad_medida";
    $result = mysqli_query($conn, $sql);
    $n=0;
    $w="Unidad_Medida";
    while ($solicitudes = mysqli_fetch_array($result)){
$n++;
        $r=$n+0;
                        if($solicitudes['Habilitado']=='Si') {
                        $c='Unidad Disponible';
                } elseif ($solicitudes['Habilitado']  == 'No') {
               
                    echo ' style="background-color:red;max-width:100% border-radius:5px;text-align:center;color: white;"';
                    $c='Unidad no Disponible';
                }
?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
   <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="No. Solicitud" class="delete"><?php  echo $r; ?></td>
            <td style="text-align:left; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['unidad_medida']; ?></td>
           <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?=   $c ?></td> 
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } ?>
<?php if (isset($_POST['departamento'])) {?>
    
    <h5 align="center">DEPARTAMENTOS</h5><br>
   <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
        <thead style="background-color: #46466b;color: white;">   
        <tr style="border: 1px solid #ddd;" >
          <th style="width:10%;font-size: 12px;height: 3%; text-align: center;">#</th>
                <th  style="width:70%;font-size: 12px;height: 3%;text-align: left;">DEPARTAMENTOS</th>
        <th style="font-size: 12px;">HABILITADO</th>       
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php 
   $sql = "SELECT * FROM selects_departamento";
    $result = mysqli_query($conn, $sql);
    $n=0;
    $w="Departamentos";
    while ($solicitudes = mysqli_fetch_array($result)){
$n++;
        $r=$n+0;
                        if($solicitudes['Habilitado']=='Si') {
                        $c='Departamento Disponible';
                } elseif ($solicitudes['Habilitado']  == 'No') {
               
                    echo ' style="background-color:red;max-width:100% border-radius:5px;text-align:center;color: white;"';
                    $c='Departamento no Disponible';
                }
?>
  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
   <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="No. Solicitud" class="delete"><?php  echo $r; ?></td>
            <td style="text-align:left; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
           <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?=   $c ?></td> 
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } if (isset($_POST['categorias'])) {?>
    
    <h5 align="center">CATEGORIAS</h5><br>
   <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
        <thead style="background-color: #46466b;color: white;">   
        <tr style="border: 1px solid #ddd;" >
          <th style="width:10%;font-size: 12px;height: 3%; text-align: center;">#</th>
                <th  style="width:70%;font-size: 12px;height: 3%;text-align: left;">CATEGORIAS</th>
        <th style="font-size: 12px;">HABILITADO</th>       
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php 
   $sql = "SELECT * FROM selects_categoria";
    $result = mysqli_query($conn, $sql);
    $n=0;
    $w="Categorias";
    while ($solicitudes = mysqli_fetch_array($result)){
$n++;
        $r=$n+0;
                        if($solicitudes['Habilitado']=='Si') {
                        $c='Categoria Disponible';
                } elseif ($solicitudes['Habilitado']  == 'No') {
               
                    echo ' style="background-color:red;max-width:100% border-radius:5px;text-align:center;color: white;"';
                    $c='Categoria no Disponible';
                }
?>
  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
   <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="No. Solicitud" class="delete"><?php  echo $r; ?></td>
            <td style="text-align:left; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['categoria']; ?></td>
           <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?=   $c ?></td> 
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } if (isset($_POST['dependencia'])) {?>   
    <h5 align="center">DEPENDENCIAS</h5><br>
   <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
        <thead style="background-color: #46466b;color: white;">   
        <tr style="border: 1px solid #ddd;" >
          <th style="width:10%;font-size: 12px;height: 3%; text-align: center;">#</th>
            <th  style="width:70%;font-size: 12px;height: 3%;text-align: left;">DEPENDENCIAS</th>
        <th style="font-size: 12px;">HABILITADO</th>       
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php 
   $sql = "SELECT * FROM selects_dependencia";
    $result = mysqli_query($conn, $sql);
    $n=0;
    $w="Dependencias";
    while ($solicitudes = mysqli_fetch_array($result)){
$n++;
        $r=$n+0;
                        if($solicitudes['Habilitado']=='Si') {
                        $c='Dependencia Disponible';
                } elseif ($solicitudes['Habilitado']  == 'No') {
               
                    echo ' style="background-color:red;max-width:100% border-radius:5px;text-align:center;color: white;"';
                    $c='Dependencia no Disponible';
                }
?>
  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
   <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="No. Solicitud" class="delete"><?php  echo $r; ?></td>
            <td style="text-align:left; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
           <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?=   $c ?></td> 
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } ?>
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
$dompdf->stream($w.".pdf",array("Attachment"=>0));
        ?>