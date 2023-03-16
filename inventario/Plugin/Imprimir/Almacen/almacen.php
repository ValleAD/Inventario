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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.css">
    <title>Imprimir almacen</title>
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
    <?php 
    include ('../../../Model/conexion.php');
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
    $Almacen = $_POST['num_sol'];      
    ?>

    <h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA  DE ZACATECOLUCA</h3>
    <h4 align="center" style="margin-top: 2%;">ALMACÉN DE MEDICAMENTOS, INSUMOS MÉDICOS,</h4>
    <h4 align="center" style="margin-top: 2%;">PAPELERÍA Y OTROS ARTICULOS</h4>
    <br>
    <table  style="width: 100%;text-align: center;">
        <tr>
            <td><b>N° Almacen</b></td>
            <td><b>Departamento</b></td>
            <td><b>Encargado</b></td>
            <td><b>Fecha</b></td>
            <td><b>Estado</b></td>
        </tr>
        <?php    $sql = "SELECT * FROM tb_almacen WHERE codAlmacen='$Almacen'";
        $result = mysqli_query($conn, $sql);

        while ($solicitudes = mysqli_fetch_array($result)){
            $vale=$solicitudes['codAlmacen'];
            $depto=$solicitudes['departamento'];
            $encargado=$solicitudes['encargado'];
            $fech=$solicitudes['fecha_solicitud'];
            $estado=$solicitudes['estado'];

            ?>
            <tr>
                <td><?php echo $vale ?></td>
                <td><?php echo $depto ?></td>
                <td><?php echo $encargado ?></td>
                <td><?php echo $fech ?></td>
                <td><?php echo $estado ?></td>
            </tr>

        <?php } ?>
    </table>
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


                $sql = "SELECT codigo,SUM(cantidad_solicitada),SUM(cantidad_despachada),precio,nombre,unidad_medida FROM `detalle_almacen` D JOIN `tb_almacen` V ON D.tb_almacen=V.codAlmacen WHERE tb_almacen = $Almacen Group by codigo";


                $result1 = mysqli_query($conn, $sql);

                while ($solicitudes = mysqli_fetch_array($result1)){
                    if ($estado="Pendiente") {  
                        $total = $solicitudes['SUM(cantidad_solicitada)'] * $solicitudes['precio'];
                    }if ($estado="Rechazado") {

                        $total = $solicitudes['SUM(cantidad_solicitada)'] * $solicitudes['precio'];
                    }if ($estado=="Aprobado") {

                        $total = $solicitudes['SUM(cantidad_despachada)'] * $solicitudes['precio'];
                    }
                    $codigo=$solicitudes['codigo'];
                    $des=$solicitudes['nombre'];
                    $um=$solicitudes['unidad_medida'];
                    $cantidad=$solicitudes['SUM(cantidad_despachada)'];
                    $stock=$solicitudes['SUM(cantidad_solicitada)'];
                    $cost=$solicitudes['precio'];

                    $final += $total;
                    $total1= number_format($total, 2, ".",",");
                    $final1=number_format($final, 2, ".",","); 
                    $final2 += $stock;
                    $final3   =    number_format($final2, 2, ".",",");

                    $final4 += $cantidad;
                    $final5   =    number_format($final4, 2, ".",",");

                    $final8 += $cost;
                    $final9   =    number_format($final8, 2, ".",",");

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
         <p align="right"><b style="float: left;">Cant Solicitada: </b><?php echo $final3 ?></p>
         <p align="right"><b style="float: left;">Cant Despachada: </b><?php echo $final5 ?></p>
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
</body>
</html>
<script type="text/javascript">
    window.print();
</script>