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
?>
<?php include ('../../templates/menu1.php')?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>Egresos</title>
</head>
<body style="max-width: 100%;">

    <style>
        form{
            margin: 0%;
        }
        #n{
            display: none;
        }
              @media (min-width: 1028px){
           #section{
                margin: 5%6%6%1%;
                width: 97%;
            } 
        }
        @media (max-width: 800px){
            #ver{
                margin-top: 2%;
            }
            #section{
                margin: -10%6%6%1%;
                width: 97%;
            }

            th{
                width: 25%;
            }
            #p{
                margin-top: 5%;
                margin-left: 7%;
            }

        }
    </style>
    <br><br><br>
    <section id="section" style="background: rgba(255, 255, 255, 0.9); border-radius: 15px; padding: 1%";>
       <h1 style="text-align: center;">Egresos de Productos</h1><br>
       <form method="GET" style="background:transparent;">
        <div class="card">
            <div class="card-body">
                <div class="row" >
                   <div class="col-md-3" style="position: initial; width:50%px;">
                    <p id="x" class="mx-3" style="color: #000; font-weight: bold;">Mostrar Ingresos por:</p>
                    </div>          <?php if(isset($_GET['ingresos'])){$mostrar = $_GET['ingresos'];
                    if ($mostrar=="bodega" || $mostrar=="vale" ) {?>

                        <div class=" col-md-1" style="position: initial;">
                            <a  href="reporte_egresos.php" class="btn btn-primary">Inicio</a>
                        </div>
                    <?php } } ?>

                    <div class="col-md-3 " style="position: initial;">
                        <select class="form-control" name="ingresos" id="ingresos" onchange="this.form.submit()">
                            <option>Seleccionar</option>
                            <?php if(isset($_GET['ingresos'])){$mostrar = $_GET['ingresos'];
                            if ($mostrar=="vale" ) {?>
                                <option value="bodega">Solicitud a Bodega</option>
                            <?php }
                            if ($mostrar=="bodega") {?>
                                <option value="vale">Solicitud de Vale</option>
                            <?php } }else{?>
                                <option value="bodega">Solicitud a Bodega</option>
                                <option value="vale">Solicitud de Vale</option>

                            <?php } ?>
                        </select>
                    </div>          
                </div>  
            </div>
        </div>
    </form> 
    <br>

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


    if(isset($_GET['ingresos'])){

        $mostrar = $_GET['ingresos'];

        if($mostrar == "bodega"){
            ?>
            <style>
              #act {
                margin-top: 0.5%;
                margin-right: 3%;
                margin-left: 3%;
                padding: 1%;
                border-radius: 5px;
                background-color: white;
            }
            input{
                width: 100%;
            }
        </style>
        <div class="row">
            <div class="col-md-9 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3 style="text-align: center;">Egresos de Bodega</h3>

                        <table  class="table  flex-lg-wrap" id="example" style=" width: 100%">
                            <thead>
                              <tr id="tr">
                                <th style="width: 30%;">O. de T. No.</th>
                                <th style="width: 30%;">Cod</th>
                                <th style="width: 30%;">Depar</th>
                                <th style="width: 30%;">Encar</th>
                                <th style="width: 50%;">Descri</th>
                                <th style="width: 30%;">U/M</th>
                                <th style="width: 30%;">C. Soli</th>
                                <th style="width: 30%;">Despa</th>
                                <th style="width: 30%;">Precio</th>
                                <th style="width: 30%;">Fecha</th>

                            </tr>


                        </thead>
                        <tbody>
                         <?php 
                         if ($tipo_usuario==1) {

                            $sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,idusuario,odt_bodega,codBodega,departamento,usuario,fecha_registro FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega GROUP by codigo ";
                        }
                        if ($tipo_usuario==2) {
                            $sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,idusuario,odt_bodega,codBodega,departamento,usuario,fecha_registro FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE db.idusuario='$idusuario' GROUP by codigo ";

                        }


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
                            $codigo=$productos['codigo'];
                            $descripcion=$productos['descripcion'];
                            $um=$productos['unidad_medida'];


                            $precio   =    $productos['precio'];
                            $precio1  =    number_format($precio, 2,".",",");  
                            $cant_aprobada=$productos['SUM(stock)'];
                            $cantidad_despachada=$productos['SUM(cantidad_despachada)'];
                            $stock=number_format($cant_aprobada, 2,".",",");
                            $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

                            $final2 += $cant_aprobada;
                            $final3   =    number_format($final2, 2, ".",",");

                            $final4 += $cantidad_despachada;
                            $final5   =    number_format($final4, 2, ".",",");

                            $final8 += $precio;
                            $final9   =    number_format($final8, 2, ".",",");

                            if ($productos['idusuario']==1) {
                                $u='Administrador';
                            }
                            else {
                                $u='Cliente';
                            }?>

                            <style type="text/css">
                                #td{
                                    display: none;
                                }

                                #div{
                                    display: block;
                                }
                                #n{
                                    display: block;
                                }
                            </style>
                            <tr id="tr">
                                <td align="center" data-label="O. de T. No."><?php echo $productos['codBodega'] ?></td>
                                <td align="center" data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
                                <td align="center" data-label="Departamento" ><?php  echo $productos['departamento']; ?></td>
                                <td align="center" data-label="Encargado" class="delete"><?php  echo $productos['usuario'],"<br> ","(",$u,")"; ?></td>
                                <td align="center" data-label="Descripción Completa" ><?php  echo $productos['descripcion']; ?></td>
                                <td align="center" data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
                                <td align="center" data-label="Cantidad"><?php  echo $stock ?></td>
                                <td align="center" data-label="Cantidad"><?php  echo $cantidad_desp?></td>
                                <td align="center" data-label="Costo Unitario"><?php  echo $precio1 ?></td>
                                <td align="center" data-label="No. Vale"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>



                            </tr>

                        <?php } ?> 

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include '../../Include/Bodega/bodega.php';?>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                    <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
                     <form  method="POST" action="../../Plugin/Imprimir/Egresos/reporte_egreso.php"  target="_blank" class="c">
                        <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="bodega">
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                            </svg>
                        </button>
                    </form>
                    <form  method="POST" action="../../Plugin/PDF/Egresos/pdf_egresos.php" class="mx-1 c"  target="_blank">
                        <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="bodega">
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                            </svg>
                        </button>
                    </form>
                    <form   method="POST" action="../../Plugin/Excel/Egresos/Bodega/Excel.php" class="c">
                        <button type="submit" class="btn btn-outline-primary" name="bodega" target="_blank">
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                            </svg>
                        </button>
                    </form>

                </div>

<p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
<p align="right"><b style="float: left;">Cantidad Despachada: </b><?php echo $final5 ?></p>
<p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
<p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
</div>
</div>
</div>
</div>
<br>
<div class="row ">
    <div class="col-md-6 mb-3 c">
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
                        $sql="SELECT fecha_registro, Count(codigo),codigo,Año,SUM(stock),SUM(precio)FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega  GROUP by Mes";
                    }if ($tipo_usuario==2) {
                        $sql="SELECT fecha_registro, Count(codigo),codigo,Año,SUM(stock),SUM(precio),idusuario FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE db.idusuario='$idusuario'  GROUP by Mes";
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
</div>
<div class="col-md-6 c">
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

                 $sql="SELECT fecha_registro, Count(codigo),codigo,Año,SUM(stock),SUM(precio) FROM `detalle_bodega` D JOIN `tb_bodega` V ON D.odt_bodega=V.codBodega GROUP by Año;";
             } if ($tipo_usuario==2) {
                $sql="SELECT fecha_registro, Count(codigo),codigo,Año,SUM(stock),SUM(precio) FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE db.idusuario='$idusuario'  GROUP by Año";
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
<?php 
}
else if($mostrar == "vale"){
    ?>

    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h3 style="text-align: center; color: black;">Egresos Por Vale </h3>

                    <table class="table table-responsive flex-wrap" id="example" style=" width: 100%">
                        <thead>
                          <tr id="tr">
                            <th style="width: 10%;">No. Vale</th>
                            <th style="width: 10%;">Codigo</th>
                            <th style="width: 10%;">Depar <br>tamento</th>
                            <th style="width: 10%;">Encar <br>gado</th>
                            <th style="width: 10%;">Descripción</th>
                            <th style="width: 10%;">U/M</th>
                            <th style="width: 10%;">Cantidad <br>Soli</th>
                            <th style="width: 10%;">Cantidad <br>Despa</th>
                            <th style="width: 10%;">Precio</th>
                            <th style="width: 10%;">Fecha</th>
                        </tr>


                    </thead>
                </thead>
                <tbody>
                 <?php
                 if ($tipo_usuario==1) {
                    $sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,idusuario,numero_vale,departamento,usuario,fecha_registro FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale GROUP by codigo";
                }
                if ($tipo_usuario==2) {
                    $sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida,idusuario,numero_vale,departamento,usuario,fecha_registro FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE V.idusuario='$idusuario' GROUP by codigo";
                }
                $result = mysqli_query($conn, $sql);;
                while ($productos = mysqli_fetch_array($result)){
                    if ($estado="Pendiente") {

                        $total = $productos['SUM(stock)'] * $productos['precio'];
                    }if ($estado=="Aprobado") {

                        $total = $productos['SUM(cantidad_despachada)'] * $productos['precio'];
                    }
                    $final += $total;
                    $total1= number_format($total, 2, ".",",");
                    $final1=number_format($final, 2, ".",",");
                    $codigo=$productos['codigo'];
                    $descripcion=$productos['descripcion'];
                    $um=$productos['unidad_medida'];

                    $precio   =    $productos['precio'];
                    $precio2  =    number_format($precio, 2,".",",");  
                    $cant_aprobada=$productos['SUM(stock)'];
                    $cantidad_despachada=$productos['SUM(cantidad_despachada)'];
                    $stock=number_format($cant_aprobada, 2,".",",");
                    $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

                    $final2 += $cant_aprobada;
                    $final3   =    number_format($final2, 2, ".",",");

                    $final4 += $cantidad_despachada;
                    $final5   =    number_format($final4, 2, ".",",");


                    $final8 += $precio;
                    $final9   =    number_format($final8, 2, ".",",");

                    if ($productos['idusuario']==1) {
                        $u='Administrador';
                    }
                    else {
                        $u='Cliente';
                    }if ($productos['idusuario']==0) {
                        $u='Invitado';
                    }
                    ?>



                    <tr id="tr">
                        <td align="center" data-label="No. Vale"><?php  echo $productos['numero_vale']; ?></td> 
                        <td align="center" data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
                        <td align="center" data-label="Departamento" ><?php  echo $productos['departamento']; ?></td>
                        <td align="center" data-label="Encargado" class="delete"><?php  echo $productos['usuario'],"<br> ","(",$u,")"; ?></td>
                        <td align="center" data-label="Descripción Completa"><?php  echo $productos['descripcion']; ?></td>
                        <td align="center" data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
                        <td align="center" data-label="Cantidad"><?php  echo $stock ?></td>
                        <td align="center" data-label="Cantidad"><?php  echo $cantidad_desp ?></td>
                        <td align="center" data-label="Costo Unitario"><?php  echo $precio2 ?></td>
                        <td align="center" data-label="No. Vale"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
                    <?php } ?>      
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
<?php include '../../Include/Vale/vale.php';?>
<div class="col-md-3">
    <div class="card">
        <div class="card-body">
            <?php if ($tipo_usuario==1) {?>
                <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
                    <form  method="POST" action="../../Plugin/Imprimir/Egresos/reporte_egreso.php"  target="_blank" class="c">
                        <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="vale">
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                            </svg>
                        </button>
                    </form>
                    <form  method="POST" action="../../Plugin/PDF/Egresos/pdf_egresos.php" class="mx-1 c"  target="_blank">
                        <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="vale">
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                            </svg>
                        </button>
                    </form>
                    <form   method="POST" action="../../Plugin/Excel/Egresos/Vale/Excel.php" class="c"> 
                        <button type="submit" class="btn btn-outline-primary" name="vale" target="_blank">
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                            </svg>
                        </button>
                    </form>

                </div>
            <?php } if ($tipo_usuario==2) {?>
                <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
                    <form   method="POST" action="../../Plugin/Imprimir/Egresos/reporte_egreso.php"  target="_blank">
                      <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                      <button type="submit" class="btn btn-outline-primary" name="vale1">
                        <svg class="bi" width="20" height="20" fill="currentColor">
                            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                        </svg>
                    </button>
                </form>
                <form   method="POST" action="../../Plugin/PDF/Egresos/pdf_egresos.php" class="mx-1 c"  target="_blank">
                  <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                  <button type="submit" class="btn btn-outline-primary" name="vale1">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                    </svg>
                </button>
            </form>
            <form id="form2"  method="POST" action="../../Plugin/Excel/Egresos/Vale/Excel.php">                 
                <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                <button type="submit" class="btn btn-outline-primary" name="vale1" target="_blank">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                    </svg>
                </button>
            </form>
        </div>
        <hr>
    <?php } ?>
    <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
    <p align="right"><b style="float: left;">Cantidad Despachada: </b><?php echo $final5 ?></p>

    <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
    <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
</div>
</div>
</div>
</div>
<br>
<div class="row ">
    <div class="col-md-6 mb-3 c">
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
                        $sql="SELECT fecha_registro, Count(codigo),codigo,Mes,SUM(stock),SUM(precio) FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale GROUP by Mes;";
                    }if ($tipo_usuario==2) {
                        $sql="SELECT fecha_registro, Count(codigo),codigo,Mes,SUM(stock),SUM(precio),idusuario FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE idusuario='$idusuario' GROUP by Mes;";
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
</div>
<div class="col-md-6 c">
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

                        $sql="SELECT fecha_registro, Count(codigo),codigo,Año,SUM(stock),SUM(precio) FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale GROUP by Año;";
                    } if ($tipo_usuario==2) {
                        $sql="SELECT fecha_registro, Count(codigo),codigo,Año,SUM(stock),SUM(precio),idusuario FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE idusuario='$idusuario' GROUP by Año;";
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
<?php } }?>




<script>$(document).ready(function () {

   $('#example').DataTable({

    responsive: true,
    autoWidth:false,
    deferRender: true,
    scroller: true,
    scrollY: 400,
    dom: 'lrtip',
    lengthMenu: [[10, -1], [10,"Todos"]],
    "searching": false,
    scrollCollapse: true,
    language: {
        "lengthMenu": "Mostrar _MENU_ registros",
        "zeroRecords": "No se encontraron resultados",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch": "Buscar:",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast":"Último",
            "sNext":"Siguiente",
            "sPrevious": "Anterior"
        },
        "sProcessing":"Procesando...",
    },

});
}); 
</script> 
<script>
    $('.p1').hide();
    $('.p4').hide();
    $('.p').click(function(){
        $(".div").removeClass("div");
        $('.p').hide();
        $('.p1').show();

    });
    $('.p1').click(function(){

        $(".div3").addClass("div");
        $('.p1').hide();
        $('.p').show();
    });




    $('.p3').click(function(){
        $(".div1").removeClass("div1");
        $('.p3').hide();
        $('.p4').show();

    });
    $('.p4').click(function(){

        $(".div4").addClass("div1");
        $('.p4').hide();
        $('.p3').show();
    });


</script>
</body>
</html>