<?php
session_start();
if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
    window.location ="../../../log/signin.php";
    session_destroy();  
    </script>
    die();

    ';
    
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imiprimir Circulante</title>   
    <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">
</head>
<body>
    <style>
        table tr td {padding: 1%;font-size: 14px}
        .table {width: 100%;border-collapse: collapse;margin: 0;table-layout: fixed;}
        .table tbody tr {background-color: #f8f8f8;border: 1px solid #ddd;}
        .table th, .table td {font-size: 12px;text-align: center;}
        .table thead th{ background-color: #46466b;color: white;text-align: center;font-size: 14px;}


        .table tbody tr:nth-child(even) {background-color: #00BDFF; }
        .table tbody tr:nth-child(odd) {background-color: #00EAFF; }
        p{font-size: 16px}
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
            width: 74%;
            border-radius: 0.25rem;
        }
        #a{
            float: left;
            width: 25%;
        }
        #b{
            margin-top: 2%;
            width: 100%;
            float: right;
        }
        h3, h4, h5{
            font-size: 12px;
            text-align: center;
        }
    </style>
    <img src="../../../img/hospital.png" style="width:20%; float: left;">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
    <h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>

    <h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
    <h5>SOLICITUD DE MATERIALES DE FONDO FIRCULANTE</h5>

    <div id="b">
        <p>Encargado del Fondo Circulante de Monto Fijo Recursos Propios</p>
        <p>Hospital Nacional "Santa Teresa" de Zacatecoluca</p>

        <p>Atentamente solicito a usted la compra <b>Urgente</b> de los materiales y/o servicios que se detallan a continuación, a través del Fondo Circulante de Monto Fijo.</p>
    </div>
    <?php  include ('../../../Model/conexion.php');
    $vale = $_POST['num_sol'];
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
    $final10 = "0.00";


    $sql = "SELECT * FROM detalle_circulante WHERE tb_circulante='$vale'";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
        if ($estado="Pendiente") {

            $total = $solicitudes['stock'] * $solicitudes['precio'];
        }if ($estado=="Aprobado") {

            $total = $solicitudes['cantidad_despachada'] * $solicitudes['precio'];
        }

    }
    $sql = "SELECT * FROM tb_circulante WHERE codCirculante='$vale' ";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){


        $fech=date("d - m - Y",strtotime($solicitudes['fecha_solicitud']));


        ?>
        <table style="width: 100%;margin: 0;">
           <table style="width: 100%;font-size: 11px; margin: 0;" >
            <tr>
                <td><b>N° de Solicitud:</b> <?php echo $vale ?></td>
                <td align="right"><b>Fecha:</b> <?php echo $fech ?></td>
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


                $sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida FROM detalle_circulante WHERE tb_circulante='$vale' GROUP BY codigo";
                $result = mysqli_query($conn, $sql);

                while ($solicitudes = mysqli_fetch_array($result)){

                    $codigo=$solicitudes['codigo'];
                    $des=$solicitudes['descripcion'];
                    $um=$solicitudes['unidad_medida'];
                    $cantidad=$solicitudes['SUM(cantidad_despachada)'];
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

                    $final8 += $cost;
                    $final9   =    number_format($final8, 2, ".",",");


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

            <p id="p" align="right"><b style="float: left;">Cant Solicitada: </b><?php echo $final3 ?></p>
            <p id="p" align="right"><b style="float: left;">Cant Despachada: </b><?php echo $final5 ?></p>
            <p id="p" align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
            <p id="p" style="border-bottom: 1px solid #ccc;border-collapse: collapse;"></p>
            <p id="p" align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>
        </div>
    </div>


    <div id="b">
        <p>Todo lo anteriormente detallado, es indispensable para desarrollar nuestras funciones.</p>  
        <p>Sin más particular</p>

        <div align="right">
            <p style="float: right;"> Dá fe de no haber existencia: <br><br>F. ________________ <br>Sra. Isabel Romero <br>Guarda Almacén</p>
        </div>

        <div align="">
            <p style="text-align:left;">Solicita: <br><br>F. ________________ <br>Ing. Ernesto González Choto <br>Jefe de Mantenimiento</p>
        </div>

        <div align="">
            <p style="text-align: center;">Autoriza: <br><br>F. ________________ <br>Dr. William Antonio Fernández Rodríguez <br>Director del Hospital Nacional “ Santa Teresa”</p>
        </div>
    </div>

</body>
</html>
<script type="text/javascript">
    window.print();
</script>