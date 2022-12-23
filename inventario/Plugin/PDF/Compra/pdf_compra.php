    <?php ob_start();
    include ('../../../Model/conexion.php') ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PDF COMPRA</title>
      <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">  
  
</head>
<body style="font-family: sans-serif;">

    <img src="../../../img/hospital.png" style="width:20%;float: left;">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
    <style>
table tr td {padding: .5%;font-size: 11px}
.table {width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed;}
.table tr {background-color: #f8f8f8;border: 1px solid #ddd;color: black;}
.table th, .table td {font-size: 12px;padding: 8px;text-align: center;}
.table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px}


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

    $vale = $_POST['sol_compra'];
    if ($_POST['jus']=="") {
    $jus = "Sin observacion por el momento";
        
    }else{
    $jus = $_POST['jus'];
      }
?><section style="margin: 2%;">
<h3 ><b>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</b></h3>
<h4 ><b>DEPARTAMENTO DE MANTENIMIENTO</b></h4>
<h5 ><b>SOLICITUD DE MATERIALES DE COMPRA</b></h5>

     <style>

   h3, h4, h5{
    font-size: 10px;
    text-align: center;
    }
  </style>
<br>
 <?php include ('../../../Model/conexion.php');
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

$sql = "SELECT * FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra WHERE solicitud_compra=$vale";
    $result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
$depto=$productos['dependencia'];
$estado=$productos['estado'];
$fech=date("d - m - Y",strtotime($productos['fecha_registro']));
$encargado=$productos['usuario'];
$plazo=$productos['plazo'];
$suministro=$productos['descripcion_solicitud'];
$unidad=$productos['unidad_tecnica'];

        $odt= $productos['nSolicitud'];
        $cod=$productos['codigo'];
        $descripcion=$productos['descripcion'];
        $um=$productos['unidad_medida'];
        $fecha=date("d-m-Y",strtotime($productos['fecha_registro']));
        $usuario= $productos['usuario'];

        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['stock'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

        $final2 += $cant_aprobada;
        $final3   =    number_format($final2, 2, ".",",");

        $final4 += $cantidad_despachada;
        $final5   =    number_format($final4, 2, ".",",");
        
        $final6 += ($cant_aprobada-$cantidad_despachada);
        $final7   =    number_format($final6, 2, ".",",");
        
        $final8 += $precio;
        $final9   =    number_format($final8, 2, ".",",");

     $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",","); 
         ?>
         <table style="width: 100%;margin: 0;">
    <tr>
        <td style=""><b>Solicitud No.:</b> <?php echo $vale ?></td>
        <td ><b>Depenencia Solicitante:</b> <?php echo $depto ?></td>
        <td><b>Plazo y No. de Entregas:</b> <?php echo $plazo ?></td>
        <td align="right"><b>Cant Solicitada: </b> <?php echo $final3 ?></td>
    </tr>
    <tr>
        <td style=""><b>Unidad Técnica:</b> <?php echo $unidad ?></td>
        <td ><b>Suministro Solicitado:</b> <?php echo $suministro ?></td>
        <td ><b>Encargado:</b> <?php echo $usuario ?></td>
        <td align="right"><b>Cant Despachada: </b> <?php echo $final5 ?></td>
    </tr>
    <tr>
        <td style=""><b>Estado:</b> <?php echo $estado ?></td>
        <td ><b>Fecha De Creación: </b> <?php echo $fecha ?></td>
        <td><b>Fecha De Impreción:</b> <?php echo date("d-m-Y")?></td>
        <td align="right"><b>C. Soli. - C. Despa.: </b> <?php echo $final7 ?></td>
    </tr>
<tr>
<td colspan="4" align="right"><b>Costo Unitario: </b> <?php echo $final9 ?></td>
</tr>


   </table>
                  <p align="right"><b>SubTotal: </b> <?php echo $final1?></p>

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
        <tr>
            <td><?php  echo $cod?></td>
            <td><?php  echo $descripcion?></td>
            <td><?php  echo $um?></td>
            <td><?php echo $stock ?></td>
            <td><?php echo $cantidad_desp ?></td>
            <td ><?php echo $precio2 ?></td>
            <td ><?php  echo $total1 ?></td>
        </tr>
     <?php } ?>
    </tbody>  

</table>
<br>
             <div class="form-group" style="position: all;border: 1px solid #ccc;border-collapse: collapse;">
                <p style="padding: 1%;">Observaciones (En qué se ocupará el bien entregado)</p>
                <p style="border-bottom: 1px solid #ccc;border-collapse: collapse;"></p>
                <p style="padding: 1%;"><?php echo $jus ?></p>
            </div>
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