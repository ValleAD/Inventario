<?php ob_start();
include '../../../Model/conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Vale</title>
    <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body style="font-family: sans-serif;">
    <img src="../../../img/hospital.png" style="width:20%;float: left;">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
    <style>

        .table {width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed;}
        .table tr {background-color: #f8f8f8;border: 1px solid #ddd;color: black;}
        .table th, .table td {font-size: 16px;padding: 8px;text-align: center;}
        .table thead th{ background-color: #46466b;color: white;text-align: center;}
        .table tbody td {font-size: 14px}
        .table tbody tr:nth-child(even) {background-color: #00BDFF; height: 5%}
        .table tbody tr:nth-child(odd) {background-color: #00EAFF; height: 5%}
        h3, h4, h5{
            font-size: 10px;
            text-align: center;
        }
    </style>
    <h3 ><b>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</b></h3>
    <h4 ><b>DEPARTAMENTO DE MANTENIMIENTO</b></h4>
    <h5 ><b>SOLICITUD DE MATERIALES DE VALE</b></h5>
    <br><br>

    <?php if (isset($_POST['id'])) {?>
        <table class="table  table-striped"  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

            <thead style="background-color: #46466b;color: white;">
                <tr>
                    <th  style="height: 3%;font-size: 14px;">Codigo</th>
                    <th  style="height: 3%;font-size: 14px;">Departamento  </th>
                    <th  style="height: 3%;font-size: 14px;">Encargado </th>
                    <th  style="height: 3%;font-size: 14px;">Fecha</th>
                </tr>
                
                
            </thead> 

            <tbody>
                <?php 
                $sql = "SELECT * FROM tb_vale";
                $result = mysqli_query($conn, $sql);

                $n=0;
                while ($solicitudes = mysqli_fetch_array($result)){
                   $des=$solicitudes['departamento'];
                   if ($des=="") {
                    $des="Departamentos No disponible";
                }else{

                 $des=$solicitudes['departamento']; 
             }
             ?>   
             
             <tr>
                <td><?php  echo $solicitudes['codVale']?></td>
                <td><?php  echo $des?></td>
                <td><?php  echo $solicitudes['usuario']?>
                <td><?php  echo date("d - m - Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
        <?php }  ?> 
    </tbody>  
    
    
</table>
<?php } if (isset($_POST['id1'])) { ?>
    <table class="table  table-striped"  style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">

        <thead style="background-color: #46466b;color: white;">
            <tr>
             <th  style="height: 3%;font-size: 14px;">Codigo</th>
             <th  style="height: 3%;font-size: 14px;">Departamento  </th>
             <th  style="height: 3%;font-size: 14px;">Encargado </th>
             <th  style="height: 3%;font-size: 14px;">Fecha</th>
         </tr>
         
         
     </thead> 

     <tbody>
        <?php 
        $idusuario=$_POST['idusuario'];
        $sql = "SELECT * FROM tb_vale WHERE idusuario='$idusuario'";
        $result = mysqli_query($conn, $sql);
        $n=0;
        while ($solicitudes = mysqli_fetch_array($result)){
           $des=$solicitudes['departamento'];
           if ($des=="") {
            $des="Departamentos No disponible";
        }else{

         $des=$solicitudes['departamento']; 
     }
     ?>   
     
     <tr>
        <td><?php  echo $solicitudes['codVale']?></td>
        <td><?php  echo $des?></td>
        <td><?php  echo $solicitudes['usuario']?>
        <td><?php  echo date("d - m - Y",strtotime($solicitudes['fecha_registro'])) ?></td>
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

</body>
</html>
<?php $html=ob_get_clean();
                 // echo $html 
require_once '../../dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// instantiate and use the dompdf class
$dompdf = new  Dompdf(['isRemoteEnabled' =>  true]);
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