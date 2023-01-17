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
?><?php include ('../../templates/menu1.php') ?>
<?php include ('../../Model/conexion.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buscador al Producto</title>
</head>
<body>
      <br><br><br>  
    <section class="mx-3"  style="background: rgba(255, 255, 255, 0.9);padding: 1%; border-radius: 15px;">
        <h2  class="text-center">Buscador al Producto</h2>
        <br>

        <style>p{font-size: 12px;</style>
        <div class="card">
            <div class="card-body">
                <div class="row" >
                   <div class="col-md-3" style="position: initial; ">
                    <p class="mx-3" style="color: #000; font-weight: bold;">Buscar Codigo del Producto</p>
                </div>          
                <div class="col-md-8"style="position: initial;">
                    <section class="well" >
                        <form method="POST" action="" class="well hidden"> 
                            <div style="position: initial;" class="input-group">
                                Del: <input type="DATE" name="f1" class="form-control mx-3" required>
                                Al: <input type="DATE" name="f2" class="form-control mx-3" required >
                                <input required type="number" style="position: initial;" name="Busqueda"  class="form-control"  placeholder="Buscar">
                                <button name="Consultar2" type="submit" onclick="return validar1()" class="input-group-text input" for="inputGroupSelect01">
                                    <svg class="bi" width="20" height="20" fill="currentColor">
                                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#search"/>
                                    </svg>
                                </button>
                            </div> 
                        </form>
                    </section>
                </div>
            </div>         
        </div>  
    </div>
</div>
<?php $total = "0.00";
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
$final10 = "0.00";
$final11 = "0.00";
$final12 = "0.00";
$final13 = "0.00";
$final14 = "0.00";
$final15 = "0.00";
$final16 = "0.00";
$final17 = "0.00";
$final18 = "0.00";
$final19 = "0.00";
$final20 = "0.00";

if (isset($_POST['Consultar2'])) {

    $f1=$_POST['f1'];$f2=$_POST['f2'];$Busqueda=$_POST['Busqueda'];


    ?>
    <br>

    <div class="row" >

        <div class="col-md-9">


         <div class="card">
            <div class="card-body">
             <table class="table" id="examp" style="">
               <thead>
                 <tr id="tr">
                     <th style="width:20%"  id="th">Fecha</th>
                     <th style="width:30%"  id="th">Concepto</th>
                     <th style="width:30%;" id="th">Comprobante</th>
                     <th style="width:20%"  id="th">Entradas</th>
                     <th style="width:20%"  id="th">Salidas</th>
                     <th style="width:20%"  id="th">Saldo</th>
                     <th style="width:20%"  id="th">Total</th>

                 </tr>

             </thead>
             <div>
                <tbody>
                    <?php $sql = "SELECT descripcion,Concepto,unidad_medida,fecha_registro,No_Comprovante,Entradas,Salidas,Saldo FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'";
                    $result = mysqli_query($conn, $sql);

                    while ($productos = mysqli_fetch_array($result)){
                        $total = $productos['Entradas'] * $productos['Saldo'];
                        $final += $total;
                        $total1= number_format($total, 2, ".",",");
                        $final2=number_format($final, 2, ".",",");

                        $fecha=date("d-m-Y",strtotime($f1));
                        $fecha1=date("Y-m-d",strtotime($productos['fecha_registro']));
                        $fecha3=date("d-m-Y",strtotime($f2));
                        $Concepto=$productos['Concepto'];
                        $Comprovante= $productos['No_Comprovante'];
                        $precio= $productos['Saldo'];
                        $precio1=number_format($precio, 2, ".",",");
                        $descripcion=$productos['descripcion'];
                        $stock=$productos['Entradas'];
                        $Salida=$productos['Salidas'];
                        $stock1=number_format($stock, 2, ".",",");  
                        $um=$productos['unidad_medida']; 

                        $final14 += $stock;
                        $final15   =    number_format($final14, 2, ".",",");

                        $final16 += $Salida;
                        $final17   =    number_format($final16, 2, ".",",");

                        $final18 += $stock-$Salida;
                        $final19   =    number_format($final18, 2, ".",",");

                        $final20 += $precio;
                        $final21   =    number_format($final20, 2, ".",",");

                        ?>
                        <tr>
                            <td id="th" data-label="Fecha"><?php echo $fecha1 ?></td>
                            <td id="th" data-label="Concepto"><?php echo $Concepto ?></td>
                            <td id="th" data-label="No. Comprovante"><?php echo $Comprovante ?></td>
                            <td id="th" data-label="Entradas"><?php echo $stock1?></td>
                            <td id="th" data-label="Salidas"><?php echo $Salida ?></td>
                            <td id="th" data-label="Saldo"><?php echo $precio1 ?></td>
                            <td id="th" data-label="Saldo"><?php echo $total1 ?></td>
                        </tr> 
                    <?php } ?>

                </tbody>
            </table>

        </div>
    </div>
</div>
<div class="col-md-3" id="card">

    <div class="card">
        <div class="card-body">

            <style type="text/css">#card{display: block;}.card1, #card2{display: none;}</style>
            <div  style="position: initial;" class="btn-group mb-3 my-3  mx-2" role="group" aria-label="Basic outlined example">
             <form method="POST" action="../../Plugin/Imprimir/Producto/productos.php" target="_blank">

                 <input type="hidden" name="Busqueda" value="<?php echo $Busqueda ?>">
                 <input type="hidden" name="f1" value="<?php echo $f1?>">
                 <input type="hidden" name="f2" value="<?php echo $f2?>">

                 <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Historial">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                    </svg>
                </button>
            </form>
            <form method="POST" action="../../Plugin/PDF/Productos/Historial.php" target="_blank" class="mx-1">
             <input type="hidden" name="Busqueda" value="<?php echo $Busqueda ?>">
             <input type="hidden" name="f1" value="<?php echo $f1?>">
             <input type="hidden" name="f2" value="<?php echo $f2?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Historial" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                    <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
            </button>
        </form>
        <form  method="POST" action="../../Plugin/Excel/Productos/Historial.php" >
         <input type="hidden" name="Busqueda" value="<?php echo $Busqueda ?>">
         <input type="hidden" name="f1" value="<?php echo $f1?>">
         <input type="hidden" name="f2" value="<?php echo $f2?>">
         <button type="submit" class="btn btn-outline-primary" name="Historial" target="_blank">
            <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
            </svg>
        </button>
    </form>
</div>

<p><b >PERIODO DE MOVIMIENTO</b></p>

<p align="right"><b style="float: left;">DE:</b> <?php echo $fecha ?></p>     
<p align="right"><b style="float: left;">AL:</b> <?php echo $fecha3 ?></p>     
<p align="right"><b style="float: left;">Codigo del Producto: </b><?php echo $Comprovante?></p>     
<p align="right"><b style="float: left;">Descripción: </b><?php echo $descripcion ?></p>     
<p align="right"><b style="float: left;">Unidad de Medida</b><?php echo $um ?></p> 




</div>
</div>
<div class="card mt-2 mb-2">
    <div class="card-body">
      <p align="right"><b style="float: left;">Entradas: </b><?php echo $final15 ?></p>
      <p align="right"><b style="float: left;">Salidas: </b><?php echo $final17 ?></p>
      <p align="right"><b style="float: left;">Resta de Entradas - Salidas: </b><?php echo $final19 ?></p>
      <p align="right"><b style="float: left;">Saldo(Precio): </b><?php echo $final21 ?></p>
      <p style="border-bottom: 1px solid #ccc;"></p>
      <p align="right"><b style="float: left;">SubTotal: </b><?php echo $final2 ?></p>
  </div>
</div>
<div class="card mt-2 mb-2">
    <div class="card-body">
       <h6 >Entradas Por Mes</h6>
       <div class="div d" > 
        <?php $sql="SELECT SUM(Entradas),fecha_registro FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'  GROUP BY Mes;";
        $result = mysqli_query($conn, $sql);
        while ($productos = mysqli_fetch_array($result)){
            $mes=date("m",strtotime($productos['fecha_registro']));
            $cantidad=$productos['SUM(Entradas)'];
            $stock=number_format($cantidad, 2,".",",");
            $final8 += $cantidad;
            $final9   =    number_format($final8, 2, ".",",");
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
            <p align="right"><b style="float: left;"><?php echo $mes ?> : </b><?php echo $stock ?></p>
        <?php  } ?>
    </div>
    <p style="border-bottom: 1px solid #ccc;border-collapse: collapse;"></p>
    <p align="right"><b style="float: left;">Total </b><?php echo $final9 ?></p>      
    <p align="right" class="p">Mostrar todos
        <svg class="bi" width="20" height="20" fill="currentColor">
            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/></svg></p>
            <p align="right" class="p1">Ocultar
                <svg class="bi" width="20" height="20" fill="currentColor">
                    <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-up-fill"/></svg></p>

                </div>
            </div>
            <div class="card mt-2 mb-2">
                <div class="card-body">
                   <h6 >Salidas Por Mes</h6>
                   <div class="div1 d1" > 
                    <?php $sql="SELECT SUM(Salidas),fecha_registro FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'  GROUP BY Mes;";
                    $result = mysqli_query($conn, $sql);
                    while ($productos = mysqli_fetch_array($result)){
                        $mes=date("m",strtotime($productos['fecha_registro']));
                        $cantidad=$productos['SUM(Salidas)'];
                        $stock=number_format($cantidad, 2,".",",");
                        $final10 += $cantidad;
                        $final11   =    number_format($final10, 2, ".",",");
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
                        <p align="right"><b style="float: left;"><?php echo $mes ?> : </b><?php echo $stock ?></p>
                    <?php  } ?>
                </div>
                <p style="border-bottom: 1px solid #ccc;border-collapse: collapse;"></p>
                <p align="right"><b style="float: left;">Total </b><?php echo $final11 ?></p>       
                <p align="right" class="p2">Mostrar todos
                    <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/></svg></p>
                        <p align="right" class="p3">Ocultar
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-up-fill"/></svg></p>
                            </div>
                        </div>   
                        <div class="card mt-2 mb-2">
                            <div class="card-body">
                               <h6> Entradas Por Año</h6>
                               <div class="div2 d2" > 
                                <?php $sql="SELECT SUM(Entradas),fecha_registro FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'  GROUP BY Año;";
                                $result = mysqli_query($conn, $sql);
                                while ($productos = mysqli_fetch_array($result)){
                                    $año=date("Y",strtotime($productos['fecha_registro']));
                                    $cantidad=$productos['SUM(Entradas)'];
                                    $stock=number_format($cantidad, 2,".",",");
                                    $final4 += $cantidad;
                                    $final5   =    number_format($final4, 2, ".",",");?>
                                    <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
                                <?php } ?>
                            </div>
                            <p style="border-bottom: 1px solid #ccc;border-collapse: collapse;"></p>
                            <p align="right"><b style="float: left;">Total </b><?php echo $final5 ?></p>
                            <p align="right" class="p4">Mostrar todos
                                <svg class="bi" width="20" height="20" fill="currentColor">
                                    <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/></svg></p>
                                    <p align="right" class="p5">Ocultar
                                        <svg class="bi" width="20" height="20" fill="currentColor">
                                            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-up-fill"/></svg></p>
                                        </div>
                                    </div>
                                    <div class="card mt-2 mb-2">
                                        <div class="card-body">
                                           <h6> Salidas Por Año</h6>
                                           <div class="div3 d3" > 
                                            <?php $sql="SELECT SUM(Salidas),fecha_registro FROM historial WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' and No_Comprovante='$Busqueda'  GROUP BY Año;";
                                            $result = mysqli_query($conn, $sql);
                                            while ($productos = mysqli_fetch_array($result)){
                                                $año=date("Y",strtotime($productos['fecha_registro']));
                                                $cantidad=$productos['SUM(Salidas)'];
                                                $stock=number_format($cantidad, 2,".",",");
                                                $final12 += $cantidad;
                                                $final13   =    number_format($final12, 2, ".",",");?>
                                                <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
                                            <?php } ?>
                                        </div>
                                        <p style="border-bottom: 1px solid #ccc;border-collapse: collapse;"></p>
                                        <p align="right"><b style="float: left;">Total </b><?php echo $final13 ?></p>
                                        <p align="right" class="p6">Mostrar todos
                                            <svg class="bi" width="20" height="20" fill="currentColor">
                                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/></svg></p>
                                                <p align="right" class="p7">Ocultar
                                                    <svg class="bi" width="20" height="20" fill="currentColor">
                                                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-up-fill"/></svg></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </section>

                                <script type="text/javascript">

                                    $(document).ready(function () {

                                       $('#examp').DataTable({

                                        responsive: true,
                                        autoWidth:false,
                                        deferRender: true,
                                        scroller: true,
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


                                    $('.p1').hide();$('.p3').hide();$('.p5').hide();$('.p7').hide();
                                    $('.p').click(function(){$(".d").removeClass("div");$('.p').hide();$('.p1').show();});   
                                    $('.p1').click(function(){$(".d").addClass("div");$('.p1').hide();$('.p').show();});
                                    $('.p2').click(function(){$(".d1").removeClass("div1");$('.p2').hide();$('.p3').show();});    
                                    $('.p3').click(function(){$(".d1").addClass("div1");$('.p3').hide();$('.p2').show();});    
                                    $('.p4').click(function(){$(".d2").removeClass("div2");$('.p4').hide();$('.p5').show();});   
                                    $('.p5').click(function(){$(".d2").addClass("div2");$('.p5').hide();$('.p4').show();});
                                    $('.p6').click(function(){$(".d3").removeClass("div3");$('.p6').hide();$('.p7').show();});  
                                    $('.p7').click(function(){$(".d3").addClass("div3");$('.p7').hide();$('.p6').show();});

                                </script>
                            </section>
                        </body>
                        </html>