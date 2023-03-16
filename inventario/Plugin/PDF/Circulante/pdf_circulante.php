  <?php ob_start();
  include ('../../../Model/conexion.php') ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF CIRCULANTE</title>
    <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">  

</head>
<body style="font-family: sans-serif;">

    <style>
        table tr td {padding: 1%;font-size: 11px}
        .table, tfoot {width: 100%;border: none;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed;}
        .table tr {background-color: #f8f8f8;border: 1px solid #ddd;color: black;}
        .table th, .table td {font-size: 12px;padding: 5px;text-align: center;}
        .table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px}
        .table thead, tfoot td { background-color: rgba(255, 0, 0, .9);color: white;text-align: center;font-size: 14px}


        .table tbody tr:nth-child(even) {background-color: #00BDFF; height: 5%}
        .table tbody tr:nth-child(odd) {background-color: #00EAFF; height: 5%}
        p{font-size: 10px}

        hr{
            border: 1px solid #ccc;
        }
        #t{
            border-radius: 0.25rem;
            background: rgb(25 255 255);

            border: 1px solid #ccc;border-collapse: collapse;
            padding: 3%;

        }
        h6{margin: 0;font-size: 14px}
        #h{
            float: right;
            width: 74%;
            border-radius: 0.25rem;
        }
        #a{
            float: left;
            width: 25%;
        }
        #b{
            width: 100%;
            float: right;
        }
    </style>
    <?php 

    $vale = $_GET['num_sol'];
    ?>
    <img src="../../../img/hospital.png" style="width:20%;float: left;">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
    <h3 ><b>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</b></h3>
    <h4 ><b>DEPARTAMENTO DE MANTENIMIENTO</b></h4>
    <h5 ><b>SOLICITUD DE MATERIALES DE CIRCULANTE</b></h5>
    <section style="margin: 2%;">

       <style>

         h3, h4, h5{
            font-size: 10px;
            text-align: center;
        }
    </style>
    <br>
    <?php include ('../../../Model/conexion.php');
    session_start();
    $tipo_usuario = $_SESSION['tipo_usuario'];
    $idusuario = $_SESSION['iduser'];
    $total = "0.00";
    $final = "0.00";
    $final1 = "0.00";
    $final2 = "0.00";
    $final3 = "0.00";
    $final4 = "0.00";
    $final5 = "0.00";
    $final6 = "0.00";
    $final7 = "0.00";
    $final8 = "0.00";
    $final9 = "0.00";
    $sql = "SELECT  * FROM  `tb_circulante` WHERE codCirculante='$vale' limit 1";

    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
        $estado=$productos['estado'];
        $fech=date("d - m - Y",strtotime($productos['fecha_solicitud']));

        $odt= $productos['codCirculante'];

    }
    ?>
    <table style="width: 100%;margin: 0;">
        <tr>
            <td><b>Fecha: </b> <?php echo $fech ?><br></td>
            <td align="right"><b>N° de Circulante.: </b> <?php echo $vale ?></td>
        </tr>
       

   </table> 
   <br>
   <table class="table" style="width: 100%">
    <thead>     
        <tr id="tr">
            <th style="width: 20%;"><p >Código</p></th>
            <th style="width: 50%;"><p >Descripción Completa</p></th>
            <th style="width: 20%;"><p >U/M</p></th>
            <th style="width: 20%;"><p >Cant Soli</p></th>
            <th style="width: 20%;"><p >Cant Despa</p></th>
            <th style="width: 20%;"><p >C/U</p></th>
            <th style="width: 20%;"><p >Total</p></th>
        </tr>
    </thead> 

    <tbody>
        <?php 
        if ($tipo_usuario==1) {
            $sql = "SELECT  codigo,SUM(cantidad_solicitada),SUM(cantidad_despachada),precio,descripcion,unidad_medida  FROM `detalle_circulante` D JOIN `tb_circulante` V ON D.tb_circulante=V.codCirculante WHERE tb_circulante = $vale ";
        }
        $result = mysqli_query($conn, $sql);

        while ($solicitudes = mysqli_fetch_array($result)){

            $codigo=$solicitudes['codigo'];
            $des=$solicitudes['descripcion'];
            $um=$solicitudes['unidad_medida'];
            $cantidad=$solicitudes['SUM(antidad_despachada)'];
            $stock=$solicitudes['SUM(stock)'];
            $cost=$solicitudes['precio'];
            if ($estado="Pendiente") {  
                $total = $solicitudes['SUM(stock)'] * $solicitudes['precio'];
            }if ($estado="Rechazado") {

                $total = $solicitudes['SUM(stock)'] * $solicitudes['precio'];
            }if ($estado=="Aprobado") {

                $total = $solicitudes['SUM(cantidad_despachada)'] * $solicitudes['precio'];
            }
            $final += $total;
            $total1= number_format($total, 2, ".",",");
            $final1=number_format($final, 2, ".",","); 

            $final2 += $stock;
            $final3   =    number_format($final2, 2, ".",",");

            $final4 += $cantidad;
            $final5   =    number_format($final4, 2, ".",",");

            $final6 += ($stock-$cantidad);
            $final7   =    number_format($final6, 2, ".",",");

            $final8 += $cost;
            $final9   =    number_format($final8, 2, ".",",");

            ?>
            <tr>
                <td data-label="Código"><?php  echo $codigo?></td>
                <td data-label="Descripción"><?php  echo $des?></td>
                <td data-label="Unidad De Medida"><?php  echo $um?></td>
                <td data-label="Cantidad"><?php echo $stock ?></td>
                <td data-label="Cantidad Despachada"><?php echo $cantidad ?></td>
                <td data-label="Precio"><?php echo $cost ?></td>
                <td data-label="total"><?php  echo $total1 ?></td>
            </tr>
        <?php } ?>
    </tbody> 
    <tfoot >
        <td colspan="3" >TOTALES SUMADOS</td>
        <td><b> <?php echo $final3 ?></b></td>
        <td><b> <?php echo $final5 ?></b></td>
        <td><b> $<?php echo $final9 ?></b></td>
        <td><b> $<?php echo $final1 ?></b></td>

    </tfoot> 

</table>

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
$dompdf->stream("pdf_vale.pdf",array("Attachment"=>0));
?>