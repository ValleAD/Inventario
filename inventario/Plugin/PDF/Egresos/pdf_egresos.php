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
        <title>Reporte de Egreso en PDF</title>
       <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">
        
    </head>

    <body style="font-family: sans-serif;">
        <img src="../../../img/hospital.png" style="width:20%; float: left;">
        <img src="../../../img/log_1.png" style="width:20%; float:right">
<style>
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
p{font-size: 10px;}
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
$final2 = "0.00";
$final3 = "0.00";
$final4 = "0.00";
$final5 = "0.00";
$final6 = "0.00";
$final7 = "0.00";
$final8 = "0.00";
$final9 = "0.00";
$idusuario = $_SESSION['iduser'];
 if (isset($_POST['vale'])) {?>
        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
<h4 align="center" style="margin-top: 2%;">EGRESOS DE VALE</h4>
   <?php
if ($tipo_usuario==1) {
    $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale ";
 }
 if ($tipo_usuario==2) {
$sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE V.idusuario='$idusuario' ";
 }
    $result = mysqli_query($conn, $sql);;
    while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
        $final += $total;
        $total1= number_format($total, 2, ".",",");
        $final1=number_format($final, 2, ".",",");
        $vale= $productos['codVale'];
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

         if ($productos['idusuario']==1) {
        $u='Admin';
        }
        else {
            $u='Cliente';
        }if ($productos['idusuario']==0) {
            $u='Invitado';
        }
        ?> 
        <?php } ?> 
        <br> <br>
       <div class="row" >
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Soli.: </b><?php echo $final3 ?></p>
        </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Despa: </b><?php echo $final5 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Soli. - Cant. Despa.: </b><?php echo $final7 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
    </div>
</div>
</div>
</div>

<br>         
            <table class="table">

    <thead>
        <tr>
                
                <th style="width: 30%;"><p>No. <br>Vale</p></th>
                <th style="width: 30%;"><p>Codigo</p></th>
                <th style="width: 30%;"><p>Departa <br>mento</p></th>
                <th style="width: 30%;"><p>Encar <br>gado</p></th>
                <th style="width: 50%;"><p>Descripción Completa</p></th>
                <th style="width: 20%;"><p>U/M</p></th>
                <th style="width: 20%;"><p>Cant Soli</p></th>
                <th style="width: 20%;"><p>Cant Desp</p></th>
                <th style="width: 20%;"><p>Precio</p></th>
                <th style="width: 40%;"><p>Fecha</p></th>
         
       </tr>

     </thead>

     <tbody>
<?php
if ($tipo_usuario==1) {
    $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale ";
 }
 if ($tipo_usuario==2) {
$sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE V.idusuario='$idusuario' ";
 }
    $result = mysqli_query($conn, $sql);;
    while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
        $final += $total;
        $total1= number_format($total, 2, ".",",");
        $final1=number_format($final, 2, ".",",");
        $vale= $productos['codVale'];
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



         if ($productos['idusuario']==1) {
        $u='Admin';
        }
        else {
            $u='Cliente';
        }if ($productos['idusuario']==0) {
            $u='Invitado';
        }
        ?>

       
            

     <tr>
    <td data-label="No. Vale"><?php  echo $productos['numero_vale']; ?></td> 
    <td data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
    <td data-label="Departamento" ><?php  echo $productos['departamento']; ?></td>
    <td data-label="Encargado" class="delete"><?php  echo $productos['usuario'],"<br> ","(",$u,")"; ?></td>
    <td style="width: 80%;min-width: 100%;" data-label="Descripción Completa" style="text-align: left;"><?php  echo $productos['descripcion']; ?></td>
    <td data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
    <td data-label="Cantidad"><?php  echo $stock ?></td>
    <td data-label="Cantidad"><?php  echo $cantidad_desp ?></td>
    <td data-label="Costo Unitario"><?php  echo $precio2 ?></td>
    <td data-label="No. Vale"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
 </tr>
<?php } ?>      
            </tbody>
        </table>
                 <br> 
          <div class="card">
            <div class="card-body">         
        <h6>Stock Por Mes</h6>
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(stock) FROM tb_vale db JOIN detalle_vale b ON db.CodVale = b.numero_vale   GROUP by Mes;";
        }if ($tipo_usuario==2) {
        $sql="SELECT Mes,SUM(stock),idusuario FROM tb_vale db JOIN detalle_vale b ON db.CodVale = b.numero_vale WHERE idusuario='$idusuario' GROUP by Mes;";
        }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final6 += $cantidad;
        $final7   =    number_format($final6, 2, ".",",");
        $mes=$productos['Mes'];
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
               <p align="right"><b style="float: left;"><?php echo $mes ?>: </b><?php echo $stock ?></p>
   <?php  } ?>
         <p style="border-bottom: 1px solid #ccc;"></p>
    <p align="right"><b style="float: left;">Total </b><?php echo $final7 ?></p>
</div>
</div>
 <br>
<div class="card">
    <div class="card-body">
   <h6> Stock Por Año</h6>
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(stock) FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale   GROUP by Año;";
     } if ($tipo_usuario==2) {
     $sql="SELECT Año,SUM(stock),idusuario FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE idusuario='$idusuario' GROUP by Año;";
     }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['Año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final4 += $cantidad;
        $final5   =    number_format($final4, 2, ".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
               <p style="border-bottom: 1px solid #ccc;"></p>
               <p align="right"><b style="float: left;">Total </b><?php echo $final5 ?></p>
</div>
</div>

    <?php }  if (isset($_POST['vale1'])) {?>
        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
<h4 align="center" style="margin-top: 2%;">EGRESOS DE VALE</h4>
   <?php
if ($tipo_usuario==1) {
    $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale ";
 }
 if ($tipo_usuario==2) {
$sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE V.idusuario='$idusuario' ";
 }
    $result = mysqli_query($conn, $sql);;
    while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
        $final += $total;
        $total1= number_format($total, 2, ".",",");
        $final1=number_format($final, 2, ".",",");
        $vale= $productos['codVale'];
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

         if ($productos['idusuario']==1) {
        $u='Admin';
        }
        else {
            $u='Cliente';
        }if ($productos['idusuario']==0) {
            $u='Invitado';
        }
        ?> 
        <?php } ?> 
        <br> <br>
       <div class="row" >
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Soli.: </b><?php echo $final3 ?></p>
        </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Despa: </b><?php echo $final5 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Soli. - Cant. Despa.: </b><?php echo $final7 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
    </div>
</div>
</div>
</div>

<br>         
            <table class="table">

    <thead>
        <tr>
                
                <th style="width: 30%;"><p>No. <br>Vale</p></th>
                <th style="width: 30%;"><p>Codigo</p></th>
                <th style="width: 30%;"><p>Departa <br>mento</p></th>
                <th style="width: 30%;"><p>Encar <br>gado</p></th>
                <th style="width: 50%;"><p>Descripción Completa</p></th>
                <th style="width: 20%;"><p>U/M</p></th>
                <th style="width: 20%;"><p>Cant Soli</p></th>
                <th style="width: 20%;"><p>Cant Desp</p></th>
                <th style="width: 20%;"><p>Precio</p></th>
                <th style="width: 40%;"><p>Fecha</p></th>
         
       </tr>

     </thead>

     <tbody>
<?php
if ($tipo_usuario==1) {
    $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale ";
 }
 if ($tipo_usuario==2) {
$sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE V.idusuario='$idusuario' ";
 }
    $result = mysqli_query($conn, $sql);;
    while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
        $final += $total;
        $total1= number_format($total, 2, ".",",");
        $final1=number_format($final, 2, ".",",");
        $vale= $productos['codVale'];
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



         if ($productos['idusuario']==1) {
        $u='Admin';
        }
        else {
            $u='Cliente';
        }if ($productos['idusuario']==0) {
            $u='Invitado';
        }
        ?>

       
            

     <tr>
    <td data-label="No. Vale"><?php  echo $productos['numero_vale']; ?></td> 
    <td data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
    <td data-label="Departamento" ><?php  echo $productos['departamento']; ?></td>
    <td data-label="Encargado" class="delete"><?php  echo $productos['usuario'],"<br> ","(",$u,")"; ?></td>
    <td style="width: 80%;min-width: 100%;" data-label="Descripción Completa" style="text-align: left;"><?php  echo $productos['descripcion']; ?></td>
    <td data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
    <td data-label="Cantidad"><?php  echo $stock ?></td>
    <td data-label="Cantidad"><?php  echo $cantidad_desp ?></td>
    <td data-label="Costo Unitario"><?php  echo $precio2 ?></td>
    <td data-label="No. Vale"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
 </tr>
<?php } ?>      
            </tbody>
        </table>
                 <br> 
          <div class="card">
            <div class="card-body">         
        <h6>Stock Por Mes</h6>
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(stock) FROM tb_vale db JOIN detalle_vale b ON db.CodVale = b.numero_vale   GROUP by Mes;";
        }if ($tipo_usuario==2) {
        $sql="SELECT Mes,SUM(stock),idusuario FROM tb_vale db JOIN detalle_vale b ON db.CodVale = b.numero_vale WHERE idusuario='$idusuario' GROUP by Mes;";
        }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final6 += $cantidad;
        $final7   =    number_format($final6, 2, ".",",");
        $mes=$productos['Mes'];
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
               <p align="right"><b style="float: left;"><?php echo $mes ?>: </b><?php echo $stock ?></p>
   <?php  } ?>
         <p style="border-bottom: 1px solid #ccc;"></p>
    <p align="right"><b style="float: left;">Total </b><?php echo $final7 ?></p>
</div>
</div>
 <br>
<div class="card">
    <div class="card-body">
   <h6> Stock Por Año</h6>
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(stock) FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale   GROUP by Año;";
     } if ($tipo_usuario==2) {
     $sql="SELECT Año,SUM(stock),idusuario FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE idusuario='$idusuario' GROUP by Año;";
     }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['Año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final4 += $cantidad;
        $final5   =    number_format($final4, 2, ".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
               <p style="border-bottom: 1px solid #ccc;"></p>
               <p align="right"><b style="float: left;">Total </b><?php echo $final5 ?></p>
</div>
</div>

    <?php } if (isset($_POST['bodega'])) { ?>

        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD HOSPITAL NACIONAL SANTA TERESA</h3>
<h3 align="center" style="margin-top: 2%;"></h3>
        <h4 align="center" style="margin-top: 2%;">EGRESOS DE BODEGA</h4>  
<?php $sql = "SELECT * FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega";
    $result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
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

         if ($productos['idusuario']==1) {
        $u='Admin';
        }
        else {
            $u='Cliente';
        }if ($productos['idusuario']==0) {
            $u='Invitado';
        }
         ?>
     <?php } ?>
        <br> <br>
       <div class="row" >
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Soli.: </b><?php echo $final3 ?></p>
        </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Despa: </b><?php echo $final5 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Soli. - Cant. Despa.: </b><?php echo $final7 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
    </div>
</div>
</div>
</div>
          <br>          

   <table class="table" >

    <thead>

        <tr>
                <th style="width: 50%;"><p id="p">O. de T. No.</p></th>
                <th style="width: 50%;"><p id="p">Codigo</p></th>
                <th style="width: 50%;"><p id="p">Departamento</p></th>
                <th style="width: 50%;"><p id="p">Encargado</p></th>
                <th style="width: 50%;"><p id="p">Descripción </p></th>
                <th style="width: 30%;"><p id="p">U/M</p></th>
                <th style="width: 40%;"><p id="p">Cantidad Soli</p></th>
                <th style="width: 40%;"><p id="p">Cantidad Despa</p></th>
                <th style="width: 30%;"><p id="p">Precio</p></th>
                <th style="width: 50%;"><p id="p">Fecha</p></th>
         
       </tr>

       
     </thead>

     <tbody>

        <?php


$sql = "SELECT * FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega";
    $result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
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


         if ($productos['idusuario']==1) {
        $u='Admin';
        }
        else {
            $u='Cliente';
        }if ($productos['idusuario']==0) {
            $u='Invitado';
        }
        ?> 
 <tr>

    <td data-label="O. de T. No."><?php echo $odt ?></td>
    <td data-label="Codigo"><?php  echo $cod ?></td>
    <td data-label="Departamento" ><?php  echo $departamento ?></td>
    <td data-label="Encargado" class="delete"><?php  echo $usuario; ?><br>(<?php echo $u ?>)</td>
    <td data-label="Descripción Completa" ><?php  echo $descripcion ?></td>
    <td data-label="Unidad De Medida"><?php  echo $um; ?></td>
    <td data-label="Cantidad"><?php  echo $stock ?></td>
    <td data-label="Cantidad"><?php  echo $cantidad_desp?></td>
    <td data-label="Costo Unitario"><?php  echo $precio2 ?></td>
    <td data-label="Fecha Registro"><?php  echo $fecha; ?></td>


</tr>

<?php } ?> 

     </tbody>
 </table>
           <br> 
          <div class="card">
            <div class="card-body">         
        <h6>Stock Por Mes</h6>
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(stock) FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega   GROUP by Mes;";
        }if ($tipo_usuario==2) {
        $sql="SELECT Mes,SUM(stock),idusuario FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE idusuario='$idusuario' GROUP by Mes;";
        }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final6 += $cantidad;
        $final7   =    number_format($final6, 2, ".",",");
        $mes=$productos['Mes'];
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
               <p align="right"><b style="float: left;"><?php echo $mes ?>: </b><?php echo $stock ?></p>
   <?php  } ?>
         <p style="border-bottom: 1px solid #ccc;"></p>
    <p align="right"><b style="float: left;">Total </b><?php echo $final7 ?></p>
</div>
</div>
 <br>
<div class="card">
    <div class="card-body">
   <h6> Stock Por Año</h6>
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(stock) FROM `detalle_bodega` D JOIN `tb_bodega` V ON D.odt_bodega=V.codBodega   GROUP by Año;";
     } if ($tipo_usuario==2) {
     $sql="SELECT Año,SUM(stock),idusuario FROM `detalle_bodega` D JOIN `tb_bodega` V ON D.odt_bodega=V.codBodega WHERE idusuario='$idusuario' GROUP by Año;";
     }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['Año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final4 += $cantidad;
        $final5   =    number_format($final4, 2, ".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
               <p style="border-bottom: 1px solid #ccc;"></p>
               <p align="right"><b style="float: left;">Total </b><?php echo $final5 ?></p>
</div>
</div>

<?php } if (isset($_POST['bodega1'])) { ?>

        <h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD HOSPITAL NACIONAL SANTA TERESA</h3>
<h3 align="center" style="margin-top: 2%;"></h3>
        <h4 align="center" style="margin-top: 2%;">EGRESOS DE BODEGA</h4>  
<?php $sql = "SELECT * FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
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

         if ($productos['idusuario']==1) {
        $u='Admin';
        }
        else {
            $u='Cliente';
        }if ($productos['idusuario']==0) {
            $u='Invitado';
        }
         ?>
     <?php } ?>
        <br> <br>
       <div class="row" >
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Soli.: </b><?php echo $final3 ?></p>
        </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Despa: </b><?php echo $final5 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Cant. Soli. - Cant. Despa.: </b><?php echo $final7 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
             </div></div></div>
        <div class="col-md-3">
        <div class="card">
                    <div class="card-body">
            <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
    </div>
</div>
</div>
</div>
          <br>          

   <table class="table" >

    <thead>

        <tr>
                <th style="width: 50%;"><p id="p">O. de T. No.</p></th>
                <th style="width: 50%;"><p id="p">Codigo</p></th>
                <th style="width: 50%;"><p id="p">Departamento</p></th>
                <th style="width: 50%;"><p id="p">Encargado</p></th>
                <th style="width: 50%;"><p id="p">Descripción </p></th>
                <th style="width: 30%;"><p id="p">U/M</p></th>
                <th style="width: 40%;"><p id="p">Cantidad Soli</p></th>
                <th style="width: 40%;"><p id="p">Cantidad Despa</p></th>
                <th style="width: 30%;"><p id="p">Precio</p></th>
                <th style="width: 50%;"><p id="p">Fecha</p></th>
         
       </tr>

       
     </thead>

     <tbody>

        <?php


$sql = "SELECT * FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
            if ($estado="Pendiente") {
        
    $total = $productos['stock'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
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


         if ($productos['idusuario']==1) {
        $u='Admin';
        }
        else {
            $u='Cliente';
        }if ($productos['idusuario']==0) {
            $u='Invitado';
        }
        ?> 
 <tr>

    <td data-label="O. de T. No."><?php echo $odt ?></td>
    <td data-label="Codigo"><?php  echo $cod ?></td>
    <td data-label="Departamento" ><?php  echo $departamento ?></td>
    <td data-label="Encargado" class="delete"><?php  echo $usuario; ?><br>(<?php echo $u ?>)</td>
    <td data-label="Descripción Completa" ><?php  echo $descripcion ?></td>
    <td data-label="Unidad De Medida"><?php  echo $um; ?></td>
    <td data-label="Cantidad"><?php  echo $stock ?></td>
    <td data-label="Cantidad"><?php  echo $cantidad_desp?></td>
    <td data-label="Costo Unitario"><?php  echo $precio2 ?></td>
    <td data-label="Fecha Registro"><?php  echo $fecha; ?></td>


</tr>

<?php } ?> 

     </tbody>
 </table>
           <br> 
          <div class="card">
            <div class="card-body">         
        <h6>Stock Por Mes</h6>
        <?php 
        if ($tipo_usuario==1) {
        $sql="SELECT Mes,SUM(stock) FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega   GROUP by Mes;";
        }if ($tipo_usuario==2) {
        $sql="SELECT Mes,SUM(stock),idusuario FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE idusuario='$idusuario' GROUP by Mes;";
        }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final6 += $cantidad;
        $final7   =    number_format($final6, 2, ".",",");
        $mes=$productos['Mes'];
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
               <p align="right"><b style="float: left;"><?php echo $mes ?>: </b><?php echo $stock ?></p>
   <?php  } ?>
         <p style="border-bottom: 1px solid #ccc;"></p>
    <p align="right"><b style="float: left;">Total </b><?php echo $final7 ?></p>
</div>
</div>
 <br>
<div class="card">
    <div class="card-body">
   <h6> Stock Por Año</h6>
    <?php
    if ($tipo_usuario==1) {
     
     $sql="SELECT Año,SUM(stock) FROM `detalle_bodega` D JOIN `tb_bodega` V ON D.odt_bodega=V.codBodega   GROUP by Año;";
     } if ($tipo_usuario==2) {
     $sql="SELECT Año,SUM(stock),idusuario FROM `detalle_bodega` D JOIN `tb_bodega` V ON D.odt_bodega=V.codBodega WHERE idusuario='$idusuario' GROUP by Año;";
     }
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['Año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $final4 += $cantidad;
        $final5   =    number_format($final4, 2, ".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
               <p style="border-bottom: 1px solid #ccc;"></p>
               <p align="right"><b style="float: left;">Total </b><?php echo $final5 ?></p>
</div>
</div>

<?php }?>


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