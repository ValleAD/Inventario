<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

       <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">
    <title>Imprimir Bodega</title>
</head>
<body style="font-family: sans-serif;">
    <img src="../../../img/hospital.png" style="width:20%;float: left;">
    <img src="../../../img/log_1.png" style="width:20%; float:right">

<style>
table tr td {padding: 1%}
.table {width: 100%;border-collapse: collapse;margin: 0;table-layout: fixed;}
.table tbody tr {background-color: #f8f8f8;border: 1px solid #ddd;}
.table th, .table td {font-size: 12px;text-align: center;}
.table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px;}


.table tbody tr:nth-child(even) {background-color: #00BDFF; }
.table tbody tr:nth-child(odd) {background-color: #00EAFF; }
p{font-size: 14px}
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
        margin-right: 1%;
        width: 70%;
        border-radius: 0.25rem;
    padding: .5%;
}
#a{
    float: left;
    width: 25%;
    margin-left: 1%;
}
   h3, h4, h5{
    font-size: 12px;
    text-align: center;
    }
    </style>
<h3 ><b>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</b></h3>
<h4 ><b>DEPARTAMENTO DE MANTENIMIENTO</b></h4>
<h5 ><b>SOLICITUD DE MATERIALES DE BODEGA</b></h5>
 
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
     $bodega = $_POST['bodega'];

    $sql = "SELECT * FROM detalle_bodega WHERE odt_bodega='$bodega'";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $solicitudes['stock'] * $solicitudes['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $solicitudes['cantidad_despachada'] * $solicitudes['precio'];
    }

  }
    $sql = "SELECT * FROM tb_bodega WHERE codBodega='$bodega' limit 1";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

$depto=$solicitudes['departamento'];
$estado=$solicitudes['estado'];
$fech=date("d - m - Y",strtotime($solicitudes['fecha_registro']));
$encargado=$solicitudes['usuario'];

      ?>
   <table style="width: 100%;margin: 0;">
    <tr>
        <td><b>Depto. o Servicio:</b> <?php echo $depto ?> </td>
           <td><b>Fecha:</b> <?php echo $fech ?><br></td>
        <td align="right"><b>O. de T.:</b> <?php echo $bodega ?></td>
    </tr>
       <tr>
           <td style="text-align: left;;width:50%;"><b>Encargado:</b> <?php echo $encargado ?></td>
           <td><b>Estado:</b> <?php echo $estado ?></td>

       </tr>
   </table> 

<?php } ?>
        <br> 
<div id="h">
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


    $sql = "SELECT * FROM detalle_bodega WHERE odt_bodega='$bodega'";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

        $codigo=$solicitudes['codigo'];
        $des=$solicitudes['descripcion'];
        $um=$solicitudes['unidad_medida'];
        $cantidad=$solicitudes['cantidad_despachada'];
        $stock=$solicitudes['stock'];
        $cost=$solicitudes['precio'];
        if ($estado="Pendiente") {  
    $total = $solicitudes['stock'] * $solicitudes['precio'];
    }if ($estado="Rechazado") {
        
    $total = $solicitudes['stock'] * $solicitudes['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $solicitudes['cantidad_despachada'] * $solicitudes['precio'];
    }
     $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",","); 

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

</table>
</div>
<div id="a">
    <div id="t">
        <?php $sql = "SELECT * FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE odt_bodega=$bodega";
    $result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }

        $odt= $productos['codBodega'];
        $cod=$productos['codigo'];
        $descripcion=$productos['descripcion'];
        $um=$productos['unidad_medida'];
        $departamento=$productos['departamento'];
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


         ?>
     <?php } ?>
                  <p align="right"><b style="float: left;">Cant Solicitada: </b><?php echo $final3 ?></p>
                  <p align="right"><b style="float: left;">Cant Despachada: </b><?php echo $final5 ?></p>
                  <p align="right"><b style="float: left;">C. Soli. - C. Despa.: </b><?php echo $final7 ?></p>
                  <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p><hr>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
</div>
</div>
<br>
<div id="h">

    <p style="float: right;"> Entrega: ________________</p>
    <p style="text-align:left;">Solicita: ________________  </p>
    <br>
    <p style="text-align: center;">Autoriza: ________________</p>
</div>
</section>

</body>
</html>
<script type="text/javascript">
window.print();
</script>