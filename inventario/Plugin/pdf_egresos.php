    <?php ob_start();
    include ('../Model/conexion.php') ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reporte de Egreso en PDF</title>
    </head>
    <body style="font-family: sans-serif;">
        <img src="../img/hospital.png" style="width:20%">
        <img src="../img/log_1.png" style="width:20%; float:right">
           <?php if (isset($_POST['vale'])) {?>
        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">EGRESOS DE COMPRAS</h4>
    <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
        <thead>     
            <tr style="border: 1px solid #ddd;color: black;">
        <th style="width: 10%">#</th>
         <th  style="width:15%">Departamento</th>
         <th  style="width:15%">Encargado</th>
         <th  style="width:10%">Codigo</th>
         <th  style="width:100%">Descripción Completa</th>
         <th  style="width:100%">U/M</th>
         <th  style="width:100%">Cantidad</th>
         <th  style="width:100%">Costo Unitario</th>
         <th  style="width:100%">Ingreso Por</th>
         <th  style="width:100%">Fecha Registro</th>
         
       </tr>

     </thead>

     <tbody>
<?php


    $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale ";
$result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
 $precio=$productos['precio'];
       $precio3=number_format($precio, 2,".",",");
    $n++;
        $r=$n+0?>

<tr>
    <td data-label="#"><?php echo $r ?></td>
<td data-label="Departamento">Mantenimiento</td>
<td data-label="Encargado"><?php  echo $productos['usuario']; ?></td>
<td data-label="Código de Producto"><?php  echo $productos['codigo']; ?></td>
<td data-label="Descripción Completa" style="text-align: left"><?php  echo $productos['descripcion']; ?></td>
<td data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
<td data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
<td data-label="Costo Unitario">$<?php  echo $precio3 ?></td>
<td data-label="Fuente de Ingreso">Solicitud de vale</td>
<td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
</tr>

<?php } ?> 

     </tbody>
 </table>
    <?php } if (isset($_POST['bodega'])) {?>

        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
        <h4 align="center" style="margin-top: 2%;">EGRESOS DE BODEGA</h4>

    <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
        <thead>     
            <tr style="border: 1px solid #ddd;color: black;">
         <th style="width: 10%;font-size: 16px;text-align: center;">Departamento</th>
         <th style="width: 10%;font-size: 16px;text-align: center;">Encargado</th>
         <th style="width: 10%;font-size: 16px;text-align: center;">Codigo</th>
         <th style="width: 100%;font-size: 16px;text-align: center;">Descripción Completa</th>
         <th style="width: 10%;font-size: 16px;text-align: center;">U/M</th>
         <th style="width: 10%;font-size: 16px;text-align: center;">Cantidad</th>
         <th style="width: 10%;font-size: 16px;text-align: center;">Costo Unitario</th>
         <th style="width: 10%;font-size: 16px;text-align: center;">Ingreso Por</th>
         <th style="width: 10%;font-size: 16px;text-align: center;">Fecha Registro</th>
         
       </tr>

       
     </thead>

     <tbody>
<?php


   $sql = "SELECT * FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega";
$result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
     $precio=$productos['precio'];
       $precio2=number_format($precio, 2,".",",");
       $n++;
        $r=$n+0?>

<style type="text/css">

#td{
 display: none;
}
th{
width: 100%;
}
</style>
<tr id="tr">
<td data-label="Departamento" style="text-align: left"><?php  echo $productos['departamento']; ?></td>
<td data-label="Encargado" style="text-align: left"><?php  echo $productos['usuario']; ?></td>
<td data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
<td data-label="Descripción" style="text-align: left"><?php  echo $productos['descripcion']; ?></td>
<td data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
<td data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
<td data-label="Costo Unitario">$<?php  echo $precio2 ?></td>
<td data-label="Fuente de Ingreso">Solicitud a Bodega</td>
<td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>



</tr>

<?php } ?> 

     </tbody>
 </table>

<?php } ?>


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
    $dompdf->stream("pdf_vale.php",array("Attachment"=>0));
            ?>