<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imiprimir Circulante</title>   
        <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../../../styles/estilos_tablas.css">
 </head>
 <body>

<img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">

 <?php  include ('../../../Model/conexion.php');
$total = 0;
$final = 0;
$final1 = 0;
$final2 = 0;
     $bodega = $_POST['num_sol'];
         $sql = "SELECT * FROM detalle_circulante WHERE tb_circulante='$bodega'";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
        $codigo=$solicitudes['codigo'];
        $des=$solicitudes['descripcion'];
        $um=$solicitudes['unidad_medida'];
        $cantidad=$solicitudes['stock'];
        $stock=$solicitudes['stock'];
        $cost=$solicitudes['precio'];
     
    $total = $solicitudes['stock'] * $solicitudes['precio'];

    
     $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",","); 
  }
?>

 <table style="width: 100%; font-size: 12px;">
    <?php     $sql = "SELECT * FROM tb_circulante WHERE codCirculante='$bodega'";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
        $solicitud=$solicitudes['codCirculante'];
        $fecha=$solicitudes['fecha_solicitud'];
    

      
?>
     <tr>
         <td><b>N° Circulante:</b><p><?php echo $solicitud?></p></td>
         <td align="center"><b>Fecha:</b><p><?php echo $fecha ?></p></td>
         <td align="right"><b>SubTotal:</b><p><?php echo $final1 ?></p></td>
     </tr>
 <?php } ?>
 </table>


 <?php 


?> 


</table>

<table class="table" style="width: 100%">
    <thead>     
        <tr id="tr">
            <th style="width: 20%;">Código</th>
            <th style="width: 50%;">Descripción Completa</th>
            <th style="width: 20%;">U/M</th>
            <th style="width: 20%;">Cantidad Solicitada</th>
            <th style="width: 20%;">Cantidad Despachada</th>
            <th style="width: 20%;">C/U</th>
            <th style="width: 20%;">Total</th>

            </tr>
    </thead> 

    <tbody>
<?php

    $sql = "SELECT * FROM detalle_circulante WHERE tb_circulante='$bodega'";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
        $codigo=$solicitudes['codigo'];
        $des=$solicitudes['descripcion'];
        $um=$solicitudes['unidad_medida'];
        $cantidad=$solicitudes['cantidad_despachada'];
        $stock=$solicitudes['stock'];
        $cost=$solicitudes['precio'];
     
    $total = $solicitudes['stock'] * $solicitudes['precio'];

    
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
<br>              
       
    
<section sytle="font-size: 14px;">
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

   
    
    <br>
</body>
</html>
<script type="text/javascript">
window.print();
</script>