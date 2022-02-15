<?php
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

if(isset($_POST['cod'])){

    $depto = $_POST['depto'];
    $vale = $_POST['vale'];
    $fech = $_POST['fech'];
    $encargado = $_POST['usuario'];
        
    $final = 0;

    for($i = 0; $i < count($_POST['cod']); $i++)
{
   
    $codigo = $_POST['cod'][$i];
    $des = $_POST['desc'][$i];
    $um = $_POST['um'][$i];
    $cantidad = $_POST['cant'][$i];
    $cost = $_POST['cost'][$i];
    $tot = $_POST['tot'][$i];

    $tot_f = $_POST['tot_f'];

$dompdf->loadHtml('

<!DOCTYPE html>
<html>
<meta charset="utf-8">

<body style="font-family: sans-serif;">
    <nav style="position: absolute;">
        <img src="../img/hospital.jpg" alt="">
        <img src="../img/log_1.png" alt="">
    </nav>
    
    <section style="margin: 3%;">
        <!-- encabezado del documento -->   
        <h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
        <p style="float: right; margin-right: 15%; font-size: 12;">VALE No. <b>'.$vale.'</b></p>
        <h3>DEPARTAMENTO DE MANTENIENTO</h3>
        <h4 align="center">SOLICITUD DE MATERIALES</h4>

        <!-- cuerpo del documento -->
        <p>Depto. o Servicio: '.$depto.'</p>
        <p style="float: right; margin-right: 30%;">Fecha: '.$fech.'</p>
        <p>Encargado: '.$encargado.'</p>

        <table style="border: 1px solid; width: 100%;"> 
            <thead>
              <tr id="tr">
                <th>Código</th>
                <th>Descripción</th>
                <th>U/M</th>
                <th>Cantidad</th>
                <th>Costo<br>Unitario</th>
                <th>Total</th>
           </thead>

           <tbody>
               <tr>
                <td>'.$codigo.'</td>
                <td style="width: 275px;">'.$des.'</td>
                <td>'.$um.'</td>
                <td style="text-align: center; margin-right: 2px;">'.$cantidad.'</td>
                <td style="text-align: center;">'.$cost.'</td>
                <td style="text-align: center;">'.$tot.'</td>
               </tr>
               <tr>
               <td colspan="4"></td>
                <td style="text-align: center;">Subtotal</td>
                <td style="text-align: center; font-weight: bold;">$'.$tot_f.'</td>
               </tr>
               
           </tbody>
        </table>
    </section>
</body>
</html>
');
    }
}
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();
