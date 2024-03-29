<?php ob_start();
include '../../../Model/conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Solicitudes Circulante</title>
       <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">
   
</head>
<body style="font-family: sans-serif;">
    <img src="../../../img/hospital.png" style="width:20%;float: left;">
    <img src="../../../img/log_1.png" style="width:20%; float:right">

<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">DEPARTAMENTO DE MANTENIMIENTO</h4>
<h3 align="center" style="margin-top: 2%;">FONDO CIRCULANTE DE MONTO FIJO</h3>


     <style>

.table {width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed;}
.table tr {background-color: #f8f8f8;border: 1px solid #ddd;color: black;}
.table th, .table td {font-size: 12px;padding: 8px;text-align: center;}
.table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px}


.table tbody tr:nth-child(even) {background-color: #00BDFF; height: 5%}
.table tbody tr:nth-child(odd) {background-color: #00EAFF; height: 5%}
       h3, h4, h5{
    font-size: 10px;
    text-align: center;
    }
    }
  </style>
  <br>
<section style="font-size: 14px;">
<p>Encargado del Fondo Circulante de Monto Fijo Recursos Propios</p>
<p>Hospital Nacional "Santa Teresa" de Zacatecoluca</p>
<br>
<p>Atentamente solicito a usted la compra <b>Urgente</b> de los materiales y/o servicios que se detallan a continuación, a través del Fondo Circulante de Monto Fijo.</p>
</section>

<?php if (isset($_POST['id'])) { ?>
<table class="table" style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;">
       <thead style="background-color: #46466b;color: white;">    
        <tr style="border: 1px solid #ddd;" >
            <th style="width: 20%;height: 3%;font-size: 14px;text-align: center;">No. de Solicitud </th>
            <th style="width: 20%;height: 3%;font-size: 14px;text-align: center;">Fecha de Solicitud</th>
        </tr>
    </thead> 

    <tbody>
<?php  
   $sql = "SELECT * FROM tb_circulante Order by codCirculante DESC";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($solicitudes = mysqli_fetch_array($result)){
        $n++;
        $r=$n+0;
?> 
  
         <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td><?php  echo $solicitudes['codCirculante']?></td>
            <td><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
            </tr>
     
     <?php }  ?> 
    </tbody>  
   
</table>
     <?php }?>

     <?php if (isset($_POST['id1'])) { ?>
<table class="table" style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;">
       <thead style="background-color: #46466b;color: white;">    
        <tr style="border: 1px solid #ddd;" >
            <th style="width: 20%;height: 3%;font-size: 14px;text-align: center;">No. de Solicitud </th>
            <th style="width: 20%;height: 3%;font-size: 14px;text-align: center;">Fecha de Solicitud</th>
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
            <td><?php  echo $solicitudes['codCirculante']?></td>
            <td><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
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
    <br>

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
$dompdf->stream("pdf_circulante.pdf",array("Attachment"=>0));
        ?>