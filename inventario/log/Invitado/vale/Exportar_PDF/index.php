
<?php

require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// instantiate and use the dompdf class	
$options = new Options();
$dompdf = new Dompdf();
$html='
  <link rel="stylesheet" type="text/css" href="../../../../styles/estilos_tablas.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <img src="hospital.jpg" style=" width:20%">
<img src="log_1.png" style=" width:20%;float:right;">
<h3 style="text-align:center;margin-top:0% ">HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<label style="float:right">Vale No.:</label><br><br>
<label style="text-align:center;margin-left:35%">DEPARTAMENTO DE MANTENIMIENTO</label><br><br>
<label>Solicitud de Materiales:</label><br><br>
<label>Depto. o Servicio:</label><br><br>
<label>Fecha:</label><br><br>
<label>Depto. o Servicio::</label><br><br>
<label>Encargado:</label><br><br>
<table class=" table table-responsive table-striped" id="example" style=" width: 100%">
	<thead>
<tr >
<th>Código</th>
<th>Descripción</th>
<th>U/M</th>
<th>Cantidad</th>
<th>Costo Unitario</th>
<th>Total</th>
</tr></thead>
<tr>
<td>avsd</td>
<td>avsd</td>
<td>avsd</td>
<td>avsd</td>
<td>avsd</td>
<td>avsd</td>
</tr>
<tfoot>
	<th colspan="5" align="left" style="padding-left: 3%">SubTotal</th>
	
	<td>11</td>
</tfoot>
</table>';
$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter');

$options = $dompdf->getOptions();
$options->setDefaultFont('Courier');
$dompdf->setOptions($options);
// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Webslesson",array("Attachment"=>0));
?>