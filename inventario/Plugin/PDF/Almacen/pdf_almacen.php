<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Almacén</title>
</head>
<body style="font-family: sans-serif;">
    <img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
    <?php if(isset($_POST['cod'])){

     $encargado = $_POST['encargado'];
    $depto = $_POST['depto'];
    $fech = $_POST['fech'];
     $vale = $_POST['num_sol'];
     $estado=$_POST['estado'];
      
?>
    <style>
     @media (max-width: 952px){
   h3, h4,h5{
    font-size: 1em;
     text-align: center;
   }
   section{
    margin: 2%;
   }
    }
</style>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA  DE ZACATECOLUCA</h3>
<h4 align="center" style="margin-top: 2%;">ALMACÉN DE MEDICAMENTOS, INSUMOS MÉDICOS,</h4>
<h4 align="center" style="margin-top: 2%;">PAPELERÍA Y OTROS ARTICULOS</h4>
<br>
<table  style="width: 100%;text-align: center;">
    <tr>
        <td><b>N° Almacen</b></td>
        <td><b>Departamento</b></td>
        <td><b>Encargado</b></td>
        <td><b>Fecha</b></td>
        <td><b>Estado</b></td>
    </tr>
    <tr>
        <td><?php echo $vale ?></td>
        <td><?php echo $depto ?></td>
        <td><?php echo $encargado ?></td>
        <td><?php echo $fech ?></td>
        <td><?php echo $estado ?></td>
    </tr>
</table><br>
 <table class="table" style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;text-align: center;">
        <thead style="background-color: #46466b;color: white;">    
        <tr style="border: 1px solid #ddd;" >
            <th style="width: 25%;font-size: 12px;">Código</th>
            <th style="width: 70%;font-size: 12px;">Descripción</th>
            <th style="width: 15%;font-size: 12px;">U/M</th>
            <th style="width: 15%;font-size: 12px;">Cant.<br>Sol.</th>
            <th style="width: 15%;font-size: 12px;">Cant.<br>Desp.</th>
            <th style="width: 15%;font-size: 12px;">C/U</th>
            <th style="width: 15%;font-size: 12px;border-right:1px solid #ccc ;">Total</th>
        </tr>
    </thead> 

    <tbody>
<?php
for($i = 0; $i < count($_POST['cod']); $i++)
{
   
    $codigo = $_POST['cod'][$i];
    $des = $_POST['desc'][$i];
    $um = $_POST['um'][$i];
    $cant = $_POST['cant'][$i];
    $cantidad = $_POST['cantidad_despachada'][$i];
    $precio = $_POST['cost'][$i];
    $total = $_POST['tot'][$i];
    $tot_f = $_POST['tot_f'];
?>
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Código" style=" font-size: 12px; "><?php  echo $codigo?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Descripción" style=" font-size: 12px; "><?php  echo $des?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Unidad De Medida" style=" font-size: 12px; "><?php  echo $um?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Cantidad" style=" font-size: 12px; "><?php echo $cant ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Cantidad Despachada" style=" font-size: 12px; "><?php echo $cantidad ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Precio" style=" font-size: 12px; "><?php echo $precio ?></td>
            <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="total" style=" font-size: 12px; "><?php  echo $total ?></td>
        </tr>
     
     <?php } } ?> 
    <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
        <td colspan="6"style="text-align: left;font-size: 12px; font-weight: bold;">Subtotal</td>
        <td style="color: red;font-size: 12px; font-weight: bold;"><?php echo $tot_f ?></td>
    </tfoot>
</table>
<br>
    <table style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;">
        <tbody>
            <tr style="border: 1px solid #ddd;color: black;" >
                <td style="height: 35px;"><b>DEPARTAMENTO QUE SOLICITA:</b> MANTENIMIENTO</td>
            </tr>
            <tr style="border: 1px solid #ddd;color: black;" >
                <td style="height: 35px;"><b>FECHA: </b><?php echo $fech?> <div align="center" style="margin-top: -2.5%;">FIRMA</div> <div style="float: right; margin-top: -3%;">SELLO</div></td>
            </tr>
            <tr style="border: 1px solid #ddd;color: black;" >
                <td style="height: 35px;"><b>AUTORIZA:</b> DIRECTOR HOSPITAL NACIONAL "SANTA TERESA"</td>
            </tr>
        </tbody>
    </table>   

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
$dompdf->stream("pdf_almacen.pdf",array("Attachment"=>0));
        ?>