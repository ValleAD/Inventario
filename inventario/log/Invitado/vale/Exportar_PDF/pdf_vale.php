<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Vale</title>
</head>
<body>
    <img src="hospital.jpg" style="width:20%">
    <img src="log_1.png" style="width:20%;float:right">
    <?php if(isset($_POST['cod'])){

    $depto = $_POST['depto'];
    $fech = $_POST['fech'];
    $encargado = $_POST['usuario'];
     $cod_vale = $_POST['id'];
    echo $depto, $fech, $encargado,$id;
      
?>
<table border="1" class="table" id="example" style=" width: 100%;color: black;background-color: blanchedalmond;text-align: center ;">
             
                     <tr id="tr" >
                     <th style=" width: 20%;color:black;">Código</th>
                     <th style=" width: 20%" ;color:black;>Cod. de Catálogo</th>
                     <th style=" width: 100% ;color:black;">Descripción Completa</th>
                     <th style=" width: 100% ;color:black;">U/M</th>
                     <th style=" width: 100% ;color:black;">Cantidad</th>
                     <th style=" width: 100% ;color:black;">Costo Unitario</th>
                     <th style=" width: 100% ;color:black;">Total</th>
                   </tr>
                
                <tbody>
<?php include ('../../../../Model/conexion.php');
    $total = 0;
    $final = 0;
    $sql = "SELECT * FROM detalle_vale";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
              $total = $productos['stock'] * $productos['precio'];
              $final += $total;
?>
     
            
                  
     <style type="text/css">
     
         #td{
             display: none;
         }
        th{
            width: 100%;
        }
     </style>
         <tr id="tr">
           <td data-label="Codigo" style="text-align: center;"><?php  echo $productos['codigo']; ?></td>
           <td  data-label="Codificación de catálogo" style="text-align: center;"><?php  echo $productos['descripcion']; ?></td>
           <td  data-label="Descripción Completa"><?php  echo $productos['descripcion']; ?></td>
           <td  data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
           <td  data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
           <td  data-label="Costo Unitario">$<?php  echo $productos['precio']; ?></td>
           <td  data-label="Fecha Registro"><?php  echo $total ?></td>
         </tr>
     
     <?php } } ?> 
     <tfoot>
         <th>SubTotal
             <td colspan="6" style="float right;text-align: right;padding-right:3%;color:red ;">
                 <?php  echo $final ?>
             </td>
         </th>
     </tfoot>
                </tbody>                
            </table>

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