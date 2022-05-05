<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Compra</title>
</head>
<body style="font-family: sans-serif;">
    <img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">

<h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center">REPORTE DE SOLICITUD DE COMPRA</h5>
 

<?php if (isset($_POST['id'])) {?>
<table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
          <th style="width:10%;font-size: 14px;">No. Solicitud</th>
                <th  style="width:10%;font-size: 14px;">Dependencia</th>
                <th  style="width:10%;font-size: 14px;">Plazo y No. de Entregas</th>
                <th  style="width:10%;font-size: 14px;">Unidad Técnica</th>
                <th  style="width:20%;font-size: 14px;" align="center">Descripción Solicitud</th>
                <th  style="width:20%;font-size: 14px;">Fecha de Registro</th>
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
   $sql = "SELECT * FROM tb_compra ORDER BY fecha_registro DESC ";
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
            <td style="font-size: 12px;text-align: center;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } if (isset($_POST['id1'])) {?>
<table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
          <th style="width:10%;font-size: 14px;">No. Solicitud</th>
                <th  style="width:10%;font-size: 14px;">Dependencia</th>
                <th  style="width:10%;font-size: 14px;">Plazo y No. de Entregas</th>
                <th  style="width:10%;font-size: 14px;">Unidad Técnica</th>
                <th  style="width:20%;font-size: 14px;" align="center">Descripción Solicitud</th>
                <th  style="width:20%;font-size: 14px;">Fecha de Registro</th>
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
    $idusuario=$_POST['idusuario'];
   $sql = "SELECT * FROM tb_compra WHERE idusuario='$idusuario'";
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
            <?php $html=ob_get_clean();
                 // echo $html 
require_once 'dompdf/autoload.inc.php';
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
$dompdf->stream("Reporte de solicitud vale.php",array("Attachment"=>0));
        ?>