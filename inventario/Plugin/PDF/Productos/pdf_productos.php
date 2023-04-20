
<?php 
ob_start();
include '../../../Model/conexion.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Filtro de los Productos</title>
    <img src="../../../img/hospital.png" style="width:20%;" align="left">
    <img src="../../../img/log_1.png" style="width:20%; " align="right">
    <h3><b>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</b></h3>
    <h4><b>DEPARTAMENTO DE MANTENIMIENTO</b></h4>
    <h5><b>FILTRO DE LOS PRODUCTOS</b></h5>
</head>

<style>
    table{font-size: 14px}
    .table, tfoot {width: 100%;border: none;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed;}
    .table thead, tfoot td { background-color: rgba(255, 0, 0, .9);color: white;text-align: center;font-size: 14px}

    .table {width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin-top: 0%;padding: 0;color: black;table-layout: fixed;}
    .table tr {background-color: #f8f8f8;border: 1px solid #ddd;color: black;}
    .table th, .table td {font-size: 12px;padding: 8px;text-align: center;}
    .table thead th{ background-color: #46466b;color: white;text-align: justify;font-size: 14px}
    .table tbody tr:nth-child(even) {background-color: #00BDFF; height: 5%}
    .table tbody tr:nth-child(odd) {background-color: #00EAFF; height: 5%}
    h6{margin: 0;font-size: 14px}

    #t{margin-bottom: 5%;margin-top: 1%;}
    #a{border: 1px solid #ccc;border-collapse: collapse;border-radius: 0.25rem;background: rgb(25 255 255);float: left;width: 33.33%;margin-right: 1%;}

    #b{border: 1px solid #ccc;border-radius: 0.25rem;background: rgb(25 255 255);padding: 3%}
    #c{border: 1px solid #ccc;border-radius: 0.25rem;background: rgb(25 245 245);padding: 3%;}

    h3, h4, h5{font-size: 10px;text-align: center;}
    p{font-size: 11px;}
    h6{margin: 0;font-size: 14px}
    .row {
        margin-right: 0;
        margin-left: 0;
        display: block;
    }

    .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 { position: relative;
        min-height: 1px;
        padding-right: 0;
        padding-left: 0;
    }

    .col-md-1,
    .col-md-2,
    .col-md-3,
    .col-md-4,
    .col-md-5,
    .col-md-6,
    .col-md-7,
    .col-md-8,
    .col-md-9,
    .col-md-10,
    .col-md-11,
    .col-md-12 {
        display: inline-block;

    }

    .col-md-12 {
        width: 100%;
    }

    .col-md-11 {
        width: 91.66666667%;
    }

    .col-md-10 {
        width: 83.33333333%;
    }

    .col-md-9 {
        width: 75%;
    }

    .col-md-8 {
        width: 66.66666667%;
    }

    .col-md-7 {
        width: 58.33333333%;
    }

    .col-md-6 {
        width: 49.5%;
    }

    .col-md-5 {
        width: 41.66666667%;
    }

    .col-md-4 {
        width: 33.33333333%;
    }

    .col-md-3 {
        width: 24.5%;
    }

    .col-md-2 {
        width: 16.66666667%;
    }

    .col-md-1 {
        width: 8.33333333%;
    }
    .col-md-12 .card.card-outline{
        width: 100%;
        display: block;
    }
    div.break-before{
        page-break-before: always;
    }
    .avoid-pg-break-inside{
        page-break-inside: avoid;
    }
    .card {
      position: relative;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 1px solid rgba(0, 0, 0, 0.125);
      border-radius: 0.25rem;
  }
  .card-body {
      -ms-flex: 1 1 auto;
      flex: 1 1 auto;
      padding: .5rem;
  }
</style>

<body>

    <?php 
    $total = "0.00";
    $totalb = "0.00";
    $total2 = "0.00";
    $final = "0.00";
    $final0 = "0.00";
    $final1 = "0.00";
    $final2 = "0.00";
    $final3 = "0.00";
    $final4 = "0.00";
    $final5 = "0.00";
    $final6 = "0.00";
    $final7 = "0.00";
    $final8 = "0.00";
    $final9 = "0.00";
    $final10 = "0.00";
    $final11 = "0.00"; 
    $cod=$_POST['consulta'];
    $sql = "SELECT * FROM tb_productos WHERE codProductos LIKE '%".$cod."%' or descripcion LIKE '%".$cod."%' ";
    $result = mysqli_query($conn, $sql);

    $n=0;
    while ($productos = mysqli_fetch_array($result)){
        $total = $productos['stock'] * $productos['precio'];
        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['stock'];
        $stock=number_format($cant_aprobada, 2,".",",");

        $final2 += $cant_aprobada;
        $final3   =    number_format($final2, 2, ".",",");

        
        
        $final8 += $precio;
        $final9   =    number_format($final8, 2, ".",",");
        $final += $total;
        $total1= number_format($total, 2, ".",",");
        $finalb=number_format($final, 2, ".",","); 
    }?>
    <br> <br><br><br><br>
    <div class="row" align="center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>

                </div>
            </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
                <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">

                <p align="right"><b style="float: left;">SubTotal</b><?php echo $finalb?></p>
            </div>
        </div>
    </div>


</div>
<br>     

<table class="table " >

    <thead style="background-color: #46466b;color: white;">
        <tr>
         <th style="width: 20%;">Código</th>
         <th style="width: 20%;">Catálogo</th>
         <th style="width: 30%;">Descripcion</th>
         <th style="width: 20%;">U/M</th>
         <th style="width: 20%;">Stock</th>
         <th style="width: 20%;">Precio</th>
         <th style="width: 20%;">Fecha</th>
         <th style="width: 20%;">Total</th>
     </tr>

 </thead> 

 <tbody>
    <?php 
    $sql = "SELECT * FROM tb_productos WHERE codProductos LIKE '%".$cod."%' or descripcion LIKE '%".$cod."%'";
    $result = mysqli_query($conn, $sql);

    $n=0;
    while ($solicitudes = mysqli_fetch_array($result)){
        $cods=$solicitudes['codProductos'];
        $precio=$solicitudes['precio'];
        $precio1=number_format($precio, 2,".",",");
        $cantidad=$solicitudes['stock'];
        $unidad=$solicitudes['unidad_medida'];
        $stock=number_format($cantidad, 2,".",",");
        $des=$solicitudes['descripcion'];
        $totalb = $solicitudes['stock'] * $solicitudes['precio'];

        $total2= number_format($totalb, 2, ".",",");
        if ($des=="") {
            $des="Departamentos No disponible";
        }else{

           $des=$solicitudes['descripcion']; 
       }
       ?>  
       <tr>
        <td data-label="Código"><?php echo $cods ?></td>
        <td data-label="Código del Catálogo"><?php echo $solicitudes['catalogo']?></td>
        <td data-label="Descripción"><?php echo $des?></td>
        <td data-label="Unidad de Medida"><?php echo $unidad?></td>
        <td data-label="Cantidad"><?php echo $stock?></td>
        <td data-label="Precio"><?php echo $precio1?></td>
        <td><?php  echo date("d - m - Y",strtotime($solicitudes['fecha_registro'])) ?></td>
        <td><?php  echo $total2?></td>
    </tr>
<?php }  ?> 
</tbody> 
<tfoot >
    <td colspan="4" >TOTALES SUMADOS</td>
    <td><b> <?php echo $final3 ?></b></td>
    <td><b> <?php echo $final9 ?></b></td>
    <td></td>
    <td><b> $<?php echo $finalb ?></b></td>

</tfoot>  
</table>
<br> <br>
<div class="card">
    <div class="card-body">
        
        <table style="width: 100%;" cellspacing="0">
            <thead>
                <tr>
                    <th  width="70%" align="left"><h6>Stock del Mes</h6></th>
                    <th align="left">Stock</th>
                    <th align="left">Precio</th>
                </tr>
            </thead>
        

        <?php $sql="SELECT Mes,SUM(stock),SUM(precio) FROM tb_productos  WHERE codProductos LIKE '%".$cod."%' or descripcion LIKE '%".$cod."%' GROUP BY Mes;";
        $result = mysqli_query($conn, $sql);
        while ($productos = mysqli_fetch_array($result)){
            $mes=$productos['Mes'];
            $cantidad=$productos['SUM(stock)'];
            $stock1=number_format($cantidad, 2,".",",");

            $costs=$productos['SUM(precio)'];
            $precio1=number_format($costs, 2,".",",");
            $final6 += $cantidad;
            $final7   =    number_format($final6, 2, ".",",");

            $final0 += $costs;
            $final1   =    number_format($final0, 2, ".",",");

            if ($mes==1)  { $mes="Enero";}
            if ($mes==2)  { $mes="Febrero";}
            if ($mes==3)  { $mes="Marzo";}
            if ($mes==4)  { $mes="Abril";}
            if ($mes==5)  { $mes="Mayo";}
            if ($mes==6)  { $mes="Junio";}
            if ($mes==7)  { $mes="Junio";}
            if ($mes==8)  { $mes="Agosto";}
            if ($mes==9)  { $mes="Septiembre";}
            if ($mes==10) { $mes="Octubre";}
            if ($mes==11) { $mes="Noviembre";}
            if ($mes==12) { $mes="Diciembre";}
            ?>


    <tbody>

        <tr>
            
        <td align="left"><b><?php echo $mes ?> : </b></b></td>
        <td align="left"><?php echo $stock1 ?></td>
        <td align="left">$ <?php echo $precio1 ?></td>
        </tr>
    </tbody>


        <?php  } ?>
        <tfoot>
            <td style="text-align: left;"><b>Total</b></td>
            <td style="text-align: left;"><?php echo $final7 ?></td>
            <td style="text-align: left;">$ <?php echo $final1 ?></td>
        </tfoot>
  </table>      


    </div>
</div> 
<br>

<div class="card">
    <div class="card-body">
        <table style="width: 100%;" cellspacing="0">
            <thead>
                <tr>
                    <th  width="70%" align="left"><h6>Stock del Año</h6></th>
                    <th align="left">Stock</th>
                    <th align="left">Precio</th>
                </tr>
            </thead>
        <?php $sql="SELECT año,SUM(stock),SUM(precio) FROM tb_productos WHERE codProductos LIKE '%".$cod."%' or descripcion LIKE '%".$cod."%'  GROUP BY año;";
        $result = mysqli_query($conn, $sql);
        while ($productos = mysqli_fetch_array($result)){
            $costs1=$productos['SUM(precio)'];
            $precio1=number_format($costs1, 2,".",",");

            $final10 += $costs1;
            $final11   =    number_format($final10, 2, ".",",");
            $año=$productos['año'];
            $cantidad1=$productos['SUM(stock)'];
            $stock=number_format($cantidad1, 2,".",",");
            $final4 += $cantidad1;
            $final5   =    number_format($final4, 2, ".",",");?>

           
    <tbody>
        <tr>
            
        <td align="left"><b><?php echo $año  ?> : </b></b></td>
        <td align="left"><?php echo $stock?></td>
        <td align="left">$ <?php echo $precio1 ?></td>
        </tr>
    </tbody>


        <?php  } ?>
        <tfoot>
            <td style="text-align: left;"><b>Total</b></td>
            <td style="text-align: left;"><?php echo $final5 ?></td>
            <td style="text-align: left;">$ <?php echo $final11 ?></td>
        </tfoot>
  </table>      

    </div>
</div>   

<br>
<p style="float: right;"> Entrega: ________________</p>
<p style="text-align:left;">Solicita: ________________ </p>
<br>
<p style="text-align: center;">Autoriza: ________________</p>
</body>
</html>
<?php 
$html=ob_get_clean();
// echo $html;
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
$dompdf->stream("PDF Producto.pdf",array("Attachment"=>0));
?>
