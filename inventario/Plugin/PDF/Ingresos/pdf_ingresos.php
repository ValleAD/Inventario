 <?php
 session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
    window.location ="../../log/signin.php";
    session_destroy();  
    </script>
    die();

    ';
}
$tipo_usuario = $_SESSION['tipo_usuario'];
$idusuario = $_SESSION['iduser'];
?>   <?php ob_start();
include ('../../../Model/conexion.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Ingreso en PDF</title>
    <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">

</head>
<body style="font-family: sans-serif;">
    <img src="../../../img/hospital.png" style="width:20%;float: left;">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
    <style>
        .table, tfoot {width: 100%;border: none;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed;}
        .table thead, tfoot td { background-color: rgba(255, 0, 0, .9);color: white;text-align: center;font-size: 14px}

        .table {width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin-top: 0%;padding: 0;color: black;table-layout: fixed;}
        .table tr {background-color: #f8f8f8;border: 1px solid #ddd;color: black;}
        .table th, .table td {font-size: 12px;padding: 8px;text-align: center;}
        .table thead th{ background-color: #46466b;color: white;text-align: justify;font-size: 14px}
        .table tbody tr:nth-child(even) {background-color: #00BDFF; }
        .table tbody tr:nth-child(odd) {background-color: #00EAFF; }

        table, tfoot {width: 100%;border: none;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed;}
        table thead, tfoot td { background-color: rgba(255, 0, 0, .9);color: white;text-align: center;font-size: 14px}

        table {width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin-top: 0%;padding: 0;color: black;table-layout: fixed;}
        table tr {background-color: #f8f8f8;border: 1px solid #ddd;color: black;}
        table th, table td {font-size: 12px;padding: 8px;text-align: center;}
        table thead th{ text-align: justify;font-size: 14px}
        
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
  <?php
  $total = "0.00";
  $final = "0.00";
  $final1 = "0.00";
  $finalb = "0.00";
  $final0 = "0.00";
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
  $final12 = "0.00";
  $final13 = "0.00";
  $count2 = "0.00";
  $count3 = "0.00";

  if (isset($_POST['compra'])) {?>
    <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
    <h4 align="center" style="margin-top: 2%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
    <h4 align="center" style="margin-top: 2%;">INGRESOS DE COMPRAS</h4>
    <br><br>

    <table class="table"  style=" width: 100%;margin: 0;">

        <thead>
            <tr id="tr">
             <th style="width: 20%;">Departa<br>mento</th>
             <th style="width: 30%;">Encargado</th>
             <th style="width: 20%;">Codigo</th>
             <th style="width: 30%">Descripción Completa</th>
             <th style="width: 20%;">U/M</th>
             <th style="width: 20%;">Cantidad</th>
             <th style="width: 20%;">Costo Unitario</th> 
             <th style="width: 30%;">Fecha Registro</th>

         </tr>

     </thead>

     <tbody>



        <?php 

        $sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,descripcion_solicitud,unidad_medida,idusuario,solicitud_compra,dependencia,usuario,fecha_registro,plazo,Mes,Año,unidad_tecnica FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra  GROUP by codigo";

        $result = mysqli_query($conn, $sql);

        while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {

                $total = $productos['SUM(stock)'] * $productos['precio'];
            }if ($estado=="Aprobado") {

                $total = $productos['SUM(cantidad_despachada)'] * $productos['precio'];
            }
            $final += $total;
            $total1= number_format($total, 2, ".",",");
            $final1=number_format($final, 2, ".",",");

            $cod=$productos['codigo'];
            $precio   =    $productos['precio'];
            $precio3  =    number_format($precio, 2,".",",");  
            $cant_aprobada=$productos['SUM(stock)'];
            $cantidad_despachada=$productos['SUM(cantidad_despachada)'];
            $stock=number_format($cant_aprobada, 2,".",",");
            $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

            $final2 += $cant_aprobada;
            $final3   =    number_format($final2, 2, ".",",");
            $final8 += $precio;
            $final9   =    number_format($final8, 2, ".",",");

            if ($productos['idusuario']==1) {
                $u='Administrador';
            }
            else {
                $u='Cliente';
            }
            ?>

            <tr>
                <td>Manteni<br>miento</td>
                <td><?php  echo $productos['usuario'],"<br> ","(",$u,")"; ?></td>
                <td><?php  echo $productos['codigo']; ?></td>
                <td><?php  echo $productos['descripcion']; ?></td>
                <td><?php  echo $productos['unidad_tecnica']; ?></td>
                <td><?php  echo $stock; ?></td>
                <td><?php  echo $precio3 ?></td>
                <td><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
            </tr>

        <?php } ?> 

    </tbody>
    <tfoot >
      <td colspan="5" >TOTALES SUMADOS</td>
      <td><b> <?php echo $final3 ?></b></td>
      <td><b> $<?php echo $final9 ?></b></td>
      <td></td>

  </tfoot>
</table>
<br><div class="card">
    <div class="card-body">
      <table style="width: 100%;" cellspacing="0" >
        <thead>
            <tr>
                <th  width="30%" style="text-align: left;">Stock del Mes</th>
                <th style="text-align: left;" >Existencias</th>
                <th style="text-align: left;" >Codigo</th>
                <th style="text-align: left;">Stock</th>
                <th style="text-align: left;">Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($tipo_usuario==1) {
                $sql="SELECT fecha_registro, Count(codigo),codigo,Mes,SUM(stock),SUM(precio) FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra GROUP by Mes,codigo;";
            }if ($tipo_usuario==2) {
                $sql="SELECT fecha_registro, Count(codigo),codigo,Mes,SUM(stock),SUM(precio),idusuario FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra WHERE idusuario='$idusuario' GROUP by Mes,codigo;";
            }
            $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                $dia=date("d",strtotime($productos['fecha_registro']));
                $mes=date("m",strtotime($productos['fecha_registro']));
                $año=date("Y",strtotime($productos['fecha_registro']));
                $cod=$productos['codigo'];
                $cantidad=$productos['SUM(stock)'];
                $stock1=number_format($cantidad, 2,".",",");
                $costs=$productos['SUM(precio)'];
                $precio1=number_format($costs, 2,".",",");
                $final6 += $cantidad;
                $final7   =    number_format($final6, 2, ".",",");

                $final0 += $costs;
                $count=$productos['Count(codigo)'];
                $count2 += $count;
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

                <tr>

                    <td style="text-align: left;"><b><?php echo $dia." de ".$mes." del ".$año ?> </b></b></td>
                    <td style="text-align: left;"><?php echo $count ?></td>
                    <td style="text-align: left;"><?php echo $cod ?></td>
                    <td style="text-align: left;"><?php echo $stock1 ?></td>
                    <td style="text-align: left;">$ <?php echo $precio1 ?></td>
                </tr>


            <?php  } ?>
        </tbody>
        <tfoot>
            <td style="text-align: left;"><b>Total</b></td>
            <td style="text-align: left;"><?php echo $count2 ?></td>
            <td></td>
            <td style="text-align: left;"><?php echo $final7 ?></td>
            <td style="text-align: left;">$ <?php echo $final1 ?></td>
        </tfoot>
    </table>
</div>
</div>
<br>
<div class="card">
    <div class="card-body">
       <table style="width: 100%;" cellspacing="0" >
        <thead>
            <tr>
                <th  width="30%" style="text-align: left;">Stock del Año</th>
                <th style="text-align: left;" >Existencias</th>
                <th style="text-align: left;" >Codigo</th>
                <th style="text-align: left;">Stock</th>
                <th style="text-align: left;">Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($tipo_usuario==1) {

               $sql="SELECT fecha_registro, Count(codigo),codigo,Año,SUM(stock),SUM(precio) FROM `detalle_compra` D JOIN `tb_compra` V ON D.solicitud_compra=V.nSolicitud GROUP by Año,codigo;";
           } if ($tipo_usuario==2) {
               $sql="SELECT fecha_registro, Count(codigo),codigo,Año,SUM(stock),SUM(precio),idusuario FROM `detalle_compra` D JOIN `tb_compra` V ON D.solicitud_compra=V.nSolicitud WHERE idusuario='$idusuario' GROUP by Año,codigo;";
           }
           $result = mysqli_query($conn, $sql);
           while ($productos = mysqli_fetch_array($result)){
             $costs1=$productos['SUM(precio)'];
             $precio1=number_format($costs1, 2,".",",");
             $codigo=$productos['codigo'];
             $count=$productos['Count(codigo)'];
             $count3 += $count;
             $final10 += $costs1;
             $final11   =    number_format($final10, 2, ".",",");
             $año=$productos['Año'];
             $cantidad1=$productos['SUM(stock)'];
             $stock=number_format($cantidad1, 2,".",",");
             $final12 += $cantidad1;
             $final13   =    number_format($final12, 2, ".",",");?>

             <tr>

                <td style="text-align: left;"><b><?php echo $año  ?> : </b></b></td>
                <td style="text-align: left;"><?php echo $count ?></td>
                <td style="text-align: left;"><?php echo $codigo ?></td>
                <td style="text-align: left;"><?php echo $stock?></td>
                <td style="text-align: left;">$ <?php echo $precio1 ?></td>
            </tr>


        <?php  } ?>
    </tbody>
    <tfoot>
        <td style="text-align: left;"><b>Total</b></td>
        <td style="text-align: left;"><?php echo $count3 ?></td>
        <td></td>
        <td style="text-align: left;"><?php echo $final13 ?></td>
        <td style="text-align: left;">$ <?php echo $final11 ?></td>
    </tfoot>
</table>
</div>
</div>

</div>
</div>

<?php } if (isset($_POST['almacen'])) {?>
    <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
    <h3><b>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</b></h3>
    <h4 align="center" style="margin-top: 2%;">INGRESOS DE ALMACEN</h4>
    <br><br>
    <table class="table"  style=" width: 100%;margin: 0;">

        <thead>
            <tr id="tr">

             <th style="width: 20%;">Codigo</th>
             <th style="width: 20%;">Departa <br> mento</th>
             <th style="width: 30%;">Encargado</th>
             <th style="width: 40%;">Descripción Completa</th>
             <th style="width: 20%;">U/M</th>
             <th style="width: 20%;">Canti <br> dad</th>
             <th style="width: 20%;">Costo <br> unitario</th>
             <th style="width: 30%;">Fecha </th>

         </tr>


     </thead>

     <tbody>
        <?php
        $sql = "SELECT codigo,SUM(cantidad_solicitada),SUM(cantidad_despachada),precio,nombre,unidad_medida,idusuario,tb_almacen,departamento,encargado,fecha_solicitud,estado FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen GROUP by codigo" ;



        $result = mysqli_query($conn, $sql);

        while ($productos = mysqli_fetch_array($result)){

           $estado=$productos['estado'];
           if ($estado="Pendiente") {

            $total = $productos['SUM(cantidad_solicitada)'] * $productos['precio'];
        }if ($estado=="Aprobado") {

            $total = $productos['SUM(cantidad_despachada)'] * $productos['precio'];
        }
        $final += $total;
        $total1= number_format($total, 2, ".",",");
        $final1=number_format($final, 2, ".",",");     
        $precio   =    $productos['precio'];
        $precio3  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(cantidad_solicitada)'];
        $cantidad_despachada=$productos['SUM(cantidad_despachada)'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

        $final2 += $cant_aprobada;
        $final3   =    number_format($final2, 2, ".",",");
        $final8 += $precio;
        $final9   =    number_format($final8, 2, ".",",");

        ?>

        <tr id="tr">
            <td><?php  echo $productos['codigo']; ?></td>
            <td>Manteni <br>miento</td>
            <td><?php  echo $productos['encargado']; ?></td>
            <td><?php  echo $productos['nombre']; ?></td>
            <td><?php  echo $productos['unidad_medida']; ?></td>
            <td><?php  echo $productos['SUM(cantidad_solicitada)']; ?></td>
            <td><?php  echo $precio3 ?></td>
            <td><?php  echo date("d-m-Y",strtotime($productos['fecha_solicitud'])); ?></td>

        </tr>

    <?php } ?> 

</tbody>
<tfoot >
  <td colspan="5" >TOTALES SUMADOS</td>
  <td><b> <?php echo $final3 ?></b></td>
  <td><b> $<?php echo $final9 ?></b></td>
  <td></td>

</tfoot>
</table>
<br> 
<div class="card">
    <div class="card-body">         
        <table style="width: 100%;" cellspacing="0" >
            <thead>
                <tr>
                    <th  width="30%" style="text-align: left;">Stock del Mes</th>
                    <th style="text-align: left;" >Existencias</th>
                    <th style="text-align: left;" >Codigo</th>
                    <th style="text-align: left;">Stock</th>
                    <th style="text-align: left;">Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($tipo_usuario==1) {
                    $sql="SELECT fecha_solicitud, Count(codigo),codigo,Mes,SUM(cantidad_solicitada),SUM(precio) FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen  GROUP by Mes,codigo;";
                }if ($tipo_usuario==2) {
                    $sql="SELECT fecha_solicitud, Count(codigo),codigo,Mes,SUM(cantidad_solicitada),SUM(precio),idusuario FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen  WHERE idusuario='$idusuario' GROUP by Mes,codigo;";
                }
                $result = mysqli_query($conn, $sql);
                while ($productos = mysqli_fetch_array($result)){
                    $dia=date("d",strtotime($productos['fecha_solicitud']));
                    $mes=date("m",strtotime($productos['fecha_solicitud']));
                    $año=date("Y",strtotime($productos['fecha_solicitud']));
                    $cod=$productos['codigo'];
                    $cantidad=$productos['SUM(cantidad_solicitada)'];
                    $stock1=number_format($cantidad, 2,".",",");
                    $costs=$productos['SUM(precio)'];
                    $precio1=number_format($costs, 2,".",",");
                    $final6 += $cantidad;
                    $final7   =    number_format($final6, 2, ".",",");

                    $final0 += $costs;
                    $count=$productos['Count(codigo)'];
                    $count2 += $count;
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

                    <tr>

                        <td style="text-align: left;"><b><?php echo $dia." de ".$mes." del ".$año ?> </b></b></td>
                        <td style="text-align: left;"><?php echo $count ?></td>
                        <td style="text-align: left;"><?php echo $cod ?></td>
                        <td style="text-align: left;"><?php echo $stock1 ?></td>
                        <td style="text-align: left;">$ <?php echo $precio1 ?></td>
                    </tr>


                <?php  } ?>
            </tbody>
            <tfoot>
                <td style="text-align: left;"><b>Total</b></td>
                <td style="text-align: left;"><?php echo $count2 ?></td>
                <td></td>
                <td style="text-align: left;"><?php echo $final7 ?></td>
                <td style="text-align: left;">$ <?php echo $final1 ?></td>
            </tfoot>
        </table>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
      <table style="width: 100%;" cellspacing="0" >
        <thead>
            <tr>
                <th  width="30%" style="text-align: left;">Stock del Año</th>
                <th style="text-align: left;" >Existencias</th>
                <th style="text-align: left;" >Codigo</th>
                <th style="text-align: left;">Stock</th>
                <th style="text-align: left;">Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($tipo_usuario==1) {

                $sql="SELECT fecha_solicitud, Count(codigo),codigo,Año,SUM(cantidad_solicitada),SUM(precio) FROM `detalle_almacen` D JOIN `tb_almacen` V ON D.tb_almacen=V.codAlmacen GROUP by Año,codigo;";
            } if ($tipo_usuario==2) {
                $sql="SELECT fecha_solicitud, Count(codigo),codigo,Año,SUM(cantidad_solicitada),SUM(precio),idusuario FROM `detalle_almacen` D JOIN `tb_almacen` V ON D.tb_almacen=V.codAlmacen WHERE idusuario='$idusuario' GROUP by Año,codigo;";
            }
            $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
               $costs1=$productos['SUM(precio)'];
               $precio1=number_format($costs1, 2,".",",");
               $codigo=$productos['codigo'];
               $count=$productos['Count(codigo)'];
               $count3 += $count;
               $final10 += $costs1;
               $final11   =    number_format($final10, 2, ".",",");
               $año=$productos['Año'];
               $cantidad1=$productos['SUM(cantidad_solicitada)'];
               $stock=number_format($cantidad1, 2,".",",");
               $final12 += $cantidad1;
               $final13   =    number_format($final12, 2, ".",",");?>

               <tr>

                <td style="text-align: left;"><b><?php echo $año  ?> : </b></b></td>
                <td style="text-align: left;"><?php echo $count ?></td>
                <td style="text-align: left;"><?php echo $codigo ?></td>
                <td style="text-align: left;"><?php echo $stock?></td>
                <td style="text-align: left;">$ <?php echo $precio1 ?></td>
            </tr>


        <?php  } ?>
    </tbody>
    <tfoot>
        <td style="text-align: left;"><b>Total</b></td>
        <td style="text-align: left;"><?php echo $count3 ?></td>
        <td></td>
        <td style="text-align: left;"><?php echo $final13 ?></td>
        <td style="text-align: left;">$ <?php echo $final11 ?></td>
    </tfoot>
</table> 
</div>
</div>

</div>
</div>
<?php } if (isset($_POST['circulante'])) {?>

    <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD HOSPITAL NACIONAL SANTA TERESA</h3>
    <h4 align="center" style="margin-top: 2%;">INGRESOS DE CIRCULANTE</h4>

    <br> <br>

    <table class="table"  style=" width: 100%;margin: 0;">

        <thead>
            <tr id="tr">

                <th>Código</th>
                <th style="width: 30%">Descripción Completa</th>
                <th>U/M</th>
                <th>Cantidad Solicitada</th>
                <th>Costo Unitario</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>

            <?php 

            $sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,idusuario,tb_circulante,fecha_solicitud,estado FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante   GROUP by codigo";

            $result = mysqli_query($conn, $sql);

            while ($productos = mysqli_fetch_array($result)){
                $estado=$productos['estado'];
                if ($estado="Pendiente") {

                    $total = $productos['SUM(stock)'] * $productos['precio'];
                }if ($estado=="Aprobado") {

                    $total = $productos['SUM(cantidad_despachada)'] * $productos['precio'];
                }
                $final += $total;
                $total1= number_format($total, 2, ".",",");
                $final1=number_format($final, 2, ".",",");
                $precio   =    $productos['precio'];
                $precio3  =    number_format($precio, 2,".",",");  
                $cant_aprobada=$productos['SUM(stock)'];
                $cantidad_despachada=$productos['SUM(cantidad_despachada)'];
                $stock=number_format($cant_aprobada, 2,".",",");
                $cantidad_desp=number_format($cantidad_despachada, 2,".",",");
                $final2 += $cant_aprobada;
                $final3   =    number_format($final2, 2, ".",",");
                $final8 += $precio;
                $final9   =    number_format($final8, 2, ".",",");
                ?>


                <tr style="border: 1px solid #ccc;border-collapse: collapse;">


                  <td><?php  echo $productos['codigo']; ?></td>
                  <td><?php  echo $productos['descripcion']; ?></td>
                  <td><?php  echo $productos['unidad_medida']; ?></td>
                  <td><?php  echo $productos['SUM(stock)']; ?></td>
                  <td><?php  echo $precio3 ?></td>
                  <td><?php  echo date("d-m-Y",strtotime($productos['fecha_solicitud'])); ?></td>

              </tr>
          <?php } ?>
      </tbody>
      <tfoot >
          <td colspan="3" >TOTALES SUMADOS</td>
          <td><b> <?php echo $final3 ?></b></td>
          <td><b> $<?php echo $final9 ?></b></td>
          <td></td>

      </tfoot>
  </table> 
  <br>
  <div class="card">
    <div class="card-body">
        <table style="width: 100%;" cellspacing="0" >
            <thead>
                <tr>
                    <th  width="30%" style="text-align: left;">Stock del Mes</th>
                    <th style="text-align: left;" >Existencias</th>
                    <th style="text-align: left;" >Codigo</th>
                    <th style="text-align: left;">Stock</th>
                    <th style="text-align: left;">Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php 

                if ($tipo_usuario==1) {
                    $sql="SELECT fecha_solicitud, Count(codigo),codigo,Mes,SUM(stock),SUM(precio) FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante GROUP by Mes,codigo;";
                }if ($tipo_usuario==2) {
                    $sql="SELECT fecha_solicitud, Count(codigo),codigo,Mes,SUM(stock),SUM(precio),idusuario FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante WHERE idusuario='$idusuario' GROUP by Mes,codigo;";
                }
                $result = mysqli_query($conn, $sql);
                while ($productos = mysqli_fetch_array($result)){
                    $dia=date("d",strtotime($productos['fecha_solicitud']));
                    $mes=date("m",strtotime($productos['fecha_solicitud']));
                    $año=date("Y",strtotime($productos['fecha_solicitud']));
                    $cod=$productos['codigo'];
                    $cantidad=$productos['SUM(stock)'];
                    $stock1=number_format($cantidad, 2,".",",");
                    $costs=$productos['SUM(precio)'];
                    $precio1=number_format($costs, 2,".",",");
                    $final6 += $cantidad;
                    $final7   =    number_format($final6, 2, ".",",");

                    $final0 += $costs;
                    $count=$productos['Count(codigo)'];
                    $count2 += $count;
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

                    <tr>

                        <td style="text-align: left;"><b><?php echo $dia." de ".$mes." del ".$año ?> </b></b></td>
                        <td style="text-align: left;"><?php echo $count ?></td>
                        <td style="text-align: left;"><?php echo $cod ?></td>
                        <td style="text-align: left;"><?php echo $stock1 ?></td>
                        <td style="text-align: left;">$ <?php echo $precio1 ?></td>
                    </tr>


                <?php  } ?>
            </tbody>
            <tfoot>
                <td style="text-align: left;"><b>Total</b></td>
                <td style="text-align: left;"><?php echo $count2 ?></td>
                <td></td>
                <td style="text-align: left;"><?php echo $final7 ?></td>
                <td style="text-align: left;">$ <?php echo $final1 ?></td>
            </tfoot>
        </table>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
      <table style="width: 100%;" cellspacing="0" >
        <thead>
            <tr>
                <th  width="30%" style="text-align: left;">Stock del Año</th>
                <th style="text-align: left;" >Existencias</th>
                <th style="text-align: left;" >Codigo</th>
                <th style="text-align: left;">Stock</th>
                <th style="text-align: left;">Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($tipo_usuario==1) {

                $sql="SELECT fecha_solicitud, Count(codigo),codigo,Año,SUM(stock),SUM(precio) FROM `detalle_circulante` D JOIN `tb_circulante` V ON D.tb_circulante=V.codCirculante GROUP by Año,codigo;";
            } if ($tipo_usuario==2) {
             $sql="SELECT fecha_solicitud, Count(codigo),codigo,Año,SUM(stock),SUM(precio),idusuario FROM `detalle_circulante` D JOIN `tb_circulante` V ON D.tb_circulante=V.codCirculante WHERE idusuario='$idusuario' GROUP by Año,codigo;";
         }
         $result = mysqli_query($conn, $sql);
         while ($productos = mysqli_fetch_array($result)){
           $costs1=$productos['SUM(precio)'];
           $precio1=number_format($costs1, 2,".",",");
           $codigo=$productos['codigo'];
           $count=$productos['Count(codigo)'];
           $count3 += $count;
           $final10 += $costs1;
           $final11   =    number_format($final10, 2, ".",",");
           $año=$productos['Año'];
           $cantidad1=$productos['SUM(stock)'];
           $stock=number_format($cantidad1, 2,".",",");
           $final12 += $cantidad1;
           $final13   =    number_format($final12, 2, ".",",");?>

           <tr>

            <td style="text-align: left;"><b><?php echo $año  ?> : </b></b></td>
            <td style="text-align: left;"><?php echo $count ?></td>
            <td style="text-align: left;"><?php echo $codigo ?></td>
            <td style="text-align: left;"><?php echo $stock?></td>
            <td style="text-align: left;">$ <?php echo $precio1 ?></td>
        </tr>


    <?php  } ?>
</tbody>
<tfoot>
    <td style="text-align: left;"><b>Total</b></td>
    <td style="text-align: left;"><?php echo $count3 ?></td>
    <td></td>
    <td style="text-align: left;"><?php echo $final13 ?></td>
    <td style="text-align: left;">$ <?php echo $final11 ?></td>
</tfoot>
</table> 

</div>
</div>

<?php }  ?>
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